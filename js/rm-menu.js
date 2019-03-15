/*================================
	=            RM Menu             =
	================================*/

$tablet = 768;
$desktop = 1080;

// Insert Nav Dropdown Button

$(
	'<span class="nav-dropdown-button"><span class="dropdown-arrow"></span></span>'
).insertAfter(".menu-item-has-children > a");

// Insert Close Button

$(
	'<span class="close-menu"><i class="fal fa-times" aria-hidden="true"></i></span>'
).insertAfter(".main-menu");
// Add/Remove Off-Canvas Menu Classes

// var the_Menu_is_Closed = true;
// $(".menu-trigger").click(function () {
// 	$(".menu-wrap").toggleClass('menu-is-open');
// 	$('.menu-trigger').toggleClass('open');

// 	var el = $(this);
// 	the_Menu_is_Closed = false;
// 	$(".menu-wrap").removeClass('menu-is-closed');
// });

// $(".menu-wrap").click(function() {
// 	the_Menu_is_Closed = false;
// });

// $("html, .close-menu").click(function () {
// 	if (the_Menu_is_Closed) {
// 		$(".menu-wrap").addClass('menu-is-closed');
// 		$(".menu-wrap").removeClass('menu-is-open');
// 	}
// 	the_Menu_is_Closed = true;
// });

$("body").addClass("menu-is-closed");

$(".menu-trigger").click(function() {
	var el = $(this);
	slideRightRemoveClass = false;

	if (
		$("body").hasClass("menu-is-open") ||
		$("body").hasClass("menu-is-closed")
	) {
		$("body").toggleClass("menu-is-open");
		$("body").toggleClass("menu-is-closed");
		// $('.menu-trigger').toggleClass('open');
	} else {
		$("body").addClass("menu-is-open");
	}
});

// Can Close the menu on click of a nav item, if needed
// $('.menu-item a').click(function(event) {
// 	$('body').addClass('menu-is-closed');
// 	$("body").removeClass('menu-is-open');
// });

$(".close-menu").click(function() {
	$("body").removeClass("menu-is-open");
	$("body").addClass("menu-is-closed");
});

// This can close the menu if on page anchor links are used
// $('.menu-item a').click(function(event) {
// 	$('.menu-wrap').addClass('menu-is-closed');
// 	$('.menu-wrap').removeClass('menu-is-open');
// });

// Make the mobile menu work when switching between sizes

$(window).on("load resize", function(e) {
	// if ($("html").hasClass("is--device") || $(window).width() < $desktop) {
	// 	$(".menu-wrap").removeClass("hover-menu");
	$(".menu-wrap").addClass("touch-menu");
	// 	// $(".menu-wrap").removeClass("menu-is-closed");
	// } else {
	$(".menu-wrap").removeClass("menu-is-open");
	// $(".menu-wrap").removeClass("touch-menu");
	// $(".menu-wrap").addClass("hover-menu");
	// }

	// if ($("html").hasClass("is--device") || $(window).width() < $desktop) {
	// Make dropdown button same height as #menu-main a

	$(".nav-dropdown-button").each(function(index, obj) {
		var navDropdown = $(this)
			.prev()
			.outerHeight();
	});

	$(
		".touch-menu > .main-menu > li.menu-item-has-children > .nav-dropdown-button, .touch-menu .sub-menu > li.menu-item-has-children > .nav-dropdown-button"
	).unbind("click");
	$(
		".touch-menu > .main-menu > li.menu-item-has-children > .nav-dropdown-button, .touch-menu .sub-menu > li.menu-item-has-children > .nav-dropdown-button"
	).on("click", function(e) {
		e.preventDefault();
		var el = $(this);
		el.parent().toggleClass("sub-menu-open");
		el.next().slideToggle(400);
	});
	// } else {
	// $(
	// 	".menu > li.menu-item-has-children > a, .menu .sub-menu > li.menu-item-has-children > a"
	// ).unbind("click");
	// $("ul.sub-menu, .menu").removeAttr("style");
	// }
});
