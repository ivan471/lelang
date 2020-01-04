<div class="wrapper">
  <div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue2">
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
      <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                  <img src="<?= base_url() . 'assets/default.png'  ?>" alt="..." class="avatar-img rounded-circle">
                </div>
              </a>
              <?php if (isset($this->session->uid)) { ?>
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
                    <a class="dropdown-item" href="<?= base_url().'profil/'.$this->session->uid ?>">My Profile</a>
                    <a class="dropdown-item" href="<?= base_url().'inbox/'.$this->session->uid ?>">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url() . 'signout' ?>">Logout</a>
                  </li>
                </div>
              </ul>
            <?php }else{ ?>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <a class="dropdown-item" href="<?= base_url() . 'login' ?>">login</a>
                  </li>
                </div>
              </ul>
            <?php } ?>
            </li>
          </ul>

      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <!-- Sidebar -->

  <div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
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
              <?php if (isset($this->session->uid)): ?>
            <li class="nav-item">
              <a href="<?= base_url() . 'input_data' ?>">
                <i class="fas fa-gavel"></i>
                <p>Lelang Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() . 'history/'.$this->session->uid ?>">
                <i class="fas fa-history"></i>
                <p>History Lelang User</p>
              </a>
            </li>
            <?php endif; ?>
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
