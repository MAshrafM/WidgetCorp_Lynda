(function(){
	$('.collapse-link').on('click', function(){
		$(this).closest('.x_panel').find('.add_page_btn').toggle();
	});
}());