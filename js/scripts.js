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

		/*=========================================
		=            Sticky Footer Bar            =
		=========================================*/

		var stickyBarTop = 400;

		var stickyContact = function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > stickyBarTop) {
				$(".schedule-bar").addClass("fixed-bar");
			} else {
				$(".schedule-bar").removeClass("fixed-bar");
			}
		};

		stickyContact();

		$(window).scroll(function() {
			stickyContact();
		});


		/*==========================================================
		=            Clone Stuff for Overlay Navigation            =
		==========================================================*/

		// $(".nav-bar-logo")
		// 	.clone()
		// 	// .removeClass("nav-overlay")
		// 	.addClass("nav-overlay-logo")
		// 	.insertAfter(".menu-wrap");

		$(".nav-bar-social").clone().addClass("nav-bar-social-overlay").insertAfter(".menu-wrap");
		$(".nav-form").insertAfter(".menu-wrap");


		/* Append Virtual Consult button */

		// $(".tmpl_type_page .virtual-consulation, .from-blog .virtual-consulation, .tmpl_type_page_faqs .virtual-consulation").addClass("virtual-consulation-page-title").appendTo(".page-title");
		
		/*================================================================
		=            Custom Landing Page Header, Append Items            =
		================================================================*/

		$(".tmpl_type_page_landing .site-crumbs").appendTo("header");
		$(".tmpl_type_page_landing .page-title").appendTo("header");
		$(".tmpl_type_page_landing .flexible-jump-links").appendTo("header");

		/*==========================================
		=            Twenty Sliders BNA            =
		==========================================*/

		// $(window).load(function() {
		// 	setTimeout(function() {
		// 		$(".twentytwenty-container").twentytwenty();
		// 	}, 300);
		// });

		/*=========================================
		=            Sticky Nav Bar            =
		=========================================*/

		// $(".nav-bar")
		// 	.clone()
		// 	.addClass("sticky-nav-bar")
		// 	.insertAfter(".nav-bar");

		// var stickyNavTop = 600;

		// var stickyNav = function() {
		// 	var scrollTop = $(window).scrollTop();

		// 	if (scrollTop > stickyNavTop) {
		// 		$(".sticky-nav-bar").addClass("fixed-nav");
		// 	} else {
		// 		$(".sticky-nav-bar").removeClass("fixed-nav");
		// 	}
		// };

		// stickyNav();

		// $(window).scroll(function() {
		// 	stickyNav();
		// });

		/*========================================================
		=            Better Scroll Up Navigation Show            =
		========================================================*/

		// if ($("html").hasClass("not--device") || $(window).width() > $desktop) {
		// http://jsfiddle.net/mariusc23/s6mLJ/31/

		// Hide Header on on scroll down
		var didScroll;
		var lastScrollTop = 120;
		var delta = 5;
		var navbarHeight = $(".nav-bar").outerHeight();

		$(window).scroll(function(event) {
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
			if (Math.abs(lastScrollTop - st) <= delta) return;

			// If they scrolled down and are past the navbar, add class .nav-up.
			// This is necessary so you never see what is "behind" the navbar.
			if (st > lastScrollTop && st > navbarHeight) {
				// Scroll Down
				$(".nav-bar")
					.removeClass("nav-down")
					.addClass("nav-up");
			} else {
				// Scroll Up
				if (st + $(window).height() < $(document).height()) {
					$(".nav-bar")
						.removeClass("nav-up")
						.addClass("nav-down");
				}
			}

			lastScrollTop = st;
		}

		// }

		/*=======================================
		=            Reviews Rotator            =
		=======================================*/

		$(".home-our-reviews").owlCarousel({
			items: 1,
			lazyLoad: true,
			loop: true,
			nav: false,
			dots: true,
			autoplay: true,
			autoplayTimeout: 5000,
			smartSpeed: 700
		});

		$(".owl-dots").appendTo(".reviews-box");



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
						// $('.parallax-smileclub').parallax('50%', 0.5, true , 'is-parallaxing');
						$(".parallax-internal-header").parallax("50%", -0.2, true);
						$(".parallax-welcome").parallax("50%", -0.3, true); // $(".parallax-blur").parallax(
						// 	"50%", // 	0.3, // 	true, //// );
						// $(".parallax-primary-rhinoplasty").parallax("50%", -0.3, true);
						$(".parallax-reviews").parallax("50%", -0.3, true);
					});
				}
			}
		});



		// (function(d) {
		//     var a = d(window), k = a.height();
		//     a.resize(function() {
		//         k = a.height()
		//     });
		//     d.fn.parallax = function(e, f, b) {
		//         function g() {
		//             var h = a.scrollTop();
		//             c.each(function() {
		//                 var a = d(this), b = a.offset().top, a = l(a);
		//                 b + a < h || b > h + k || c.css("backgroundPosition", e + " " + Math.round((j - h) * f) + "px")
		//             })
		//         }
		//         var c = d(this), l, j;
		//         c.each(function() {
		//             j = c.offset().top
		//         });
		//         l = b ? function(a) {
		//             return a.outerHeight(!0)
		//         } : function(a) {
		//             return a.height()
		//         };
		//         if (1 > arguments.length || null === e)
		//             e = "50%";
		//         if (2 > arguments.length || null === f)
		//             f = 0.1;
		//         if (3 > arguments.length || null ===
		//         b)
		//             b=!0;
		//         a.scroll(g).resize(function() {
		//             c.each(function() {
		//                 j = c.offset().top
		//             });
		//             g()
		//         });
		//         g()
		//     }
		// })(jQuery);



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
		var $grid = $(".video-grid").isotope({
			itemSelector: ".video-block",
			percentPosition: true,
			  masonry: {
			    // use element for option
			    columnWidth: '.video-block'
			  }
		});
		var filterFns = {};
		// bind filter button click
		$(".button-group").on("click", ".sorter-button", function() {
			var filterValue = $(this).attr("data-filter");
			// use filterFn if matches value
			filterValue = filterFns[filterValue] || filterValue;
			$grid.isotope({ filter: filterValue });
		});
		// change is-checked class on buttons
		$(".button-group").each(function(i, buttonGroup) {
			var $buttonGroup = $(buttonGroup);
			$buttonGroup.on("click", ".sorter-button", function() {
				$buttonGroup.find(".is-checked").removeClass("is-checked");
				$(this).addClass("is-checked");
			});
		});

		/*===============================================
		=            Smooth Anchor Scrolling            =
		===============================================*/
		// Select all links with hashes
		$('a[href*="#"]')
			// Remove links that don't actually link to anything
			.not('[href="#"]')
			.not('[href="#0"]')
			.click(function(event) {
				// On-page links
				if (
					location.pathname.replace(/^\//, "") ==
						this.pathname.replace(/^\//, "") &&
					location.hostname == this.hostname
				) {
					// Figure out element to scroll to
					var target = $(this.hash);
					target = target.length
						? target
						: $("[name=" + this.hash.slice(1) + "]");
					// Does a scroll target exist?
					if (target.length) {
						// Only prevent default if animation is actually gonna happen
						event.preventDefault();

						// if ($("html").hasClass("not--device")) {
						$("html, body").animate(
							{
								scrollTop: target.offset().top
							},
							1200,
							function() {
								// Callback after animation
								// Must change focus!
								var $target = $(target);
								$target.focus();
								if ($target.is(":focus")) {
									// Checking if the target was focused
									return false;
								} else {
									// $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
									// $target.focus(); // Set focus again
								}
							}
						);
						// }
					}
				}
			});

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
