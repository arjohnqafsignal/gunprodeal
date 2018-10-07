<?php $this->load->view("layouts/header"); ?>
 <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Pricing</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Pricing =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <!-- Pricing -->
                     <?php  foreach ($subscriptions as $subscription): ?>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                           <div class="pricing-item">
                              <div class="price"><small>$</small><?php echo abs($subscription->price); ?></div>
                              <strong><?php echo $subscription->name; ?> <span class="hidden-sm"><?php echo (abs($subscription->price) > 0) ? '' : '(Free)'; ?></span></strong>
                              <p><?php echo $subscription->description; ?></p>
                              <a href="<?php echo base_url('dealer-post'); ?>" class="btn btn-theme">Select Plan</a>
                           </div>
                        </div>
                     <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Pricing End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter");?>