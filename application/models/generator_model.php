<?php
class generator_model extends CI_Model 
{

	public function getData() 
	{
		$getData = $this->db->query('SELECT * FROM generator');
		return $getData -> row();
	}
	
	public function setData($num) 
	{
		$sql = "UPDATE generator SET num = num + 1  WHERE id=1";
		$this->db->query($sql);
	} 
}
