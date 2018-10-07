<!DOCTYPE html>
<?php 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>    
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="<?php echo base_url(); ?>assets/images/header/gunpro-favicon.png" rel="icon" type="image/x-icon">
    <meta property="og:image" content="<?php echo base_url(); ?>assets/images/header/gunpro-header.png" /> 
    <title> Gunsalefinder - <?php echo (isset($pagetitle)) ? $pagetitle :'Home'; ?> </title>
    <!-- Facebook Meta -->
    <meta property="og:url" content="<?=$actual_link?>" /> 
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (isset($title)) ? $title :'Home'; ?>" />
    <meta property="og:description" content="<?=isset($descriptions[0]['descriptions']) ?$descriptions[0]['descriptions'] : '' ?>" />
    <meta property="og:image" content="<?=isset($image_url) ?$image_url :''?>" />
    <meta property="og:image:width" content="119" />
    <meta property="og:image:height" content="73" />
    <meta property="fb:app_id" content="<?=FB_ID?>" />

    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <!-- =-=-=-=-=-=-= Template CSS ssStyle =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css" type="text/css">
    <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/et-line-fonts.css" type="text/css">
    <!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/forest-menu.css" type="text/css">
    <!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" type="text/css">
    <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" >
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/nouislider.min.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/skins/minimal/minimal.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/responsive-media.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="color" href="<?php echo base_url(); ?>assets/css/colors/sea-green.css">
    <!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="theme-color" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
    <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/skins/minimal/minimal.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone.css">
    <link href="<?php echo base_url(); ?>assets/css/jquery.tagsinput.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>

    <!-- =-=-=-=-=-=-= Easy Autocomplete =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>node_modules/easy-autocomplete/dist/easy-autocomplete.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/override.css">
    <!--<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">-->

    <!-- Hotfix Assets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/hotfix.css">

    <style>
      /* styles unrelated to zoom */

      /* these styles are for the demo, but are not required for the plugin */
      .zoom {
        display:inline-block;
        position: relative;
      }
      
      /* magnifying glass icon */
      .zoom:after {
        content:'';
        display:block; 
        width:33px; 
        height:33px; 
        position:absolute; 
        top:0;
        right:0;
        background:url(icon.png);
      }

      /* .zoom img {
        display: block;
      } */

      .zoom img::selection { background-color: transparent; }
      
    </style>
</head>

