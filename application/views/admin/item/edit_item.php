<?php include dirname(__FILE__).'/../header.php'; 
	
	$arr=[];
	foreach ($data as $value) {
		$arr = $value;
	}

?>

	
<div class="row">
	<div class="col-md-6 col-md-offset-2">

		<form action="<?php echo base_url('admin_controller/update_item/'.$arr->item_id);?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
		  <fieldset>
		    <legend>Edit Items</legend>
		    <div class="form-group">
		      <label for="itemName" class="col-lg-3 control-label">Item Name</label>
		      <div class="col-lg-9">
		        <input type="text" class="form-control" id="itemName" placeholder="Item Name" 
		        name="item_name" value="<?= $arr->item_name ?>">
		      </div>
		    </div>
		    <?= form_error('item_name'); ?>
		    <div class="form-group">
		      <label for="itemPrice" class="col-lg-3 control-label">Price</label>
		      <div class="col-lg-9">
		        <input type="text" class="form-control" id="number" placeholder="Item Price"
		        name="price" value="<?= $arr->price ?>">
		      </div>
		    </div>
		    <?= form_error('price'); ?>
		    <div class="form-group">
		      <label for="select" class="col-lg-3 control-label">Select Brand</label>
		      <div class="col-lg-9">
		        <select class="form-control" name="brand_id">
		          <option value="<?= $arr->b_id ?>"><?= $arr->brand_name ?></option>
		          <?php foreach ($result['brand'] as $value) {
		          		$id = $value->id;
		          		$name = $value->brand_name; ?>
		          		<option value="<?php echo $id ?>"><?php echo $name ?></option>
		         <?php } ?>
		          
		        </select>
		      </div>
		    </div>
		    <?= form_error('brand_id'); ?>
		    <div class="form-group">
		      <label for="select" class="col-lg-3 control-label">Select Category</label>
		      <div class="col-lg-9">
		        <select class="form-control" name="cat_id">
		          <option value="<?= $arr->c_id ?>"><?= $arr->cat_name ?></option>
		           <?php foreach ($result['cat'] as $value) {
		          		$id = $value->id;
		          		$name = $value->cat_name; ?>
		          		<option value="<?php echo $id ?>"><?php echo $name ?></option>
		         <?php } ?>       
		        </select>
		      </div>
		    </div>
		    <?= form_error('cat_id'); ?>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-3 control-label">Textarea</label>
		      <div class="col-lg-9">
		        <textarea class="form-control" rows="3" name="des" value="">	
		        </textarea>
		      </div>
		    </div>
		    <?= form_error('des'); ?>
		    
		    <div class="form-group">
		    	<label for="filea" class="col-lg-3 control-label">File Input</label>
		    	<div class="col-lg-9">
		    		<input type="file" class="form-control-file" aria-describedby="fileHelp" name="upload_file" value="<?= $arr->img ?>">	
		    	</div>
		    </div>
		    <?= form_error('upload_file'); ?>
		    <img src="<?= base_url('assets/img/').$arr->img ?>" height="100" width="100">

		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">Cancel</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	</div>
</div>

<?php include dirname(__FILE__).'/../footer.php'; ?>
<script type="text/javascript">
	$("#number").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
});
</script>