<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_category extends CI_Controller {
    function __construct() 
	{
		parent::__construct();
		$this->load->model('User_category_model');
		$this->load->helper('url');

	}
	public function index()
	{
		$this->load->view('list');
	}
	
	public function find_category()
	{
		$id = $this->input->post('id');
  
	    $userCatogories = $this->User_category_model->getCategoryTree($id);
         
		//response with json data
		echo json_encode($userCatogories);
	}
}
