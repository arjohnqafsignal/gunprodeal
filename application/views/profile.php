<?php
  ob_start();
  echo "<!DOCTYPE html>\n";
  include ("layouts/header.php");
  ob_end_flush();
?>
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
                              <li><a href="#settings" data-toggle="tab">Promotion</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="profile-edit tab-pane fade in active" id="profile">
                                 <h2 class="heading-md">Manage your Information.</h2>
                                 <p>Below are the information for your account.</p>
                                 <dl class="dl-horizontal">
                                    <dt><strong>Your name </strong></dt>
                                    <dd>
                                       <?php echo $users->name; ?>
                                    </dd>
                                    <dt><strong>Email Address </strong></dt>
                                    <dd>
                                       <?php echo $users->email; ?>
                                    </dd>
                                    <dt><strong>Contact Number </strong></dt>
                                    <dd>
                                       <?php echo $users->contact; ?>
                                    </dd>
                                    <dt><strong>States </strong></dt>
                                    <dd>
                                       <?php echo $this->common->getStatename($users->state); ?>
                                    </dd>
                                    <dt><strong>Country </strong></dt>
                                    <dd>

                                       USA
                                    </dd>
                                 </dl>
                              </div>
                              <div class="profile-edit tab-pane fade" id="edit">
                                 <h2 class="heading-md">Manage your Security Settings</h2>
                                 <p>Manage Your Account</p>
                                 <div class="clearfix"></div>
                                 <form action="<?php echo base_url('profile/updateinformation'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Your Name </label>
                                          <input type="text" name="name" class="form-control margin-bottom-20" value="<?php echo $users->name; ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Email Address <span class="color-red">*</span></label>
                                          <input type="text" name="email" class="form-control margin-bottom-20" value="<?php echo $users->email; ?>">
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">  
                                          <label>Contact Number <span class="color-red">*</span></label>
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
                                       <!--<div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Address <span class="color-red">*</span></label>
                                          <textarea class = "form-control margin-bottom-20" rows = "3"></textarea>
                                       </div>-->
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
                                 <h2 class="heading-md">Promotions</h2>
                                 <p>Select a promotions.</p>
                                 <br>
                                 <form>
                                    <div class="skin-minimal">

                     <ul class="accordion content-promotion">
                        <li class="">
                           <h3 class="accordion-title"><a href="#">Share the link on social media accounts</a></h3>
                           <div class="accordion-content">
                              <p>Share the link on social media accounts and got 1 pts on every account</p>
                              <p>
                                 <div class="widget socail-icons">
                                 <ul class="share-icons">
                                    <li>
                                       <a class="fb" href="https://facebook.com/sharer.php?u=gunsalefinder.com/promotion/facebook/<?php echo $userid; ?>" target="_blank">
                                       <i class="fa fa-facebook"></i>
                                       </a><span>Facebook</span>
                                    </li>
                                    <li>
                                       <a class="twitter" href="https://twitter.com/intent/tweet?url=http://www.gunsalefinder.com/promotion/twitter/<?php echo $userid; ?>&text=Check%20out,%20this%20site.%20Tweet%20to%20earn%20a%20point%20every%20click.&via=gunsalefinder" target="_blank">
                                          <i class="fa fa-twitter"></i></a>
                                          <span>Twitter</span>
                                    </li>
                                    <li>
                                       <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=http://www.gunsalefinder.com/promotion/linkedin/<?php echo $userid; ?>" target="_blank">
                                          <i class="fa fa-linkedin"></i></a>
                                          <span>Linkedin</span>
                                    </li>
                                    <li><a class="googleplus" href="https://plus.google.com/share?url=http://www.gunsalefinder.com/promotion/googleplus/<?php echo $userid; ?>" target="_blank"><i class="fa fa-google-plus"></i></a><span>Google+</span></li>
                                 </ul>
                              </div>
                              </p>
                           </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a href="#">Email the link to your friend</a></h3>
                           <div class="accordion-content">
                              <p>Email the link to your friend and get 1 pt on every unique email ID</p>
                              <p>
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <div id="shareemailmsg"></div>
                                 <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                                    <input type="email" class="form-control margin-bottom-20" placeholder="Enter email of your friend" id="shareemail">
                                 </div>
                                 <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                    <button type="button" class="btn btn-light" id="shareemailbtn">Share Now</button>
                                 </div>
                              </div>
                              </p>
                           </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a href="#">Posting on blog or website</a></h3>
                           <div class="accordion-content">
                              <p>
                                 Posting on blog or website and get 1 pt on every unique IP address.
                              </p>
                              <p>
                                 <input type="text" class="form-control margin-bottom-20" value="<?php echo base_url('promotion/shareblog/').$userid;?>">
                              </p>
                           </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a href="#">Leave a comment on  a product or deal</a></h3>
                           <div class="accordion-content">
                              <p>
                                 Leave a comment on  a product or deal and get 1 pt on every comment.
                                 <a href="<?php echo base_url('search');?>">Start Now</a>
                                 
                              </p>
                           </div>
                        </li>
                        <li>
                           <h3 class="accordion-title"><a href="#">A friend access the website through the referral link you share</a></h3>
                           <div class="accordion-content">
                              <p>Share referral link and got 1 pts on every account</p>
                              <p>
                                <input type="text" class="form-control margin-bottom-20" value="<?php echo base_url('promotion/referrallink/').$userid;?>">
                              </p>
                           </div>
                        </li>
                     </ul>
                  </div>
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
<?php include_once('layouts/pagefooter.php'); ?>
<script type="text/javascript">
$( document ).ready(function() {

   $(document).on('click', '#shareemailbtn', function() {
      
      var email = $('#shareemail').val();
      if (email != '') { 
         //POST
         $.post( "<?php echo base_url(); ?>/promotion/shareemail", { email: email })
           .done(function( data ) {
            $( "#shareemailmsg" ).html( data );
         });
         //POST
      }else{
         $( "#shareemailmsg" ).html( "<p>Invalid Email Address</p>" );
      }
   })

});
</script>