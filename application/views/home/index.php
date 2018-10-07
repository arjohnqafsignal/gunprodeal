<?php $this->load->view("layouts/header"); ?>
         <section class="advertizing">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <?php echo $this->session->flashdata('message'); ?>
               <div class="row">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="banner">
                        <a href="#" id="bannerLink">
                          <img src="<?php echo ADMINURL; ?>images/sliders/banner-1.png" alt="Slider" id="bannerImage" style="width : 680px; height: 90px"></a>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-
         <!-- Main Section -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container full-width"> <!-- just remove the class full-width if no banner -->
                <div class="col-md-1 no-padding banner-side-container">
                  <a href="<?php echo base_url('dealer-post'); ?>">
                    <?php 
                      // $leftBanner = count($this->common->getBanner("1")) < 0 ?  $this->common->getBanner("1")->image_url : 'assets/banners/sidebar.jpeg';
                    ?> 

                    <?php
                      $leftBanner = $this->common->getPurchasedBanner("2");
                      if($leftBanner){ $leftBanner = LOCALADMINURL.$leftBanner; } else { $leftBanner = '';}
                    ?>
                    <div style="background-image: url(<?=$leftBanner?>); 
                      height: 600px;
                      background-repeat: no-repeat center;
                      background-size: 100% 100%;">  
                    </div>
                  </a>
                </div>
                <div class="col-md-10">
                    <!-- Content Box -->
                    <!-- Row -->
                    <div class="row">
                        <!-- TEMP REMOVE FEATURE CATEGORY
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12 sidebar">
                            <div class="side-menu ">
                                <nav class="yamm megamenu-horizontal">
                                    <ul class="nav">
                                        <?php 
                                            // SLIDE MENU
                                            foreach ($menu as $parseMenu) {
                                                if (!isset($parseMenu['subMenu']))  $parseMenu['subMenu'] = '';
                                                $this->load->view('home/category', $parseMenu); 
                                            }
                                            $menu = '';
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div> 
                        -->
                        <!--ORIGINAL WHEN CATEGORY IS INCLUDED col-md-9 col-lg-9 col-xs-12 col-sm-12 featured-->
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 featured" >
                            <div class="row">
                                <div class="featured-slider-1">
                                <!-- <pre> -->
                                <?php
                                    foreach ($details as $parseDetails) {
                                      if ( !isset($parseDetails['images']) ) $parseDetails['images'] = '';
                                      $this->load->view('home/productItem', $parseDetails);
                                    }
                                    $details = '';
                                ?>

                                    <div class="white category-grid-box-1 load-more">
                                        <div class="short-description-1">
                                        <h3>
                                            <a class="moveToSearch" > LOAD MORE </a>
                                        </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Middle Content Box End -->
                    </div>
                </div>
                <div class="col-md-1 no-padding banner-side-container">
                  <a href="<?php echo base_url('dealer-post'); ?>">
                    <?php 
                      //$rightBanner = count($this->common->getBanner("2")) > 0 ?  $this->common->getBanner("2")->image_url : 'assets/banners/sidebar.jpeg';
                      $rightBanner = $this->common->getPurchasedBanner("3");
                      if($rightBanner){ $rightBanner = LOCALADMINURL.$rightBanner; } else { $rightBanner = '';}
                    ?>
                    <div style="background-image: url(<?=$rightBanner?>); 
                      height: 600px;
                      background-repeat: no-repeat center;
                      background-size: 100% 100%;">  
                    </div>
                  </a>
                </div>
            </div>
            <!-- Main Container End -->
         </section>
         <!-- Main Section -->
         <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1><span class="heading-color"> Featured</span> Products</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Features products from our corporate clients.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <div class="featured-slider owl-carousel owl-theme">
                           <?php
                              foreach ($feature as $featureParse ) {
                                  $this->load->view('home/featureItem', $featureParse); 
                               } 
                               $feature = '';
                            ?>
                        </div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1><span class="heading-color"> Popular </span>Products</h1>
                        <!-- Short Description -->
                        <!--<p class="heading-text">Latest Item On Sale You Won’t Want to Miss.</p>-->
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <ul class="list-unstyled">
                        <!-- Listing Grid -->
                        <?php
                          foreach ($latestProduct as $latestParse) {
                            if ( !isset($latestParse['images']) ) $latestParse['images'] = '';
                            $this->load->view('home/latestItem', $latestParse);
                          }
                          $latestProduct = '';
                        ?>
                     </ul>
                     <!-- <div class="text-center">
                        <ul class="pagination ">
                           <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                           <li><a href="#">1</a></li>
                           <li class="active"><a href="#">2</a></li>
                           <li><a href="#">...</a></li>
                           <li><a href="#">10</a></li>
                           <li><a href="#">20</a></li>
                           <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                     </div> -->
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
         <?php /*
         <!-- =-=-=-=-=-=-= Featured Ad Parallex =-=-=-=-=-=-= -->
         <section class="parallex bg-3 featured-ads">
            <div class="container">
               <!-- Container -->
               <div class="container">
                  <div class="col-md-8 col-sm-6 no-padding">
                     <div class="app-text-section">
                        <h5>Featured Sale</h5>
                        <h3>Get more exposure </h3>
                        <ul>
                           <li>Your promotion will reach large number of people</li>
                           <li>Find customer nearby</li>
                           <li>List your item as priority  !</li>
                           <li>Easy access to post your sales !</li>
                        </ul>
                        <button class="btn btn-lg btn-theme"> Subscribe now <i class="fa fa-refresh"></i> </button>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 no-padding">
                     <div class="pricing-fancy ">
                        <div class="icon-bg"><i class="flaticon-money-2"></i></div>
                        <h3><strong>Featured</strong> <span class="thin">Sale</span></h3>
                        <div class="price-box">
                           <div class="price-large"> <span class="dollartext">$</span>60<span class="monthtext">/month</span> </div>
                           <p>Regulary <del>$ 2.00</del></p>
                           <a href="#" class="btn btn-lg btn-theme">Submit your Sale</a> 
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container /- -->
            </div>
         </section>
        /* 
         <!-- =-=-=-=-=-=-= Featured Ad Parallex End =-=-=-=-=-=-= -->
         <?php /*
         <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1> <span class="heading-color"> More</span> Products</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Find Out More Item On Sale, you may also like.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
					<!-- Row -->
						   <div class="row">
							  <!-- Middle Content Box -->
							  <div class="col-md-12 col-xs-12 col-sm-12">
								 <div class="row">
                    <?php 
                      $belowmiddle  = $this->common->getBannersArray('5');
                      foreach ($belowmiddle as $key => $value) {  
                    ?>
                      <div class="col-xs-6 col-sm-3 client-2">
                         <a href="#"><img src="<?php echo LOCALADMINURL.$value['image_url'] ?>" alt="" ></a>
                      </div>
                    <?php }?>
								 </div>
							  </div>
							  <!-- Middle Content Box End -->
						   </div>
						   <!-- Row End -->
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section> */ ?>
         <!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= App Download Section =-=-=-=-=-=-= -->   
        <!--  <div class="app-download-section style-2">
           app-download-section-wrapper
           <div class="app-download-section-wrapper">
              app-download-section-container
              <div class="app-download-section-container">
                 container
                 <div class="container">
                    row
                    <div class="row">
                       <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="mobile-image-content"> <img src="assets/images/hand.png" alt=""> </div>
                       </div>
                       <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="app-text-section">
                             <h5>For every challenge, there's an IT solution</h5>
                             <h3>Software :</h3>
                             <ul>
                                <li>Acounting System</li>
                                <li>Inventory Management System</li>
                                <li>Loan System</li>
                                <li>Maintenance Management System</li>
                                <li>Project Management System</li>
                         <li>Website and Web Database-driven Application</li>
                             </ul>
                        
                             <div class="app-download-btn">
                                <div class="row">
                                  <?php /*
                          <div class="col-md-6 col-sm-12 col-xs-12">
                                      Windows Store
                                      <a href="#" title="Windows Store" class="btn app-download-button">
                                      <span class="app-store-btn">
                                      <i class="fa fa-phone"></i>
                                      <span>
                                      <span>&nbsp;</span>
                                      <span>Contact Us </span>
                                      </span>
                                      </span>
                                      </a>
                                      /Windows Store
                                   </div>
                        
                                   <div class="col-md-6 col-sm-12  col-xs-12">
                                      Windows Store
                                      <a href="#" title="Windows Store" class="btn app-download-button"> <span class="app-store-btn">
                                      <i class="fa fa-apple"></i>
                                      <span>
                                      <span>Download From</span> <span>Apple Store </span> </span>
                                      </span>
                                      </a>
                                      
                                   </div>
                          */ ?>
                                   Windows Store
                                </div>
                             </div>
                       
                          </div>
                       </div>
                    </div>
                    /row
                 </div>
                 /container
              </div>
              /app-download-section-container
           </div>
           /download-section-wrapper
        </div> -->
</html>
<?php $this->load->view("layouts/footer"); ?>
<?php $this->load->view("home/script"); ?>
