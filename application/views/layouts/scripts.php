
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap Core Css  -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Jquery Easing -->
<script src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<!-- Menu Hover  -->
<script src="<?php echo base_url(); ?>assets/js/forest-megamenu.js"></script>
<!-- Jquery Appear Plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.appear.min.js"></script>
<!-- Numbers Animation   -->
<script src="<?php echo base_url(); ?>assets/js/jquery.countTo.js"></script>
<!-- Jquery Smooth Scroll  -->
<script src="<?php echo base_url(); ?>assets/js/jquery.smoothscroll.js"></script>
<!-- Jquery Select Options  -->
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<!-- noUiSlider -->
<script src="<?php echo base_url(); ?>assets/js/nouislider.all.min.js"></script>
<!-- Carousel Slider  -->
<script src="<?php echo base_url(); ?>assets/js/carousel.min.js?v=3"></script>
<script src="<?php echo base_url(); ?>assets/js/slide.js"></script>
<!-- Image Loaded  -->
<script src="<?php echo base_url(); ?>assets/js/imagesloaded.js"></script>
<script src="<?php echo base_url(); ?>assets/js/isotope.min.js"></script>
<!-- CheckBoxes  -->
<script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
<!-- Jquery Migration  -->
<script src="<?php echo base_url(); ?>assets/js/jquery-migrate.min.js"></script>
<!-- Sticky Bar  -->
<script src="<?php echo base_url(); ?>assets/js/theia-sticky-sidebar.js"></script>
<!-- Style Switcher -->
<script src="<?php echo base_url(); ?>assets/js/color-switcher.js"></script>
<!-- Template Core JS -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<!-- Easy Autocomplete JS -->
<script src="<?php echo base_url(); ?>node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/js/ajaxpost.js"></script>-->
<!-- Lodash JS -->
<script src="<?php echo base_url(); ?>node_modules/lodash/lodash.js"></script>
<!-- Zoom -->
<script src="<?php echo base_url(); ?>node_modules/jquery-zoom/jquery.zoom.min.js"></script>


<!-- SCRIPT FOR GLOBAL VIEWS -->
<script>

	// Auto complete for search text box
	var options = {
	    url: function(phrase) {
			return "<?=base_url()?>search/searchFilter?filter=" + phrase;
		},
		preparePostData: function(data) {
			data.phrase = $("#txtSearch").val();
			return data;
		},
	    getValue: function(element) {
			console.log(element);
			if (element.upc)  return  element.upc +' - '+ element.title ;
			else return element.title;
		},
		ajaxSettings: {
			dataType: "json",
			method: "POST",
			data: {
			  dataType: 'post'
			}
		},
		requestDelay: 200,
		//list: {
		//	onClickEvent: function() {
	    //        var selectedItemValue = $("#txtSearch").getSelectedItemData().id;
	    //        $('#txtSearch').attr('data-id', selectedItemValue);
	    //        $('#itemId').val(selectedItemValue);
	    //    },
		//},
	    template: {
	        type: "links",
	        fields: {
	            // link: ""
	            link: "productLink"
	        }
	    },
	    theme: "boostrap"
	};

	$("#txtSearch").easyAutocomplete(options);

	// Search Item
	$('#btnSearch').click(function() {
		$("#searchForm").attr('action', '<?=base_url()?>search/index').submit();	
	});
	
	$('.moveToSearch').click(function() {
		window.location = "<?=base_url()?>"+"search/index";
	});

	$(document).on('click', '#subscribeemail', function() {
		var email = $('#emailaddress').val();
		if (email != '') { 
			//POST
			$.post( "<?php echo base_url(); ?>/newsletter/savesubscribe", { email: email })
			  .done(function( data ) {
				$( "#newslettermsg" ).html( data );
			});
			//POST
		}
	});

	// View Product
    $('.viewProduct').click(function() {
        var id = $(this).attr("data-id");
        window.location = "<?=base_url()?>"+"product/viewProduct?id="+ id;
    });

	$('#dealer-radio').on('ifClicked', function() {
        window.location = '<?php echo base_url('/dealer/subscribe'); ?>'
    });

    $('#user-radio').on('ifClicked', function() {
        window.location = '<?php echo base_url('/registration'); ?>'
    });

    // GLOBAL UPC COMPARE
    $('.compareUpc').click(function() {
    	var upc = $(this).attr("data-upc");
    	window.location = '<?php echo base_url('compare/prices/')?>' + upc;
    });

	// Loading Image
	$(".loadingImage").each(function() {
		
		var  image_url =  $(this).attr("data-image");
		console.log('GET LINK');
		$(this).attr('src', $(this).attr("data-image")); 
		console.log($(this).attr("data-image"));
		$(".loadingImage").error(function(err){
			$(this).attr('src',  '<?=base_url()?>' + 'assets/pictures/default.jpg' );
		});

		var source = $(this);

		$(this).parent('div, a, td').zoom({
			url: image_url,
			callback: function(){
				var toBeHeight = Number(this.height) > Number(source.height()) ?  this.height : source.height();
				var toBeWidth = Number(this.width) > Number(source.width()) ?  this.width : source.width();

				console.log('toBeHeight.height()');
				console.log(toBeHeight);

				$(this).css({
					'width' : toBeWidth+'px',
					'height' : toBeHeight+'px',
				});
			},
			magnify: '0.1%',
			onZoomOut: true,
			onZoomIn: true,
		});

		// $(this)
		// .wrap('<span style="display:inline-block"></span>')
		// .css('display', 'block')
		// .parent()
		// .zoom({
		// 	url: image_url,
		// 	callback: function(){

		// 		var toBeHeight = Number(this.height) > Number(source.height()) ?  this.height : source.height();
		// 		var toBeWidth = Number(this.width) > Number(source.width()) ?  this.width : source.width();

		// 		$(this).css({
		// 			'width' : toBeWidth+'px',
		// 			'height' : toBeHeight+'px',
		// 		});
		// 	},
		// 	magnify: '0.1%',
		// 	onZoomOut: true,
		// 	onZoomIn: true,
		// });
	});
</script>