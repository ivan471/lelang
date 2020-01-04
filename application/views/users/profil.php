<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-tittle">Profil User</h4>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<h3>No Ktp</h3>
								<h3>Nama</h3>
								<h3>Alamat</h3>
								<h3>Kota</h3>
								<h3>Email</h3>
							</div>
							<div class="col-md-6">
								<h3>: <?= $profil['no_ktp'] ?></h3>
								<h3>: <?= $profil['nama_user'] ?></h3>
								<h3>: <?= $profil['alamat'] ?></h3>
								<h3>: <?= $profil['kota'] ?></h3>
								<h3>: <?= $profil['email'] ?></h3>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-md-6">
								<h4>Gambar Ktp</h4>
								<img src="<?= base_url().'uploads/ktp/'.$profil['gambar_ktp'] ?>" width="100%" alt="">
							</div>
							<div class="col-md-6">
								<h4>Gambar KK</h4>
								<img src="<?= base_url().'uploads/kk/'.$profil['gambar_kk'] ?>" width="100%" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
