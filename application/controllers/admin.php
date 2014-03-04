<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Admin extends CI_Controller { 
 
    function __construct() 
    { 
        parent::__construct(); 
 
        /* Standard Libraries of codeigniter are required */ 
        $this->load->database(); 
	$this->load->library('session');
        $this->load->helper('url'); 
        /* ------------------ */  
 
        $this->load->library('grocery_CRUD'); 
 
    } 

    public function index()
    {
	$this->load->view('alogin');
    }


    public function login()
    {
	$u = $_POST['myusername'];
	$p = $_POST['mypassword'];
	
	if($u=="admin" and $p=="suresh2014#")
	{	
		$cmsdata = array("skill_home_admin" => true);
		$this -> session -> set_userdata($cmsdata);
		redirect('admin/worker','refresh');
	}
	else
	{
		$data['msg'] = "Invalid Username or Password.";
		$this->load->view('alogin',$data);
	}
    }

    
    public function logout() 
    {
	$this->load->helper('url');   
	$cmsdata = array("skill_home_admin" => false);
	$this -> session -> unset_userdata($cmsdata);
	redirect('Home/index', 'refresh');
    }
     
    public function worker() 
    { 
	
        $this->grocery_crud->set_table('worker'); 
        $this->grocery_crud->columns('id','worker_id','worker_fname','worker_lname','worker_service_subcategory_id','worker_area','worker_city','worker_state','worker_birthdate','worker_contact','worker_email','worker_rating','worker_paid_status','core_group','worker_photo','worker_advertise'); 
        //$this->grocery_crud->set_relation('worker_service_subcategory_id','service_subcategory','service_subtype'); 
	$this->load->model('service_subcategory_model');
	$sub = $this->service_subcategory_model->getAll();
	
	foreach($sub as $ca)
	{
		$arr_sub[$ca->service_subcategory_id] = $ca->service_subtype;
	}		
	$this->grocery_crud->field_type('worker_service_subcategory_id','multiselect',$arr_sub);
        
	//$this->grocery_crud->set_relation('worker_city','city','city_name'); 
        //$this->grocery_crud->set_relation('worker_state','state','state_name'); 
	$this->load->model('city_model');
	$this->load->model('state_model');
	$this->load->model('company_advertise_model');
	$company_ads = $this->company_advertise_model->getData();
	foreach($company_ads as $ca)
	{
		$arr_company_ad[$ca->image] = $ca->image;
	}
	$this->grocery_crud->field_type('worker_advertise','dropdown',$arr_company_ad);

	$cities = $this->city_model->getAllCity();
	$states = $this->state_model->getState();
	foreach ($cities as $row)
	{
		$arr_city[$row->city_name] = $row->city_name;
	}
	$this->grocery_crud->field_type('worker_city','dropdown',$arr_city);
	foreach ($states as $row)
	{
		$arr_state[$row->state_name] = $row->state_name;
	}
	$this->grocery_crud->field_type('worker_state','dropdown',$arr_state);
	$this->grocery_crud->display_as('worker_service_subcategory_id','Worker Subcategory'); 
        $this->grocery_crud->set_field_upload('worker_photo','image/services/workers/'); 
        $this->grocery_crud->required_fields('worker_fname','worker_lname','worker_service_subcategory_id','worker_area','worker_state','worker_city','worker_contact'); 
        $this->grocery_crud->change_field_type('worker_password', 'password'); 
        $this->grocery_crud->callback_before_insert(array($this,'password_callback')); 
        $this->grocery_crud->callback_before_update(array($this,'password_callback1')); 
	$this->grocery_crud->field_type('worker_reset_password', 'hidden');
	$this->grocery_crud->field_type('worker_rating','dropdown',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'));
	$this->grocery_crud->field_type('worker_paid_status','dropdown',array('paid'=>'paid','unpaid'=>'unpaid'));
	$this->grocery_crud->callback_add_field('worker_gender',array($this,'add_gender_callback')); 
	$this->grocery_crud->callback_edit_field('worker_gender',array($this,'add_gender_callback')); 
	$state = $this->grocery_crud->getState();
	$state_info = $this->grocery_crud->getStateInfo();
	if($state == 'add')
	{
		$this->grocery_crud->field_type('worker_id', 'hidden');			
	}
	else if($state == 'edit')
	{
		$this->grocery_crud->field_type('worker_password', 'readonly');

	}
	$this->grocery_crud->field_type('worker_modify_time', 'hidden');
	$this->grocery_crud->field_type('join_date', 'hidden');

	$output = $this->grocery_crud->render(); 
        $this->_example_output($output); 

    }
	
    function add_gender_callback()
    {
        return ' <input type="radio" name="sex" value="Male" checked="checked" /> Male
                 <input type="radio" name="sex" value="Female" /> Female';
    }
     
    function password_callback($post_array, $primary_key = null) 
    { 
        $this->load->model('generator_model'); 
        $r = $this->generator_model->getData();         
	$no = $r->num; 
	$s = $post_array['worker_state']; 
        $c = $post_array['worker_city'];
	$i = substr($s,0,3); 
        $i = $i . substr($c,0,3); 
        $i = strtoupper($i); 
        $i = $i . $no; 
        $no = $no + 1; 
        $this->generator_model->setData($no); 
        $post_array['worker_id'] = $i; 
        $this->load->helper('security'); 
        $post_array['worker_password'] = do_hash($post_array['worker_password'], 'md5'); 
	if (!empty($post_array['worker_photo']))  
        { 
            //$ext = end(explode(".",$post_array['upload_resume'])); 
            $file_name = $post_array['worker_id'].".jpg"; 
            rename("image/services/workers/".$post_array['worker_photo'],"image/services/workers/".$file_name);         
            $post_array['worker_photo'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$current1 = date('Y-m-d H:i:s',strtotime('+1 years'));
	$post_array['join_date'] = $current;
        $post_array['worker_renewal_date'] = $current;
        $post_array['worker_expire_date'] = $current1;
        $post_array['worker_modify_time'] = $current;
        return $post_array; 
    } 
 
    function password_callback1($post_array, $primary_key) 
    {
	$id = $post_array['worker_id'];
	$v= $post_array['worker_fname'];	
	$arr = $post_array['worker_service_subcategory_id'];
	print_r($post_array);  
	//echo "<script> alert($primary_key) </script>";
	
	if (!empty($post_array['worker_photo']))  
        { 
            $file_name = $post_array['worker_id'].".jpg"; 
            rename("image/services/workers/".$post_array['worker_photo'],"image/services/workers/".$file_name);         
            $post_array['worker_photo'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['worker_modify_time'] = $current;
	
	$arr = $post_array['worker_service_subcategory_id'];
	$count = count($arr);
	for($i=0; $i<$count; $i++)
	{
		$this->db->insert('worker_category',array('worker_id'=>$post_array['worker_id'],'service_subcategory_id'=>$arr[$i]));
	}

	return $post_array; 
    } 
     
    public function company() 
    { 
        $this->grocery_crud->set_table('company'); 
	$this->grocery_crud->columns('company_name','company_logo');
	$this->grocery_crud->set_field_upload('company_logo','image/company/company_logo');         
	$this->grocery_crud->required_fields('company_name','company_logo'); 
        $this->grocery_crud->callback_before_insert(array($this,'rename_company_logo'));
        $this->grocery_crud->callback_before_update(array($this,'rename_company_logo'));
	$this->grocery_crud->field_type('modify_at', 'hidden');			
        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

    function rename_company_logo($post_array, $primary_key = null) 
    { 
        if (!empty($post_array['company_logo']))  
        { 
            //$ext = end(explode(".",$post_array['upload_resume'])); 
            $file_name = $post_array['company_name']."_logo.jpg"; 
            rename("image/company/company_logo/".$post_array['company_logo'],"image/company/company_logo/".$file_name);         
            $post_array['company_logo'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['modify_at'] = $current;
        return $post_array; 
    }
     
    public function service_category() 
    { 
        $this->grocery_crud->set_table('service_category'); 
	$this->grocery_crud->columns('service_type','service_photo');
        $this->grocery_crud->set_field_upload('service_photo','image/services/'); 
        $this->grocery_crud->required_fields('service_type','service_photo'); 
	$this->grocery_crud->callback_before_insert(array($this,'rename_service_image'));
        $this->grocery_crud->callback_after_insert(array($this,'insert_sub_category'));
        $this->grocery_crud->callback_before_update(array($this,'rename_service_image'));
	$this->grocery_crud->field_type('modify_at', 'hidden');
        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    }
 
    function insert_sub_category($post_array, $primary_key) 
    { 
        $subdata = array('service_id' =>  $primary_key,
   			'service_subtype' => $post_array['service_type']);
	$this->db->insert('service_subcategory', $subdata);
	
        return true; 
    }	
    
    function rename_service_image($post_array, $primary_key = null) 
    { 
        if (!empty($post_array['service_photo']))  
        { 
            //$ext = end(explode(".",$post_array['upload_resume'])); 
            $file_name = $post_array['service_type'].".jpg"; 
            rename("image/services/".$post_array['service_photo'],"image/services/".$file_name);         
            $post_array['service_photo'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['modify_at'] = $current;
        return $post_array; 
    }
     
    public function service_subcategory() 
    { 
        $this->grocery_crud->set_table('service_subcategory'); 
        $this->grocery_crud->columns('service_id','service_subtype');
        $this->grocery_crud->set_relation('service_id','service_category','service_type'); 
        $this->grocery_crud->display_as('service_id','Worker Category'); 
        $this->grocery_crud->required_fields('service_id','service_subtype'); 
	$this->grocery_crud->callback_before_insert(array($this,'service_subcategpry_modify'));
        $this->grocery_crud->callback_before_update(array($this,'service_subcategpry_modify'));
	$this->grocery_crud->field_type('modify_at', 'hidden');
	$output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

    function service_subcategpry_modify($post_array, $primary_key = null) 
    { 
    	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['modify_at'] = $current;
        return $post_array; 
    }

     
    public function expert_area() 
    { 
        $this->grocery_crud->set_table('expert_area'); 
        $this->grocery_crud->set_relation('service_id','service_category','service_type'); 
        $this->grocery_crud->display_as('service_id','Worker Category'); 
        $this->grocery_crud->required_fields('service_id','worker_expertice_name'); 

        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 
     
    public function expert_in() 
    { 
        $this->grocery_crud->set_table('expert_in'); 
        $this->grocery_crud->set_relation('worker_id','worker','worker_id'); 
        $this->grocery_crud->set_relation('worker_expertice_id','expert_area','worker_expertice_name'); 
        $this->grocery_crud->display_as('worker_expertice_id','Worker Expert IN'); 
        $this->grocery_crud->required_fields('worker_id','worker_expertice_id'); 
	$this->grocery_crud->field_type('modify_at', 'hidden');        
	$output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 
     
    public function work_detail() 
    { 
        $this->grocery_crud->set_table('work_detail'); 
        $this->grocery_crud->set_relation('worker_id','worker','worker_id'); 
        $this->grocery_crud->display_as('worker_expertice_id','Worker Expert IN'); 
        $this->grocery_crud->set_field_upload('work_photo','image/services/work_detail/'); 
        $this->grocery_crud->required_fields('worker_id','work_title'); 
	$this->grocery_crud->field_type('modify_at', 'hidden');
        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

    public function core_group() 
    { 
        $this->grocery_crud->set_table('core_group'); 
	$this->grocery_crud->field_type('user_type','dropdown',array('state_wise'=>'State Wise','district_wise'=>'District Wise','area_wise'=>'Area Wise'));
        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

	
    public function worker_category() 
    { 
        $this->grocery_crud->set_table('worker_category'); 
	$this->grocery_crud->columns('worker_id','service_subcategory_id');
        $this->grocery_crud->required_fields('worker_id','service_subcategory_id'); 
	$this->grocery_crud->set_relation('service_subcategory_id','service_subcategory','service_subtype');
	$output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

 
    function _example_output($output = null) 
    { 
	if($this -> session -> userdata("skill_home_admin")==true)
	{
        	$this->load->view('our_template.php',$output); 
	}
	else
	{
		redirect('Home/index', 'refresh');
	}
    } 
    
    public function company_advertise() 
    { 
        $this->grocery_crud->set_table('company_advertise'); 
	$this->grocery_crud->columns('company_advertise_id','company_id','image_name','image');
	$this->grocery_crud->set_relation('company_id','company','company_name');	        
	$this->grocery_crud->set_field_upload('image','image/company/company_advertise/'); 
        $this->grocery_crud->required_fields('company_id','image'); 
	$this->grocery_crud->field_type('image_name', 'hidden');
	$this->grocery_crud->callback_after_insert(array($this,'rename_company_ad_image1'));
        $this->grocery_crud->callback_before_update(array($this,'rename_company_ad_image'));
	$this->grocery_crud->field_type('modify_at', 'hidden');
        $output = $this->grocery_crud->render(); 
        $this->_example_output($output); 
    } 

    function rename_company_ad_image($post_array, $primary_key = null) 
    { 
        if (!empty($post_array['image']))
        { 

	    $this->load->model('company_model'); 
            $c = $this->company_model->getCompany($post_array['company_id']);         
	    $cn = $c->company_name;
            $file_name = $cn."_".$primary_key.".jpg"; 
            rename("image/company/company_advertise/".$post_array['image'],"image/company/company_advertise/".$file_name);         
            $post_array['image'] = $file_name;
	    $post_array['image_name'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['modify_at'] = $current;
        return $post_array; 
    }

    function rename_company_ad_image1($post_array, $primary_key) 
    { 
        if (!empty($post_array['image']))
        { 
	    $this->load->model('company_model'); 
            $c = $this->company_model->getCompany($post_array['company_id']);         
	    $cn = $c->company_name;
            $file_name = $cn."_".$primary_key.".jpg"; 
            rename("image/company/company_advertise/".$post_array['image'],"image/company/company_advertise/".$file_name);         
            $post_array['image'] = $file_name; 
        } 
	date_default_timezone_set('Asia/Calcutta');
	$current = date('Y-m-d H:i:s');
	$post_array['modify_at'] = $current;
	$post_array['image'] = $file_name;
	$post_array['image_name'] = $file_name; 
	$this->db->where('company_advertise_id', $primary_key);
	$this->db->update('company_advertise', $post_array); 

        return true; 
    }

} 
 
/* End of file main.php */ 
/* Location: ./application/controllers/main.php */
