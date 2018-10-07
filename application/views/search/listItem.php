<!-- Ads Listing -->
<div class="ads-list-archive">
    <!-- Image Block -->
    <div class="col-lg-3 col-md-3 col-sm-3 no-padding">
        <?php echo ($feature == 1) ? '<span class="features-tag"> Featured </span>' : '' ?>
        <!-- Img Block -->
        <div class="ad-archive-img">
            <a href="#">
                <img src="<?=base_url(). 'assets/pictures/loading.gif'?>" class="loadingImage" data-image="<?=$image_url?>" alt="">
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
            <div class="ad-price price-search">
                <span class="labelPrice">Price &nbsp</span> <span class="price-search"><?=$price?></span>
                <span class="labelPrice"><br>Shipping Fee &nbsp</span> <span class="price-search"><?=isset($shipping_fee) ? $shipping_fee : '0.00' ?></span>
            </div>
            <!-- Category -->
            <div class="category-title"> 
                <span><a href="#">Category:<?=$category_code ?: 'N/A'?></a></span> 
                || <span><a href="#">Brand:<?=$BRAND_NAME ?: 'N/A'?></a></span> 
            </div> 
            <!-- <div class="ad-price pricez-s"></div> -->
            <!-- Title -->
            <h3 class="viewProduct" data-id="<?=$id?>"><?=$title?></h3>
            
            <div class="ad-details">
                <span>
                    <a data-upc="<?=$upc?>" class="compareUpc">
                        <i class="fa fa-stream"></i> UPC: 
                        <span class="black-text compareUpc" ><?=$upc?></span> 
                        <span class="label label-info"> Price Comparison</span>
                    </a>
                </span>
                <br><span>
                    <a ><i class="fa fa-stream"></i> SKU: <span class="black-text"><?=$sku?></span> </a>
                </span> 
            </div>
            <div class="clearfix visible-xs-block"></div>

            <!-- Short Description -->
            <div class="clearfix visible-xs-block"></div>
            <!-- Ad Features -->
            <!-- Ad History -->
            <div class="clearfix archive-history">
                <div class="rating">
                    <?php 
                        for ($x = 1; $x <= 5; $x++) {
                            if ( $rating >= $x )
                                echo '<i class="fa fa-star"></i>';
                            else if ( isset($rate['rating']) && explode('.', $rate['rating'])[1] >= '50') 
                                echo '<i class="fa fa-star-half-o"></i>';
                            else
                                echo '<i class="fa fa-star-o"></i>';
                        } 
                    ?>
                    <span class="rating-count">(<?=$total_rates?>)</span>
                </div>
                <div class="last-updated"> <?=timespan( strtotime($created_at) , time(), 2). ' ago'?> </div>

                <div class="ad-meta">
                    <a class="btn save-ad addToCompare" data-id="<?=$id?>">
                        <i class="fa fa-plus-circle"></i> Add to Compare
                    </a>
                    <a class="viewProduct btn btn-success" data-id="<?=$id?>"
                        <i  class="fa fa-eye"></i> View Details
                    </a>
                </div>
            </div>
        </div>
        <!-- Ad Desc End -->
    </div>
    <!-- Content Block End -->
</div>