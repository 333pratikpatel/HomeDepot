<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
				
		$this->load->helper('url','form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->database();
		$this->clear_cache();
		$this->load->model('service_category_model');	
	}

	public function index()
	{
		$data['services'] = $this->service_category_model->getData();
		$this->load->view('Header',$data);
		$this->load->view('Homepage');
		$this->load->view('Footer');
	}

	function clear_cache()
   {
       $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
       $this->output->set_header("Pragma: no-cache");
   }

	function is_logged_in() 
   {
       $isLoggedIn = $this -> session -> userdata('isLoggedIn');
       $sid = $this -> session -> userdata('worker_id');
       if (!isset($isLoggedIn) || $isLoggedIn != true)
       {
           redirect('/Home','refresh');
       }
	
   }
	
	public function login()
	{
		$data['services'] = $this->service_category_model->getData();
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('login');
		$this->load->view('Footer');
	}
	
	public function contact()
	{
		$data['services'] = $this->service_category_model->getData();
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('contact');
		$this->load->view('Footer');
	}
	
	public function categories($option="")
	{
		$data['services'] = $this->service_category_model->getData();
		$this->load->helper('url');
		$this->load->view('Header',$data);
		if($option=="grid" || $option=="")
		{
			$this->load->view('category_grid');
		}
		elseif($option=="list")
		{
			$this->load->view('category_list');
		}
		$this->load->view('Footer');
	}
	
	public function product()
	{
		$data['services'] = $this->service_category_model->getData();
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('product');
		$this->load->view('Footer');
	}
	
	public function services($option="",$page=0)
	{
		$data['services'] = $this->service_category_model->getData();
		if($option==""){
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services');
			$this->load->view('Footer');
		}
		else
		{
			$this->load->model('worker_model');
			$this->load->model('service_subcategory_model');
			$this->load->model('expert_area_model');
			$this->load->model('service_advertise_model');
			
			$option = str_replace("%20"," ",$option);
			$config = array();
			$config["base_url"] = site_url('Home/services/'.$option);
			$config["total_rows"] = $this->worker_model->getCount($option);
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			//$config['use_page_numbers'] = TRUE;
			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data["links"] = $this->pagination->create_links();
			
			$data['worker_list']=$this->worker_model->getData($config["per_page"], $page, $option);
			$data['service_subcategories']=$this->service_subcategory_model->getData($option);
			$data['service_category']=$option;
			$data['expert_area']=$this->expert_area_model->getData($option);
			$data['service_advertise']=$this->service_advertise_model->getData($option);
			$data['area_list']=$this->worker_model->fillArea();
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services_list');
			$this->load->view('Footer');
		}
	}
	
	public function services_detail($id="")
	{
		$this->load->model('worker_model');
		$this->load->model('work_detail_model');
		$data['services'] = $this->service_category_model->getData();
		$data['worker'] = $this->worker_model->getWorkerData($id);
		$data['worker_type'] = $this->worker_model->getWorkerType($id);
		$data['worker_work_details'] = $this->work_detail_model->getData($id);
		$data['area_list']=$this->worker_model->fillArea();
		$this->load->helper('url');	
		$this->load->view('Header',$data);
		if($id=="")
		{
			$this->load->view('services');
		}
		else
		{
			$this->load->view('services_detail');
		}
		$this->load->view('Footer');
	}
	
	public function searchByWork($option="")
	{
		$data['services'] = $this->service_category_model->getData();
		if($option=="")
		{
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services');
			$this->load->view('Footer');
		}
		
		elseif((!isset($_POST['state'])) || $_POST['state']=="")
		{
			$this->services($option);
		}
		
		else
		{
			$checked_arr = $_POST['state'];
			$this->load->model('worker_model');
			$this->load->model('service_subcategory_model');
			$this->load->model('expert_area_model');
			$this->load->model('service_advertise_model');
			$data['worker_list']=$this->worker_model->searchData($option,$checked_arr);
			$data['service_subcategories']=$this->service_subcategory_model->getData($option);
			$data['service_category']=$option;
			$data['expert_area']=$this->expert_area_model->getData($option);
			$data['area_list']=$this->worker_model->fillArea();
			$data['service_advertise']=$this->service_advertise_model->getData($option);
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services_list');
			$this->load->view('Footer');
		}
	}
	
	public function searchByArea($option="")
	{
		$data['services'] = $this->service_category_model->getData();
		if($option=="")
		{
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services');
			$this->load->view('Footer');
		}
		
		elseif($_POST['area_input']=="")
		{
			$this->services($option);
		}
		
		else
		{
			$area = $_POST['area_input'];
			
			$this->load->model('worker_model');
			$this->load->model('service_subcategory_model');
			$this->load->model('expert_area_model');
			$this->load->model('service_advertise_model');
			$data['worker_list']=$this->worker_model->searchByArea($option,$area);
			$data['service_subcategories']=$this->service_subcategory_model->getData($option);
			$data['service_category']=$option;
			$data['expert_area']=$this->expert_area_model->getData($option);
			$data['area_list']=$this->worker_model->fillArea();
			$data['service_advertise']=$this->service_advertise_model->getData($option);
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services_list');
			$this->load->view('Footer');
		}
	}
	
	public function searchByWorkerName($option="")
	{
		$data['services'] = $this->service_category_model->getData();
		if($option=="")
		{
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services');
			$this->load->view('Footer');
		}
		
		elseif($_POST['workername_input']=="")
		{
			$this->services($option);
		}
		
		else
		{
			$worker_name = $_POST['workername_input'];
			
			$this->load->model('worker_model');
			$this->load->model('service_subcategory_model');
			$this->load->model('expert_area_model');
			$this->load->model('service_advertise_model');
			$data['worker_list']=$this->worker_model->searchByWorkerName($option,$worker_name);
			$data['service_subcategories']=$this->service_subcategory_model->getData($option);
			$data['service_category']=$option;
			$data['expert_area']=$this->expert_area_model->getData($option);
			$data['area_list']=$this->worker_model->fillArea();
			$data['service_advertise']=$this->service_advertise_model->getData($option);
			$this->load->helper('url');
			$this->load->view('Header',$data);
			$this->load->view('services_list');
			$this->load->view('Footer');
		}
	}
	
	public function show_worker_map($id="")
	{
		$this->load->model('worker_model');
		$data['services'] = $this->service_category_model->getData();
		$data['worker'] = $this->worker_model->getWorkerData($id);
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('services_map');
		$this->load->view('Footer');
	}
	
	public function register()
	{
		$this->load->model('service_subcategory_model');
		$this->load->model('state_model');
		$this->load->model('city_model');
		$data['subcategory'] = $this->service_subcategory_model->getAll();
		$data['services'] = $this->service_category_model->getData();
		$data['state'] = $this->state_model->getState();
		$data['city'] = $this->city_model->getCity();		
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('register');
		$this->load->view('Footer');
	}
	
	
	public function save()
	{
		$this->load->model('generator_model');
		$r = $this->generator_model->getData();
		$no = $r->num;
		$s = $this->input->post('state');
		$c = $this->input->post('city');
		$i = substr($s,0,3);
		$i = $i . substr($c,0,3);
		$i = strtoupper($i);
		$i = $i . $no;
		$no = $no + 1;
		$this->generator_model->setData($no);
		$this->load->model('worker_model');
		$udata['worker_id'] = $i;
		$udata['worker_fname'] = $this->input->post('firstname');
		$udata['worker_lname'] = $this->input->post('lastname');
		$udata['worker_gender'] = $this->input->post('gender');
		//$udata['worker_service_subcategory_id'] = $this->input->post('service_subcategory');
		$udata['worker_address_line_1'] = $this->input->post('address_line_1');
		$udata['worker_address_line_2'] = $this->input->post('address_line_2');
		$udata['worker_area'] = $this->input->post('area');
		$udata['worker_city'] = $this->input->post('city');
		$udata['worker_state'] = $this->input->post('state');
		$udata['worker_birthdate'] = $this->input->post('birthdate');
		$udata['worker_contact'] = $this->input->post('contactno');
		$udata['worker_email'] = $this->input->post('emailid');
		$udata['worker_rating'] = 2;
		$udata['worker_photo'] = "";
		$udata['worker_password'] = md5($this->input->post('password'));
		date_default_timezone_set('Asia/Calcutta');
		$data['join_date'] = date('Y-m-d H:i:s');		
		$data['worker_renewal_date'] = date('Y-m-d H:i:s');		
		$data['worker_expire_date'] = date('Y-m-d H:i:s',strtotime('+1 years'));		
		$data['worker_modify_time'] = date('Y-m-d H:i:s');		
		$res = $this->worker_model->addWorker($udata);
		$categories = $this->input->post('service_subcategory');
		//print_r($categories);
		foreach($categories as $category)
		{
			$this->db->insert('worker_category',array('worker_id'=>$i,'service_subcategory_id'=>$category));
		}
		$this->db->insert('worker_other_detail',array('worker_id'=>$i));
		$this->register1($i);
	
	}
	
	public function register1($id)
	{
		$data['services'] = $this->service_category_model->getData();
		$data['worker_id'] = $id;
		$this->load->helper('url');
		$this->load->view('Header',$data);
		$this->load->view('register1');
		$this->load->view('Footer');
	}
	
	public function verifyLogin() 
	{
		$this->load->model('worker_model');
		$workerid = $this->input->post('workerid');
		$password = $this->input->post('password');
		$r = $this->worker_model->verifyLogin($workerid,$password);
		if($r==1)
		{
			$hdata = array('worker_id' => $workerid);
			$this->db->insert('login_history', $hdata);

			redirect('Home/profile/'.$workerid);	
		}
		else
		{
			$this->login();
		}
	}
	
	public function logout() 
	{
    		$this->load->helper('url');
      		$this->load->library('session');       
		$wdata = array("worker_id" => '', "worker_fname" => '', "worker_lname" => '', "isLoggedIn" => FALSE);		
		$this->session->unset_userdata($wdata);		
		//$this->session->sess_destroy();		
		//redirect(base_url(),'refresh');
		redirect('Home/', 'refresh');
	}
	
	public function profile($id)
	{
		$this->load->helper('form');
    	$this->load->helper('url');
		
		//$this->load->model('worker_model');
		//$this->load->model('expert_area_model');
		//$this->load->model('feedback_model');
		//$this->load->model('enquiry_model');
		//$data['expert_area_in'] = $this->expert_area_model->getExpertAreaData($id);
		$data['services'] = $this->service_category_model->getData();
		$data['worker_id'] = $id;
		//$data['worker'] = $this->worker_model->getWorkerData($id);
		//$data['worker_type'] = $this->worker_model->getWorkerType($id);
		//$data['feedback'] = $this->feedback_model->getFeedbackData($id);
		//$data['enquiry'] = $this->enquiry_model->getEnquiryData($id);
		$this->load->view('Header',$data);
		$this->load->view('profile');
		$this->load->view('Footer');
	}
	
	public function viewprofile($id)
	{
		$this->load->helper('form');
    	$this->load->helper('url');
		
		//$id = 'GUJAHD11092002';
		$this->load->model('worker_model');
		$this->load->model('expert_area_model');
		$this->load->model('feedback_model');
		$this->load->model('enquiry_model');
		$data['expert_area_in'] = $this->expert_area_model->getExpertAreaData($id);
		$data['services'] = $this->service_category_model->getData();
		$data['worker'] = $this->worker_model->getWorkerData($id);
		$data['worker_other_detail'] = $this->worker_model->getWorkerOtherData($id);
		$data['worker_type'] = $this->worker_model->getWorkerType($id);
		$data['feedback'] = $this->feedback_model->getFeedbackData($id);
		$data['enquiry'] = $this->enquiry_model->getEnquiryData($id);
		$this->load->view('Header',$data);
		$this->load->view('viewprofile');
		$this->load->view('Footer');
	}
	
	public function editprofile($id)
	{
		$this->is_logged_in();
		$this->load->model('service_subcategory_model');
		$data['subcategory'] = $this->service_subcategory_model->getAll();
		$this->load->model('worker_model');
		$data['services'] = $this->service_category_model->getData();
		$data['worker_subcategories'] = $this->db->get_where('worker_category',array('worker_id'=>$id))->result();
		$data['worker'] = $this->worker_model->getWorkerData($id);
		$this->load->helper('url');	
		$this->load->view('Header',$data);
		$this->load->view('editprofile');
		$this->load->view('Footer');
	}
	
	public function updateprofile($id)
	{
		$this->is_logged_in();
		$this->load->model('worker_model');
		$udata['worker_fname'] = $this->input->post('firstname');
		$udata['worker_lname'] = $this->input->post('lastname');
		$udata['worker_gender'] = $this->input->post('gender');
		//$udata['worker_service_subcategory_id'] = $this->input->post('service_subcategory');
		$udata['worker_address_line_1'] = $this->input->post('address_line_1');
		$udata['worker_address_line_2'] = $this->input->post('address_line_2');
		$udata['worker_area'] = $this->input->post('area');
		$udata['worker_city'] = $this->input->post('city');
		$udata['worker_state'] = $this->input->post('state');
		$udata['worker_birthdate'] = $this->input->post('birthdate');
		$udata['worker_contact'] = $this->input->post('contactno');
		$udata['worker_email'] = $this->input->post('emailid');
		$udata['worker_rating'] = 2;
		date_default_timezone_set('Asia/Calcutta');
		$udata['worker_modify_time'] = date('Y-m-d H:i:s');
		$udata['worker_password'] = md5($this->input->post('password'));
		
		$odata['qualification'] = $this->input->post('qualification');
		$odata['occupation'] = $this->input->post('occupation');
		$odata['years_of_practice'] = $this->input->post('years_of_practice');
		$odata['hobby'] = $this->input->post('hobby');
		$odata['office'] = $this->input->post('oadd1')."<br>".$this->input->post('oadd2')."<br>".$this->input->post('oarea')."<br>".$this->input->post('ocity')."<br>".$this->input->post('ostate');
		$odata['affiliation'] = $this->input->post('affiliation');
		$odata['achievment'] = $this->input->post('achievement');
		$odata['awards'] = $this->input->post('awards');
		$odata['lic_no'] = $this->input->post('lic_no');
		
		$this->db->delete('worker_category',array('worker_id'=>$id));
		
		
		
		$categories = $this->input->post('service_subcategory');
		//print_r($categories);
		foreach($categories as $category)
		{
			$this->db->insert('worker_category',array('worker_id'=>$id,'service_subcategory_id'=>$category));
		}
		
		
		$this->worker_model->updateWorker($id,$udata);
		$this->db->where('worker_id',$id);
		$this->db->update('worker_other_detail',$odata);
		$this->profile($id);
	}
	
	public function getSearchData()
	{
		$term = $_POST['term'];
		$this->load->model('search_model');
		$this->load->helper('url');
		$term = str_replace("search=","",$term);
		$search_result = $this->search_model->getData($term);
		/*echo "<div class='show' align='left'>
					<img src='author.PNG' style='width:50px; height:50px; float:left; margin-right:6px;' />
					<span class='name'>Mason</span>&nbsp</div>";*/
		
		//echo $term;
		foreach($search_result as $search)
		{
			$service=$search->service_type;
			$i=$search->service_photo;
			
			$b_service='<strong>'.$term.'</strong>';
			
			$final_service = str_ireplace($term, $b_service, $service);
			
			echo "<div class='show' align='left'>
					<img src='".base_url()."image/services/".$i."' style='width:50px; height:50px; float:left; margin-right:6px;' />
					<span class='name'>".$final_service." service</span>&nbsp</div>";
		}	
		/*while($row=mysql_fetch_array($search_result))
		{
			$service=$row['service_type'];
			
			$b_service='<strong>'.$q.'</strong>';
			
			$final_service = str_ireplace($q, $b_service, $service);
			
			echo "<div class='show' align='left'>
					<img src='author.PNG' style='width:50px; height:50px; float:left; margin-right:6px;' />
					<span class='name'>".$final_service."</span>&nbsp</div>";
		}*/
		
	}
	
	
	public function addExpertArea($id)
	{
		$this->is_logged_in();
		$this->load->model('expert_area_model');
		$this->load->model('expert_in_model');
		$data['services'] = $this->service_category_model->getData();
		$data['expert_areas'] = $this->expert_area_model->getExpertArea($id);
		$data['expert_in'] = $this->expert_in_model->getExpertIn($id);
		$this->load->helper('url');	
		$this->load->view('Header',$data);
		$this->load->view('addExpertArea');
		$this->load->view('Footer');
	}
	
	public function updateExpertArea($id)
	{
		//$this->is_logged_in();
		if((!isset($_POST['expert_area'])) || $_POST['expert_area']=="")
		{
			$this->addExpertArea($id);
		}
		else
		{
			$checked_arr = $_POST['expert_area'];
			$this->load->model('expert_in_model');
			//$this->expert_in_model->removeExpertIn($id,$checked_arr);
			$this->expert_in_model->addExpertIn($id,$checked_arr);
			$this->profile($id);		
		}
	}
	
	public function upload_it($id)  
    	{ 
	    	$this->is_logged_in();
		$this->load->helper('form'); 
		//Configure 
		$config['upload_path'] = 'image/services/workers'; 
		// set the filter image types 
		$config['allowed_types'] = 'gif|jpg|png';    
		$config['file_name'] = $id.".jpg"; 
		$config['overwrite'] = TRUE;
		//load the upload library 
		$this->load->library('upload', $config); 
		$this->upload->initialize($config); 
		$this->upload->set_allowed_types('*'); 
		 //echo $userfile;
		//if not successful, set the error message 
		if ($this->upload->do_upload('userfile'))  
		{ 
		    $data = $this->upload->data(); 
		    $photo = $data['file_name'];  
		    $this->load->model('worker_model'); 
		    $this->worker_model->updatePhoto($id,$photo); 
		} 
		//load the view/upload.php
		redirect('Home/viewprofile/'.$id, 'refresh'); 
    	}

	public function addWork($id)  
    	{ 
	    	$this->is_logged_in();
		$this->load->helper('form'); 
		//Configure 
		$config['upload_path'] = 'image/services/work_detail'; 
		// set the filter image types 
		$config['allowed_types'] = 'gif|jpg|png';    
		$config['file_name'] = $id."_work.jpg"; 
		//load the upload library 
		$this->load->library('upload', $config); 
		$this->upload->initialize($config); 
		$this->upload->set_allowed_types('*'); 
		 
		//if not successful, set the error message 
		if ($this->upload->do_upload('userfile'))  
		{ 
		    $data1 = $this->upload->data(); 
		    $data['worker_id'] = $id;
					$data['work_title'] = $_POST['work_title'];            
		    $data['work_description'] = $_POST['work_description'];
		    $data['work_photo'] = $data1['file_name'];
		    
		    date_default_timezone_set('Asia/Calcutta');
		    $data['modify_at'] = date('Y-m-d H:i:s');
		
		    $this->load->model('work_detail_model'); 
		    $this->work_detail_model->addWork($data); 
		} 
		//load the view/upload.php
		redirect('Home/profile/'.$id, 'refresh'); 
    	}

	public function addFeedback()
	{
		$this->load->model('feedback_model');
		
		$id = $this->input->post('worker_id');
		$data['worker_id'] = $this->input->post('worker_id');
		$data['name'] = $this->input->post('user_name');
		$data['email'] = $this->input->post('user_email');
		$data['phone'] = $this->input->post('user_phone');
		$data['feedback'] = $this->input->post('user_feedback');

		date_default_timezone_set('Asia/Calcutta');
		$data['feedback_time'] = date('Y-m-d H:i:s');
		
		$this->feedback_model->addFeedback($data);
		$this->services_detail($this->input->post('worker_id'));
		redirect('Home/services_detail/'.$id, 'refresh'); 
	}
	
	public function addEnquiry()
	{
		$this->load->model('enquiry_model');
		
		$id = $this->input->post('worker_id');
		$data['worker_id'] = $this->input->post('worker_id');
		$data['name'] = $this->input->post('user_name');
		$data['email'] = $this->input->post('user_email');
		$data['phone'] = $this->input->post('user_phone');
		$data['enquiry'] = $this->input->post('user_enquiry');
		
		date_default_timezone_set('Asia/Calcutta');
		$data['enquiry_time'] = date('Y-m-d H:i:s');

		$this->enquiry_model->addEnquiry($data);
		$this->services_detail($this->input->post('worker_id'));
		redirect('Home/services_detail/'.$id, 'refresh'); 
	}
	
	function get_city()
    {
		$this->load->model('city_model');
        
		$state = $_REQUEST['state_id'];   
        $cities = $this->city_model->getCity($state);  
		//print_r($cities->result());       
        echo  '<select name="city" id="city" class="validate[required] text-input">';
		//echo '<option value=""> Please Select Your City </option>';
        foreach($cities as $city)
        {                 
            echo '<option value="'.$city->city_name.'">'.$city->city_name.'</option>';
			//echo $val;
			
        }
        echo '</select>';
		
    }  
	
	public function feedback($id)
	{
		$this->load->helper('form');
    	$this->load->helper('url');
		$this->load->model('feedback_model');
		
		$data['services'] = $this->service_category_model->getData();
		$data['feedback'] = $this->feedback_model->getFeedbackData($id);
		$data['worker_id'] = $id;
		$this->load->view('Header',$data);
		$this->load->view('view_feedback');
		$this->load->view('Footer');
	}
	
	public function enquiry($id)
	{
		$this->is_logged_in();
		$this->load->helper('form');
    	$this->load->helper('url');
		$this->load->model('enquiry_model');
		
		$data['services'] = $this->service_category_model->getData();
		$data['enquiry'] = $this->enquiry_model->getEnquiryData($id);
		$data['worker_id'] = $id;
		$this->load->view('Header',$data);
		$this->load->view('view_enquiry');
		$this->load->view('Footer');
	}
	
	public function expert($id)
	{
		$this->load->helper('form');
    	$this->load->helper('url');
		$this->load->model('expert_area_model');
		
		$data['services'] = $this->service_category_model->getData();
		//$data['enquiry'] = $this->enquiry_model->getEnquiryData($id);
		$data['expert_area_in'] = $this->expert_area_model->getExpertAreaData($id);
		$data['expert_area_all'] = $this->expert_area_model->getExpertArea($id);
		$data['worker_id'] = $id;
		$this->load->view('Header',$data);
		$this->load->view('view_expert_area');
		$this->load->view('Footer');
	}
	
	public function work($id)
	{
		$this->load->helper('form');
 	   	$this->load->helper('url');
		$this->load->model('work_detail_model');
		
		$data['services'] = $this->service_category_model->getData();
		$data['worker_id'] = $id;
		$data['worker_work_details'] = $this->work_detail_model->getData($id);
		
		$this->load->view('Header',$data);
		$this->load->view('view_work');
		$this->load->view('Footer');
	}
	
	public function reset_password($id)
	{
		$id = $this->input->post('worker_id');
		$r = $this->db->get_where('worker',array('worker_id'=>$id))->row();		
		$old = md5($this->input->post('old_password'));
		$new = $this->input->post('new_password');
		if($r->worker_password==$old)
		{
			$pdata['worker_password'] = $new;	
			date_default_timezone_set('Asia/Calcutta');
			$pdata['worker_modify_time'] = date('Y-m-d H:i:s');
			$this->db->where('worker_id',$id);
			$this->db->update('worker',$pdata);
		}
		redirect('Home/profile/'.$id, 'refresh');
	}

}
