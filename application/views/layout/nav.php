<div class="wrapper">
  <div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue2">
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
      <div class="container-fluid">
        <?php if (isset($this->session->uid)) { ?>
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                  <img src="<?= base_url() . 'assets/img/profile.jpg'  ?>" alt="..." class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="u-text">
                        <h4><?= $this->session->nama; ?></h4>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="#">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url() . 'signout' ?>">Logout</a>
                  </li>
                </div>
              </ul>
            </li>
          </ul>
        <?php } ?>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <!-- Sidebar -->
  <div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <!-- <div class="user">
          <div class="avatar-sm float-left mr-2">
            <img src="<?= base_url() . 'assets/img/profile.jpg' ?>" alt="..." class="avatar-img rounded-circle">
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
              <span>
                Hizrian
                <span class="user-level">Administrator</span>
                <span class="caret"></span>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse in" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#profile">
                    <span class="link-collapse">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#edit">
                    <span class="link-collapse">Edit Profile</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->
        <ul class="nav nav-primary">
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/') ?>">
              <i class="fas fa-desktop"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() . 'input_data' ?>">
              <i class="fas fa-gavel"></i>
              <p>Lelang Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() . 'history' ?>">
              <i class="fas fa-history"></i>
              <p>History Lelang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() . 'lelang_end' ?>">
              <i class="fas fa-history"></i>
              <p>History Lelang Selesai</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->
