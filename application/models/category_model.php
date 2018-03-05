<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	function select_Brand_C()
	{
		$query=$this->db
						->select(['brand_name','id','created_at'])
						->from('brands')
						->get();
		return $query->result();
	}
	
	function insert_C($data){
			$qry = $this->db->insert('cat',$data);
			return $qry;
	}

	function list_C(){
		$query=$this->db
						->select('c.*,b.brand_name')
						->from('cat c')
						->join('brands b','c.brand_id=b.id')
						->get();
		
		return  $query->result();	
		//echo "<pre>";print_r($res);die;
	}

	function edit_C($category_id){
		$query = $this->db->select('*')
				 ->where('id',$category_id)
				 ->get('cat');
		
		return $query->row();
	}

	function update_C($category_id,Array $data){
		return $this->db
				->where('id',$category_id)
				->update('cat',$data);
	}

	function delete_C($category_id){
		return $this->db->delete('cat',['id'=>$category_id]);
	}

}