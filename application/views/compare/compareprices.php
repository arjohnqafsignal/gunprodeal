<?php $this->load->view("layouts/header"); ?>
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Price Comparison</a></li>
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
                  <div class="col-md-12 col-xs-12 col-sm-12">
                  <section class="search-result-item">
                     <div class="heading-panel">
                           <h3 class="main-title text-left">
                              <?php echo isset($product)? $product : ''; ?>
                           </h3>
                     </div>
                    <div class="compare-prices">
                          <table class="table table-bordered table-display">
                            <thead class="black-white-text">
                              <tr>
                                <th>Compare Prices</th>
                                <th>Image </th>
                                <th>Price</th>
                                <th>Shipping rate</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="black-text">
                            <?php  foreach ($results as $product): ?>
                              <tr>
                                <td><?php echo $this->common->getDealerCompanyName($product->dealer_id); ?></td>
                                <td><img src="<?=base_url(). 'assets/pictures/loading.gif'?>" class="loadingImage" data-image="<?=$product->image_url?>" width="300px" height="100px" alt=""></td>
                                <td><?php echo $product->price; ?></td>
                                <td><?php echo $product->shipping_fee; ?></td>
                                <td>
                                 <center>
                                    <a href="http://<?php echo $this->common->getDealerCompanyUrl($product->dealer_id) ?>" class="label label-danger" target="_blank">Contact Dealer</a>
                                 </center>
                                 </td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                    </div>
                  </section>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
         </section>
      <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
 <?php $this->load->view("layouts/pagefooter"); ?>