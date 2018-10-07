<li>
    <div class="well ad-listing clearfix">
        <div class="col-md-3 col-sm-5 col-xs-12 grid-style no-padding">
            <!-- Image Box -->
            <div class="img-box">
                <img class="feature-img-size loadingImage" src="<?=base_url(). 'assets/pictures/loading.gif'?>" class="img-responsive loadingImage" data-image="<?=$image_url?>" alt="">
                <div class="total-images">
                    <strong><?= isset($images) ? count($images) : "" ?></strong> photos 
                </div>
                <div class="quick-view">
                    <a href="#ad-preview" data-toggle="modal" class="view-button">
                        <i class="fa fa-search viewProduct" data-id ="<?=$id?>"></i>
                    </a>
                </div>
            </div>
            <!-- User Preview -->
            <!--<div class="user-preview"> -->
            <!--<a href="#"><img src="assets/images/users/5.jpg" class="avatar avatar-small" alt=""></a></div>-->
        </div>
        <div class="col-md-9 col-sm-7 col-xs-12">
            <!-- Ad Content-->
            <div class="row">
                <div class="content-area">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <!-- Category Title -->
                        <div class="category-title">
                            <span><a href="#">Category: <?=$name?></a> </span>
                            || <span><a href="#">Brand: <?=$BRAND_NAME ?: 'N/A'?></a></span> 
                        </div>
                        <!-- Ad Title -->
                        <h3>
                            <a class="viewProduct" data-id ="<?=$id?>" > <?=$title?> </a>
                        </h3>
                        <!-- Info Icons -->
                        <ul class="additional-info pull-right">
                            <li>
                                <a data-toggle="tooltip" title="Send Message" href="#" class="fa fa-envelope"></a>
                            </li>
                            <li>
                                <a data-toggle="tooltip" title="+92-4567-123" href="#" class="fa fa-phone"></a>
                            </li>
                            <li>
                                <a data-toggle="tooltip" title="Bookmark" href="#" class="fa fa-heart"></a>
                            </li>
                        </ul>
                        <!-- Ad Meta Info -->
                        <ul class="ad-meta-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <a href="#"> <?=$STATE_NAME ?: 'N/A' ?> </a>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i> <?=timespan( strtotime($created_at) , time(), 2). ' ago'?>
                            </li>
                        </ul>
                        <!-- Ad Description-->
                        <div class="ad-details">
                            <span>
                                <a data-upc="<?=$upc?>" class="compareUpc"><i class="fa fa-stream"></i> UPC: 
                                    <span class="black-text compareUpc"><?=$upc?></span> 
                                    <span class="label label-info"> Price Comparison</span>
                                </a>
                                
                            </span>
                            <br><span>
                                <a href="#"><i class="fa fa-stream"></i> SKU: <span class="black-text"><?=$sku?></span> </a>
                            </span> 
                            <!--<p><?//=$descriptions?>
                            .... </p>-->
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <!-- Ad Stats -->
                        <div class="short-info">
                            <div class="ad-stats hidden-xs">
                                <span>Sales Start  : </span> 
                                    <?php 
                                        $d=strtotime($created_at);
                                        echo date("Y-m-d" ,$d);
                                    ?>
                            </div>
                           <!--  <div class="ad-stats hidden-xs">
                                <span>End Date : </span>Jul-29-2018
                            </div> -->
                            <div class="ad-stats hidden-xs">
                                <span>Seller : </span> <?=$first_name.' '.$last_name?>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="price">
                            <span class="labelPrice">Price &nbsp</span> <span class="price-search"><?=$price?></span>
                            <span class="labelPrice"><br>Shipping Fee &nbsp</span> <span class="price-search"><?=isset($shipping_fee) ? $shipping_fee : '0.00' ?></span>
                        </div>
                        <!-- Ad View Button -->
                        <button class="btn btn-block btn-success viewProduct" data-id ="<?=$id?>">
                            <i class="fa fa-eye " aria-hidden="true"></i> View Details
                        </button>
                    </div>
                </div>
            </div>
            <!-- Ad Content End -->
        </div>
    </div>
</li>