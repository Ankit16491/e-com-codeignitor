<?php include_once('header.php') ?>
<div class="container">
	<div class="wrapper">

		<?php echo form_open('login_controller/login_pro',['method'=>'post','name'=>'Login_Form','class'=>'form-signin']); ?>
		<!-- <form action="" method="post" name="Login_Form" class="form-signin">        -->
			<?php if($login_error = $this->session->flashdata('login_error')){ ?>
			<div class="alert alert-danger">
				<?php echo $login_error; ?>
			</div>
			<?php } ?>
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
			  <?php echo form_input(['type'=>'text','class'=>'form-control','name'=>'username','placeholder'=>'User Name']); ?>

			  <?php echo form_error('username'); ?>
			  <!-- <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" /> -->
			  <?php echo form_input(['type'=>'password','class'=>'form-control','name'=>'pass','placeholder'=>'Password']); ?>
			  <?php echo form_error('password'); ?>
			  <!-- <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     		   -->
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
		</form>			
	</div>
</div>

<?php include_once('footer.php') ?>