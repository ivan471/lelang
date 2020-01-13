<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="col-md-12">
				<div class="page-header">
					<h1 class="page-tittle">Detail Barang</h1>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img src="<?= base_url().'uploads/'.$detail['link_gambar'] ?>" width="300" height=300 alt="">
							</div>
							<div class="col-md-6">
								<div class="content">
									<h1><?= $detail['nama_barang']; ?></h1>
									<h4><?= $detail['nama_user']; ?></h4>
									<div class="row">
										<div class="col-md-5">
											<h3>Harga Awal</h3>
											<h3>Kelipatan Harga</h3>
										</div>
										<div class="col-md-5">
											<h3>:Rp.<?= $detail['harga_awal']; ?></h3>
											<h3>:Rp.<?= $detail['kelipatan_harga']; ?></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<p><?= $detail['deskripsi']; ?></p>
				</div>
			</div>
			<?php	if ($this->session->uid != $detail['id_pemilik']) { ?>
			<div class="col-md-5">
				<div class="card card-comment-input">
					<div class="card-body">
						<form class="" action="<?= base_url().'comment/'.$this->session->uid.'/'.$detail['kode_barang'] ?>" method="post">
							<div class="form-group">
								<input type="hidden" name="kode_barang" value="<?= $detail['kode_barang']; ?>">
								<?php if (isset($ds)){
									$hasil=  $cekharga['harga_diminta'] + $detail['kelipatan_harga'];
									?>
									<input class="form-control input-border-bottom" type="number" step="<?= $detail['kelipatan_harga'] ?>" min="<?= $hasil; ?>" name="harga" value="<?= $hasil; ?>">
								<?php }else {?>
									<input class="form-control input-border-bottom" type="number" step="<?= $detail['kelipatan_harga'] ?>" min="<?= $detail['harga_awal']; ?>" name="harga" value="<?= $detail['harga_awal']; ?>">
								<?php } ?>
								<button class="btn btn-primary mt-2"type="submit" name="button">Pasang Harga</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
			<div class="col-md-4">
				<h3>Daftar Pembeli Lelang</h3>
				<?php foreach ($komentar as $kot): ?>
					<div class="card card-comment">
						<div class="card-body">
							<h5 class="card-title"><?= $kot['nama_user'] ?></h5>
							<h5 class="card-text">Rp.<?= $kot['harga_diminta'] ?></h4>
							<h4 class="card-text"><small class="text-muted"><?= $kot['waktu'] ?></small></h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
