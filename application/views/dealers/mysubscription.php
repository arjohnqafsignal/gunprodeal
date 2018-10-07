<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a href="<?php echo base_url('subscription/select'); ?>">Subscriptions</a></li>
                  <li><a class="active" href="#">Select Subscription</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
            <form action="<?php echo base_url('dealer/subscription/subscribenow'); ?>" method="post">
               <div class="row">
				  <?php 
					echo $this->session->flashdata('message');  
					echo validation_errors(); 
					echo (isset($error))?$error:'';
				  ?>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <!-- Row -->
                     <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                           <ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">
                                 <span class="pull-left">My Subcriptions</span>
                              </a>
                              </li>
                              <!--<li><a href="#settings" data-toggle="tab">Notification Settings</a></li>-->
                           </ul>

                           <div class="profile-edit tab-pane fade active in" id="payment">
                           <?php $cart_check = $this->cart->contents(); 

                              $i =1 ;
                              $grand_total = 0;

                              if(empty($cart_check)) {
                                 echo 'Your subcriptions is empty';
                              } 
                           ?>
                           <?php if ($cart = $this->cart->contents()): ?>
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">Price</th>
                                       <th scope="col">Subtotal</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php foreach ($cart as $item): ?>
                                  <tr>
                                    <th scope="row">
                                       <?php echo $i++; ?>
                                       <input type="hidden" value="<?php echo $item['id']; ?>" name="subcription">
                                    </th>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['description']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $item['subtotal']; ?></td>
                                  </tr>
                                  <?php $grand_total = $grand_total + $item['subtotal']; ?>
                              <?php endforeach; ?>
                                </tbody>
                              </table>
                           <?php endif; ?>
                        
                        <section class="section-padding">
                           <!-- Featured Ad  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Payment Method </a></h4>
                           </div>
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
                        </section>

                           </div>
                           </div>
                        </div>
                     </div>

               <?php if(!empty($cart_check)) : ?>
                  <!-- Middle Content Area -->
                  <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                     <!-- Sidebar Widgets -->
                     <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Summary </a></h4>
                           </div>

                           <div class="widget-content">
                              
                                 <dl class="dl-horizontal pull-left">
                                    <dt class="pull-summary"><strong>Sub Total: </strong></dt>
                                    <dd>
                                       <?php echo number_format($grand_total, 2); ?>
                                    </dd>
                                    <dt class="pull-summary"><strong>Total: </strong></dt>
                                    <dd>
                                       <?php 
                                       $total = number_format($grand_total + SERVICEFEE, 2);
                                       echo $total;
                                        ?>
                                       <input name="userid" type="hidden" value="<?php echo $userid; ?>">
                                    </dd>
                                 </dl>

                              <center>
                                    <button type="submit" class="btn btn-light btn-purchase-now">Purchase  Now</button>
                                    <a href="<?php echo base_url('dealer/subscription/select/'.$userid) ; ?>" class="btn btn-light btn-purchase-now"> Change Subscription  </a>
                              </center>
                           </div>
                        </div>
                  </div>
               <?php endif; ?>
                     <!-- Row End -->
                  </div>
               </form>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
 <?php $this->load->view("layouts/pagefooter"); ?>
