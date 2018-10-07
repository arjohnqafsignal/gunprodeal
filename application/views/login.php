<?php $this->load->view("layouts/header"); ?>
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bg ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
                     <!--  Form -->
                     <div class="form-grid">
      						<?php
      							echo $this->session->flashdata('message'); 
      							echo validation_errors(); 
                           echo (isset($message)) ? $message : '';
                           $dealerLogin = $this->session->flashdata('dealer');
                           $dealer = false;
                           if(isset($dealerLogin))
                           {
                              $dealer = true;
                           }
                           if(isset($isDealer))
                           {
                              $dealer = true;
                           }
      						?>
                  <div class="card">
                        <ul class="nav nav-tabs" role="tablist">
                           <li role="presentation" <?php echo (!$dealer)? 'class="active"' : '' ;?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">User Login</a></li>
                           <li role="presentation" <?php echo ($dealer)? 'class="active"' : '' ;?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Dealer Login</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane <?php echo (!$dealer)? 'active' : '' ;?>" id="home">
                                 <form action="<?php echo base_url('login/checklogin'); ?>" method="post">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input placeholder="Your Email" name="email" class="form-control" type="email">
                                    </div>
                                    <div class="form-group">
                                       <label>Password</label>
                                       <input placeholder="Your Password" name="password" class="form-control" type="password">
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="skin-minimal">
                                                <ul class="list">
                                                   <li>
                                                      <label for="minimal-checkbox-1">
                                                         Don't have account ?
                                                         <a href="<?php echo base_url('registration'); ?>" class="content-dealer-login">Sign Up!</a>
                                                      </label>
                                                   </li>
                                                </ul>
                                          </div>
                                          <div class="col-xs-12 col-sm-5 text-right">
                                             <p class="help-block"><a data-target="#myModal" data-toggle="modal">Forgot password?</a></p>
                                          </div>
                                       </div>
                                    </div>
                                    <button class="btn btn-theme btn-lg btn-block">Login</button>
                                 </form>
                           </div>

                           <div role="tabpanel" class="tab-pane <?php echo ($dealer)? 'active' : '' ;?>" id="profile">
                              <form action="<?php echo base_url('dealer/login/checklogin'); ?>" method="post">
                                 <div class="form-group">
                                    <label>Username</label>
                                    <input placeholder="Your Username" name="username" class="form-control" type="text">
                                 </div>
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input placeholder="Your Password" name="password" class="form-control" type="password">
                                 </div>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="skin-minimal">
                                             <ul class="list">
                                                <li>
                                                   <label for="minimal-checkbox-1">
                                                      Don't have account ?
                                                      <a href="<?php echo base_url('dealer/subscribe'); ?>" class="content-dealer-login">Sign Up!</a>
                                                   </label>
                                                </li>
                                             </ul>
                                       </div>
                                       <div class="col-xs-12 col-sm-5 text-right">
                                          <p class="help-block"><a data-target="#myModal" data-toggle="modal">Forgot password?</a></p>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="btn btn-theme btn-lg btn-block">Login</button>
                              </form>
                           </div>
                        </div>
                  </div>



                  





                     </div>
                     <!-- Form -->
                  </div>
                  <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
                     <div class="heading-panel">
                        <h3 class="main-title text-left">
                           Signin to your account   
                        </h3>
                     </div>
                     <div class="content-info">
                        <div class="features">
                           <div class="features-icons">
                              <img src="<?php echo base_url(); ?>assets/images/icons/chat.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>Join Promotion</h3>
                              <p>
                                 Access your account and you can join to our exciting promotion.
                              </p>
                           </div>
                        </div>
                        <div class="features">
                           <div class="features-icons">
                              <img src="<?php echo base_url(); ?>assets/images/icons/panel.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>User Dashboard</h3>
                              <p>
                                 Maintain a wishlist by saving your favourite guns.
                              </p>
                           </div>
                        </div>
                        <span class="arrowsign hidden-sm hidden-xs"><img src="<?php echo base_url(); ?>assets/images/arrow.png" alt="" ></span>
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
		 <!-- Forget Password -->
		 <div class="custom-modal">
			 <div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
				   <!-- Modal content-->
				   <div class="modal-content">
					  <div class="modal-header rte">
						 <h2 class="modal-title">Forgot Your Password ?</h2>
					  </div>
					   <form action="<?php echo base_url('login/forgotpassword'); ?>" method="post">
						 <div class="modal-body">
							<div class="form-group">
							   <label>Email</label>
							   <input name="email" placeholder="Enter Your Email Adress" class="form-control" type="email">
							</div>
						 </div>
						 <div class="modal-footer">
							<button type="submit" class="btn btn-default">Reset My Account</button>
							<button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
						 </div>
					  </form>
				   </div>
				</div>
			 </div>
		 </div>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
 <?php $this->load->view("layouts/pagefooter"); ?>
    