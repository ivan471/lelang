<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h2 class="text-white pb-2">Register Akun</h2>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="row row-demo-grid">
						<div class="col-xl-6">
							<form action="<?= base_url().'register' ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-group">
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" type="text" name="username" class="form-control input-border-bottom" required>
										<label for="inputFloatingLabel" class="placeholder">Username</label>
									</div>
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" name="password" type="password" minlength="6" class="form-control input-border-bottom" required>
										<label for="inputFloatingLabel" class="placeholder">Password</label>
									</div>
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" name="nama" type="text" class="form-control input-border-bottom" required>
										<label for="inputFloatingLabel" class="placeholder">Nama</label>
									</div>
									<div class="form-group form-floating-label">
										<input id="inputFloatingLabel" name="email" type="email" class="form-control input-border-bottom" required>
										<label for="inputFloatingLabel" class="placeholder">Email</label>
									</div>
								</div>
								<div class="form-group">
									<div class="button-box">
										<input type="submit" class="btn btn-primary" value="Login">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
