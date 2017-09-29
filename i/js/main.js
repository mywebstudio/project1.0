$(document).ready(function () {
	try {
		$.browserSelector(), $("html").hasClass("chrome") && $.smoothScroll()
	} catch (e) {
	}
	$("img, a").on("dragstart", function (e) {
		e.preventDefault()
	});
	var l = $(window).height() - $(".header-height").height();
	$(window).width() > 768 ? $(".slider .slider__item").css({height: l}) : $(".slider .slider__item").css({height: "300px"}), $(window).scroll(function () {
		$(this).scrollTop() > $(".header-height").height() ? $("header").addClass("header--shadow") : $("header").removeClass("header--shadow")
	}), $(".main-slider .slider, .product-slider .slider").lightSlider({
		item: 1,
		slideMargin: 0,
		loop: !0,
		auto: !0,
		pause: 4e3,
		pauseOnHover: !0,
		mode: "fade",
		speed: 1600,
		prevHtml: '<i class="fa fa-angle-left"></i>',
		nextHtml: '<i class="fa fa-angle-right"></i>',
		addClass: "main-slider__outer"
	}), $(".slider-min__slider").lightSlider({
		gallery: !0,
		item: 1,
		slideMargin: 0,
		loop: !0,
		auto: !0,
		pause: 4e3,
		pauseOnHover: !0,
		thumbMargin: 1,
		thumbItem: 13,
		mode: "fade",
		speed: 1600,
		prevHtml: '<i class="fa fa-angle-left"></i>',
		nextHtml: '<i class="fa fa-angle-right"></i>',
		addClass: "sm-outer",
		galleryMargin: 0,
		onSliderLoad: function (e) {
			e.lightGallery({selector: ".slider-min__slider .lslide", mode: "lg-fade", speed: 1200, download: !1})
		}
	}), $(".pw-slider__slider").lightSlider({
		gallery: !0,
		item: 1,
		slideMargin: 0,
		loop: !0,
		auto: !0,
		pause: 4e3,
		pauseOnHover: !0,
		thumbMargin: 1,
		thumbItem: 5,
		mode: "fade",
		speed: 1600,
		controls: !1,
		prevHtml: '<i class="fa fa-angle-left"></i>',
		nextHtml: '<i class="fa fa-angle-right"></i>',
		addClass: "sm-outer",
		galleryMargin: 0,
		onSliderLoad: function (e) {
			e.lightGallery({selector: ".pw-slider__slider .lslide", mode: "lg-fade", speed: 1200, download: !1})
		}
	}), $(".main-nav__close").click(function () {
		$(".main-nav").fadeOut(600)
	}), $(".btn-sandwich").click(function () {
		$(".main-nav").fadeIn(600)
	}), function () {
		[].slice.call(document.querySelectorAll(".tabs")).forEach(function (e) {
			new CBPFWTabs(e)
		})
	}(), $(".more").mPageScroll2id()
});