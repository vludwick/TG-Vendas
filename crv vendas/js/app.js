! function (n) {
	"use strict";

	function t() {
		n(".slimscroll").slimscroll({
			height: "auto",
			position: "right",
			size: "7px",
			color: "#9ea5ab",
			wheelStep: 5,
			touchScrollStep: 50
		})
	}
	t(), n(".navbar-toggle").on("click", function (e) {
		n(this).toggleClass("open"), n("#navigation").slideToggle(400)
	}), n(".navigation-menu>li").slice(-2).addClass("last-elements"), n('.navigation-menu li.has-submenu a[href="#"]').on("click", function (e) {
		n(window).width() < 992 && (e.preventDefault(), n(this).parent("li").toggleClass("open").find(".submenu:first").toggleClass("open"))
	}), n("#btn-fullscreen").on("click", function (e) {
		e.preventDefault(), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
	}), n(".button-menu-mobile").on("click", function (e) {
		e.preventDefault(), n("body").toggleClass("enlarge-menu"), t()
	}), n(".navigation-menu a").each(function () {
		var e = window.location.href.split(/[?#]/)[0];
		this.href == e && (n(this).parent().addClass("active"), n(this).parent().parent().parent().addClass("active"), n(this).parent().parent().parent().parent().parent().addClass("active"))
	}), n(".search-btn").on("click", function () {
		var e = n(this).data("target");
		e && n(e).toggleClass("open")
	}), n('[data-toggle="tooltip"]').tooltip(), n('[data-toggle="popover"]').popover(), Waves.init()
}(jQuery);