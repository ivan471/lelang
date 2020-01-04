<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
					<h1 class="text-black pb-2">Reset Password</h1>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<form class="" action="<?= base_url().'rest' ?>" method="post">
						<div class="form-group">
							<div class="form-group form-floating-label">
								<input id="inputFloatingLabel" type="email" name="email" class="form-control input-border-bottom" required>
								<label for="inputFloatingLabel" class="placeholder">E-mail</label>
							</div>
							<div class="form-group form-floating-label">
								<input id="inputFloatingLabel" name="password" type="password" class="form-control input-border-bottom" minlength="6" required>
								<label for="inputFloatingLabel" class="placeholder">New Password</label>
							</div>
						<div class="form-group">
							<button type="submit" class="btn btn-outline-info" name="button">Reset Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
