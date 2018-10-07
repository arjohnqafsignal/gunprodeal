<?php $this->load->view("layouts/header"); ?>
<!-- =-=-=-=-=-=-= How It Work =-=-=-=-=-=-= -->
<section class="section-padding white">
   <!-- Main Container -->
   <div class="container">
      <!-- Row -->
      <div class="row">
         <!-- Heading Area -->
         <div class="heading-panel">
            <div class="col-xs-12 col-md-12 col-sm-12 text-center">
               <!-- Main Title -->
               <h1>How It <span class="heading-color"> Works</span></h1>
               <!-- Short Description -->
               <p class="heading-text long-heading">
                  This is an online marketplace that strives to offer meaningful contents to Sportsmen and Firearm Enthusiasts community.  Gun Sale Finder offers each visitor a way to compare prices and stock availability in real time resulting in best deal possible for both buyers and sellers. </br>Sellers can post deals and see where they are rated among their peers. Buyers can see deals and rate them as per their preference.  In this way, an open and transparent communication is available for all concerns.  </br>We do not endorse the companies listed here. Rather it reflect the customers’ opinion on what they think and feel.
               </p>
            </div>
         </div>
         <!-- Middle Content Box -->
         <div class="col-xs-12 col-md-12 col-sm-12 ">
            <div class="row">
               <div class="how-it-work text-center">
                  <div class="how-it-work-icon"> <i class="flaticon-people"></i> </div>
                  <h4>Create Your Account</h4>
                  <p>
                     By having a dealer account you can Post ads, advertise your products and get Detailed Analysis on where you are in the market. Registered users have the right to provide their comments by rating each product or deals, participating in the forum and thereby affecting the status of the marketplace.
                  </p>
               </div>
               <div class="how-it-work text-center ">
                  <div class="how-it-work-icon"> <i class="flaticon-people-2"></i> </div>
                  <h4>Feed your Product</h4>
                  <p>
                     Get more sales by streaming your catalogue on our firearm marketplace. Stream your entire online store. Make your item searchable where motivated buyers gather.
                  </p>
                  <p>
                     To learn on how stream your products on our website. <a href="<?php echo base_url('api-guide'); ?>">Click here. </a>
                  </p>
               </div>
               <div class="how-it-work text-center">
                  <div class="how-it-work-icon "> <i class="flaticon-heart-1"></i> </div>
                  <h4>Done</h4>
                  <p>
                     Set back and reap the benefit of increase traffic. While we do the advertising gathering, all interested buyers, you can focus on providing your services on your best possible ways.
                  </p>
               </div>
            </div>
         </div>
         <!-- Middle Content Box End -->
      </div>
   </div>
      </br>
      <div class="row">
         <center>
               <a href="<?php echo base_url('dealer/subscribe'); ?>" class="btn btn-theme">Subscribe Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
         </center>
      </div>
      <!-- Row End -->
   </div>
   <!-- Main Container End -->
</section>
<!-- =-=-=-=-=-=-= How It Work End =-=-=-=-=-=-= -->

<?php $this->load->view("layouts/pagefooter");?>
<?php $this->load->view("registration/script");?>