<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h2 class="text-white pb-2">Perlelangan Barang</h2>
			</div>
			<div class="card">
				<div class="card-body">

					<div class="row row-demo-grid">
						<?php foreach ($brg as $b) :?>
						<div class="col-xl-4">
							<div class="card card-post card-round">
								<img class="card-img-top" src="<?= base_url().'uploads/'.$b['link_gambar'] ?>" height="250" alt="Card image cap">
								<div class="card-body">
									<div class="d-flex">
										<div class="info-post ml-2">
											<p class="username"><?= $b['nama'] ?></p>
											<p class="date text-muted">Rp.<?= $b['harga_awal'] ?></p>
										</div>
									</div>
									<div class="separator-solid"></div>
									<h3 class="card-title">
										<a href="#">
											Best Design Resources This Week
										</a>
									</h3>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
								</div>

							</div>
						</div>
					<?php endforeach; ?>
						<!-- <div class="col-xl-4">
						<div class="card">
						<div class="card-body"><code>.col-xl-4</code></div>
					</div>
				</div>
				<div class="col-xl-4">
				<div class="card">
				<div class="card-body"><code>.col-xl-4</code></div>
			</div>
		</div> -->
	</div>
</div>
</div>
</div>
</div>
</div>
