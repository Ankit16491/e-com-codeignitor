<?php include dirname(__FILE__).'/../header.php'; ?>

<div class="row">
	<div class="col-md-4 col-md-offset-2">
		
		<h3>Edit Brands Record</h3>
		<hr>
		<form action='<?php echo base_url("admin_controller/update_brand/{$result->id}"); ?>' method="post">
			<label>
				Brand Name
			</label>
			<input type="text" name="brand_name" class="form-control" value="<?= $result->brand_name ?>">

			<?php echo form_error('brand_name') ; ?>
			<button class="btn btn-primary">Edit Brand</button>

		</form>
	</div>
</div>

<?php include dirname(__FILE__).'/../footer.php'; ?>