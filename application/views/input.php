<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h2 class="text-white pb-2">Input Data Barang Yang Dilelang</h2>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="row row-demo-grid">
						<div class="col-xl-6">
							<form action="<?= base_url().'simpan' ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<label for="largeInput">Nama Barang</label>
										<input type="text" name="nama_barang"class="form-control form-control" id="nama_barang" placeholder="Nama Barang" required>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="largeInput">Harga Awal</label>
										<input type="number" name="harga"class="form-control form-control" id="harga_awal" required>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="largeInput">Lama Pelelang</label>
										<input type="number" name="lama_lelang"class="form-control form-control" id="lama" max="7" required>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="largeInput">Kelipatan Harga</label>
										<input type="number" name="kelipatan"class="form-control form-control" id="kelipatan" required>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="largeInput">Deskripsi</label>
										<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">
										</textarea>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label for="exampleFormControlFile1">Upload Foto Gambar</label>
									<input type="file" name="gambar" class="form-control-file" id="upload" required>
								</div>
								<div class="form-group">
									<div class="button-box">
										<input type="submit" class="btn btn-success" value="Lelang">
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
