<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Model {

	function insert_brand($data){
		$qry = $this->db->insert('brands',$data);
		return $qry;
	}
	function list_b()
	{
		// $qry = $this->db->select('id','brand_name')
		// 				->get('brands');

		// return $qry->result();
		$query=$this->db
						->select(['brand_name','id','created_at'])
						->from('brands')
						->order_by('created_at','DESC')
						->get();

		//print_r($query->result());exit;

		return $query->result();
	}

	function edit_b($brand_id){

		$query = $this->db->select(['brand_name','id','created_at'])
				 ->where('id',$brand_id)
				 ->get('brands');
		
		return $query->row();
	}

	function update_b($brand_id,Array $data){
		return $this->db
				->where('id',$brand_id)
				->update('brands',$data);
	}

	function delete_b($brand_id){
		return $this->db->delete('brands',['id'=>$brand_id]);
	}


	function add_item($data)
	{
		$qry = $this->db->insert('items',$data);
		return $qry;	
	}
	

	function list_items(){
		$query=$this->db
						->select('items.id as item_id,item_name,img,price,cat_name,brand_name')
						->from('items','brands','cat')
						->join('brands','items.brand_id = brands.id','left')
						->join('cat','items.cat_id = cat.id','left')
						->get();
		//print_r($query->result());exit;
		//echo "<pre>";print_r($query->result());
		return $query->result();	

	}

	public function edit_item($id){
		$query=$this->db
						->select('items.id as item_id,price,item_name,img,price,cat.id as c_id,cat_name,brands.id as b_id,brand_name','des')
						->from('items','brands','cat')
						->where('items.id',$id)
						->join('brands','items.brand_id = brands.id','left')
						->join('cat','items.cat_id = cat.id','left')
						->get();
		//print_r($query->result());exit;
		//echo "<pre>";print_r($query->result());
		return $query->result();
	}

	public function update_item($data,$id){
		$qry = $this->db
					->where('id',$id)
					->update('items',$data);

		return $qry;
	}

	public function delete_item($item_id){
		return $this->db->delete('items',['id'=>$item_id]);	
	}

	function search_filter_name($val){
		$qry = $this->db->select()
						->where('item_name')
						->get('items');
			return $qry->result();
	}
}
