/*
 * Responsive Menu Script
 *
 * Child Theme Name: OBM-Genesis-Child
 * Author: Orange Blossom Media
 * Url: https://orangeblossommedia.com/
 */

(function( $ ) {
	"use strict";
	$(function() {

		$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon">menu</div>');

		$(".responsive-menu-icon").click(function(){
			$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").slideToggle();
		});

		$(window).resize(function(){
			if(window.innerWidth > 768) {
				$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
				$(".responsive-menu > .menu-item").removeClass("menu-open");
			}
		});

		$(".responsive-menu > .menu-item").click(function(event){
			if (event.target !== this)
			return;
				$(this).find(".sub-menu:first").slideToggle(function() {
				$(this).parent().toggleClass("menu-open");
			});
		});

	});

}(jQuery));