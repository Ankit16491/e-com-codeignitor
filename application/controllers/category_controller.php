<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$id = $this->session->userdata('id');
		if(!$id){
			return redirect('login_controller');
		}
		$this->load->model('category_model');
	}

	public function index()
	{
		
	}

	public function add_category(){

		$brands = $this->category_model->select_Brand_C();
		//echo "<pre>";print_r($brand);die;
		$this->load->view('admin/category/add_category',compact('brands'));
	}

	public function insert_category(){

		if ($this->form_validation->run('category') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    $this->load->view('admin/category/add_category');
		}
		else
		{
			$category = $this->input->post('cat_name');
			$brand_id = $this->input->post('brand_id');

			$date = date('d:m:y h:m:s');

			$data = array(
				'cat_name'=>$category,
				'brand_id'=>$brand_id,
				'created_at'=>$date
			);
			//echo "<pre>";print_r($data);die;
			
			$result = $this->category_model->insert_C($data);
			if($result)
			{
				$this->session->set_flashdata('login_error','Successfully data inserted');
				return redirect('category_controller/add_category');
				//echo "Successfully data inserted";
			}
			else
			{
				$this->session->set_flashdata('login_error','Query Error Please Try Again..');
				return redirect('category_controller/add_category');
			}
			//print_r($data);die;
		    //echo "Successfully Validate";die;
		}
	}


	public function list_category(){

		$results = $this->category_model->list_C();
		
		//echo "<pre>";print_r('$results');die;
		if($results){

		 	$this->load->view('admin/category/list_category',compact('results'));	

		}else{
		 	echo "No Data Found ..";
		}
	}

	public function edit_category($category_id){
		//echo "<pre>";print_r($brand_id);
		$brands = $this->category_model->select_Brand_C();
		$result = $this->category_model->edit_C($category_id);
		$this->load->view('admin/category/edit_category',['result'=>$result,'brands'=>$brands]);
	}


	public function update_category($category_id){
		// echo "<pre>";print_r($brand_id);die;
		$result = $this->category_model->edit_C($category_id);
		
		if ($this->form_validation->run('category') == FALSE)
		{

			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    $this->load->view('admin/category/edit_category',compact('result'));
		}
		else
		{
			$category = $this->input->post('cat_name');
			$brand_id = $this->input->post('brand_id');
			//$date = date('d:m:y h:m:s');

			$data = array(
				'cat_name'=>$category,
				'brand_id'=>$brand_id
			);

			
			$result = $this->category_model->update_C($category_id,$data);
			if($result)
			{
				$this->session->set_flashdata('login_error','Successfully data Updated');
				return redirect('category_controller/list_category');
				//echo "Successfully data inserted";
			}
			else
			{
				$this->session->set_flashdata('login_error','Query Error Please Try Again..');
				return redirect('category_controller/list_category');
			}
			//print_r($data);die;
		    //echo "Successfully Validate";die;
		}
	}

	function delete_category($category_id)
	{
		$result = $this->category_model->delete_C($category_id);
		if($result){
			$this->session->set_flashdata('login_error','Record Deleted Successfully');
				return redirect('category_controller/list_category');
		}
	}
}
