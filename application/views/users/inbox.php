<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="col-md-12">
				<div class="page-header">
					<h1 class="page-tittle">Inbox</h1>
				</div>
				<div class="card">
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<td>No</td>
									<td>Pesan</td>
									<td>Harga</td>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach ($end as $psn): ?>
									<tr>
										<td><?= $i ?></td>
										<td>Selamat Anda Memenangkan Barang <?= $psn['nama_barang'] ?></td>
										<td>Rp.<?= $psn['harga'] ?></td>
									</tr>
								<?php $i++; endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
