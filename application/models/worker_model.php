<?php
class worker_model extends CI_Model 
{

	public function getCount($option) 
	{
		$getData = $this->db->query('SELECT DISTINCT worker.*,service_subcategory.service_subtype as worker_subtype FROM worker,worker_category,service_subcategory 
WHERE worker.worker_id=worker_category.worker_id and service_subcategory.service_subcategory_id = 
worker_category.service_subcategory_id and worker_category.service_subcategory_id IN 
(SELECT service_subcategory_id FROM service_subcategory WHERE service_id = 
(SELECT service_id FROM service_category WHERE service_type="'.$option.'")) 
ORDER BY worker_rating DESC');
		//$data = $getData -> result();
		return $getData->num_rows();
		//return $this->db->count_all("worker");
	}
	public function getData($limit, $start, $option) 
	{
		//$this->db->select('service_type');
		$getData = $this->db->query('SELECT DISTINCT worker.*,service_subcategory.service_subtype as worker_type FROM worker, worker_category, service_subcategory 
WHERE worker.worker_id=worker_category.worker_id and service_subcategory.service_subcategory_id = 
worker_category.service_subcategory_id and worker_category.service_subcategory_id IN 
(SELECT service_subcategory_id FROM service_subcategory WHERE service_id = 
(SELECT service_id FROM service_category WHERE service_type="'.$option.'")) 
ORDER BY worker_rating DESC LIMIT '.$start.','.$limit);
		return $getData -> result();
	}
	
	public function getWorkerData($id) 
	{
		$getData = $this->db->query('SELECT worker.*,service_subcategory.service_subtype as worker_type FROM worker inner join worker_category on worker.worker_id=worker_category.worker_id inner join service_subcategory on service_subcategory.service_subcategory_id=worker_category.service_subcategory_id WHERE worker.worker_id = "'.$id.'"');
		return $getData -> row();
	}
	
	public function getWorkerOtherData($id)
	{
		$getData = $this->db->query('SELECT * FROM worker_other_detail WHERE worker_id="'.$id.'"');
		return $getData->row();
	}
	
	public function getWorkerType($id) 
	{
		$getData = $this->db->query('SELECT service_category.service_type,service_subcategory.service_subtype FROM service_subcategory 
inner join worker_category on service_subcategory.service_subcategory_id=worker_category.service_subcategory_id 
inner join service_category on service_subcategory.service_id=service_category.service_id where service_subcategory.service_subcategory_id=worker_category.service_subcategory_id and worker_category.worker_id ="'.$id.'"');
		return $getData -> result();
	}
	
	public function searchData($option,$arr) 
	{
		$count = count($arr);
		$s="worker_expertice_id=".$arr[0];
		for($i=1; $i<$count; $i++)
		{
			$s.=" or worker_expertice_id=";
			$s.="".$arr[$i];
		}
		$getData = $this->db->query('SELECT worker.*,service_subcategory.service_subtype as worker_subtype FROM worker,worker_category,service_subcategory 
WHERE worker.worker_id=worker_category.worker_id and service_subcategory.service_subcategory_id = 
worker_category.service_subcategory_id and worker_category.service_subcategory_id IN 
						(SELECT service_subcategory_id  FROM service_subcategory  WHERE service_id = 
							(SELECT service_id FROM service_category WHERE service_type="'.$option.'")) and worker.worker_id IN (SELECT worker_id from expert_in where '.$s.') ORDER BY worker_rating DESC');
			return $getData -> result();
	}
	
	public function addWorker($data)
	{
		return $this->db->insert('worker',$data);
	}
	

	public function verifyLogin($id,$password)
	{
		$this -> db -> where("worker_id", $id);
		$this -> db -> where("worker_password", md5($password));
		$queryData = $this -> db -> get("worker");
		if ($queryData -> num_rows == 1) 
		{
			$row = $queryData -> row();
			$wdata = array("worker_id" => $row -> worker_id, "worker_fname" => $row -> worker_fname, "worker_lname" => $row -> worker_lname, "isLoggedIn" => TRUE);
			$this -> session -> set_userdata($wdata);
			return 1;
		}
		else
		{
			$this->session->set_flashdata('lerror', TRUE);
			return -1;
		}
	}
	
	public function updateWorker($id,$udata)
	{
		$this->db->where('worker_id', $id);
		$this->db->update('worker', $udata); 
	}
	
	public function searchByArea($option,$area)
	{
		$getData = $this->db->query('SELECT worker.*,service_subcategory.service_subtype as worker_subtype FROM worker,worker_category,service_subcategory 
WHERE worker.worker_id=worker_category.worker_id and service_subcategory.service_subcategory_id = 
worker_category.service_subcategory_id and worker_category.service_subcategory_id IN 
											(SELECT service_subcategory_id 
											 FROM service_subcategory 
											 WHERE service_id = (SELECT service_id
				 							 FROM service_category WHERE service_type="'.$option.'")) and worker_area="'.$area.'"');
		return $getData -> result();
	}
	
	public function searchByWorkerName($option,$name)
	{
		$getData = $this->db->query('SELECT worker.*,service_subcategory.service_subtype as worker_subtype FROM worker,worker_category,service_subcategory 
WHERE worker.worker_id=worker_category.worker_id and service_subcategory.service_subcategory_id = 
worker_category.service_subcategory_id and worker_category.service_subcategory_id IN 
											(SELECT service_subcategory_id 
											 FROM service_subcategory 
											 WHERE service_id = (SELECT service_id
				 							 FROM service_category WHERE service_type="'.$option.'")) and worker_fname LIKE "%'.$name.'%"');
		return $getData -> result();
	}
	
	public function fillArea()
	{
		$area_array = $this->db->query('SELECT DISTINCT worker_area from worker WHERE worker_area <> ""')->result_array();

		$typeahead_string = '';
		$j = 0;
		foreach ($area_array as $area)
		{
			if($j==0)
			{
				$formatted_area    =  '"' . $area['worker_area'] . '"';
				$j++;
			}
			else
			{
				$formatted_area    =  ',"' . $area['worker_area'] . '"';
			}
				$typeahead_string .= $formatted_area; 
		}
		
		//$area_list = rtrim($typeahead_string, ',');  //Strips the last comma and any whitespace from the end string
		$area_list = $typeahead_string;
//		$area_list = "[ 'paldi', 'naroda' ]";	
		//$data['typeahead'] = $option_list;
		return $area_list;
	}
	
	public function updatePhoto($id,$photo)
	{
		$d = array('worker_photo' => $photo);
		$this->db->where('worker_id',$id);
		$this->db->update('worker',$d);
		/*$getData = $this->db->query('update worker set worker_photo="'.$photo.'" where worker_id="'.$id.'"');
		$getData -> result();*/
	}
	
}
