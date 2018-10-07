<script>
	$('.sortCategory').click(function () {
        var catCode = $(this).attr("data-catCode");
        var ifHaveChild = $(this).next('ul').length; 
        if (ifHaveChild == 0 ) window.location.href = '<?=base_url()?>' + 'search/index/created_at/asc/'+ catCode+'/0';
	});

    $('.sortSubCategory').click(function () {
        var catCode = $(this).attr("data-catCode");
        var subCatCode = $(this).attr("data-subCatCode");
        var ifHaveChild = $(this).next('ul').length; 
        if (ifHaveChild == 0 ) window.location.href = '<?=base_url()?>' + 'search/index/created_at/asc/'+ catCode +'/'+subCatCode+'/0';
    });

    $.ajax({url : 'home/getTopBanners/', dataType : 'json', success : function(result){

        var i = 1;
        document.getElementById("bannerImage").src = "<?php echo LOCALADMINURL ?>"+result[0]['image_url']; 
        document.getElementById("bannerLink").href = "<?php echo LOCALADMINURL ?>"+result[0]['link_url']; 
        var renew = setInterval(function(){
            if(result.length == i){
                i = 0;
            }
            else {
                document.getElementById("bannerImage").src = "<?php echo LOCALADMINURL ?>"+result[i]['image_url']; 
                document.getElementById("bannerLink").href = "<?php echo LOCALADMINURL ?>"+result[i]['link_url']; 
                i++;

            }
        },5000);
    }});

    // var links = ["http://localhost/gunprodeal/test1","http://localhost/gunprodeal/test2","http://www.ghi.com"];
    // var images = ["<?php echo ADMINURL ?>images/sliders/banner.png","<?php echo ADMINURL ?>images/sliders/banner-1.png","<?php echo ADMINURL ?>images/sliders/banner-2.png"];
    // var i = 0;
    // var renew = setInterval(function(){
    //     if(links.length == i){
    //         i = 0;
    //     }
    //     else {
    //     document.getElementById("bannerImage").src = images[i]; 
    //     document.getElementById("bannerLink").href = links[i]; 
    //     i++;

    // }
    // },5000);
      
</script>