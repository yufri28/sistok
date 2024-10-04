<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTOK</title>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/images/logos/logo-cbim.png" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

    <!-- begin::Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- end::Sweetalert -->

    <!-- begin::Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- end::Select2 -->
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="./index.html" class="text-nowrap logo-img">
                            <img src="<?=base_url()?>assets/images/logos/logo-cbim.png" width="50" alt="" />
                        </a>
                        <span class="ms-3"><strong>YAYASAN CBIM</strong></span>
                    </div>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?=$menu=='home'?'active':''?>" href="<?=base_url('home');?>"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex justify-content-between align-items-center <?=$menu=='stok-mahasiswa' || $menu=='stok-siswa' ?'active':''?>"
                                data-bs-toggle="collapse" href="#stokDataSubmenu" role="button" aria-expanded="false"
                                aria-controls="stokDataSubmenu" onclick="toggleIcon(this)">
                                <span>
                                    <i class="ti ti-briefcase"></i>
                                </span>
                                <span class="hide-menu">Stok</span>
                                <i class="ti ti-chevron-down ms-auto"></i> <!-- Icon for arrow -->
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse sidebar-submenu" id="stokDataSubmenu">
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='stok-mahasiswa'?'active':''?>"
                                        aria-expanded="false" href="<?=base_url('stok/mahasiswa')?>">
                                        <span class="hide-menu">Mahasiswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != 'admin_m'):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='stok-siswa'?'active':''?>"
                                        href="<?=base_url('stok/siswa')?>">
                                        <span class="hide-menu">Siswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex justify-content-between align-items-center <?=$menu=='tahun_ajar' || $menu=='unit' || $menu=='prodi' || $menu=='mahasiswa' || $menu=='siswa' || $menu=='type_stok' || $menu=='ukuran'?'active':''?>"
                                data-bs-toggle="collapse" href="#masterDataSubmenu" role="button" aria-expanded="false"
                                aria-controls="masterDataSubmenu" onclick="toggleIcon(this)">
                                <span>
                                    <i class="ti ti-server"></i>
                                </span>
                                <span class="hide-menu">Master Data</span>
                                <i class="ti ti-chevron-down ms-auto"></i> <!-- Icon for arrow -->
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse sidebar-submenu" id="masterDataSubmenu">
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='tahun_ajar'?'active':''?>" aria-expanded="false"
                                        href="<?=base_url('masterdata/tahun_ajaran')?>">
                                        <span class="hide-menu">Tahun Ajar</span>
                                    </a>
                                </li>
                                <?php if($this->session->userdata('role') != "admin_m"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='unit'?'active':''?>"
                                        href="<?=base_url('masterdata/unit')?>">
                                        <span class="hide-menu">Unit</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='prodi'?'active':''?>"
                                        href="<?=base_url('masterdata/prodi')?>">
                                        <span class="hide-menu">Prodi</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='mahasiswa'?'active':''?>"
                                        href="<?=base_url('masterdata/mahasiswa')?>">
                                        <span class="hide-menu">Mahasiswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_m"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='siswa'?'active':''?>"
                                        href="<?=base_url('masterdata/siswa')?>">
                                        <span class="hide-menu">Siswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='type_stok'?'active':''?>"
                                        href="<?=base_url('masterdata/type_stok')?>">
                                        <span class="hide-menu">Type Stok</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='ukuran'?'active':''?>"
                                        href="<?=base_url('masterdata/ukuran')?>">
                                        <span class="hide-menu">Ukuran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex justify-content-between align-items-center <?=$menu=='pengambilan_siswa' || $menu=='pengambilan_mahasiswa'?'active':''?>"
                                data-bs-toggle="collapse" href="#pengambilanDataSubmenu" role="button"
                                aria-expanded="false" aria-controls="pengambilanDataSubmenu" onclick="toggleIcon(this)">
                                <span>
                                    <i class="ti ti-package"></i>
                                </span>
                                <span class="hide-menu">Pengambilan</span>
                                <i class="ti ti-chevron-down ms-auto"></i> <!-- Icon for arrow -->
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse sidebar-submenu" id="pengambilanDataSubmenu">
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='pengambilan_mahasiswa'?'active':''?>"
                                        href="<?=base_url('pengambilan/mahasiswa')?>">
                                        <span class="hide-menu">Mahasiswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_m"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='pengambilan_siswa'?'active':''?>"
                                        aria-expanded="false" href="<?=base_url('pengambilan/siswa')?>">
                                        <span class="hide-menu">Siswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex justify-content-between align-items-center <?=$menu=='per-mahasiswa' || $menu=='per-siswa' ?'active':''?>"
                                data-bs-toggle="collapse" href="#permintaanDataSubmenu" role="button"
                                aria-expanded="false" aria-controls="permintaanDataSubmenu" onclick="toggleIcon(this)">
                                <span>
                                    <i class="ti ti-reload"></i>
                                </span>
                                <span class="hide-menu">Permintaan</span>
                                <i class="ti ti-chevron-down ms-auto"></i> <!-- Icon for arrow -->
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse sidebar-submenu" id="permintaanDataSubmenu">
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='per-mahasiswa'?'active':''?>"
                                        aria-expanded="false" href="<?=base_url('permintaan/mahasiswa')?>">
                                        <span class="hide-menu">Mahasiswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_m"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='per-siswa'?'active':''?>"
                                        href="<?=base_url('permintaan/siswa')?>">
                                        <span class="hide-menu">Siswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link d-flex justify-content-between align-items-center <?=$menu=='pem-mahasiswa' || $menu=='pem-siswa' ?'active':''?>"
                                data-bs-toggle="collapse" href="#pemesananDataSubmenu" role="button"
                                aria-expanded="false" aria-controls="pemesananDataSubmenu" onclick="toggleIcon(this)">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Pemesanan</span>
                                <i class="ti ti-chevron-down ms-auto"></i> <!-- Icon for arrow -->
                            </a>
                            <!-- Sub-menu -->
                            <ul class="collapse sidebar-submenu" id="pemesananDataSubmenu">
                                <?php if($this->session->userdata('role') != "admin_s"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='pem-mahasiswa'?'active':''?>"
                                        aria-expanded="false" href="<?=base_url('pemesanan/mahasiswa')?>">
                                        <span class="hide-menu">Mahasiswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                                <?php if($this->session->userdata('role') != "admin_m"):?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?=$menu=='pem-siswa'?'active':''?>"
                                        href="<?=base_url('pemesanan/siswa')?>">
                                        <span class="hide-menu">Siswa</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link <?=$menu=='report'?'active':''?>" href="<?=base_url('report');?>"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-files"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li> -->
                        <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin'):?>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?=$menu=='users'?'active':''?>" href="<?=base_url('users');?>"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <?php endif;?>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Buttons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Alerts</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Card</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Forms</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-typography"></i>
                                </span>
                                <span class="hide-menu">Typography</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EXTRA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mood-happy"></i>
                                </span>
                                <span class="hide-menu">Icons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Sample Page</span>
                            </a>
                        </li> -->
                    </ul>
                    <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                        <div class="d-flex">
                            <div class="unlimited-access-title me-3">
                                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/"
                                    target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                            </div>
                            <div class="unlimited-access-img">
                                <img src="<?=base_url()?>assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div> -->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)" id="drop3" data-bs-toggle="dropdown">
                                <i class="ti ti-menu-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop3">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">
                                            <?=$this->session->userdata('name').' | '.$this->session->userdata('role');?>
                                        </p>
                                    </a>
                                    <a href="<?=base_url('logout');?>"
                                        class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link nav-icon-hover"
                                style="background: none; color: inherit; border: none; cursor: pointer; outline: inherit;"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-success rounded-circle"></div>
                            </button>
                            <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;">
                                <li><a class="dropdown-item active" href="#">5 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">1 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">3 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">2 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">10 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">7 permintaan stok baru</a></li>
                                <li><a class="dropdown-item" href="#">4 permintaan stok baru</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-center" href="#">Lihat Semua</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?=base_url()?>assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">
                                                <?=$this->session->userdata('name').' | '.$this->session->userdata('role');?>
                                            </p>
                                        </a>
                                        <a href="<?=base_url('logout');?>"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">