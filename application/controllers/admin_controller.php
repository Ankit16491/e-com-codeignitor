<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$id = $this->session->userdata('id');
		if(!$id){
			return redirect('login_controller');
		}
		$this->load->model('item');
		$this->load->model('category_model');
	}
	public function index()
	{
		//echo $id;die;
		$this->load->view('admin/index');
	}

	public function add_brand(){
		$this->load->view('admin/brand/add_brand_form');
	}

	public function insert_brand(){
		if ($this->form_validation->run('brand') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    $this->load->view('admin/brand/add_brand_form');
		}
		else
		{
			$brand = $this->input->post('brand_name');
			$date = date('d:m:y h:m:s');

			$data = array(
				'brand_name'=>$brand,
				'created_at'=>$date
			);

			
			$result = $this->item->insert_brand($data);
			if($result)
			{
				$this->session->set_flashdata('login_error','Successfully data inserted');
				return redirect('Admin_controller/add_brand');
				//echo "Successfully data inserted";
			}
			else
			{
				$this->session->set_flashdata('login_error','Query Error Please Try Again..');
				return redirect('Admin_controller/add_brand');
			}
			//print_r($data);die;
		    //echo "Successfully Validate";die;
		}
	}
	public function list_brand(){
		$results = $this->item->list_b();
		 if($results){
		 	
		 	$this->load->view('admin/brand/list_brand',compact('results'));
		 	
		 }else{
		 	echo "no Data";
		 }
	}

	public function edit_brand($brand_id){
		//echo "<pre>";print_r($brand_id);
		$result = $this->item->edit_b($brand_id);
		$this->load->view('admin/brand/edit_brand',['result'=>$result]);
		
	}

	public function update_brand($brand_id){
		// echo "<pre>";print_r($brand_id);die;
		$result = $this->item->edit_b($brand_id);
		
		if ($this->form_validation->run('brand') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    $this->load->view('admin/brand/edit_brand',compact('result'));
		}
		else
		{
			$brand = $this->input->post('brand_name');
			//$date = date('d:m:y h:m:s');

			$data = array(
				'brand_name'=>$brand
			);

			
			$result = $this->item->update_b($brand_id,$data);
			if($result)
			{
				$this->session->set_flashdata('login_error','Successfully data Updated');
				return redirect('admin_controller/list_brand');
				//echo "Successfully data inserted";
			}
			else
			{
				$this->session->set_flashdata('login_error','Query Error Please Try Again..');
				return redirect('admin_controller/list_brand');
			}
			//print_r($data);die;
		    //echo "Successfully Validate";die;
		}
	}

	public function delete_brand($brand_id)
	{
		$result = $this->item->delete_b($brand_id);
		if($result){
			$this->session->set_flashdata('login_error','Record Deleted Successfully');
				return redirect('admin_controller/list_brand');
		}
	}

	public function add_item(){
		$result['cat'] = $this->category_model->list_C();
		$result['brand'] = $this->item->list_b();
		$this->load->view('admin/item/add_item',['result'=>$result]);
		
	}

	public function insert_item(){

		if(empty($_FILES['upload_file']['name'])){
			$this->form_validation->set_rules('upload_file','File','required');
		}

		if ($this->form_validation->run('item') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    return $this->add_item();die;
		}
		else
		{
			$config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 4000;
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                echo "<pre>";print_r($error);die;
            }
            else{
            	$file_name = $this->upload->data();
            	$data['img'] = $file_name['file_name'];
            	$data['item_name'] = $this->input->post('item_name');
            	$data['price'] = $this->input->post('price');
            	$data['brand_id'] = $this->input->post('brand_id');
            	$data['cat_id'] = $this->input->post('cat_id');
            	$data['des'] = $this->input->post('des');
            	$data['created_at'] = date('d:m:y h:m:s');

            	$result = $this->item->add_item($data);
            	if($result){
            		$this->session->set_flashdata('login_error','Successfully data inserted');
            		return $this->add_item();
            	}else{
            		$this->session->set_flashdata('login_error','Query Error Please Try Again..');
            		echo "Query Errror..";die;
            	}

            }
		}
	}
	public function list_item(){
		$results = $this->item->list_items();
		$this->load->view('admin/item/list_item',compact('results'));
	}

	public function edit_item($id)
	{
		$data = $this->item->edit_item($id);
		$result['cat'] = $this->category_model->list_C();
		$result['brand'] = $this->item->list_b();

		$this->load->view('admin/item/edit_item',compact('data'),compact('result'));
		//print_r($result);die;
	}

	public function update_item($id)
	{
		if($_FILES['upload_file']['name']){
			$config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 4000;
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                echo "<pre>";print_r($error);die;
            }
            else{
            	$file_name = $this->upload->data();
            	$data['img'] = $file_name['file_name'];
            }
		}

		if ($this->form_validation->run('item') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		    return $this->edit_item($id);die;
		}else{
		$data['item_name'] = $this->input->post('item_name');
    	$data['price'] = $this->input->post('price');
    	$data['brand_id'] = $this->input->post('brand_id');
    	$data['cat_id'] = $this->input->post('cat_id');
    	$data['des'] = $this->input->post('des');
    	$data['created_at'] = date('d:m:y h:m:s');

    	//print_r($data);die;
		$result = $this->item->update_item($data,$id);
            	if($result){
            		$this->session->set_flashdata('login_error','Successfully data Updated');
            		return $this->list_item();
            	}else{
            		$this->session->set_flashdata('login_error','Query Error Please Try Again..');
            		echo "Query Errror..";die;
            	}
            }
	}

	public function delete_item($id)
	{
		$result = $this->item->delete_item($id);
		if($result){
			$this->session->set_flashdata('login_error','Record Deleted Successfully');
				return redirect('admin_controller/list_item');
		}
	}
	public function logout(){
		$this->session->unset_userdata('id');
		return redirect('login_controller');
	}
	
}
