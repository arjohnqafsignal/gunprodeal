<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="">
                           <h2 >Send a Message</h2>
                           <?php echo $this->session->flashdata('message');  ?>
                           <form action="<?php echo base_url('contact/savecontact'); ?>" method="post">
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" placeholder="Name" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="email" placeholder="Email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <textarea cols="12" rows="7" placeholder="Message..." id="message" name="message" class="form-control" required></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-theme" type="submit">Send Message</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="contactInfo">
                           <h2>Contact Info</h2>
                           <!--<div class="singleContadds">
                              <i class="fa fa-map-marker"></i>
                              <p>
                                 Model Town Link Road Lahore, 60 Street. Pakistan 54770
                              </p>
                           </div>-->
                           <div class="singleContadds phone">
                              <i class="fa fa-envelope"></i>
                              <p>
                                 sales@gunsalefinder.com
                              </p>
                              <p>
                                 support@gunsalefinder.com
                              </p>
                           </div>
                           <!-- <div class="singleContadds">
                              <i class="fa fa-envelope"></i>
                              <a href="mailto:contact@gunsalefinder.com">sales@gunsalefinder.com</a>
                           </div> -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter"); ?>