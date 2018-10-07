<div class="recent-ads-list">
<button class="btn btn-link margin-bottom-10 close comparison-close rmvCompare" type="button" data-id="<?=$id?>" >remove</button>
    <div class="recent-ads-container">
        <div class="recent-ads-list-image">
            <a href="#" class="recent-ads-list-image-inner">
                <img src="<?=$image_url?>" alt="">
            </a>
        </div>
        <div class="recent-ads-list-content">
            <h3 class="recent-ads-list-title">
                <a href="#"><?=$title?></a>
            </h3>
            <ul class="recent-ads-list-location">
                <li><a href="#"> <?=$STATE_NAME ?: 'N/A' ?></a></li>
                <!-- <li><a href="#">AREA</a></li> -->
            </ul>
            <div class="recent-ads-list-price">
                <?=$price?>
            </div>
        </div>
    </div>
</div>