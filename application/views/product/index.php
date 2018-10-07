<?php $this->load->view("layouts/header"); ?>
 <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Details</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <!-- Single Ad -->
                     <div class="single-ad">
                        <!-- Ad Slider -->
                        <div class="owl-carousel owl-theme single-details">
                           <!-- Slide -->
                           <!-- ..TODO BUG SLIDESHOW NOT WOKING FOR 1 PICTURE -->
                           <div class="item"><img class="loadingImage" data-image="<?=isset($image_url) ? $image_url : '' ?>" src="<?=$image_url?>" width="1000px" height="360px" alt=""></div>
                           <?php 
                              switch ($images) {
                                 case '':
                                    echo '<div class="item "><img class="loadingImage" src="'. base_url() .'assets/pictures/default.jpg" alt="" width="1000px" height="360px" ></div>';
                                    break;
                                 
                                 default:
                                     foreach ($images as $key => $value) {
                                        $image_url = base_url().'assets/pictures/loading.gif' ;
                                        echo 's<div class="item "><img class="loadingImage" data-image="'.$value["image_url"].'" src="'.$image_url.'" alt="" width="1000px" height="360px"></div>';
                                    }

                              }
                           ?>
                        </div>
                        <!-- Short Description  --> 
                        <div class="ad-box">
                           <div class="ad-title clearfix">
                              <h2><a href="#"> <?//$details[0]['title']?> </a> </h2>
                              <h2><a href="#"> <?=isset($title) ? $title : '' ?> </a> </h2>
                           </div>
                           <div class="short-features">
                              <!-- Heading Area -->
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Category</strong> :</span> <?=$CATEGORY_NAME?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Type</strong> :</span> <?=$SUB_CATEGORY_NAME?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Brand</strong> :</span> <?=$BRAND_NAME ?: 'N/A'?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>SKU</strong> :</span> <?=$sku?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <a data-upc="<?=$upc?>" class="compareUpc">
                                    <span><strong class="compareUpc" >UPC</strong>:</span> <?=$upc?> </a><br>
                                    <span class="label label-info"> Price Comparison </span>
                                  </a>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Date</strong> :</span> <?=timespan( strtotime($created_at) , time(), 2). ' ago'?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Price</strong> :</span> USD <?=$price?>
                              </div>
                           </div>
                          <?php if(isset($productinfo)) : ?>
                           <!-- Short Features  --> 
                           <div class="short-features">
                              <!-- Heading Area -->
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Caliber</strong> :</span> 
                                 <?php echo (isset($productinfo['caliber'])) ? $productinfo['caliber'] : '' ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Stock description</strong> :</span> <?php echo (isset($productinfo['stock_description'])) ? $productinfo['stock_description'] : '' ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Frame description</strong> :</span> <?php echo (isset($productinfo['frame_description'])) ? $productinfo['frame_description'] : '' ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Barrel</strong>:</span> 
                                 <?php echo (isset($productinfo['barrel'])) ? $productinfo['barrel'] : '' ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Capacity</strong> :</span> <?php echo (isset($productinfo['capacity'])) ? $productinfo['capacity'] : '' ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Weight</strong> :</span> 
                                 <?php echo (isset($productinfo['weight'])) ? $productinfo['weight'] : '' ?>
                              </div>
                           </div>
                           <!-- Short Features  --> 
                           <?php endif; ?>
                           <!-- Description of product -->
                           <div class="desc-points" >
                             <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Description 
                                 </h3>
                              </div>
                              <ul id="descriptionDiv">
                                 <?php
                                    if ( is_array($descriptions) && count($descriptions) > 0 )  {
                                       foreach ($descriptions as $key => $value) {
                                          echo '<li>'.$value['descriptions'].'</li>';
                                       }
                                    }
                                 ?>
                              </ul>
                           </div>
                           <!-- Related Image  --> 
                           <div class="ad-related-img">
                                <?php 
                                    $feature = $this->common->getPurchasedBanner('32');
                                    if($feature){ $feature = LOCALADMINURL.$feature; } else { $feature = '';}
                                ?>
                              <img src="<?php echo $feature ?>" alt="" class="img-responsive center-block">
                           </div>
                           <!-- Ad Specifications --> 
                           <div class="specification">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Rating
                                 </h3>
                              </div>


                              <div class="row rating-title-container">
                              <div class="col-xs-3">
                                <span class="rating-title"> <?= ($rateScale['ROUND']) ? $rateScale['ROUND'] : '0' ?> </span>
                                <span class="rating-title-sub">/5</span>
                                <br>
                                <?= ($rateScale['TOTAL_RATES'] != null ) ? $rateScale['TOTAL_RATES'] : '0' ?> Ratings
                              </div>

                              <div class="col-xs-9">
                              <ul class="list">
                                 <li>
                                    <div class="rating">
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <span class="rating-count">(<?=$rateScale['FIVE']?>)</span> 

                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <span class="rating-count">(<?=$rateScale['FOUR']?>)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <span class="rating-count">(<?=$rateScale['THREE']?>)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <span class="rating-count">(<?=$rateScale['TWO']?>)</span>
                                   </div>
                                </li>
                                <li >
                                  <div class="rating">
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <span class="rating-count">(<?=$rateScale['ONE']?>)</span>
                                   </div>
                                </li>
                                
                            </ul>
                              </div>
                                
                              </div>
                                 
                              
                              <!-- <p>
                                 samsung galaxy note 2 new condition with handsfree and charger urgent sale. with book pouch original 4g lte. 16 gb condition 10/10 andriod kitkat4.4.2
                              </p>
                              <p>
                                 Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof 
                              </p>
                              <p>
                                 Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                              </p>
                              <p>
                                 Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                              </p>
                              <p>
                                 Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof 
                              </p> -->
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-3 col-sm-3 col-xs-12">
                              <i class="fa fa-share-alt"></i> <span class="hidetext">Share</span>
                           </div>
                           <div data-target=".rate-product" data-toggle="modal" class="ad-box col-md-3 col-sm-3 col-xs-12">
                              <i class="fa fa-star active"></i> <span class="hidetext">Rate Product</span>
                           </div>
                           <div id="addtowishlist" class="ad-box col-md-3 col-sm-3 col-xs-12">
                              <i class="fa fa-plus"></i> <span class="hidetext">Add to Wishlists
                              </span>
                           </div>
                           <div  data-toggle="modal" data-target=".report-product" class="ad-box col-md-3 col-sm-3 col-xs-12">
                              <i class="fa fa-thumbs-down"></i> <span class="hidetext">Report
                              </span>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- =-=-=-=-=-=-= Comments Section =-=-=-=-=-=-= -->
                        <div class="comment-section ad-box">
                           <div class="heading-panel">
                              <h3 class="main-title text-left">
                                 Comments (<?php echo $comments['count']; ?>)
                              </h3>
                           </div>
                           <ol class="comment-list" id ="commentList" >
                              <!-- comment-list    -->
                                 <?php 
                                    if ( is_array($comments['data']) && count($comments['data']) > 0 )  {
                                       foreach ($comments['data'] as $key => $value) {
                                           $this->load->view('product/comments', $value);
                                       }
                                    }
                                 ?>
                              <!-- comment-list    -->
                           </ol>
                           <?php if ($comments['next'] == 'Y') :?>
                              <div align='center'><input type='button' value='Load More' id='loadMore' class='btn btn-theme btn-lg btn-block' /></div>
                           <?php endif ?>

                           <input type='hidden' id='product_id' value='<?=isset($id) ? $id : '' ?>' />
                           <input type='hidden' id='start' value='<?=isset($comments["start"]) ? $comments["start"] : '' ?>' />
                           
                           
                           <div class="heading-panel">
                              <h3 class="main-title text-left">
                                 leave your comment 
                              </h3>
                           </div>
                           <div class="commentform">
                              <form>
                                 <div class="row">
                                    <!-- <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label>Name <span class="required">*</span>
                                          </label>
                                          <input id="txtName" class="form-control" placeholder="" type="text">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label>Email <span class="required">*</span>
                                          </label>
                                          <input  id="txtEmail"class="form-control" placeholder="" type="email">
                                       </div>
                                    </div> -->
                                    <div class="col-md-12 col-sm-12">
                                       <div class="form-group">
                                          <label>Comment <span class="required">*</span>
                                          </label>
                                          <textarea id="txtComment" class="form-control" placeholder="" rows="8" cols="6"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 margin-top-20 clearfix">
                                       <button id='bntComments' type="button" class="btn btn-theme">Post Your Comment</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           
                        </div>
                        <!-- =-=-=-=-=-=-= Comments Section End =-=-=-=-=-=-= -->
                     </div>
                     <!-- Single Ad End --> 
                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                           <!-- Email Button trigger modal -->
                        <?php
                        $isDealer = $this->session->userdata('dealer_login');
                        $isDealer = false;
                        if(isset($isDealer) && $dealer['id'] == $this->session->userdata('id'))
                        { 
                          $isDealer = true;
                        }
                        if($isDealer):
                        ?>
                           <button class="btn-block btn-contact contactUpdate" data-toggle="modal" onclick="location.href='<?php echo base_url('dealer/postdeal/updatedeal/'.$id); ?>';" >Update Product</button>
                        <?php else: ?>
                           <button class="btn-block btn-contact contactMoney" data-toggle="modal" data-target=".price-quote" >Price Comparison</button>
                        <?php endif; ?>

                           <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote" >Contact Dealer</button>
                        </div>
                        <!-- Price info block -->   
                        <div class="ad-listing-price">
                           <p><?=$price?></p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="user-info-card">
                              <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                 <img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="">
                              </div>
                              <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                 <span class="user-name"><a class="hover-color" href="profile.html"><?=$dealer['first_name'].' '.$dealer['last_name']?> </a></span>
                                 <div class="item-date">
                                    <span class="ad-pub">Published on: 10 Dec 2017</span><br>
                                    <a href="<?=base_url()?>search/index/created_at/desc/0/0/<?=$dealer['id']?>/0/0" class="link">More Products</a>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="ad-listing-meta">
                              <ul>
                                 <!-- <li>Ad Id: <span class="color">4143</span></li> -->
                                 <!-- <li>Categories: <span class="color">Used Cars</span></li> -->
                                 <!-- <li>Visits: <span class="color">9</span></li> -->
                                 <li>Company Name: <span class="color"><?=$dealer['company_name']?></span></li>
                                 <li>Location: <span class="color"><?=$dealer['STATE_NAME']?>, <?=$dealer['city']?></span></li>
                                 <li>Website Dealer: 
                                  <span> <a href="http://<?=$dealer['web_url']?>" class="label label-danger" target="_blank" >Link</a> </span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- Featured Ads --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Featured Products</a></h4>
                           </div>
                           <div class="widget-content">
                              <div class="featured-slider-3">
                                 <!-- Featured Ads -->
                                 <?php 
                                    $feature = $this->product->featureProducts('31');
                                    foreach ($feature as $parseFeature) {
                                        $this->load->view('search/feature', $parseFeature);
                                    }
                                    $feature = '';
                                ?>
                                 <!-- Featured Ads -->
                              </div>
                           </div>
                        </div>
                        <!-- Recent Ads --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Related Products</a></h4>
                           </div>
                           <div class="widget-content recent-ads">
                              
                           <!-- Ads -->
                           <?php  foreach ($related as $rel): ?>
                              <div class="recent-ads-list">
                                 <div class="recent-ads-container">
                                    <div class="recent-ads-list-image">
                                       <a href="#" class="recent-ads-list-image-inner">
                                       <img src="<?=base_url().'assets/pictures/loading.gif' ?>" class="loadingImage" data-image="<?=$image_url?>"  alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#" class="viewProduct" data-id="<?php echo $rel->id; ?>">
                                             <?php echo $rel->title; ?>
                                          
                                          </a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#"><?php echo $this->common->getStatebyDealer($rel->dealer_id); ?></a>,</li>
                                          <li><a href="#">USA</a></li>
                                       </ul>
                                       <div class="recent-ads-list-price">
                                          $ <?php echo $rel->price; ?>
                                       </div>
                                       <!-- /.recent-ads-list-price -->
                                    </div>
                                    <!-- /.recent-ads-list-content -->
                                 </div>
                                 <!-- /.recent-ads-container -->
                              </div>
                           <?php endforeach; ?>

                           </div>
                        </div>
                        <!-- Saftey Tips  --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Safety tips for deal</a></h4>
                           </div>
                           <div class="widget-content saftey">
                              <ol>
                                 <li>Use a safe location to meet seller</li>
                                 <li>Avoid cash transactions</li>
                                 <li>Beware of unrealistic offers</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter"); ?>
