<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('item','product');
	}
	public function index()
	{
		$result['brand'] = $this->product->list_b();
		$result['item'] = $this->product->list_items();
		//echo "<pre>";print_r($result);die;
		$this->load->view('user/index',compact('result'));
	}
}