<body>
    <div class="colored-header">
     <!-- Top Bar -->
     <div class="header-top">
      <div class="container">
       <div class="row">
        <!-- Header Top Left -->
        <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
         <ul class="listnone">
          <!--<li>
              <a href="tel:+1800229933"><i class="fa fa-phone" aria-hidden="true"></i> +6380222111</a>
          </li>-->
          <li>
            <a href="mailto:support@gunsalefinder.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> support@gunsalefinder.com</a>
          </li>
        </ul>
      </div>
      <!-- Header Top Right Social -->
      <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
       <div class="pull-right">
        <ul class="listnone">
        <?php 
            if($this->common->checkSession()):
        ?>
          <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i> Log in</a></li>
          <!-- <li><a href="registration"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li> -->
          <li class="dropdown">
            <a href="<?php echo base_url('registration'); ?>"><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;Register&nbsp;</a>
            <!--<ul class="dropdown-menu">
              <li><a href="register?role=user">User Registration</a></li>
              <li><a href="register?role=dealer">Dealer Registration</a></li>
            </ul>-->
          </li>
          <!--<li><a href="<?php //echo base_url('dealer/dashboard'); ?>"><i class="fa fa-sign-in"></i> Dealer</a></li>-->
        <?php else: ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male" aria-hidden="true"></i><?php  echo "MY ACCOUNT";//$this->session->userdata('name'); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php $url = ($this->session->userdata('dealer_login')) ? base_url('dealer/profile') : base_url('profile'); ?>
             <li><a href="<?php echo $url; ?>">User Profile</a></li>
             <?php if($this->session->userdata('dealer_login')): ?>
                <li><a href="<?php echo base_url('dealer-post'); ?>">My Ads</a></li>
              <?php endif; ?>
              <?php if($this->session->userdata('dealer_login')): ?>
                <li><a href="<?php echo base_url('reported-ads'); ?>">Reported Ads</a></li>
              <?php endif; ?>
              <?php if($this->session->userdata('logged_in')): ?>
                <li><a href="<?php echo base_url('wishlist'); ?>">My Wishlist</a></li>
              <?php endif; ?>
              
           </ul>
         </li>
         <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
       <?php endif; ?>
      </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Top Bar End -->
    <div class="header">
     <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class="col-md-3 col-sm-3 hidden-sm hidden-xs">
          <div class="logo">
            <a href="<?php echo base_url(); ?>"><img alt="logo" src="<?php echo base_url(); ?>assets/images/header/gunpro-header.png"> </a>
          </div>
        </div>
        <!-- Category -->
        <form action="<?php echo base_url(); ?>search" id="searchForm" method="post">
          <div class="col-md-7 col-sm-9">
            <div class="col-md-3 col-sm-4 no-padding">
            <?php
              $states = $this->common->getallStates();
            ?>
              <select class="category form-control">
                <option>State</option>
                <?php  foreach ($states as $state): ?>
                <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- <input type="hidden" name="itemId" id="itemId" /> -->
            <div class="col-md-9 col-sm-8 no-padding">
              <div class="input-group">
                <input id="txtSearch" name="txtSearch" type="text" value="<?php echo isset($postData['txtSearch']) ?  $postData['txtSearch'] :'' ?>" placeholder="What Are You Looking For ?" class="form-control"> <span class="input-group-btn" />
                  <button class="btn btn-default" type="button" id="btnSearch" >Search</button>
                </span>
                
              </div>
            </div>
          </div>
        </form>
        <!-- Post Button -->
        <div class="col-md-2 col-sm-3"> <a href="<?php echo base_url('post-deal'); ?>" class="btn btn-orange btn-block">Post a Deal </a> <span class="free-flag visible-lg"></span> </div>
      </div>
    </div>
    </div>

    <div class="main-menu">
     <!-- Navigation Bar -->
     <nav id="menu-1" class="mega-menu">
      <!-- menu list items container -->
      <section class="menu-list-items">
        <div class="container">
         <div class="row">
          <div class="col-lg-12 col-md-12">
           <!-- menu logo -->
           <ul class="menu-logo">
            <li>
             <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-1.png" alt="logo"> </a>
           </li>
         </ul>
         <!-- menu links -->
         <ul class="menu-links">
          <!-- active class -->
          <li>
           <a href="<?php echo base_url(''); ?>"> Home </i></a>
         </li>
         <li>
           <a href="javascript:void(0)">Categories <i class="fa fa-angle-down fa-indicator"></i></a>
           <!-- drop down multilevel  -->
           <ul class="drop-down-multilevel">

            <!--<li><a href="<?php //echo base_url('search'); ?>">Featured Categories</a></li>-->
            <li><a href="<?php echo base_url('search'); ?>">Latest Product</a></li>
            <li><a href="<?php echo base_url('search'); ?>">Highest Rate Product</a></li>
          
          </ul>
        </li>
        <li><a href="<?=base_url('search'); ?>">Products </a></li>
        <li><a href="<?php echo base_url('promotion'); ?>">Promotion </a></li>
        <li><a href="<?php echo base_url('about'); ?>">About </a></li>
        <li><a href="<?php echo base_url('pricing'); ?>">Pricing</a></li>
        <li><a href="<?php echo base_url('dealer-post'); ?>">Advertise </a></li>
        <li><a href="<?php echo base_url('contact'); ?>">Contact </a></li>
      </ul>
      <ul class="menu-search-bar hidden">
        <li>
         <a href="<?php echo base_url('post-deal'); ?>" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post a Deal</a>
       </li>
     </ul>
    </div>
    </div>
    </div>
    </section>
    </nav>
    </div>
    <div class="clearfix"></div>
    <!-- =-=-=-=-=-=-= Dark Header End =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix"></div>
