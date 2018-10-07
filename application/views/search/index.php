<?php
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');
?>
<?php $this->load->view("layouts/header"); ?>
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
                     <!-- Row -->
                     <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                           <!-- Sorting Filters Breadcrumb -->
                           <div class="filter-brudcrums">
                              <?php 
                                    if (is_array($dealer)) 
                                       echo "Dealer: (<b>". $dealer['first_name'] ." ". $dealer['last_name'] ."</b>)";
                                 ?>
                              <span> 
                                 <br>Showing 
                                 <span class="showed"> <?= ($paginate["count"] > 0) ?  $paginate["offset"] : '0' ?> - <?=$paginate["limit"]?></span> of 
                                 <span class="showed"><?=$paginate["count"]?></span> results 
                                 
                                 <?php
                                 // var_dump($dealer);
                                 ?>
                              </span>
                              <div class="filter-brudcrums-sort">
                                 <ul>
                                    <li><span>Sort by:</span></li>
                                    <li class="active"><a id="updatedDate">Updated date</a></li>
                                    <li><a id="price">Price</a></li>
                                    <!-- <li><a href="new">New</a></li>
                                    <li><a href="used">Used</a></li>
                                    <li><a href="wa">Warranty</a></li> -->
                                 </ul>
                              </div>
                           </div>
                           <!-- Sorting Filters Breadcrumb End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->

                           <div class="posts-masonry">
                              <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
                                 <!-- Ads Listing -->
                                 <?php 
                                    foreach ($product as $key => $value) {
                                       $this->load->view('search/listItem', $value);
                                    }
                                 ?>
                                 <!-- Ads Listing -->                             
                              </div>
                           </div>

                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div> 
                        <div id="paginationDiv" class="col-md-12 col-xs-12 col-sm-12">
                            <?php 
                                echo ($paginate["pageLinks"]);
                            ?>
                        </div>
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
                  <!-- Left Sidebar -->
                  <div class="col-md-4 col-md-pull-8 col-sx-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <form id="formFilter" method="post"><!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Categories Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingOne">
                                 <!-- Title -->
                                 <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Categories
                                    </a>
                                 </h4>
                                 <!-- Title End -->
                              </div>
                              <!-- Content -->
                              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body categories skin-minimal">
                                    <ul id="ulCategories" class="" >
                                       <li>
                                          <a> <input type="radio" class="category-checkbox " name="categories" value=""> All </a>
                                       </li>
                                       <?php 
                                          foreach ($category as $key => $value) {
                                             echo   "<li>
                                                <a  >
                                                   <input type='radio'
                                                   class='category-checkbox catCode'
                                                   name='categories'
                                                   value='".$value["category_code"]."'
                                                   data-catCode='".$value["category_code"]."'>
                                                   ".$value["name"]."
                                                   <span>(".$value["count_product"].")</span>
                                                </a>
                                                </li>";
                                          }
                                       ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Categories Panel End --> 
                           <!-- Condition Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingThree">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Type
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                 <div class="panel-body categories skin-minimal">
                                    <ul id="ulCategories" class="" >
                                       <li>
                                          <a> <input type="radio" class=" notIncluded" name="subCategories" value=""> All </a>
                                       </li>
                                       <?php 
                                          foreach ($category as $cat) {
                                             if (isset($cat['subMenu']) ) {
                                                foreach ($cat['subMenu'] as $subCat) {
                                                   if ($subCat['count_product'] > 0) {
                                                      echo   "<li>
                                                      <a>
                                                         <input type='radio'
                                                         class='category-checkbox subCatCode'
                                                         name='subCategories'
                                                         value='".$subCat["sub_category_code"]."'
                                                         data-catCode='".$cat["category_code"]."' 
                                                         data-catSubCode='".$subCat["sub_category_code"]."'> 
                                                         ".$subCat["list_name"]."
                                                         <span>(".$subCat["count_product"].")</span>
                                                      </a>
                                                      </li>";
                                                   }
                                                }
                                             }

                                          }
                                       ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Condition Panel End -->  
                           <!-- Condition Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingFour">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Brand
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                                 <div class="panel-body categories skin-minimal">
                                    <div class="widget-content">
                                        <select class=" form-control" name="brand" id="brand">
                                            <option label="Select Option"></option>
                                            <?php 
                                                foreach ($brand as $parseBrand) {
                                                    if (isset($parseBrand['id']) ) 
                                                        echo '<option value="'.$parseBrand["id"].'"> '.$parseBrand["name"].' </option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Condition Panel End -->  
                           <!-- Pricing Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingfour">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Price
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapsefour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingfour">
                                 <div class="panel-body">
                                    <span class="price-slider-value">Price ($) <span id="price-min"><?=$priceMin?></span> - <span id="price-max"><?=$priceMax?></span></span>
                                    <div id="price-slider"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingfive">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Filter
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingfive">
                                 <div class="recent-ads-container">
                                    <center>
                                       <button id="applyFilter" class="btn btn-success btn-sm margin-bottom-10" type="button">Apply</button>
                                    </center>
                                 </div>
                              </div>
                           </div>
                        </form>
                           <!-- Pricing Panel End -->
                           <!-- Featured Ads Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" >
                                 <h4 class="panel-title">
                                    <a>
                                    Featured Products
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div class="panel-collapse">
                                 <div class="panel-body recent-ads">
                                    <div class="featured-slider-3">
                                       <!-- Featured Ads -->
                                       <?php 
                                            $feature = $this->product->featureProducts('30');
                                            foreach ($feature as $parseFeature) {
                                                $this->load->view('search/feature', $parseFeature);
                                            }
                                            $feature = '';
                                       ?>
                                        <!-- Featured Ads -->
                                    </div>
                                 </div>
                              </div>
                           <!-- Featured Ads Panel End -->
                           <!-- Latest Ads Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" >
                                 <h4 class="panel-title">
                                    <a>
                                    Compare List 
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div class="panel-collapse">
                                 <div class="panel-body recent-ads">
                                    <!-- Ads -->
                                    <?php 
                                       if (is_array($compareList)) {
                                          foreach ($compareList as $key => $value) {
                                             $this->load->view('search/compareList', $value);
                                          }
                                       }
                                    ?>
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <center>
                                             <button id="compareNow" class="btn btn-success btn-sm margin-bottom-10" type="button">Compare now</button>
                                          </center>
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Latest Ads Panel End -->
                        </div>
                        <!-- panel-group end -->
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Left Sidebar End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
<?php $this->load->view("layouts/pagefooter"); ?>
<?php $this->load->view("search/script");?>