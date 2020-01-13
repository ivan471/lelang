<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="card border-dark">
        <div class="card-header">
          <?php if (empty($end)) { ?>
            <center>
              <h4 id="info"> Tidak Ada Perlelangan</h4>
            </center>
          <?php } else { ?>
          </div>
          <div class="card-body">
            <div class="row row-demo-grid">
              <?php foreach ($end as $b) : ?>
                <div class="col-xl-3">
                  <div class="card card-post card-round">
                    <img class="card-img-top" src="<?= base_url() . 'uploads/' . $b['link_gambar'] ?>" height="300" width="150" alt="Card image cap">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="info-post ml-2">
                          <h3><?= $b['nama_barang'] ?></h3>
                          <p>Pemenang = <?= $b['nama_user'] ?></p>
                          <p class="date text-muted">Senilai Rp.<?= $b['harga'] ?></p>
                        </div>
                      </div>
                      <div class="separator-solid"></div>
                      <div class="alert alert-danger" role="alert">Lelang Selesai</div>
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
