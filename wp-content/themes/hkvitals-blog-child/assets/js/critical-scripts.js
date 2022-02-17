/* header menu toggle */
$(".hamburger").click(function(e) {
    e.preventDefault();
	$(this).toggleClass("toggle-close");
    $("header .mobile-menu-container").toggleClass("show");
    $("body").toggleClass("pushed-menu");
});
/*search toggle */
$(".search-toogle").click(function(e){
    $(".search-form").toggleClass("show");
    return false;
});
// Clicking outside the search form closes it
$(document).click(function(event) {
			var target = $(event.target);
      
			if (!target.is('.search-toogle')) {
				$('.search-form').removeClass('show');
			}
});
/* hero-banner */
$(document).ready(function(){
	$(".hero-banner .single-slide:first-child").addClass("show");
	$(".hero-banner .single-slide").hover(function(){
		$(".hero-banner .single-slide").removeClass("show");
		$(this).addClass("show");
	});
	$(window).on("load resize",function(e){
		$item = $(".hero-banner .banner-container");
		$smallSlideWidth = $item.outerWidth()/5;
		$largeSlideWidth = $smallSlideWidth + $smallSlideWidth;
	
		// add calculated width
		$(".hero-banner .banner-container .single-slide .single-slide__content1").css("width", $largeSlideWidth);
		$(".hero-banner .banner-container .single-slide .single-slide__content2").css("width", $smallSlideWidth);
	});
}); 

/* header scroll */
// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header.site-header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header.site-header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header.site-header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
	
	if(lastScrollTop == 0){
		$("header.site-header .tb-topbar").slideDown();
	}else{
		$("header.site-header .tb-topbar").slideUp();
	}
}