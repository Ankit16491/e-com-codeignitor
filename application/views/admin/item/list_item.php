<?php include dirname(__FILE__).'/../header.php'; ?>

<div class="row">
	<div class="col-md-12 col-offset-2">
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Sr No</th>
		      <th>Image</th>
		      <th>Item Name</th>
		      <th>Brand Name</th>
		      <th>Category</th>
		      <th>Action</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i=1;
		  		foreach ($results as $result) { ?>
		    <tr>
		      <td></td>
		      <td><?= $i++ ?></td>
		      <td><img src="<?= base_url('assets/img/'.$result->img) ?>" height="100" width="100"/></td>
		      <td><?= $result->item_name ?></td>
		      <td><?= $result->brand_name ?></td>
		      <td><?= $result->cat_name ?></td>
		      
		      <td>
		      	<div class="col-lg-2">
		      		<?= anchor("admin_controller/edit_item/".$result->item_id,'Edit',['class'=>'btn btn-primary']); ?>
		      	</div>
		  	  </td>
		      <td>
		      	<div class="col-lg-2">
		      		<?= anchor("admin_controller/delete_item/".$result->item_id,'Delete',['class'=>'btn btn-danger']); ?>
		      	</div>
		      </td>
		    </tr>
		    <?php } ?>
		  </tbody>
		</table> 
	</div>
</div>

<?php include dirname(__FILE__).'/../footer.php'; ?>