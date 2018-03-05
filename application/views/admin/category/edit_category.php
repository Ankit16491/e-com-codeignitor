<?php include dirname(__FILE__).'/../header.php'; ?>

<div class="row">
	<div class="col-md-4 col-md-offset-2">
		
		<h3>Edit Category Record</h3>
		<hr>
		<form action='<?php echo base_url("category_controller/update_category/{$result->id}"); ?>' method="post">
			<div class="col-md-12" style="margin-top:15px;">
				<label>
					Category Name
				</label>
				<input type="text" name="cat_name" class="form-control" value="<?= $result->cat_name ?>">
				<?php echo form_error('brand_name') ; ?>
			</div>

			<div class="col-md-12" style="margin-top:15px;">
					<label>
						Brand Name
					</label>
					<select class="form-control"  name="brand_id">
		            <?php 
		            foreach($brands as $brand)
		            { 
		              echo '<option value="'.$brand->id.'">'.$brand->brand_name.'</option>';
		            }
		            ?>
		            </select>
	        </div>
	        <div class="col-md-12" style="margin-top:15px;">
					<button class="btn btn-primary">Edit Category</button>
			</div>

		</form>
	</div>
</div>

<?php include dirname(__FILE__).'/../footer.php'; ?>