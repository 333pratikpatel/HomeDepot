<?php
class service_subcategory_model extends CI_Model 
{

	public function getData($option="") 
	{
		//$this->db->select('service_type');
		if($option==""){
			$getData = $this -> db -> get('service_category');
		}
		else{
			$getData = $this->db->query('SELECT * FROM service_subcategory WHERE service_id =
							(SELECT service_id FROM service_category WHERE service_type="'.$option.'")');
		}
		return $getData -> result();
	}
	
	public function getAll()
	{
		$getData = $this->db->query('SELECT service_subcategory.*, service_category.service_type FROM service_subcategory,service_category WHERE service_subcategory.service_id = service_category.service_id ORDER BY service_type');
		return $getData -> result();
	}
}
