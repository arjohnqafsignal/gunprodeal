﻿<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Select Subcriptions</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray content-section">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form extra-padding postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Select Subcriptions
                           </h3>
                        </div>
                        <!--<p class="lead">Banner Store where dealers can purchase their ads placement:</p>-->
                        <form  class="submit-form">
                           <!-- Select Package  -->
                           <div class="select-package">
                              	<div class="no-padding col-md-12 col-lg-12 col-xs-12 col-sm-12">
                              <?php  foreach ($subscriptions as $subs): ?>
                                 <div class="pricing-list">
                                    <div class="row">
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                       <h3><?php echo $subs->name; ?>   
                                       </h3>
                                          <p>
                                             <?php echo $subs->description; ?>
                                          </p>
                                       </div>
                                       <!-- end col -->
                                       <div class="col-md-3 col-sm-3 col-xs-12">
                                          <div class="pricing-list-price text-center">
                                             <h4>$ <?php echo $subs->price; ?></h4>
                                             <a href="<?php echo base_url('dealer/subscription/selectpackage/'.$subs->id);?>" class="btn btn-theme btn-sm btn-block">Select</a>
                                          </div>
                                       </div>
                                       <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                 </div>
                              <?php endforeach; ?>


                              </div>
                           </div>   
                           <!-- end row -->
                        </form>
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
 <?php $this->load->view("layouts/pagefooter"); ?>