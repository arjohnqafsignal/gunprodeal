<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url('eshop'); ?>">Home</a></li>
                  <li><a href="<?php echo base_url('dealer-post'); ?>">Post Ads</a></li>
                  <li><a class="active" href="#">My Cart</a></li>
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
            <form action="<?php echo base_url('dealer/post/purchasenow'); ?>" method="post">
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
                                 <span class="pull-left">My Cart</span>
                              </a>
                              </li>
                              <!--<li><a href="#settings" data-toggle="tab">Notification Settings</a></li>-->
                           </ul>

                           <div class="profile-edit tab-pane fade active in" id="payment">
                           <?php $cart_check = $this->cart->contents(); 

                              $i =1 ;
                              $grand_total = 0;

                              if(empty($cart_check)) {
                                 echo 'Your cart is empty';
                              } 
                           ?>
                           <?php if ($cart = $this->cart->contents()): ?>
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Location</th>
                                       <th scope="col">Size</th>
                                       <th scope="col">Price</th>
                                       <th scope="col">Qty</th>
                                       <th scope="col">Subtotal</th>
                                       <th scope="col"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                              <?php foreach ($cart as $item): ?>
                                  <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['size']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $item['qty']; ?></td>
                                    <td><?php echo $item['subtotal']; ?></td>
                                    <td>
                                       
                                       <a href="<?php echo base_url('dealer/post/remove/'.$item['rowid']);?>"> <i class="fa fa-close" style="font-size:24px"></i>  
                                       </a>
                                    </td>
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
                              <h4 class="panel-title"><a>Order Summary </a></h4>
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
                                       <input name="total" type="hidden" value="<?php echo $total; ?>">
                                    </dd>
                                 </dl>

                              <center>
                                    <!--<a href="<?php //echo base_url('eshop/cart/ordernow') ; ?>" class="btn btn-light btn-purchase-now"> Purchase  Now!  </a>-->
                                    <button type="submit" class="btn btn-light btn-purchase-now">Purchase  Now</button>
                                    <a href="<?php echo base_url('dealer-post') ; ?>" class="btn btn-light btn-purchase-now"> Add more!  </a>
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
