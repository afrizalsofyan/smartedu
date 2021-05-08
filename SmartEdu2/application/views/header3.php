<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Smart3du</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/sidebar.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/footer.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/header.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/sidebar.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.uploadPreview.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/sidebar.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/style.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js//bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/locales/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
	<!-- Navigation Section -->
  <header id="header">
    <div class="header-content clearfix"> <span class="span-sidebar" onclick="openNav()">&#9776;</span> <a class="logo" href="<?=base_url()?>index.php/smartedu/">Smart Edu</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          <li>
            <form method="post" action="<?=base_url()?>index.php/smartedu/live_search">
               <input type="text" id="search_data" name="search-term" placeholder="What are you looking for?" autocomplete="off" style="width:300px;height: 30px;">
               <button type="submit" style="height: 30px;">Search</button>
               <div id="result"></div>
               <div id="suggestions">
                  <div id="autoSuggestionsList">
                      </div>
                  </div>
             </form>
          </li>
          <li><a href="<?=base_url()?>index.php/smartedu/buku">Tentang Kami</a></li>
          <li><a href="#our-product">Produk Kami</a></li>
          <li><a href="#contact">Bantuan</a></li>
        </ul>
      </nav></div>
  </header>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?=base_url()?>index.php/smartedu/dashboard_page">Dashboard</a>
  <a href="#">Kelas Saya</a>
  <a href="#">Tranksaksi</a>
  <a href="<?=base_url()?>index.php/smartedu/profile_page">Profile</a>
  <a href="<?=base_url()?>index.php/smartedu/logout">Logout</a>
</div>