<?php $this->load->view("layouts/header"); ?>

<div class="container">
   <!-- Row -->
   <div class="row">
      <!-- Middle Content Area -->
      <div class="col-md-5 col-md-push-7 col-sm-12 col-xs-12">
         <!--  Form -->
         <div class="form-grid">

         <!-- <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>   
            
         </div> -->
         <form method="POST" action="<?php echo base_url('registration/saveregistration'); ?>">

            <?php
                 echo $this->session->flashdata('message'); 
                 echo validation_errors(); 
           ?>
            <div class="form-group">
               <div class="skin-minimal">
                  <ul class="list list-horizontal">
                     <li>
                        <input tabindex="7" type="radio" id="user-radio" name="minimal-radio" checked>
                        <label  for="minimal-radio-1">Register as user </label>
                     </li>
                     <li>
                        <input tabindex="8" type="radio" id="dealer-radio" name="minimal-radio">
                        <label for="minimal-radio-2">Register as dealer</label>
                     </li>
                  </ul>
               </div>
            </div>

            <div class="form-group">
               <label for="name">Name</label>
               <input id="name" type="text" class="form-control " name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter your given name here" required>
            </div>

            <div class="form-group">
               <label for="contact-number">Contact Number</label>
               <input id="contact" type="text" class="form-control" name="contact" value="<?php echo set_value('contact'); ?>" placeholder="Enter your contact number here" required>
            </div>

            <div class="form-group">
               <label for="email">Email</label>
               <input id="email" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Your e-mail here" required>
            </div>

            <div class="form-group">
               <label for="password">Password</label>
               <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password here" required>
            </div>

            <div class="form-group">
               <label for="password-confirm">Confirm Password</label>
               <input id="password-confirm" type="password" class="form-control" name="confirm" required>
            </div>

      <!--<div class="form-group">
         <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }} "></div>
      </div>-->

      <div class="form-group">
         <div class="row">
            <div class="col-xs-12 col-sm-7">
               <div class="skin-minimal">
                  <ul class="list">
                     <li>
                        <input name="accept_terms"  type="checkbox" id="minimal-checkbox-1">
                        <label for="minimal-checkbox-1">I agree <a href="<?php echo base_url('term-and-condition'); ?>" target="_blank">Term and Condition</a></label>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-xs-12 col-sm-5 text-right">
               <p class="help-block"><a data-target="#myModal" data-toggle="modal">Forgot password?</a>
               </p>
            </div>
         </div>
      </div>
      <!-- <button class="btn btn-theme btn-lg btn-block">Register</button> -->
      <input type="submit" class="btn btn-theme btn-lg btn-block" id="btnSubmit" name="btnSubmit" value="Register" />
   </form>
</div>
<!-- Form -->
</div>

<div class="col-md-7  col-md-pull-5  col-sm-12 col-xs-12">
   <div class="heading-panel">
      <h3 class="main-title text-left">
         Create Your Account  
      </h3>
   </div>
   <div class="content-info">
      <div class="features">
         <div class="features-icons">
            <img src="<?php echo base_url(); ?>assets/images/icons/chat.png" alt="img">
         </div>
         <div class="features-text">
            <h3>Register as Dealer</h3>
            <p>
               By having a dealer account you can Post ads, advertise your products and get Detailed Analysis on where you are in the market.  
            </p>
         </div>
      </div>
      <div class="features">
         <div class="features-icons">
            <img src="<?php echo base_url(); ?>assets/images/icons/panel.png" alt="img">
         </div>
         <div class="features-text">
            <h3>Register as User</h3>
            <p>
               Users have the right to provide their comments by rating each product or deals, participating in the forum and thereby affecting the status of the marketplace.
            </p>
         </div>
      </div>
      <div class="features content-hide">
         <div class="features-icons">
            <img src="<?php echo base_url(); ?>assets/images/icons/history.png" alt="img">
         </div>
         <div class="features-text">
            <h3>Track History</h3>
            <p>
               Track the status of your gun history.
            </p>
         </div>
      </div>
      <div class="features content-hide">
         <div class="features-icons">
            <img src="<?php echo base_url(); ?>assets/images/icons/featured-listing.png" alt="img">
         </div>
         <div class="features-text">
            <h3>features Listing</h3>
            <p>
               Get more value from your gun.
            </p>
         </div>
      </div>
      <span class="arrowsign hidden-sm hidden-xs"><img src="<?php echo base_url(); ?>assets/images/arrow.png" alt=""></span>
   </div>
</div>
<!-- Middle Content Area  End -->
</div>
<!-- Row End -->
</div>
<!-- Forget Password -->
<div class="custom-modal">
   <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header rte">
               <h2 class="modal-title">Forgot Your Password ?</h2>
            </div>
            <form>
               <div class="modal-body">
                  <div class="form-group">
                     <label>Email</label>
                     <input placeholder="Enter Your Email Adress" class="form-control" type="email">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default">Reset My Account</button>
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</br>
<?php $this->load->view("layouts/pagefooter");?>
<!--<?php //$this->load->view("registration/script");?>-->