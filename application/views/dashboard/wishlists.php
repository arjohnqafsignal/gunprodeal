<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">My Products</a></li>
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
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                  <?php  foreach ($info as $users): ?>
                     <?php include_once('menu.php'); ?>
                  <?php endforeach; ?>
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <!-- Row -->
                     <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 heading">
                           <!-- Advertisement Panel -->
                           <div class="panel panel-default">
                              <div class="panel-heading" >
                                 <div class="col-md-4 col-sm-4 col-xs-4">
                                    <h4 class="panel-title">
                                       <a>
                                       My Wishlist
                                       </a>
                                    </h4>
                                 </div>
                                 <div class="col-md-8 col-sm-4 col-xs-4">
                                    <!--<div class="search-widget pull-right">
                                       <input placeholder="search" type="text">
                                       <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>-->
                                 </div>
                              </div>
                           </div>
                           <!-- Advertisement Panel End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
                              <!-- Ads Listing -->
                           <?php  foreach ($results as $product): ?>
                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-3 col-md-3 col-sm-3 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="#">
                                       <img src="<?php echo $product->image_url; ?>" alt="">
                                       </a>
                                    </div>
                                    <!-- Img Block -->   
                                 </div>
                                 <!-- Ads Listing -->    
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->     
                                 <div class="col-lg-9 col-md-9 col-sm-9 no-padding">
                                    <!-- Ad Desc -->     
                                    <div class="ad-archive-desc">
                                       <!-- Price -->    
                                       <div class="ad-price"><?php echo ($product->price != NULL)? '$'.number_format($product->price) :''; ?></div>
                                       <!-- Title -->    
                                       <h3><?php echo ucwords(strtolower($product->title)); ?></h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#"><?php echo $product->category_code; ?></a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <!-- Ad Features -->
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">
                                             Updated: <?php echo $this->common->timetoago($product->updated_at); ?> 
                                          </div>
                                          <div class="ad-meta">
                                             <a href="<?php echo base_url('product/viewProduct/'.$product->id); ?>" class="btn btn-success"><i class="fa fa-eye"></i> View Details
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->     
                                 </div>
                                 <!-- Content Block End --> 
                              </div>
                           <?php endforeach; ?>
                              <!-- Ads Listing -->
                           </div>
                        </div>
                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div>
                        <!-- Pagination -->  
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <!-- Pagination End -->   
                     </div>
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