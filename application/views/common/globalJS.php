<script type="text/javascript">

    var error_message = '<div id="err_msg_div" class=""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <span id="err_msg" name="err_msg"></span> </div>';
    var global_error = false;

    /*Chcek the required fields*/
    function checkInput() {
        var ctr   = 0;
        var _requiredFields = '<b>The following required fields must be completed:</b> <br>';

        global_error = false;
        
        $('.required, input[required]').each(function() {
            var value = this.value;
            var id    = $(this).attr('id');
            if ((value == '' || value === undefined || value == 'null') && id.indexOf('s2id_') == -1) {
                ctr++;
                if (ctr == 1) global_error = true;
                if (id.indexOf('AmountTo') > -1) {
                    _requiredFields += $(this).prev("label").html() + '<br>';
                } else _requiredFields += $(this).prev("label").html() + '<br>';
            }
        });

        if (ctr > 0) {
            displayError(false, _requiredFields);
        }
    }

    /* Display message
    ** @param 
    ** status (true || false)
    ** message (string)
    */ 
    function displayError(status, message) {

        // remove current class
        $("#err_msg_div").remove();
        $("#errMsg").html(error_message);
        $("#err_msg_div").addClass( status == true ? "alert alert-success alert-dismissable" : "alert alert-danger alert-dismissable" );

        // remove error message after some time: default 1 min
        $("#err_msg_div").fadeIn("slow").delay(180000).fadeOut("slow");
        $("#err_msg").html(message.toUpperCase());
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    }

    /* Remove message */
    function removeErrorDisplay() {
        $("#err_msg_div").fadeOut("slow", function () {
            $(this).remove();
        });
    }
</script>
