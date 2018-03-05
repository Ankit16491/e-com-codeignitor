<?php

$config = array(
		'brand'=> array(
        array(
                'field' => 'brand_name',
                'label' => 'Brand Name',
                'rules' => 'required'
        )
    ),
	'category'=> array(
        array(
                'field' => 'cat_name',
                'label' => 'Category Name',
                'rules' => 'required'
        )
    ),
    'item'=> array(
        array(
                'field' => 'item_name',
                'label' => 'Item Name',
                'rules' => 'required'
        ),
        array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|is_natural_no_zero'
        ),
        array(
                'field' => 'brand_id',
                'label' => 'Brand',
                'rules' => 'required'
        ),
        array(
                'field' => 'cat_id',
                'label' => 'Category',
                'rules' => 'required'
        ),
        array(
                'field' => 'des',
                'label' => 'Description',
                'rules' => 'required'
        )
    ),
        
);

?>