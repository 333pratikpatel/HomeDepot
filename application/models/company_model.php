<?php
class company_model extends CI_Model 
{
	
	public function getCompany($cid) 
	{
		$getData = $this->db->query('SELECT * FROM company where company_id='.$cid);
		return $getData -> row();
	}
	public function getData() 
	{
		$getData = $this->db->query('SELECT * FROM company ORDER BY company_name ASC');
		return $getData -> result();
	}

}
