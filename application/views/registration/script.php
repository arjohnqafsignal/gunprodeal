<script type="text/javascript">

	$('#btnSubmit').click(function () {

		/*GLOBAL VALIDATION*/
	    checkInput();
	    // if (! form.valid()) return; //..TODO
	    if (global_error == true) return;

		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>registration/saveregistration",
		    data: $('#formRegister').serialize(),
		    success: function(_data) { 
		    	/* Parsing data */
		    	var _parse = $.parseJSON(_data);
		    	/* Check the error code if succesful */
		    	if (_parse["errCode"] == "R00001") {
		    		displayError(true, _parse['errMsg'].toUpperCase());
		    		window.location = "<?php base_url()."registration"?>";
		    	}
		    	else {
		    		displayError( false, _parse['errMsg'].toUpperCase());
		    	}
	        },
	        error: function(x, t, m) {       
	            // $("#myAlert").modal("hide");
				displayError(false,m);
	        }
		});
	});
	
</script>