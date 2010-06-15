jQuery().ready(function(){
	$('.sf_star').click(function(){
		url = $(this).attr('href');
		$(this).load(url);
		$(this).toggleClass("sf_star_on");
		$(this).toggleClass("sf_star_off");
		return false;
	});
});