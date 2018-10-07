  <footer class="footer-area no-bg">
  <!--Footer Upper-->
  <div class="footer-content">
     <div class="container">
       <div class="row clearfix">
         <!--Two 4th column-->
         <div class="col-md-6 col-sm-12 col-xs-12">
           <div class="row clearfix">
              <div class="col-lg-7 col-sm-6 col-xs-12 column">
                <div class="footer-widget about-widget">
                  <div class="logo">
                    <a href="index.html"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/images/header/gunpro-header.png"></a>
                  </div>
                  <div class="text">
                    <!--<p>Find guns in America!</p>-->
                    <br>
                  </div>
                  <ul class="contact-info">
                    <!--<li><span class="icon fa fa-map-marker"></span> 60 Link Road Lhr. NY USA 54770</li>-->
                    <!--<li><span class="icon fa fa-phone"></span> (042) 1234567890</li>-->
                    <li><span class="icon fa fa-envelope-o"></span> sales@gunsalefinder.com</li>
                    <li><span class="icon fa fa-envelope-o"></span> support@gunsalefinder.com</li>
                    <!-- <li><span class="icon fa fa-fax"></span> (042) 1234 7777</li> -->
                  </ul>
                  <div class="social-links-two clearfix"> 
                    <a class="facebook img-circle" href="#"><span class="fa fa-facebook-f"></span></a>
                    <a class="twitter img-circle" href="https://twitter.com/intent/tweet?url=http://www.gunsalefinder.com/&text=Check%20out,%20this%20site.&via=gunsalefinder" target="_blank"><span class="fa fa-twitter"></span></a>
                    <a class="google-plus img-circle" href="https://plus.google.com/share?url=http://www.gunsalefinder.com" target="_blank"><span class="fa fa-google-plus"></span></a>
                    <!--<a class="linkedin img-circle" href="https://www.linkedin.com/shareArticle?mini=true&url=http://www.gunsalefinder.com ?>" target="_blank"><span class="fa fa-pinterest-p"></span></a>-->
                    <a class="linkedin img-circle" href="https://www.linkedin.com/shareArticle?mini=true&url=http://www.gunsalefinder.com ?>"><span class="fa fa-linkedin"></span></a> 
                  </div>
                </div>
              </div>
              <!--Footer Column-->
              <div class="col-lg-5 col-sm-6 col-xs-12 column">
                <div class="heading-panel">
                  <h3 class="main-title text-left">Information</h3>
                </div>
                <div class="footer-widget links-widget">
                  <ul>
                    <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('pricing'); ?>">Pricing</a></li>
                    <li><a href="<?php echo base_url('term-and-condition'); ?>">Term and Condition</a></li>
                    <li>
                      <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('commentspolicy'); ?>">Comments Policy</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
           </div>
         </div>
         <!--Two 4th column End-->
         <!--Two 4th column-->
         <div class="col-md-6 col-sm-12 col-xs-12">
           <div class="row clearfix">
              <!--Footer Column-->
              <div class="col-lg-7 col-sm-6 col-xs-12 column">
                <div class="footer-widget news-widget">
                  <div class="heading-panel">
                    <h3 class="main-title text-left"> Latest Promotions</h3>
                  </div>
                  <!--News Post-->
                  <?php 
                        $footers = $this->common->getBannersArray("6");
                        foreach ($footers as $key => $footer) {
                  ?>
                  <div class="news-post">
                    <div class="icon"></div>
                    <?php if($key == 0){?>
                      <div class="news-content">
                        <figure class="image-thumb"><img alt="" src="<?php echo LOCALADMINURL.$footer['image_url'];?>"></figure>
                        <a href="<?php echo base_url('promotion/learnmore'); ?>">
                          Points For Every Share
                        </a>
                      </div>
                    <div class="time">July 31, 2018</div>
                    <?php } else {?>
                      <div class="news-content">
                         <figure class="image-thumb"><img alt="" src="<?php echo LOCALADMINURL.$footer['image_url']?>"></figure>
                         <a href="#">WIN A Colt Cobra! Drawing July 31st!</a>
                      </div>
                      <div class="time">August 1, 2018</div>
                    <?php }?>
                  </div>
                  <?php }?>
                </div>
              </div>
              <!--Footer Column-->
              <div class="col-lg-5 col-sm-6 col-xs-12 column">
                <div class="footer-widget links-widget">
                  <div class="heading-panel">
                    <h3 class="main-title text-left"> Help</h3>
                  </div>
                  <ul>
                    <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url('api-guide'); ?>">API Guide</a></li>
                    <li><a href="<?php echo base_url('faqs'); ?>">FAQS</a></li>
                    <li><a href="<?php echo base_url('dealer/dashboard'); ?>">Subscribe</a></li>
                  </ul>
                </div>
              </div>
           </div>
         </div>
         <!--Two 4th column End-->
       </div>
     </div>
  </div>
  <!--Footer Bottom-->
  <div class="footer-copyright">
     <div class="container clearfix">
       <!--Copyright-->
       <div class="copyright text-center">© 2018 Gun Sale Finder All rights reserved. All Rights Reserved</div>
     </div>
  </div>
  </footer>
<?php include_once('scripts.php'); ?>
