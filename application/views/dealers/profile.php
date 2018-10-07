<?php $this->load->view("layouts/header"); ?>
     <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                     <!-- Sidebar Widgets -->
               <?php  foreach ($info as $users): ?>
                  <?php include_once('menu.php'); ?>
                     <!-- Categories --> 
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <!-- Row -->
               <?php 
                  echo $this->session->flashdata('message');  
                  echo validation_errors(); 
                  echo (isset($error))? $error:'';
              ?>
                     <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                           <ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                              <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                              <li><a href="#settings" data-toggle="tab">Subscription</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="profile-edit tab-pane fade in active" id="profile">
                                 <h2 class="heading-md">Your Information.</h2>
                                 <p>Below are the information for your account.</p>
                                 <dl class="dl-horizontal">
                                    <dt><strong>Title </strong></dt>
                                    <dd>
                                       <?php echo $users->title; ?>
                                    </dd>
                                    <dt><strong>Your name </strong></dt>
                                    <dd>
                                       <?php echo $users->first_name.' '.$users->middle_name.' '.$users->last_name; ?>
                                    </dd>
                                    <dt><strong>Suffix </strong></dt>
                                    <dd>
                                       <?php echo $users->suffix; ?>
                                    </dd>
                                    <dt><strong>Email Address </strong></dt>
                                    <dd>
                                       <?php echo $users->email; ?>
                                    </dd>
                                    <dt><strong>Contact Number </strong></dt>
                                    <dd>
                                       <?php echo $users->contact; ?>
                                    </dd>
                                    <dt><strong>Address </strong></dt>
                                    <dd>
                                       <?php echo $users->address; ?>
                                    </dd>
                                    <dt><strong>City </strong></dt>
                                    <dd>
                                       <?php echo $users->address; ?>
                                    </dd>
                                    <dt><strong>States </strong></dt>
                                    <dd>
                                       <?php echo $this->common->getStatename($users->state); ?>
                                    </dd>
                                    <dt><strong>Zip Code </strong></dt>
                                    <dd>
                                       <?php echo $users->zip_code; ?>
                                    </dd>
                                    <dt><strong>Country </strong></dt>
                                    <dd>
                                       USA
                                    </dd>
                                    <dt><strong>Company Name </strong></dt>
                                    <dd>
                                      <?php echo $users->company_name; ?>
                                    </dd>
                                    <dt><strong>Job title </strong></dt>
                                    <dd>
                                       <?php echo $users->job_title; ?>
                                    </dd>
                                    <dt><strong>Username </strong></dt>
                                    <dd>
                                       <?php echo $users->username; ?>
                                    </dd>
                                 </dl>
                              </div>
                              <div class="profile-edit tab-pane fade" id="edit">
                                 <p>Update Your Account Information</p>
                                 <div class="clearfix"></div>
                                 <form action="<?php echo base_url('dealer/profile/updateinformation'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Firstname </label>
                                          <input type="text" name="firstname" class="form-control margin-bottom-20" value="<?php echo $users->first_name; ?>">
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Middle Name <span class="color-red">*</span></label>
                                          <input type="text" name="middlename" class="form-control margin-bottom-20" value="<?php echo $users->middle_name; ?>">
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Lastname <span class="color-red">*</span></label>
                                          <input type="text" name="lastname" class="form-control margin-bottom-20" value="<?php echo $users->last_name; ?>">
                                       </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Title </label>
                                          <input type="text" name="title" class="form-control margin-bottom-20" value="<?php echo $users->title; ?>">
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Suffix <span class="color-red">*</span></label>
                                          <input type="text" name="suffix" class="form-control margin-bottom-20" value="<?php echo $users->suffix; ?>">
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12">
                                          <label>Zip code <span class="color-red">*</span></label>
                                          <input type="text" name="zipcode" class="form-control margin-bottom-20" value="<?php echo $users->zip_code; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Address </label>
                                          <input type="text" name="address" class="form-control margin-bottom-20" value="<?php echo $users->address; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>City <span class="color-red">*</span></label>
                                          <input type="text" name="city" class="form-control margin-bottom-20" value="<?php echo $users->city; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Email </label>
                                          <input type="email" name="email" class="form-control margin-bottom-20" value="<?php echo $users->email; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Contact <span class="color-red">*</span></label>
                                          <input type="text" name="contact" class="form-control margin-bottom-20" value="<?php echo $users->contact; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                          <label>Country <span class="color-red">*</span></label>
                                          <select name="country" class="form-control">
                                          <?php  foreach ($countries as $country): ?>
                                             <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                          <?php endforeach; ?>
                                          </select>
                                       </div>
                                       <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                          <label>States <span class="color-red">*</span></label>
                                          <select name="state" class="form-control">
                                          <?php  foreach ($states as $state): ?>
                                             <option value="<?php echo $state->id; ?>" <?php echo ($state->id == $users->state)? "selected='selected'":''; ?>><?php echo $state->name; ?></option>
                                          <?php endforeach; ?>
                                          </select>
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Job title </label>
                                          <input type="text" name="jobtitle" class="form-control margin-bottom-20" value="<?php echo $users->job_title; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Web url <span class="color-red">*</span></label>
                                          <input type="text" name="webpage" class="form-control margin-bottom-20" value="<?php echo $users->web_url; ?>">
                                       </div>
                                    </div>
                                    <div class="row margin-bottom-20">
                                       <div class="form-group">
                                          <div class="col-md-9">
                                             <div class="input-group">
                                                <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                Browse… <input type="file" name="profile" id="imgInp">
                                                </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <img id="img-upload" class="img-responsive" src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="" />
                                          </div>
                                       </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                       <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                          <button type="submit" class="btn btn-theme btn-sm">Update My Info</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="profile-edit tab-pane fade" id="settings">
                                 <h2 class="heading-md">Manage your Subscriptions</h2>
                                 <p>Below are the subscription for your account.</p>
                                 <br>
                                 <form action="<?php echo base_url('dealer/profile/updatesubscription'); ?>" id="sky-form" class="sky-form" novalidate>
                                    <!--Checkout-Form-->
                                    <dl class="dl-horizontal">
                                       <dt><strong>Current Plan</strong></dt>
                                       <dd>
                                          <?php echo isset($mysubscriptions) ? $mysubscriptions:'' ?>
                                       </dd>
                                       <!--<dt><strong>Expiration Date </strong></dt>
                                       <dd>
                                          2nd January 2017
                                       </dd>-->
                                    </dl>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-12 margin-bottom-20">
                                          <label>Select Plan You Want To Change<span class="color-red">*</span></label>
                                          <select class="form-control" name="subscription">
                                             <?php  foreach ($subscriptions as $subscription): ?>
                                                <option value="<?php echo $subscription->id; ?>"><?php echo $subscription->name. ' - ' .$subscription->price; ?></option>
                                             <?php endforeach; ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-12 margin-bottom-20">
                                          <label>Payment Method<span class="color-red">*</span></label>
                                          <div class="skin-minimal">
                                             <ul class="list list-horizontal">
                                                <li>
                                                   <input type="radio" value="<?php echo BANK; ?>" name="pmethod" checked>
                                                   <label  for="bank"> Direct Bank Transfer</label>
                                                </li>
                                                <li>
                                                   <input type="radio" value="<?php echo PAYPAL; ?>" name="pmethod">
                                                   <label for="paypal">Paypal</label>
                                                </li>
                                                <li>
                                                   <input type="radio" value="<?php echo CARD; ?>" name="pmethod">
                                                   <label for="card">Credit Card</label>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <button class="btn btn-sm btn-default" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                    <!--End Checkout-Form-->
                                 </form>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter");?>