<div class="item">
    <div class="col-md-12 col-xs-12 col-sm-12 clearfix">
        <!-- Ad Box -->
        <div class="category-grid-box">
            <!-- Ad Img -->
            <div class="category-grid-img">
                <img class="feature-img-size loadingImage" src="<?=base_url(). 'assets/pictures/loading.gif'?>"  data-image="<?=LOCALADMINURL.$image_url?>" alt="">
                </img>
                <!-- Ad Status -->
                <span class="ad-status"> Featured </span>
                <!-- User Review -->
                <!-- <div class="user-preview"><a href="#"><img src="assets/images/users/1.jpg" class="avatar avatar-small" alt=""></a></div>-->
                <!-- View Details -->
                <a class="view-details " href="<?=$link_url?>">View Details</a>
                <!-- Additional Info -->
                <div class="additional-information">
                    <!-- <p> SKU#:  </p>
                    <p> UPC#:  </p>
                     <p> 100-006-987WB</p>
                    <p> 30-Round PMAG, 10-Pack, Black</p>
                    <p> 30-round capacity</p>
                    <p> Stainless steel spring</p> -->
                </div>
                <!-- Additional Info End-->
            </div>
            <!-- Ad Img End -->
            <div class="short-description">
                <!-- Ad Category -->
                <div class="category-title">
                    <span>
                        <a href="#"><?=$this->common->getCategoryname($category)?></a>
                    </span>
                </div>
                <!-- Ad Title -->
                <h3>
                    <a title="" href="<?=$link_url?>"><?=$title?></a>
                </h3>
                <!-- Price -->
                <div class="price"> <?=$price?>
                    <!-- <span class="negotiable">( 30% off )</span> -->
                </div>
            </div>
            <!-- Addition Info -->
            <div class="ad-info">
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i> <?=$this->common->getStatename($state)?>
                    </li>
                    <li>
                        <!-- ..TODO -->
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span class=  "rating-count">(2)</span>
                        </div> -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- Ad Box End -->
    </div>
</div>
