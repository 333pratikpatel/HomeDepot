<?php
class service_category_model extends CI_Model 
{

	public function getData() 
	{
		$getData = $this -> db -> get('service_category');
		return $getData -> result();
	}
}
