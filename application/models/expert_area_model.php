<?php
class expert_area_model extends CI_Model 
{

	public function getData($option) 
	{
			$getData = $this->db->query('SELECT * FROM expert_area 
										WHERE service_id = (SELECT service_id FROM service_category WHERE service_type="'.$option.'")');
		return $getData -> result();
	}
	
	public function getExpertArea($id) 
	{
			$getData = $this->db->query('select expert_area.*,service_category.service_type from expert_area,service_category where expert_area.service_id=service_category.service_id and expert_area.service_id IN (select distinct service_id from service_subcategory,worker_category 
where service_subcategory.service_subcategory_id=worker_category.service_subcategory_id
 and 
worker_category.worker_id="'.$id.'")
order by expert_area.service_id');
		return $getData -> result();
	}
	
	public function getExpertAreaData($id) 
	{
			$getData = $this->db->query('SELECT expert_area . * , service_category.service_type AS service_type
FROM expert_area, service_category
WHERE service_category.service_id = expert_area.service_id
AND 
expert_area.worker_expertice_id
IN 
(SELECT worker_expertice_id
FROM expert_in
WHERE worker_id = "'.$id.'")');
		return $getData -> result();
	}

}
