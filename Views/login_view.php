<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<?php if (isset($controller->login_message)) {
				echo $controller->login_message;
				unset($controller->login_message);
				if (isset($_SESSION['admin_id'])) {
					header("refresh:3,url=../admin/index.php?view=dashboard");
				}
			}
			if (isset($_SESSION['admin_id'])) {?>
				<div class="form-group">
					<br>
			    	<a href="index.php?view=dashboard" class="btn btn-primary">Go To Dashboard</a>
				</div>
			<?php } else {?>
				<form action="index" method="POST">
					<div class="form-group">
						<h3>Enter your credentials to login</h3>
					</div>
					<div class="form-group">
						<label for="email">Email</label> 
				    	<input type="email" name="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Enter Password</label> 
				    	<input type="password" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
				    	<button type="submit" name="login_request" id="btn_submit" class="btn btn-primary">Login Now</button>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>
