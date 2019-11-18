<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="card">
                <div class="card-body">
                    <div class="row row-demo-grid">
                        <?php if (empty($brg)) { ?>
                            <center>
                                <h4 id="info"> Tidak Ada Perlelangan</h4>
                            </center>
                        <?php } else { ?>
                            <?php foreach ($brg as $b) : ?>
                                <div class="col-xl-3">
                                    <div class="card card-post card-round">
                                        <img class="card-img-top" src="<?= base_url() . 'uploads/' . $b['link_gambar'] ?>" height="300" width="150" alt="Card image cap">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="info-post ml-2">
                                                    <h3><?= $b['nama'] ?></h3>
                                                    <p class="date text-muted">Rp.<?= $b['harga_awal'] ?></p>
                                                    <p>Berakhir pada tanggal : <?= tgl_indo($b['berakhir']); ?></p>
                                                </div>
                                            </div>
                                            <div class="separator-solid"></div>
                                            <?php if (date("Y-m-d") < $b['berakhir']) { ?>
                                                <center>
                                                    <a href="<?= base_url() . 'detail/' . $b['kodebarang']; ?>" class="btn btn-primary btn-rounded btn-sm button-font">Lihat</a>
                                                </center>
                                            <?php } else { ?>
                                                <div class="alert alert-danger" role="alert">Lelang Ditutup</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>