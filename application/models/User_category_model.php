<?php

class User_category_model extends CI_Model
{
   function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getCategoryTree($level=0) {
	$this->db->select('*');
	$this->db->from('categories');
	$this->db->where('parent_id',$level);
	$result = $this->db->get();
	/*if (count($result->result()) > 0) {
    foreach ($result->result() as $category)
    {
        $return[$category->id] = $category;
    }
	}*/
    return $result->result();
   }


}


?>