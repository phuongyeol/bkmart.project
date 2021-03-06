<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Hệ thống quản lí cửa hàng</title>
  <!-- Favicon-->
  <link rel="icon" href="public/favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/plugins/bootstrap/css/bootstrap-theme.min.css">

  <!-- Waves Effect Css -->
  <!-- <link href="public/plugins/node-waves/waves.css" rel="stylesheet" /> -->

  <!-- Animation Css -->
  <link href="public/plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Morris Chart Css-->
  <!-- <link href="public/plugins/morrisjs/morris.css" rel="stylesheet" /> -->

  <!-- Custom Css -->
  <link href="public/css/style.css" rel="stylesheet">

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="public/css/themes/all-themes.css" rel="stylesheet" />
  
  <!-- font-awesome -->
  <link rel="stylesheet" href="public/plugins/font-awesome/css/font-awesome.min.css">

  <!-- fix -->
  <link rel="stylesheet" href="public/css/fix.css">

 <link rel="stylesheet" href="public/plugins/sweetalert/sweetalert.css">

  <!-- DataTable -->
  <!-- <link rel="stylesheet" href="public/plugins/bootstrap/css/bootstrap.min.css" > -->

  <!-- <link rel="stylesheet" href="public/plugins/bootstrap/css/bootstrap-theme.min.css"> -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="public/plugins/bootstrap/js/bootstrap.min.js">
  <script src="public/plugins/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>

  
</head>

<body class="theme-red">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  <!-- Search Bar -->
  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="index.php">PROJECT II- TRẦN THỊ PHƯƠNG</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Call Search -->
          <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
          <!-- #END# Call Search -->
          
          <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info" style="background: url(upload/images/user-img-background.jpg);">
        <div class="image">
          <img src="upload/admin/staff/<?php echo $_SESSION['staff_login']['avatar']; ?>" width="60" height="60"  />
        
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['staff_login']['name'] ?></div>
          <div class="email"><?php echo $_SESSION['staff_login']['email'] ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="?mod=home"><i class="material-icons">person</i>Profile</a></li>
              <li role="seperator" class="divider"></li>
              <li><a href="?mod=sale"><i class="material-icons">shopping_cart</i>Sales</a></li>
              <li><a href="?mod=staff&act=logout"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
        <ul class="list">
          <li class="header">MAIN NAVIGATION</li>
          <li class="active">
            <a href="index.php">
              <i class="material-icons">home</i>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">people</i>
              <span>Quản lí người dùng</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="?mod=customer">Khách hàng</a>
              </li>
              <li>
                <a href="?mod=staff">Nhân viên</a>
              </li>
              <li>
                <a href="?mod=job">Vị trí</a>
              </li>             
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">camera</i>
              <span>Quản lí sản phẩm</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="?mod=category">Loại sản phẩm</a>
              </li>
              <li>
                <a href="?mod=product">Sản phẩm</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="?mod=sale" >
              <i class="material-icons">shopping_cart</i>
              <span>Sales</span>
            </a>
          </li>
          <li>
            <a href="?mod=sale&act=cart" >
              <i class="material-icons">shopping_basket</i>
              <span>Giỏ hàng</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">multiline_chart</i>
              <span>Thống kê</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="?mod=invoice">Thu nhập</a>
              </li>
              <li>
                <a href="javascript:void(0);" class="menu-toggle">Sản phẩm</a>
                <ul class="ml-menu">
                  <li>
                    <a href="?mod=product&act=inventory">Bản kê khai tồn</a>
                  </li>
                  <li>
                    <a href="?mod=product&act=goods_sold">Sản phẩm bán chạy</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          

        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
          &copy; 2018 - 2019 <a href="javascript:void(0);">Design by PhuongTran</a>.
        </div>
        <div class="version">
          <b>Version: </b> 1.0.5
        </div>
      </div>
      <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
          <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
              <div class="red"></div>
              <span>Red</span>
            </li>
            <li data-theme="pink">
              <div class="pink"></div>
              <span>Pink</span>
            </li>
            <li data-theme="purple">
              <div class="purple"></div>
              <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
              <div class="deep-purple"></div>
              <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
              <div class="indigo"></div>
              <span>Indigo</span>
            </li>
            <li data-theme="blue">
              <div class="blue"></div>
              <span>Blue</span>
            </li>
            <li data-theme="light-blue">
              <div class="light-blue"></div>
              <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
              <div class="cyan"></div>
              <span>Cyan</span>
            </li>
            <li data-theme="teal">
              <div class="teal"></div>
              <span>Teal</span>
            </li>
            <li data-theme="green">
              <div class="green"></div>
              <span>Green</span>
            </li>
            <li data-theme="light-green">
              <div class="light-green"></div>
              <span>Light Green</span>
            </li>
            <li data-theme="lime">
              <div class="lime"></div>
              <span>Lime</span>
            </li>
            <li data-theme="yellow">
              <div class="yellow"></div>
              <span>Yellow</span>
            </li>
            <li data-theme="amber">
              <div class="amber"></div>
              <span>Amber</span>
            </li>
            <li data-theme="orange">
              <div class="orange"></div>
              <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
              <div class="deep-orange"></div>
              <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
              <div class="brown"></div>
              <span>Brown</span>
            </li>
            <li data-theme="grey">
              <div class="grey"></div>
              <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
              <div class="blue-grey"></div>
              <span>Blue Grey</span>
            </li>
            <li data-theme="black">
              <div class="black"></div>
              <span>Black</span>
            </li>
          </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
          <div class="demo-settings">
            <p>GENERAL SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Report Panel Usage</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Email Redirect</span>
                <div class="switch">
                  <label><input type="checkbox"><span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>SYSTEM SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Notifications</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Auto Updates</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>ACCOUNT SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Offline</span>
                <div class="switch">
                  <label><input type="checkbox"><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Location Permission</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>
    <!-- #END# Right Sidebar -->
  </section>


  <!-- content -->
  <section class="content">

