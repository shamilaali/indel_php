<!doctype html>
<html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>temp/images/brand/favicon.ico" />

        <!-- TITLE -->
        <title><?=$metadata['page_title']?></title>


        <!-- BOOTSTRAP CSS -->
        <link id="style" href="<?=base_url()?>temp/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        

        <!-- JQUERY JS -->
        <script src="<?=base_url()?>temp/js/jquery.min.js"></script>
          <!-- DATA TABLE JS-->
        <script src="<?=base_url()?>temp/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/dataTables.bootstrap5.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/jszip.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/pdfmake/pdfmake.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/pdfmake/vfs_fonts.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/js/buttons.colVis.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="<?=base_url()?>temp/plugins/datatable/responsive.bootstrap5.min.js"></script>	
        <script src="<?=base_url()?>temp/js/table-data.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="<?=base_url()?>temp/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?=base_url()?>temp/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- STYLE CSS -->
        <link href="<?=base_url()?>temp/css/style.css" rel="stylesheet" />
        <link href="<?=base_url()?>temp/css/dark-style.css" rel="stylesheet" />
        <link href="<?=base_url()?>temp/css/skin-modes.css" rel="stylesheet" />
        <link href="<?=base_url()?>temp/css/transparent-style.css" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="<?=base_url()?>temp/css/icons.css" rel="stylesheet" />

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>temp/colors/color1.css" />

    </head>

    <body class="app sidebar-mini ltr light-mode">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="<?=base_url()?>temp/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- app-Header -->
                <div class="app-header header sticky">
                    <div class="container-fluid main-container">
                        <div class="d-flex align-items-center">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
                            <div class="responsive-logo">
                                <a href="index.html" class="header-logo">
                                    <img src="<?=base_url()?>temp/images/brand/logo.png" class="mobile-logo logo-1 img-responsive" alt="logo" width="50"  height="50">
                                    <img src="<?=base_url()?>temp/images/brand/logo.png" class="mobile-logo dark-logo-1 img-responsive" alt="logo" width="50"  height="50">
                                    
                                    <!-- <img src="<?=base_url()?>temp/images/brand/logo.png" class="img-responsive" alt="logo">
                                    <img src="<?=base_url()?>temp/images/brand/logo.png" class="img-responsive" alt="logo"> -->
                                </a>
                            <!-- </div> &nbsp; &nbsp; &nbsp;<label><h4> -->
                              </div>  &nbsp;&nbsp;&nbsp;<label><h4><b><?php 
                            if($this->session->userdata('userType') == 'super_admin')
                            {
                                echo " &nbsp;&nbsp;&nbsp;<i> SuperAdmin Portal Of </i></br></br><h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('userName')."</h2></br>&nbsp;&nbsp;&nbsp;";

                               // echo 'SuperAdmin - '.$this->session->userdata('userName');
                            }
                            if($this->session->userdata('userType') == 'distributor')
                            {
                                echo " &nbsp;&nbsp;&nbsp;<i> Distributor Portal Of </i></br></br><h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('userName')."</h2></br>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('title');
                            }
                            if($this->session->userdata('userType') == 'salesmember')
                            {
                                echo " &nbsp;&nbsp;&nbsp;<i> STM Portal Of </i></br></br><h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('userName')."</h2></br>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('title');
                            
                            }
                            if($this->session->userdata('userType') == 'merchant')
                            {
                                echo " &nbsp;&nbsp;&nbsp;<i> Merchant Portal Of </i></br></br><h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('userName')."</h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('title')."</br> </br> &nbsp;&nbsp;&nbsp";
                                echo "[Wallet Balance : ".$this->session->userdata('balance'). "]";
                            }
                            if($this->session->userdata('userType') == 'cashier')
                            {
                                echo 'Cashier - '.$this->session->userdata('userName');
                            }
                            if($this->session->userdata('userType') == 'partner')
                            {
                                //echo 'Partner - '.$this->session->userdata('userName');
                                echo " &nbsp;&nbsp;&nbsp;<i> Partner Portal Of </i></br></br><h2>&nbsp;&nbsp;&nbsp;";
                                echo $this->session->userdata('userName')."</h2></br>&nbsp;&nbsp;&nbsp;";
                            }
                            ?></b></h4>
                            </label>
                            <!-- sidebar-toggle-->
                            <a class="logo-horizontal " href="index.html">
                                <img src="<?=base_url()?>temp/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                                <img src="<?=base_url()?>temp/images/brand/logo.png" class="header-brand-img light-logo1"
                                    alt="logo">
                            </a>
                            <!-- LOGO -->
                            <!-- <div class="main-header-center ms-3 d-none d-lg-block">
                                <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div> -->
                            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                                <!-- SEARCH -->
                                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon fe fe-more-vertical text-dark"></span>
                                    </button>
                                <div class="navbar navbar-collapse responsive-navbar p-0">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                        <div class="d-flex order-lg-2">
                                            <div class="dropdown d-block d-lg-none">
                                                <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="dropdown">
                                                    <i class="fe fe-search"></i>
                                                </a>
                                                <div class="dropdown-menu header-search dropdown-menu-start">
                                                    <div class="input-group w-100 p-2">
                                                        <input type="text" class="form-control" placeholder="Search....">
                                                        <div class="input-group-text btn btn-primary">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="dropdown d-md-flex">
                                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                                </a>
                                            </div> -->
                                            <!-- Theme-Layout -->
                                            <div class="dropdown d-md-flex">
                                                <a class="nav-link icon full-screen-link nav-link-bg">
                                                    <i class="fe fe-minimize fullscreen-button" id="myvideo"></i>
                                                </a>
                                            </div>
                                            <!-- FULL-SCREEN -->
                                            
                                            <div class="dropdown d-md-flex profile-1">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                                                    <span>
                                                            <img src="<?=base_url()?>temp/images/users/8.jpg" alt="profile-user" class="avatar  profile-user brround cover-image">
                                                        </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <div class="drop-heading">
                                                        <div class="text-center">
                                                            <h5 class="text-dark mb-0"><?=$this->session->userdata('userName')?></h5>
                                                            <small class="text-muted"><?=$this->session->userdata('userType')?></small>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <!-- <a class="dropdown-item" href="<?=base_url()?>profile/">
                                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                                    </a> -->
                                                    
                                                    <a class="dropdown-item" href="">
                                                        <i class="dropdown-icon fe fe-settings"></i> Settings
                                                    </a>
                                                    <a class="dropdown-item" href="">
                                                        <i class="dropdown-icon fe fe-alert-triangle"></i> Need help?
                                                    </a>
                                                    <a class="dropdown-item" href="<?=base_url()?>login/logout">
                                                        <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <!-- SIDE-MENU -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /app-Header -->

                <!--APP-SIDEBAR-->
                <div class="sticky">
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <aside class="app-sidebar" style="background-color: #ffffff !important;">
                        <div class="side-header" >
                            <!-- <a class="header-brand1" href="index.html">
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="header-brand-img desktop-logo" alt="logo" width="100"  height="100">
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="header-brand-img toggle-logo" alt="logo"  width="100"  height="100"> 
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="header-brand-img light-logo" alt="logo"  width="100"  height="100">
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="header-brand-img light-logo1" alt="logo"  width="100"  height="100">
                            </a> -->
                            
                            <!-- <a class="header-brand1" href="index.html"> -->
                            <a class="header-brand1" >
                                <img src="<?=base_url()?>assets/images/brand/loginlogo1.png" class="desktop-logo" alt="logo"> 
                                <!-- <img src="<?=base_url()?>assets/images/logo.jpg" class="toggle-logo" alt="logo" > 
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="light-logo" alt="logo" >
                                <img src="<?=base_url()?>assets/images/logo.jpg" class="light-logo1" alt="logo" > -->
                            </a>
                            
                            <!-- LOGO -->
                        </div>
                        <div class="main-sidemenu" style="background-color: #ffffff !important;">
                            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                                </svg></div>
                                <?php  
                                if($this->session->userdata('userType') == 'super_admin')
                                {
                                ?>
                                    <ul class="side-menu">
                                        <li class="sub-category">
                                            <h3>Main</h3>
                                        </li>
                                        <li class="slide">
                                            
                                            <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                        </li>

                                        <li class="sub-category">
                                            <h3>Partners</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'partners') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Partners</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>partners/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            </ul>
                                        </li>

                                        <li class="sub-category">
                                            <h3>Distributors</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'disctributers') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Distributors</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>distributors/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>distributors/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="sub-category">
                                            <h3>Sales Team</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Sales members</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>sales/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>sales/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li> -->
                                        
                                        
                                         <li class="sub-category">
                                            <h3>Merchants</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <!-- <li><a href="<?=base_url()?>merchants/trasaction_search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li> -->
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>Cashiers</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'cashiers') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Cashiers</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>cashiers/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>cashiers/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>SERVICE LEDGERS</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'reports') && ($this->uri->segment(2) == 'central_ledger' || $this->uri->segment(2) == 'api_log' || $this->uri->segment(2) == 'date_settings')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Service Ledgers</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>reports/central_ledger" <?=($this->uri->segment(2) == 'central_ledger') ? 'class="slide-item active"' : 'class="slide-item"'?>>Partner Ledger</a></li>
                                                <li><a href="<?=base_url()?>reports/central_cashback_ledger" <?=($this->uri->segment(2) == 'central_cashback_ledger') ? 'class="slide-item active"' : 'class="slide-item"'?>>Partner Cashback Ledger</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>Reports</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'reports') && ($this->uri->segment(2) == 'user_transactions' || $this->uri->segment(2) == 'merchant_transactions')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>reports/user_transactions" <?=($this->uri->segment(2) == 'user_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>> Transactions</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="sub-category">
                                            <h3>Block/Unblock Users</h3>
                                        </li> -->
                                    </ul>
                                <?php  
                                }
                                else if($this->session->userdata('userType') == 'partner')
                                {
                                ?>
                                    <ul class="side-menu">
                                        <li class="sub-category">
                                            <h3>Main</h3>
                                        </li>
                                        <li class="slide">
                                            
                                            <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                        </li>
                                        <li class="sub-category">
                                            <h3>Distributors</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'disctributers') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Distributors</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>distributors/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>distributors/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>STM</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">STM</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>sales/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <!-- <li><a href="<?=base_url()?>sales/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li> -->
                                            </ul>
                                        </li>
                                        
                                        
                                        <li class="sub-category">
                                            <h3>Merchants</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <!-- <li><a href="<?=base_url()?>merchants/trasaction_search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li> -->
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>Cashiers</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'cashiers') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Cashiers</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>cashiers/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>cashiers/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>SERVICE LEDGERS</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'reports') && ($this->uri->segment(2) == 'central_ledger' || $this->uri->segment(2) == 'api_log' || $this->uri->segment(2) == 'date_settings')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Service Ledgers</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>reports/central_ledger" <?=($this->uri->segment(2) == 'central_ledger') ? 'class="slide-item active"' : 'class="slide-item"'?>>Partner Ledger</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-category">
                                            <h3>Reports</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'reports') && ($this->uri->segment(2) == 'user_transactions' || $this->uri->segment(2) == 'merchant_transactions')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>reports/user_transactions" <?=($this->uri->segment(2) == 'user_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>> Transactions</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="sub-category">
                                            <h3>Block/Unblock Users</h3>
                                        </li> -->
                                    </ul>
                                <?php  
                                }
                                else if($this->session->userdata('userType') == 'distributor')
                            {
                            ?>
                                <ul class="side-menu">
                                    <li class="sub-category">
                                        <h3>Main</h3>
                                    </li>
                                    <li class="slide">
                                        
                                        <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                    </li>

                                    <li class="sub-category">
                                        <h3>STM</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">STM</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>sales/list/<?=$this->session->userdata('distributorID')?>" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="sub-category">
                                        <h3>Merchants</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                        </ul>
                                    </li>

                                    <li class="sub-category">
                                            <h3>Cashiers</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'cashiers') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Cashiers</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>cashiers/list/<?=$this->session->userdata('distributorID')?>" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            </ul>
                                        </li>

                                    <li class="sub-category">
                                        <h3>Wallet Statment</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'statement' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Wallet statement</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>distributors/statement/<?=$this->session->userdata('userID')?>" <?=($this->uri->segment(2) == 'statement') ? 'class="slide-item active"' : 'class="slide-item"'?>>Wallet statement</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-category">
                                        <h3>Over Draft Requests</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'statement' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Over Draft Requests</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>distributors/odRequests/<?=$this->session->userdata('userID')?>" <?=($this->uri->segment(2) == 'statement') ? 'class="slide-item active"' : 'class="slide-item"'?>>Over Draft Requests</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php  
                            }
                            
                            else if($this->session->userdata('userType') == 'salesmember')
                            {
                            ?>
                                <ul class="side-menu">
                                    <li class="sub-category">
                                        <h3>Main</h3>
                                    </li>
                                    <li class="slide">
                                        
                                        <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                    </li>

                                    <?php 
                                    if($this->session->userdata('setSupervisor') == 1)
                                    {
                                    ?>
                                        <li class="sub-category">
                                            <h3>STM</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">STM</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>sales/sales_members" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    
                                    <li class="sub-category">
                                        <h3>Merchants</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                            <li><a href="<?=base_url()?>sales/merchant_list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            <li><a href="<?=base_url()?>sales/merchant_search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-category">
                                        <h3>Wallet Statment</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'statement' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Wallet statement</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>sales/statement/<?=$this->session->userdata('userID')?>" <?=($this->uri->segment(2) == 'statement') ? 'class="slide-item active"' : 'class="slide-item"'?>>Wallet statement</a></li>
                                        </ul>
                                    </li>
                                    <?php 
                                    // if($this->session->userdata('setSupervisor') == 1)
                                    // {
                                    ?>
                                        <li class="sub-category">
                                            <h3>Overdraft Requests</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Overdraft Requests</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>sales/od_requests" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> Overdraft Requests</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    //}
                                    ?>
                                    <li class="sub-category">
                                        <h3>Reports</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'user_transactions' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>sales/user_transactions" <?=($this->uri->segment(2) == 'user_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>>User Transactions </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php  
                            }
                            else if($this->session->userdata('userType') == 'cashier')
                            {
                            ?>
                                <ul class="side-menu">
                                    <li class="sub-category">
                                        <h3>Main</h3>
                                    </li>
                                    <li class="slide">
                                        
                                        <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                    </li>
                                    
                                    <li class="sub-category">
                                        <h3>STM</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'cashiers') && ($this->uri->segment(2) == 'sales_members' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">STM</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>cashiers/sales_members" <?=($this->uri->segment(2) == 'sales_members') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                        </ul>
                                    </li>

                                    <li class="sub-category">
                                            <h3>Merchants</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            </ul>
                                        </li>

                                    <li class="sub-category">
                                        <h3>Reports</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'cashiers') && ($this->uri->segment(2) == 'billed_transactions' || $this->uri->segment(2) == 'unbilled_transactions')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>cashiers/billed_transactions" <?=($this->uri->segment(2) == 'billed_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>>Billed Transactions </a></li>
                                            <li><a href="<?=base_url()?>cashiers/unbilled_transactions" <?=($this->uri->segment(2) == 'unbilled_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>>Unbilled Transactions </a></li>

                                        </ul>
                                    </li>
                                </ul>
                            <?php  
                            } else if($this->session->userdata('userType') == 'merchant')
                            {
                            ?>
                                <ul class="side-menu">
                                    <li class="sub-category">
                                        <h3>Main</h3>
                                    </li>
                                    <li class="slide">
                                        
                                        <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                    </li>

                                    <li class="sub-category">
                                        <h3>Payments</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Payments</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/payments" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                        </ul>
                                    </li>
                                    
                                    <!-- <li class="sub-category">
                                        <h3>Merchants</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'sales') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="sub-category">
                                        <h3>Overdraft Request</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'od_requests' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Overdraft Requests</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/od_requests/<?=$this->session->userdata('userID')?>" <?=($this->uri->segment(2) == 'od_requests') ? 'class="slide-item active"' : 'class="slide-item"'?>>Overdraft Requests</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-category">
                                        <h3>Wallet Statment</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'statement' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Wallet statement</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/statement/<?=$this->session->userdata('userID')?>" <?=($this->uri->segment(2) == 'statement') ? 'class="slide-item active"' : 'class="slide-item"'?>>Wallet statement</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-category">
                                        <h3>Reports</h3>
                                    </li>
                                    <li class="slide">
                                        <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'user_transactions' )) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a href="<?=base_url()?>merchants/user_transactions" <?=($this->uri->segment(2) == 'user_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>>User Transactions </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php  
                            }
                            else
                            {
                                $features = array();
                                if(!empty($this->session->userdata('features')))
                                {
                                    $features = $this->session->userdata('features');
                                }
                              
                             ?>
                             <ul class="side-menu">
                                        <li class="sub-category">
                                            <h3>Main</h3>
                                        </li>
                                        <li class="slide">
                                            
                                            <a <?=($this->uri->segment(1) == 'dashboard') ? 'class="side-menu__item active"' : 'class="side-menu__item"'?> data-bs-toggle="slide" href="<?=base_url()?>dashboard"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Dashboard</span></a>
                                        </li>
                                        <?php
                                            if(in_array( "Employee List", $features))
                                            {?>
                                        <li class="sub-category">
                                            <h3>Users</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'employees') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Employees</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu"> 
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>employees/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> Active Emp</a></li>
                                                <li><a href="<?=base_url()?>employees/inactive_list" <?=($this->uri->segment(2) == 'inactive_list') ? 'class="slide-item active"' : 'class="slide-item"'?>> InActive Emp</a></li>
                                                <li><a href="<?=base_url()?>employees/search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <?php } 
                                            if(in_array( "System Users", $features))
                                            {?>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'system_users')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-user-circle-o"></i><span class="side-menu__label">System Users</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <li><a href="<?=base_url()?>system_users/list" <?=(($this->uri->segment(1) == 'system_users') && ($this->uri->segment(2) == 'list')) ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                            </ul>
                                        </li>
                                        <?php }
                                        if(in_array( "Merchant list", $features))
                                            {?>
                                        
                                        <li class="sub-category">
                                            <h3>Merchants</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Merchants</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <li><a href="<?=base_url()?>merchants/list" <?=($this->uri->segment(2) == 'list') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>
                                                <li><a href="<?=base_url()?>merchants/trasaction_search" <?=($this->uri->segment(2) == 'search') ? 'class="slide-item active"' : 'class="slide-item"'?>> Search</a></li>
                                            </ul>
                                        </li>
                                        <?php }
                                        if(in_array( "store list", $features) && !in_array( "Merchant list", $features)) 
                                            {?>
                                        
                                        
                                        <li class="sub-category">                                                                      
                                            <h3>Outlets</h3>                                                                           
                                        </li>                                                                                          
                                        <li class="slide">                                                                             
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'stores' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Outlets</span><i class="an
                                            gle fa fa-angle-right"></i></a>                                                                                                
                                        <ul class="slide-menu">                                                                    
                                                                                    <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a><
                                            /li> -->                                                                                                                       
                                        <li><a href="<?=base_url()?>merchants/stores/list/<?=$this->session->userdata('merchantID')?>" <?=($this->uri->segment(2) == 'stores') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>          
                                                                                                                                                                        
                                        </ul>                                                                                      
                                        </li>                                                                                          
                                        <li class="sub-category">                                                                      
                                    <h3>Cashbacks</h3>                                                                         
                                        </li>                                                                                          
                                        <li class="slide">                                                                             
                                            <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'cashbacks' ||  $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide"  href="javascript:void(0);"><i class="side-menu__icon fa fa-arrow-circle-left"></i><span class="side-menu__label">Cashbacks</span><i class="angle fa fa-angle-right"></i></a>                                                                                           
                                                                                <ul class="slide-menu">                                                                    
                                                                                    <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a><
                                            /li> -->                                                                                                                       
                                                                                    <li><a href="<?=base_url()?>merchants/cashbacks/list/<?=$this->session->userdata('merchantID')?>" <?=($this->uri->segment(2) == 'stores') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>       
                                                                                                                                    
                                            </ul>                                                                                      
                                        </li>   

                                       <?php }
                                        if(in_array( "till list", $features) && !in_array( "store list", $features) && !in_array( "Merchant list", $features)) 
                                            {?>
                                        <li class="sub-category">                                                                      
                                    <h3>Tills</h3>                                                                             
                                </li>                                                                                          
                                <li class="slide">                                                                             
                                    <a <?=(($this->uri->segment(1) == 'merchants') && ($this->uri->segment(2) == 'stores' || $this->uri->segment(2) == 'search')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Tills</span><i class="angle fa fa-angle-right"></i></a>                                                                                                  
                                    <ul class="slide-menu">                                                                    
                                        <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a><
/li> -->                                                                                                                       
                                        <li><a href="<?=base_url()?>merchants/tills/list/<?=$this->session->userdata('storeID')?>" <?=($this->uri->segment(2) == 'stores') ? 'class="slide-item active"' : 'class="slide-item"'?>> List</a></li>              
                                                                                                                               
                                    </ul>                                                                                      
                                </li>     
                                        
                                        
                                        <?php }
                                        if(in_array( "Transaction report - with date filter", $features) OR in_array( "Transaction report - with date,Merchant,store and till filter", $features) OR in_array( "Wallet Deduction Report", $features) OR in_array( "wallet Reload Report", $features))
                                            {?>
                                        <li class="sub-category">
                                            <h3>Reports</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'reports') && ($this->uri->segment(2) == 'user_transactions' || $this->uri->segment(2) == 'merchant_transactions')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                               <?php if(in_array( "Transaction report - with date filter", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>reports/user_transactions" <?=($this->uri->segment(2) == 'user_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>> Transactions</a></li>
                                                <?php } ?>
                                                <?php if(in_array( "Transaction report - with date,Merchant,store and till filter", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>reports/merchant_transactions" <?=($this->uri->segment(2) == 'merchant_transactions') ? 'class="slide-item active"' : 'class="slide-item"'?>> Merchant Transactions</a></li>
                                                <?php } ?>
                                                <?php if(in_array( "Wallet Deduction Report", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>reports/wallet_deduction" <?=($this->uri->segment(2) == 'wallet_deduction') ? 'class="slide-item active"' : 'class="slide-item"'?>> Wallet Deduction</a></li>
                                                <?php } ?>
                                                <?php if(in_array( "wallet Reload Report", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>reports/wallet_reload" <?=($this->uri->segment(2) == 'wallet_reload') ? 'class="slide-item active"' : 'class="slide-item"'?>> Wallet Reload</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                     
                                        
                                        <?php 
                                        if(in_array( "cycle date settings", $features) OR in_array( "API log", $features) OR in_array( "App/api versions", $features) OR in_array( "customer care contacts", $features)  OR in_array( "Access control", $features))
                                            {?>
                                        <li class="sub-category">
                                            <h3>Settings</h3>
                                        </li>
                                        <li class="slide">
                                            <a <?=(($this->uri->segment(1) == 'settings') && ($this->uri->segment(2) == 'app_versions' || $this->uri->segment(2) == 'api_log' || $this->uri->segment(2) == 'date_settings')) ? 'class="side-menu__item active"' : 'class="side-menu__item"'?>  data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fa fa-gear"></i><span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                                <!-- <li class="side-menu-label1"><a href="<?=base_url()?>employees/search">Search</a></li> -->
                                                <?php 
                                                if(in_array( "App/api versions", $features))
                                                {?>
                                                <li><a href="<?=base_url()?>settings/app_versions" <?=($this->uri->segment(2) == 'app_versions') ? 'class="slide-item active"' : 'class="slide-item"'?>> App Version</a></li>
                                                <?php } 
                                                 if(in_array( "API log", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>settings/api_log" <?=($this->uri->segment(2) == 'api_log') ? 'class="slide-item active"' : 'class="slide-item"'?>> Api Log</a></li>
                                                <?php } 
                                                 if(in_array( "cycle date settings", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>settings/date_settings" <?=($this->uri->segment(2) == 'date_settings') ? 'class="slide-item active"' : 'class="slide-item"'?>> Date settings</a></li>
                                                <?php } 
                                                 if(in_array( "Access control", $features))
                                               { ?>
                                                <li><a href="<?=base_url()?>settings/access_control" <?=($this->uri->segment(2) == 'access_control') ? 'class="slide-item active"' : 'class="slide-item"'?>> Access Control</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                        
                                        <!-- <li class="sub-category">
                                            <h3>Block/Unblock Users</h3>
                                        </li> -->
                                       
                                       
                                        
                                        
                                    </ul>
                            <?php }
                            
                            ?>
                            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                                </svg></div>
                        </div>
                    </aside>
                </div>
               
            </div>

            

         