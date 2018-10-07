
<script>
	var catCode = '<?=$catCode?>' || 0;
	var subCatCode = '<?=$subCatCode?>' || 0;
	var dealerId = '<?=$dealerId?>' || 0;
	var brandId = '<?=$brandId?>' || 0;
	var currOffset = '<?=$currOffset?>' || 0;

	$('#updatedDate').click(function() {
		var order = '<?=$currOrder?>' == 'desc' ? 'asc' : 'desc';
		window.location = '<?=$currLink?>' + 'created_at/' + order  +'/'+ catCode +'/'+ subCatCode +'/'+ dealerId +'/'+ brandId + '/' + currOffset;
	});

	$('#price').click(function() {
		var order = '<?=$currOrder?>' == 'desc' ? 'asc' : 'desc';
		window.location = '<?=$currLink?>' + 'price/' + order  +'/'+ catCode +'/'+ subCatCode +'/'+ dealerId +'/'+ brandId + '/' + currOffset;
	});

	/* Add to compare */
	$('.addToCompare').click(function() {
		var disableId = <?=json_encode($compareIdList)?>;
		var id = $(this).attr("data-id");

		// ..TODO
		if (_.includes(disableId, id)) {
			alert('Already in compare list');
			return;
		}

		if (disableId.length >= 3 ) return alert('Maximumn of three items only.');

		$('#myLoading').modal({backdrop: 'static', keyboard: false,})
		$('#myLoading').modal('show');
		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>compare/addCompare",
		    data: { id: id },
		    success: function(_data) { 
				// $('#myLoading').modal('hide');
		    	window.location = window.location;
	        },
	        error: function(x, t, m) {       
	        }
		});
	});

	// Search Item
	$('#applyFilter').click(function() {

		var catcode = $('input[name=categories]:checked').attr('data-catcode') || 0;
		var catSubCode = $('input[name=subCategories]:checked').attr('data-catsubcode') || 0;
		var brandId = $('#brand').val() || 0;
		var minPrice = $('#price-min').html();
		var maxPrice = $('#price-max').html();

		$(this).append('<input type="hidden" name="pMin" value="'+minPrice+'" /> ');
		$(this).append('<input type="hidden" name="pMax" value="'+maxPrice+'" /> ');
		$("#formFilter").attr('action', '<?=base_url()?>search/index/'+ 'created_at/' + '<?=$currOrder?>'  +'/'+ catcode +'/'+ catSubCode +'/'+ dealerId +'/'+ brandId + '/' + '0').submit();	

	});

	

	$('#collapseThree').parent().attr('hidden','true');
	$('.catCode').click(function() {
		var catcode = $(this).attr("data-catcode");
		/* Hide All*/

		/* Clear radio button after clickng categories */
		// $('input[name="subCategories"]').attr('checked', false);
		$('input[name="subCategories"]').prop('checked', false);

		/* Unhide the Type (SubCategories) */
		$('#collapseThree').parent().removeAttr('hidden');
        $('[name=subCategories]').parent().attr('hidden','true');
        /* Reveal */
        $('*[data-catcode="'+catcode+'"]').parent().removeAttr('hidden');
        $('.notIncluded').parent().removeAttr('hidden');

	});

	/* Compare now */
	$('#compareNow').click(function() {
		window.location = '<?=base_url()?>' + 'compare/index';
	});

	$('.rmvCompare').click(function() {
		var id = $(this).attr("data-id");
		$('#myLoading').modal({backdrop: 'static', keyboard: false,})
		$('#myLoading').modal('show');
		$.ajax({
		    type: "POST",
		    url: "<?=base_url()?>compare/removeCompareItem",
		    data: { id: id },
		    success: function(_data) { 
				// $('#myLoading').modal('hide');
		    	window.location = window.location;
	        },
	        error: function(x, t, m) {       
	        }
		});
	});

	var catCode = '<?=$catCode?>' || 0;
	var catSubCode = '<?=$subCatCode?>' || 0;

	$('input[name="categories"]').attr('checked', false);
	if (catCode != 0 )  $("input[name=categories][data-catcode='"+catCode+"']").trigger( "click" );
	if (catSubCode != 0 ) $("input[name=subCategories][data-catsubcode='"+catSubCode+"']").trigger( "click" );
	if (brandId != 0 ) $('#brand').val(brandId).trigger('change');


</script>