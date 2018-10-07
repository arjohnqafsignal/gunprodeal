 <div class="item">
    <div class="col-md-12 col-sm-12 col-xs-12 clearfix">
        <div class="white category-grid-box-1 category-grid-box-1-min-height">
            <!-- Image Box -->
            
            <div class="image"> 
              <?php echo ($feature == 1) ? '<span class="features-tag"> Featured </span>' : '' ?>
                <!-- SINGLE -->
                <?php if ( !is_array($images) ) :?>
                  <img alt="" src="<?=base_url().'assets/pictures/loading.gif' ?>" data-image="<?=$image_url?>" class="img-responsive feature-img-size loadingImage">
                <?php endif ?>
                <!-- SINGLE -->
                <!-- MULTIPLE -->
                <?php if ( is_array($images) ) :?>
                  <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                 <!-- Indicators -->
                      <ol class="carousel-indicators">
                          <?php
                              foreach ($images as $slideKey => $slideUrl ) {
                                  $active = $slideKey == 0 ? "active" : "";
                                  echo '<li data-target="#carousel-1" data-slide-to="'.$slideKey.'" class="feature-img-size '.$active.'"></li>';
                              }
                          ?>
                      </ol>
                 <!-- Wrapper for slides -->
                     <div class="carousel-inner">
                          <?php 
                              foreach ($images as $picKey => $picUrl ) {
                                  $picActive = $picKey == 0 ? "active" : "";
                                  echo '<div class="feature-img-size item '.$picActive.'"> 
                                        <img src="'.base_url().'assets/pictures/loading.gif" alt="" class="loadingImage" data-image="'.$image_url.'"> 
                                    </div>';
                              }
                          ?>
                     </div>
                     
                  </div>
                <?php endif ?>
                <!-- MULTIPLE -->
            </div>
            <!-- Short Description -->
            <div class="short-description-1">
               <!-- Category Title -->
               <div class="category-title"> 
                    <span><a href="#">Category: <?=$category_code?></a></span> 
                    || <span><a href="#">Brand: <?=$BRAND_NAME ?: 'N/A'?></a></span> 
               </div>
               <!-- Ad Title -->
               <h3>
                  <a class="viewProduct" title="" data-id="<?=$id?>"> <?=$title?> </a>
               </h3>
               <div class="category-title"> 
                  <span>
                    <a data-upc="<?=$upc?>" class="compareUpc"><i class="fa fa-stream"></i> UPC: 
                        <span class="compareUpc"><?=$upc?></span> 
                        <span class="label label-info"> Price Comparison </span>
                    </a>
                      
                  </span>
                <br><span><a href="#"><i class="fa fa-stream"></i> SKU:</a></span> <?=$sku?> 
                </div>
               <!-- Location -->
               <p class="location"><i class="fa fa-map-marker"></i> <?=$STATE_NAME ?: 'N/A' ?> </p>
               <!-- Rating -->
               <!-- <div class="rating">
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(2)</span>    
               </div> -->
               <div class="rating">
                  <?php 
                    for ($x = 1; $x <= 5; $x++) {
                      if ( $rate['rating'] >= $x )
                        echo '<i class="fa fa-star"></i>';
                      else if ( isset($rate['rating']) && explode('.', $rate['rating'])[1] >= '50') {
                        echo '<i class="fa fa-star-half-o"></i>';
                      }
                      else
                        echo '<i class="fa fa-star-o"></i>';
                    } 
                    ?>
                  <span class="rating-count">(<?=$rate['total_rates']?>)</span>
               </div>
               <div class="ad-price price-search">
                 <span class="labelPrice">Price &nbsp</span> <span class="price-search"><?=$price?></span>
                 <span class="labelPrice"><br>Shipping Fee &nbsp</span> <span class="price-search"><?=isset($shipping_fee) ? $shipping_fee : '0.00' ?></span>
                </div>

            </div>
        <!-- Ad Meta Stats -->
            <div class="ad-info-1">
                <ul>
                    <!-- <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li> -->
                    <li> <i class="fa fa-clock-o"></i> <?=timespan( strtotime($created_at) , time(), 2). ' ago'?>  </li>
                </ul>
            </div>
        </div>
    </div>
</div>
