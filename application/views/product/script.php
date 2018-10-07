<?php 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<script>
	// // Pass value to varaible
	// var itemDescription = '$description';
	// // String to JSON format
	// itemDescription = JSON.parse(itemDescription) || '';

	// // Sort and append descriptiop
	// _.forEach( _.sortBy(itemDescription) , function(description) {
	//   	$("#descriptionDiv").append('<li>'+description+'</li>');
	// });

	/* Facebook */
	window.fbAsyncInit = function() {
	console.log('START CONNECT');
	    FB.init({
	      appId            : '<?=FB_ID?>',
	      //cookie: true,
	      //status: true,
	      autoLogAppEvents : true,
	      xfbml            : true,
	      version          : 'v3.1'
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	function postToFeed(title, desc, url, image){
		var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
        	FB.getLoginStatus(function(response) {
        	        console.log(response.status);
        	        //if((response.status === 'connected')) {
        	                FB.ui( obj, function(response) {
        	                    return  console.log(response);
        	                });
        	        //}
        	});
	}

	$('.btnFbShare').click(function() {
		postToFeed($('#itemTitle').val(), $('#itemDesc').val(), $('#itemUrl').val(), $('#itemImage').val());	
		return false;
	});

	/* Add comment */
	$('#bntComments').click(function() {
		$('#myLoading').modal({backdrop: 'static', keyboard: false,})
		$('#myLoading').modal('show');
		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>product/insert_comments",
		    data: { 
		    	txtName : $('#txtName').val()
				,txtEmail : $('#txtEmail').val()
				,txtComment : $('#txtComment').val()
				,product_id : $('#product_id').val()
			},
		    success: function(_data) { 
				$('#myLoading').modal('hide');
		    	var dataParsed = JSON.parse(_data);
		    	if (dataParsed.errCode == 'R00002' ) {
		    		$('#myModal').modal('show');
		    		$('#myModalMessage').html(dataParsed.errMsg + '<br>Please login to submit your comment.');
		    		$('#myModalBtn').off();
		    		$('#myModalBtn').click(function() {
		    			window.location = '<?=base_url()?>login';
		    		});
		    	}
		    	else {
		    		$('#myModal').modal('show');
		    		$('#myModalMessage').html(dataParsed.errMsg);
		    		$('#myModalBtn').off();
		    		$('#myModalBtn').click(function() {
		    			window.location = window.location;
		    		});
		    	}
	        },
	        error: function(x, t, m) {       
	        }
		});
	});

	/* Load More comments (Offset) */
	$('#loadMore').click(function() {
		$('#myLoading').modal({backdrop: 'static', keyboard: false,})
		$('#myLoading').modal('show');
		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>product/loadMoreComments",
		    data: { 
		    	product_id : $('#product_id').val()
				,start : $('#start').val()
			},
		    success: function(_data) { 
				$('#myLoading').modal('hide');
		    	var dataParsed = JSON.parse(_data);
		    	$('#commentList').append(dataParsed.views);
		    	$('#start').val(dataParsed.start);
		    	if (dataParsed.next == 'N') $('#loadMore').hide();
	        },
	        error: function(x, t, m) {       
	        }
		});
	});

	/* Add Rate product */
	$('#submitRate').click(function() {
		$('#myLoading').modal({backdrop: 'static', keyboard: false,})
		$('#myLoading').modal('show');
		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>product/rateProduct",
		    data: { 
		    	product_id : $('#product_id').val()
				,rate : $('input[name=rateRadio]:checked').val()
				,remarks : $('#remarks').val()
			},
		    success: function(_data) { 
				$('#myLoading').modal('hide');
		    	var dataParsed = JSON.parse(_data);
		    	if (dataParsed.errCode == 'R00002' ) {
		    		$('#myModal').modal('show');
		    		$('#myModalMessage').html(dataParsed.errMsg + '<br>Please login to submit your rate.');
		    		$('#myModalBtn').off();
		    		$('#myModalBtn').click(function() {
		    			window.location = '<?=base_url()?>login';
		    		});
		    	}
		    	else {
		    		$('#myModal').modal('show');
		    		$('#myModalMessage').html(dataParsed.errMsg);
		    		$('#myModalBtn').off();
		    		$('#myModalBtn').click(function() {
		    			window.location = window.location;
		    		});
		    	}
	        },
	        error: function(x, t, m) {       
	        }
		});
	});

	/* Add To wishlist */
	$('#addtowishlist').click(function() {

		var id = $('#product_id').val();
		
		if (id != '') { 
			//POST
			$.post( "<?php echo base_url(); ?>/wishlist/addtowishlist", { id: id })
			  .done(function( data ) {
				 if(data == '1'){
				 	alert('Product added to your wishlist');
				 }else if(data == '2'){
				 	alert('Error in adding wishlist. Please report to us!');
				 }else {
				 	alert('Login to continue adding wishlist');
				 }
			});
			//POST
		}
		
	});

	$('#reportProduct').click(function(){
		var id = $('#product_id').val();
		var reportDetails = $('#reportDetails').val();
		alert();
		if (id != '') { 
			//POST
			$.post( "<?php echo base_url(); ?>/reportproduct/reportItem", { id: id, details: reportDetails })
			  .done(function( data ) {
				$('.report-product').modal('hide');
				 if(data == '1'){
				 	alert('Product successfully reported!');
				 }else if(data == '2'){
				 	alert('Error in reporting the product!');
				 }else {
				 	alert('Login to continue adding wishlist');
				 }
			});
			//POST
		}
	});

	/* If user already done for rating product, details of rate proudct will be displayed. */
	var detailsOfRate = '<?=$rateDetails?>' || null;
	detailsOfRate = typeof detailsOfRate == 'object'? detailsOfRate: JSON.parse(detailsOfRate);

	if (detailsOfRate != null ) {
		$('#remarks').val(detailsOfRate.remarks).attr("disabled", "disabled"); 
		$("input[name=rateRadio][value='"+detailsOfRate.rate+"']").trigger( "click" ); 
		$("input[name=rateRadio] , #submitRate").attr("disabled", "disabled");
	}
	

	
	
</script>
