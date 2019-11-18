<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h2 class="text-white pb-2">Login</h2>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="row row-demo-grid">
						<div class="col-xl-6">
							<?php if ($failed == 1) { ?>
							<div class="alert alert-danger" role="alert">
								Username or Password Wrong!!
							</div>
						<?php } ?>
							<form action="<?= base_url().'login_user' ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-group">
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" type="text" name="username" class="form-control input-border-bottom" required>
										<label for="inputFloatingLabel" class="placeholder">Username</label>
									</div>
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" name="password" type="password" class="form-control input-border-bottom" minlength="6" required>
										<label for="inputFloatingLabel" class="placeholder">Password</label>
									</div>
								</div>
								<div class="form-group">
									<div class="button-box">
										<input type="submit" class="btn btn-primary" value="Login">
									</div>
								</div>
								<a class="username ml-5 mr-5" href="<?= base_url().'page_register' ?>">Not Have Account!!</a>
								<a class="username" href="<?= base_url().'' ?>">Forget Password!!</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
