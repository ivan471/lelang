<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="col-md-12">
				<div class="page-header">
					<h1 class="page-tittle">Edit Barang</h1>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="col-md-10">
						<form class="" action="<?= base_url().'editbrg/'.$edit['kode_barang'] ?>" method="post">
							<div class="form-group">
								<div class="row">
									<label for="largeInput">Nama Barang</label>
									<input type="text" name="nama_barang"class="form-control form-control" id="nama_barang" value="<?= $edit['nama_barang'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="largeInput">Lama Pelelang</label>
									<input type="number" name="lama_lelang"class="form-control form-control" id="lama" max="7" value="<?= $edit['lama_lelang'] ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="largeInput">Kelipatan Harga</label>
									<input type="number" name="kelipatan"class="form-control form-control" id="kelipatan"value="<?= $edit['kelipatan_harga'] ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="largeInput">Deskripsi</label>
									<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" value="<?= $edit['deskripsi'] ?>" >
									</textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="button-box">
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
