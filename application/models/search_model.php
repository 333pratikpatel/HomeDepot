<?php
class search_model extends CI_Model 
{

	public function getData($term) 
	{
			$getData = $this->db->query("select * from service_category where service_type like '%$term%' order by service_type LIMIT 5");
		return $getData -> result();
	}
}
