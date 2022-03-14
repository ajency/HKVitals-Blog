/* calculate container offset */
$(window).on('load resize', function () {
    $item = $(".container");
    $contWidth = $item.width();
    $FullWidth = $(".container-main").width();
    $cust_offset = ($FullWidth - $contWidth)/2;

    $(".latest-articles-single:nth-child(odd) .latest-articles-single-container").css("margin-left", $cust_offset);
    $(".latest-articles-single:nth-child(even) .latest-articles-single-container").css("margin-right", $cust_offset);
    $(".more-articles-slider .wraper").css("margin-left", $cust_offset);
    $(".more-articles .slider-nav").css("padding-left", $cust_offset);
});

/* explore articles section */
$(".category-buttons-single").click(function(){
    var button = $(this);
    if(!button.hasClass('category-buttons-single-active')){
        $.ajax({ 
            url : ajax_params.url, 
            data: {
                'action' : 'fetch_category_articles',
                'category_id' : $(this).data('val'),
                'type' : $(this).data('type'),
            },
            type : 'POST',
            beforeSend : function ( xhr ) {
                $(".explore-articles-container-list").css('visibility', 'hidden');
                $(".explore-articles-loader").addClass("d-block").removeClass("d-none");
            },
            success : function( data ){
                $(".explore-articles-container").html('');
                $(".explore-articles-loader").addClass("d-none").removeClass("d-block");
                if( data ) { 
                    $(".explore-articles-container").html(data);
                    $(".category-buttons-single").removeClass("category-buttons-single-active");
                    button.addClass("category-buttons-single-active");
                }
				/* single component */
				$(".article-single .article-single-image a").hover(function(){
					$(this).parents().eq(2).toggleClass("hovered");
				});
				$(".article-single .article-single-content .article-single-content-title .title a").hover(function(){
					$(this).parents().eq(4).toggleClass("hovered");
				});
            }
        });
    }
})

/* single component */
$(".article-single .article-single-image a").hover(function(){
    $(this).parents().eq(2).toggleClass("hovered");
});
$(".article-single .article-single-content .article-single-content-title .title a").hover(function(){
    $(this).parents().eq(4).toggleClass("hovered");
});
/* more articles slider */
$(function() {
    $(".more-articles-slider").slick({
        arrows:true,
        dots: true,
        speed: 300,
        infinite: false,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        appendArrows: $('.more-articles-section .slider-nav .arrows'),
        appendDots: $('.more-articles-section .slider-nav .dots'),
        prevArrow: "<button class='arrows__prev'><svg xmlns='http://www.w3.org/2000/svg' width='31.117' height='31.117' viewBox='0 0 31.117 31.117'><g id='Icon_ionic-ios-arrow-dropright' data-name='Icon ionic-ios-arrow-dropright' transform='translate(-3.375 -3.375)' style='mix-blend-mode: normal;isolation: isolate'><path id='Path_15' data-name='Path 15' d='M14.84,10.4a1.449,1.449,0,0,1,2.042,0l7.136,7.158a1.442,1.442,0,0,1,.045,1.99l-7.031,7.054a1.441,1.441,0,1,1-2.042-2.035L20.967,18.5,14.84,12.438A1.427,1.427,0,0,1,14.84,10.4Z' transform='translate(0.705 0.422)'/><path id='Path_16' data-name='Path 16' d='M3.375,18.934A15.559,15.559,0,1,0,18.934,3.375,15.556,15.556,0,0,0,3.375,18.934Zm2.394,0a13.16,13.16,0,0,1,22.47-9.305,13.16,13.16,0,1,1-18.61,18.61A13.052,13.052,0,0,1,5.769,18.934Z'/></g></svg></button>",
        nextArrow: "<button class='arrows__next'><svg xmlns='http://www.w3.org/2000/svg' width='31.117' height='31.117' viewBox='0 0 31.117 31.117'><g id='Icon_ionic-ios-arrow-dropright' data-name='Icon ionic-ios-arrow-dropright' transform='translate(-3.375 -3.375)' style='mix-blend-mode: normal;isolation: isolate'><path id='Path_15' data-name='Path 15' d='M14.84,10.4a1.449,1.449,0,0,1,2.042,0l7.136,7.158a1.442,1.442,0,0,1,.045,1.99l-7.031,7.054a1.441,1.441,0,1,1-2.042-2.035L20.967,18.5,14.84,12.438A1.427,1.427,0,0,1,14.84,10.4Z' transform='translate(0.705 0.422)'/><path id='Path_16' data-name='Path 16' d='M3.375,18.934A15.559,15.559,0,1,0,18.934,3.375,15.556,15.556,0,0,0,3.375,18.934Zm2.394,0a13.16,13.16,0,0,1,22.47-9.305,13.16,13.16,0,1,1-18.61,18.61A13.052,13.052,0,0,1,5.769,18.934Z'/></g></svg></button>",
    
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows:false,
                }
            }
        ]
    });
});

