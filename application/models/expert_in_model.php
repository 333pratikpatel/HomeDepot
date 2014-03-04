<?php
class expert_in_model extends CI_Model 
{

	public function getExpertIn($id) 
	{
		$getData = $this->db->query('SELECT * FROM expert_in WHERE worker_id = "'.$id.'"');
		return $getData -> result();
	}
	
	public function removeExpertIn($id) 
	{
		$this->db->where('worker_id',$id);
		$this->db->delete('expert_in');
	}
	
	public function addExpertIn($id,$arr)  
    {
        
        $getData1 = $this->db->query('SELECT service_id FROM expert_area WHERE worker_expertice_id = '.$arr[0]); 
        $r1 = $getData1 -> row(); 
        $sid = $r1->service_id;

        $getData2 = $this->db->query('SELECT worker_expertice_id FROM expert_area WHERE service_id = '.$sid); 
        $r1 = $getData2 -> result();

        foreach($r1 as $row)
        {
            //$arr1[]=$row->worker_expertice_id;
            $this->db->delete('expert_in', array('worker_id' => $id,'worker_expertice_id' => $row->worker_expertice_id)); 
                
        }
        
        //$this->db->delete('mytable', array('worker_id' => $id,'worker_expertice_id' => $row->worker_expertice_id)); 
        
        $count = count($arr); 
        for($i=0; $i<$count; $i++) 
        {     
            $value['worker_id'] = $id; 
            $value['worker_expertice_id'] = $arr[$i]; 
             
            date_default_timezone_set('Asia/Calcutta'); 
            $value['modify_at'] = date('Y-m-d H:i:s'); 
            $this->db->insert('expert_in',$value); 
        } 
    }

}
