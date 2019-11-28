$(document).ready(function() {

	var screenWidth = $(window).width();
// console.log(screenWidth);
if ( $(window).width() < 991 ) {
	$("nav.navbar").removeClass("navbar-black04");
	$("nav.navbar").removeClass("navbar-black07");
	$("nav.navbar").addClass("navbar-black10");
}

$(window).scroll(function() {
// ============================================================

// console.log($(window).width());

$("nav.navbar").removeClass("navbar-black04");
$("nav.navbar").removeClass("navbar-black07");
$("nav.navbar").removeClass("navbar-black10");

if ($(document).scrollTop() > 180) {
	$("nav.navbar").addClass("navbar-black04");
} 

if ($(document).scrollTop() > 360) {
	$("nav.navbar").removeClass("navbar-black04");
	$("nav.navbar").addClass("navbar-black07");
} 

if ( $(window).width() < 991 || $(document).scrollTop() > 550 ) {
	$("nav.navbar").removeClass("navbar-black04");
	$("nav.navbar").removeClass("navbar-black07");
	$("nav.navbar").addClass("navbar-black10");
}

// ============================================================
});

});
