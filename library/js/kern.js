
$(document).ready(function(){


	$('#trip-planner-container').click(function() {
		if($('#planner-expand-contract-tab').text() != 'hide') {
			$(this).find('.min-hide').css('display', 'table-row');
			$('#planner-expand-contract-tab').text('hide');
			 $('#trip-planner-container').removeClass('minimized').addClass('expanded');
			  $('#planner-expand-contract-tab').removeClass('minimized').addClass('expanded');
		}
		
	});
	
	$('#planner-expand-contract-tab').click(function() {
		if($(this).text() == 'hide') {
			 $('#trip-planner-container').removeClass('expanded').addClass('minimized');
			 $('#planner-expand-contract-tab').removeClass('expanded').addClass('minimized');
			 $('#trip-planner-container .min-hide').css('display', 'none');
			 $('#planner-expand-contract-tab').text('expand');  
		} else {
			$('#trip-planner-container').find('.min-hide').css('display', 'table-row');
			$('#planner-expand-contract-tab').text('hide');
			$('#trip-planner-container').removeClass('minimized').addClass('expanded');
			$('#planner-expand-contract-tab').removeClass('minimized').addClass('expanded');
		}
	
	});
	
	$('#main-nav li').click(function() {
	
		window.location.href = $(this).find('a').attr('href');	
	
	});



	$("area").hover( function(){
	 	$("#map-hovers").addClass($(this).attr("alt"));
	 }, function() {
	 	$("#map-hovers").removeClass($(this).attr("alt"));
	});

});