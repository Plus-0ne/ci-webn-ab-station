// Nav links
$(function() {
	var path = window.location.pathname.split("/").pop();
	$(".nav-item a[href*='" + path +"']").addClass("active");
});
