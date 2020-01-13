<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="card">
				<div class="card-header">
					<?php if (empty($brg)) { ?>
						<center>
							<h4 id="info"> Tidak Ada Perlelangan</h4>
						</center>
					<?php } else { ?>
						<center>
							<h3 id="info">Perlelangan Sedang Berlangsung</h4>
							</center>
						</div>
						<div class="card-body">
							<div class="row row-demo-grid">
								<?php foreach ($brg as $b) : ?>
									<div class="col-xl-3">
										<div class="card card-post card-round border-dark">
											<img class="card-img-top" src="<?= base_url() . 'uploads/' . $b['link_gambar'] ?>" height="300" width="150" alt="Card image cap">
											<div class="card-body">
												<div class="d-flex">
													<div class="info-post ml-2">
														<h3><?= $b['nama_barang'] ?></h3>
														<p class="date text-muted">Rp.<?= $b['harga_awal'] ?></p>
														<p>Berakhir pada tanggal :</p>
														<p><?= tgl_indo($b['berakhir']); ?></p>
													</div>
												</div>
												<div class="separator-solid"></div>
												<?php if (!isset($this->session->uid)){?>
													<center>
														<a href="<?= base_url() . 'login' ?>" class="btn btn-primary btn-rounded btn-sm button-font">Login</a>
													</center>
												<?php }else {
													if (date("Y-m-d") < $b['berakhir']) { ?>
														<center>
															<a href="<?= base_url() . 'detail/' . $b['kode_barang']; ?>" class="btn btn-info btn-rounded btn-sm button-font"><i class="fa fa-info mr-2"></i>Lihat Lelang</a>
														</center>
													<?php } else { ?>
														<div class="alert alert-danger" role="alert">Lelang Ditutup</div>
													<?php }} ?>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php } ?>
								<?php if (!empty($data)) {
									echo $pagination;
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		function tgl_indo($tanggal)
		{
			$bulan = array(
				1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);
			// variabel pecahkan 0 = tanggal
			// variabel pecahkan 1 = bulan
			// variabel pecahkan 2 = tahun
			return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
		} ?>
