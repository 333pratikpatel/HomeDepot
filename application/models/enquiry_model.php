<?php
class enquiry_model extends CI_Model 
{

	public function getEnquiryData($id) 
	{
		$getData = $this->db->query('SELECT * FROM enquiry WHERE worker_id = "'.$id.'"');
		return $getData -> result();
	}
	
	public function addEnquiry($data)
	{
		
		$this->db->insert('enquiry',$data);
	}

}

?>
