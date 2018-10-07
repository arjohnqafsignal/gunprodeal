<?php
  ob_start();
  echo "<!DOCTYPE html>\n";
    include ("layouts/header.php");
  ob_end_flush();
?>
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Reset Password</a></li>
               </ul>
            </div>
         </div>
      </div>
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
						?>
                        <form action="<?php echo base_url('login/saverecoverpassword'); ?>" method="post">
                           <div class="form-group">
                              <label>New Password</label>
                              <input name="userid" value="<?php echo $userid; ?>" type="hidden">
                              <input placeholder="New Password" name="newpassword" class="form-control" type="password">
                           </div>
                           <div class="form-group">
                              <label>Reenter Password</label>
                              <input placeholder="Reenter Password" name="repeat" class="form-control" type="password">
                           </div>
                           <button class="btn btn-theme btn-lg btn-block">Reset my Password</button>
                        </form>
                     </div>
                     <!-- Form -->
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
        <?php include_once('layouts/pagefooter.php'); ?>
    