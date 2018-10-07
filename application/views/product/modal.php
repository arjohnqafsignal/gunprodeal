<?php 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>    

<div tabindex="-1" class="modal fade share-ad" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Share</h3>
            </div>
            <div class="modal-body">
                <div class="recent-ads">
                    <div class="recent-ads-list">
                        <div class="recent-ads-container">
                            <div class="recent-ads-list-image">
                                <a class="recent-ads-list-image-inner" href="#">
                                    <img height="140px" width="268px" alt="" class="loadingImage" data-image="<?=isset($image_url) ? $image_url : '' ?>" src="<?=$image_url?>">
                                    </a>
                                    <!-- /.recent-ads-list-image-inner -->
                                </div>
                                <!-- /.recent-ads-list-image -->
                                <div class="recent-ads-list-content">
                                    <h3 class="recent-ads-list-title">
                                        <a href="#"><?=$title?></a>
                                    </h3>
                                    <ul class="recent-ads-list-location">
                                        <li>
                                            <a href="#">New York</a>,
                                        </li>
                                        <li>
                                            <a href="#">Brooklyn</a>
                                        </li>
                                    </ul>
                                    <div class="recent-ads-list-price price">
                                        <span class="labelPrice">Price &nbsp</span> <span class="price-search"><?=$price?></span>
                                        <span class="labelPrice"><br>Shipping Fee &nbsp</span> <span class="price-search"><?=isset($shipping_fee) ? $shipping_fee : '0.00' ?></span>
                                    </div>
                                    <!-- /.recent-ads-list-price -->
                                </div>
                                <!-- /.recent-ads-list-content -->
                            </div>
                            <!-- /.recent-ads-container -->
                        </div>
                    </div>
                    <h3>Descriptions</h3>
                    <p> <?=is_array(($descriptions)) ? $descriptions[0]['descriptions'].'...' : '' ?> </p>
                    <h3>Link</h3>
                    <p>
                        <a href="<?=$actual_link?>"><?=$actual_link?></a>
                    </p>
                </div>
                <div class="modal-footer">
	            <!-- <a class="btn btn-fb btn-md" href="https://www.facebook.com/sharer/sharer.php?app_id=<?=FB_ID?>&sdk=joey&u=<?=$image_url?>&display=popup&ref=plugin&src=share_button" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
			<i class="fa fa-facebook"></i>
		    </a> -->
		    <input type="hidden" id="itemDesc" value="<?=is_array(($descriptions)) ? $descriptions[0]['descriptions'].'...' : '' ?>" />
                    <input type="hidden" id="itemTitle" value="<?=$title?>" />
                    <input type="hidden" id="itemImage" value="<?=$image_url?>" />
                    <input type="hidden" id="itemUrl" value="<?=$actual_link?>" />
                    <a class="btn btn-fb btn-md btnFbShare" >
                        <i class="fa fa-facebook btnFbShare"></i>
                    </a>
                    <a class="btn btn-twitter btn-md" href="https://twitter.com/intent/tweet?url=http://www.gunsalefinder.com/viewProduct?=<?=$id?>&text=Check%20out,%20this%20product.%20Tweet%20to%20earn%20a%20point%20every%20click.&via=gunsalefinder" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-gplus btn-md" href="https://plus.google.com/share?url=<?php echo rawurlencode('http://www.gunsalefinder.com/viewProduct?='.$id); ?>" target="_blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
