<?php include dirname(__FILE__).'/../header.php'; ?>

<div class="row">
	<div class="col-md-6 col-offset-2">
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Sr No</th>
		      <th>Category Name</th>
		      <th>Brand Name</th>
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
		      <td><?= $result->cat_name ?></td>
		      <td><?= $result->brand_name ?></td>
		      <td>
		      	<div class="col-lg-2">
		      		<?= anchor("category_controller/edit_category/".$result->id,'Edit',['class'=>'btn btn-primary']); ?>
		      	</div>
		  	  </td>
		      <td>
		      	<div class="col-lg-2">
		      		<?= anchor("category_controller/delete_category/".$result->id,'Delete',['class'=>'btn btn-danger']); ?>
		      	</div>
		      </td>
		    </tr>
		    <?php } ?>
		  </tbody>
		</table> 
	</div>
</div>

<?php include dirname(__FILE__).'/../footer.php'; ?>