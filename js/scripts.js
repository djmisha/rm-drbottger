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

		$('.the-slider').flickity({
		  cellAlign: 'left',
		  contain: true,
		  autoPlay: 6500,
		  wrapAround: true
		  // fade: true, 
		  // groupCells: 2
		});


		/*================================================================
		=            Custom Landing Page Header, Append Items            =
		================================================================*/

		// $(".tmpl_type_page_landing .site-crumbs").appendTo("header");
		$(".tmpl_type_page_landing .page-title").appendTo("header");
		// $(".tmpl_type_page_landing .flexible-jump-links").appendTo("header");

		/*=======================================
		=            Reviews Rotator            =
		=======================================*/

		// $(".the-slider").owlCarousel({
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
						$(".parallax-welcome").parallax("center", -0.3, true); 
						$(".parallax-footer").parallax("center", -0.1, true);
						$('.parallax-home-breast').parallax('center', -0.3, true , 'is-parallaxing');
						$(".parallax-internal-header").parallax("100%", -0.2, true);
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



		/*=============================================
		=            Gallery Nudity Pop Up            =
		=============================================*/

		if ($("body.rmgallery-child").length) {
			if ($.cookie("gallerypop") == null) {
				console.log(theme_path);
				$.fancybox.open({
					src: theme_path + "/popup.php",
					type: "ajax",
					opts: {
						scrolling: "no",
						transitionEffect: "fade",
						modal: true,
						helpers: {
							overlay: {
								css: {
									background: "rgba(0, 0, 0, 0.96)"
								}
							}
						},
						live: true,
						afterClose: function() {
							$.cookie("gallerypop", "rmg", {
								expires: 1,
								path: "/"
							});
						}
					}
				});
			} //end cookies check
		}
		

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
