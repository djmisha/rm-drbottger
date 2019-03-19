(function($) {
	if (
		/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
			navigator.userAgent
		)
	) {
		$("html").addClass("is--device");
		if (/iPad/i.test(navigator.userAgent)) {
			$("html").addClass("is--ipad");
		}
	} else {
		$("html").addClass("not--device");
	}

	$(function() {
		//doc.ready[shorthand] start

		var $desktop = 1080;
		var $tablet = 768;
		var theme_path = rm_data.tmplDirUri;
		var site_path = rm_data.siteUrl;



		/*================================
		=            Wow INIT            =
		================================*/

		new WOW({
			// mobile: false,
		}).init();


		/* Homepage Procedures Slideshow */

		// $('.bg-procedures .the-slider').flickity({
		//   cellAlign: 'left',
		//   contain: true,
		//   autoPlay: 4000,
		//   // fade: true, 
		//   groupCells: 2
		// });


		/*================================================================
		=            Custom Landing Page Header, Append Items            =
		================================================================*/

		// $(".tmpl_type_page_landing .site-crumbs").appendTo("header");
		// $(".tmpl_type_page_landing .page-title").appendTo("header");
		// $(".tmpl_type_page_landing .flexible-jump-links").appendTo("header");

	


		// }

		/*=======================================
		=            Reviews Rotator            =
		=======================================*/

		// $(".bg-procedures .the-slider").owlCarousel({
		// 	items: 2,
		// 	lazyLoad: true,
		// 	loop: true,
		// 	nav: false,
		// 	dots: true,
		// 	autoplay: true,
		// 	autoplayTimeout: 5000,
		// 	smartSpeed: 700
		// });

		// $(".owl-dots").appendTo(".reviews-box");



		/*================================
		=            Parallax            =
		================================*/

		$(window).on("load resize", function(e) {
			if ($("html").hasClass("is--device")) {
				if ($(".is-parallaxing").length > 0) {
					$(".will-parallax")
						.removeClass("is-parallaxing")
						.removeAttr("style");
				}
			} else {
				$(".will-parallax").addClass("parallax");
				$(".will-parallax").addClass("is-parallaxing");

				
				if ($(".parallax").hasClass("parallax")) {
					$(".will-parallax").waypoint(function() {
						$(".parallax-welcome").parallax("50%", -0.3, true); 
						$(".parallax-footer").parallax("50%", -0.1, true);
						$('.parallax-home-breast').parallax('50%', -0.3, true , 'is-parallaxing');
					});
				}
			}
		});


		/*============================================================
		=            Fancybox for WordPress Core Gallery             =
		============================================================*/

		// Activate Fancy Box for WP Core Gallery

		$(".gallery-icon a, .blocks-gallery-item a").attr("data-fancybox", "gallery");

		// Append the Caption

		$("dl.gallery-item").each(function(event) {
			var caption = $(this).find("dd").text();
			$(this).find("dt a").attr("data-caption", caption);
		});


		/*==================================================
		=            Video Page Isotope Sorting            =
		==================================================*/

		// init Isotope
		// var $grid = $(".video-grid").isotope({
		// 	itemSelector: ".video-block",
		// 	percentPosition: true,
		// 	  masonry: {
		// 	    // use element for option
		// 	    columnWidth: '.video-block'
		// 	  }
		// });
		// var filterFns = {};
		// // bind filter button click
		// $(".button-group").on("click", ".sorter-button", function() {
		// 	var filterValue = $(this).attr("data-filter");
		// 	// use filterFn if matches value
		// 	filterValue = filterFns[filterValue] || filterValue;
		// 	$grid.isotope({ filter: filterValue });
		// });
		// // change is-checked class on buttons
		// $(".button-group").each(function(i, buttonGroup) {
		// 	var $buttonGroup = $(buttonGroup);
		// 	$buttonGroup.on("click", ".sorter-button", function() {
		// 		$buttonGroup.find(".is-checked").removeClass("is-checked");
		// 		$(this).addClass("is-checked");
		// 	});
		// });

		/*===============================================
		=            Smooth Anchor Scrolling            =
		===============================================*/
		// Select all links with hashes
		// $('a[href*="#"]')
		// 	// Remove links that don't actually link to anything
		// 	.not('[href="#"]')
		// 	.not('[href="#0"]')
		// 	.click(function(event) {
		// 		// On-page links
		// 		if (
		// 			location.pathname.replace(/^\//, "") ==
		// 				this.pathname.replace(/^\//, "") &&
		// 			location.hostname == this.hostname
		// 		) {
		// 			// Figure out element to scroll to
		// 			var target = $(this.hash);
		// 			target = target.length
		// 				? target
		// 				: $("[name=" + this.hash.slice(1) + "]");
		// 			// Does a scroll target exist?
		// 			if (target.length) {
		// 				// Only prevent default if animation is actually gonna happen
		// 				event.preventDefault();

		// 				// if ($("html").hasClass("not--device")) {
		// 				$("html, body").animate(
		// 					{
		// 						scrollTop: target.offset().top
		// 					},
		// 					1200,
		// 					function() {
		// 						// Callback after animation
		// 						// Must change focus!
		// 						var $target = $(target);
		// 						$target.focus();
		// 						if ($target.is(":focus")) {
		// 							// Checking if the target was focused
		// 							return false;
		// 						} else {
		// 							// $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
		// 							// $target.focus(); // Set focus again
		// 						}
		// 					}
		// 				);
		// 				// }
		// 			}
		// 		}
		// 	});

		/*=============================================
		=            Track Outbound Clicks            =
		=============================================*/

		function trackOutboundLink(event) {
			// prevent the default behavior
			event.preventDefault();

			// get necessary info
			var url = this.href;
			var label =
				this.dataset.label !== "undefined" ? this.dataset.label : url; // Fallback to URL just in case no label was set. Safety first kids
			var target =
				this.target !== "" && this.target == "_blank" ? "new" : "self";

			// Just making sure this exists
			if (typeof gtag !== "undefined") {
				gtag("event", "click", {
					event_category: "outbound",
					event_label: label,
					transport_type: "beacon",
					event_callback: function() {
						if (target == "new") {
							window.open(url);
						} else {
							document.location = url;
						}
					}
				});
			} else {
				// trigger default behavior as fallback in case the gtag was omitted
				if (target == "new") {
					window.open(url);
				} else {
					document.location = url;
				}
			}
		} // end tarckOutboundLink()

		// Grab all our links
		var linksToTrack = document.querySelectorAll(".track-outbound");

		// Add click event to all of our tracked links
		for (var i = 0; i < linksToTrack.length; i++) {
			linksToTrack[i].addEventListener("click", trackOutboundLink, false);
		}
	}); // end of doc.ready
})(jQuery);
