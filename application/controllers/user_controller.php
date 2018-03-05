<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('item','product');
		$this->load->model('item','product');
		$this->load->model('category_model');
	}
	public function index()
	{
		$result['brand'] = $this->product->list_b();
		$result['item'] = $this->product->list_items();
		$result['category'] = $this->category_model->list_C();
		//echo "<pre>";print_r($result);die;
		$this->load->view('user/index',compact('result'));
	}

	function search_filter(){
		$val = $this->input->post('search_val');
			$result = $this->product->search_filter_name($val);
	}
}
