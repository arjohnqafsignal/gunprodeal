<div class="item">
    <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
        <!-- Ad Box -->
        <div class="category-grid-box">
        <!-- Ad Img -->
        <div class="category-grid-img">
            <img class="loadingImage" alt="" data-image="<?=LOCALADMINURL.$image_url?>" width="313" height="234" src="<?=base_url().'assets/pictures/loading.gif' ?>">
            <!-- Ad Status -->
            <span class="ad-status"> Featured </span>
            <!-- User Review -->
            <!-- <div class="user-preview">
                <a href="#"> <img src="<?php echo base_url(); ?>assets/images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
            </div> -->
            <a class="view-details " href="<?=$link_url?>">View Details</a>
        </div>
        <!-- Ad Img End -->
        <div class="short-description">
            <!-- Ad Category -->
            <div class="category-title"> <span><a href="#"> <a href="#"><?=$this->common->getCategoryname($category)?></a> </a></span> </div>
            <!-- Ad Title -->
            <h3><a title="" href="<?=$link_url?>"> <?=$title?> </a></h3>
            <!-- Price -->
            <div class="price"> <?=$price?> <span class="negotiable"></span></div>
        </div>
        <!-- Addition Info -->
        <div class="ad-info">
            <ul>
                <li><i class="fa fa-map-marker"></i> <?=$this->common->getStatename($state)?> </li>
                <li><i class="fa fa-clock-o"></i> <?=timespan( strtotime($created_at) , time(), 2). ' ago'?> </li>
            </ul>
        </div>
        </div>
        <!-- Ad Box End -->
    </div>
</div>