/* footer */
$("footer .wrap").addClass("container");
$(".footer-widgets .wrap").addClass("container");

var el1 = document.querySelector('.footer-widgets .footer-widgets-2 .widget-title');
var el2 = document.querySelector('.footer-widgets .footer-widgets-3 .widget-title');
el1.outerHTML = '<h4 class="widgettitle widget-title">' + el1.innerHTML + '</h4>';
el2.outerHTML = '<h4 class="widgettitle widget-title">' + el2.innerHTML + '</h4>';

//accordions
$(".footer-widget-area .about").addClass("accordion");
$(".footer-widget-area .about .widget-title").addClass("accordion-header");
$(".footer-widget-area .about .about-desc").addClass("accordion-content");

$(".footer-widget-area .widget_nav_menu .widget-wrap").addClass("accordion");
$(".footer-widget-area .widget_nav_menu .widget-wrap .widget-title").addClass("accordion-header");
$(".footer-widget-area .widget_nav_menu .widget-wrap nav").addClass("accordion-content");

$(".footer-widget-area .subscribe-form").addClass("accordion");
$(".footer-widget-area .subscribe-form .widget-title").addClass("accordion-header");
$(".footer-widget-area .subscribe-form .footer-form").addClass("accordion-content");

$(document).on("touchstart", ".accordion-header", function() {
	$(this).parent().toggleClass("show");
});
/* read these next section */
$(".read-these-next .article-link").hover(function(){
	$(this).parents().eq(0).toggleClass("hovered");
});
$(".read-these-next .title a").hover(function(){
	$(this).parents().eq(3).toggleClass("hovered");
});

/* category page */
let canBeLoaded = true;
function get_category_posts(category_page, remove_posts = false){
	var url = new URL(window.location.href);
	var data = {
		'action': 'fetch_category_page_articles',
		'page' : category_page,
		'category' : $(".category-list-view").data('category'),
		'type' : $(".category-list-view").data('type'),
		'taxonomy' : $(".category-list-view").data('taxonomy'),
		'taxtype' : $(".category-list-view").data('taxtype'),
		'search' : $(".category-list-view").data('search'),
	};
	$.ajax({
		url : ajax_params.url,
		data:data,
		type:'POST',
		beforeSend: function( xhr ){
			$('.category-list-view .category-loader').addClass("d-flex").removeClass("d-none");
			setParam('page', category_page);
		},
		success:function(data){
			if(remove_posts){
				$(".recent-post:first")
				$(".category-list-view").html('');
				$(".category-loader").addClass("d-none").removeClass("d-block");
			}else{
				$(".category-filler").parent().remove();
				$(".category-loader").remove();
			}
			
			if( data ) {
				$('.category-list-view').append( data ); 
				canBeLoaded = true; 
				category_page++;
				if(remove_posts){
					$([document.documentElement, document.body]).animate({
				        scrollTop: $(".category-list-view").offset().top
				    }, 1000);
				}
			}
			/* single component */
			$(".article-single .article-single-image a").hover(function(){
				$(this).parents().eq(2).toggleClass("hovered");
			});
			$(".article-single .article-single-content .article-single-content-title .title a").hover(function(){
				$(this).parents().eq(4).toggleClass("hovered");
			});
		}
	});
}
function setParam(param, mode = ''){
	var url = new URL(location.href);
	if(mode){
		url.searchParams.set(param, mode);
	}
	else{
		url.searchParams.delete(param);
	}
	url.search = url.searchParams.toString();
	var new_url = url.toString(); 
	window.history.pushState('page2', 'Title', new_url);
}

// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
function getPageList(totalPages, page, maxLength) {
	page = parseInt(page);
	if (maxLength < 5) throw "maxLength must be at least 5";

	function range(start, end) {
		return Array.from(Array(end - start + 1), (_, i) => i + start);
	}

	var sideWidth = maxLength < 9 ? 1 : 2;
	var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
	var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
	if (totalPages <= maxLength) {
		// no breaks in list
		return range(1, totalPages);
	}
	if (page <= maxLength - sideWidth - 1 - rightWidth) {
		// no break on left of page
		return range(1, maxLength - sideWidth - 1)
		.concat([0])
		.concat(range(totalPages - sideWidth + 1, totalPages));
	}
	if (page >= totalPages - sideWidth - 1 - rightWidth) {
		// no break on right of page
		return range(1, sideWidth)
		.concat([0])
		.concat(
		range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
		);
	}
	// Breaks on both sides
	return range(1, sideWidth)
	.concat([0])
	.concat(range(page - leftWidth, page + rightWidth))
	.concat([0])
	.concat(range(totalPages - sideWidth + 1, totalPages));
}
function isScrolledIntoView(elem)
{
    var scrollTop = $(window).scrollTop();
    var scrollBottom = $(window).scrollTop() + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return ((elemTop - $(window).height() + 100 < scrollTop) && (elemBottom + $(window).height() > scrollBottom));
}
$(function() {
	// Number of items and limits the number of items per page
	var numberOfItems = $(".category-list-view").data('count');
	var limitPerPage = 15;
	// Total pages rounded upwards
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	// Number of buttons at the top, not counting prev/next,
	// but including the dotted buttons.
	// Must be at least 5:
	var paginationSize = 7;
	var currentPage;

	function showPage(whichPage) {
		$(".category-loader").addClass("d-block").removeClass("d-none");
		if (whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".category-list-view .category-post-row").css('visibility', 'hidden');
		// Replace the navigation items (not prev/next):
		$(".pagination li").slice(1, -1).remove();
		if(whichPage == 1){
			$("#previous-page").addClass("disabled");
		}
		else{
			$("#previous-page").removeClass("disabled");
		}
		if(whichPage == totalPages){
			$("#next-page").addClass("disabled");
		}
		else{
			$("#next-page").removeClass("disabled");
		}
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass(
				"page-item " +
				(item ? "current-page " : "") +
				(item === currentPage ? "active " : "")
			).attr('data-page', item).append(
				$("<a>").addClass("page-link").attr({
					href: "javascript:void(0)"
				})
				.text(item || "...")
			).insertBefore("#next-page");
		});
		get_category_posts(whichPage, true);
		return true;
	}
	if($(".category-list-view").length && $(window).width() > 769){

		var url = new URL(window.location.href);
		var page = url.searchParams.get("page");
		currentPage = page;
		if(!$(".pagination li[data-page='"+page+"']").hasClass('active')){
			$(".pagination li[data-page='"+page+"']").addClass('active');
		}
  	}
	// Use event delegation, as these items are recreated later
	$(document).on("click", ".pagination li.current-page:not(.active)", function(e) {
		e.preventDefault();
		return showPage(+$(this).text());
	});
	$(document).on("click", ".pagination #next-page:not(.disabled)", function(e) {
		e.preventDefault();
		return showPage(currentPage + 1);
	});
	$(document).on("click", ".pagination #previous-page:not(.disabled)", function(e) {
		e.preventDefault();
		return showPage(currentPage - 1);
	});
});

$(window).scroll(function(){
	if($(".category-list-view").length && $(window).width() < 769 && ($(window).scrollTop() > $(".category-list-view .category-post-row .article-single:last").position().top) && canBeLoaded == true){
		canBeLoaded = false;
		var url = new URL(window.location.href);
		var page = url.searchParams.get("page");
		page = parseInt(page) + 1;
		get_category_posts(page, false);
	}
});
if($(".category-list-view").length && $(window).width() < 769){
	var url = new URL(window.location.href);
	var page = url.searchParams.get("page");
	if(page){
		get_category_posts(page);
	}
	else{
		get_category_posts(1);
	}
}
/* category page end */
/* single blog page */
$(".article-tags a").addClass("article-tags__tag");

/* replace with spaces */
$(".article-single .article-single-content .article-single-content-description").each(function() {
	var str = $(this).html().replace(/&nbsp;/g,' ');
	$(this).html(str);
});
$(".latest-articles-single .latest-articles-single-content .content-description").each(function() {
	var str = $(this).html().replace(/&nbsp;/g,' ');
	$(this).html(str);
});
$("p").each(function() {
	var str = $(this).html().replace(/&nbsp;/g,' ');
	$(this).html(str);
});