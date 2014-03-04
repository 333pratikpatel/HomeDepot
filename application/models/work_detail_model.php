<?php

class work_detail_model extends CI_Model 
{
	
	public function addWork($data)
	{
		return $this->db->insert('work_detail',$data);
	}
	
	public function getData($worker_id)
	{
		$query =  $this->db->query("SELECT * FROM work_detail WHERE worker_id='".$worker_id."' LIMIT 0,3");
		return $query->result();
	}	
}

?>