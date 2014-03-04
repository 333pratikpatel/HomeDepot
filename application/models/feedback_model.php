<?php
class feedback_model extends CI_Model 
{

	public function getFeedbackData($id) 
	{
		$getData = $this->db->query('SELECT * FROM feedback WHERE worker_id = "'.$id.'"');
		return $getData -> result();
	}
	
	public function addFeedback($data)
	{
		
		$this->db->insert('feedback',$data);
	}

}

?>
