(function($) {

	'use strict';

	$(document).ready(function() {
		$('#fade').click(function() {
			$(this).hide();
			$('.popup').hide();
		});

		/* toggle dropdown */
		$(document).on('click', function(e) {
			var elem = $(e.target).closest('.header .account'),
				box  = $(e.target).closest('.account-dropdown');

			if (elem.length) {
				e.preventDefault();
				$('.account-dropdown').toggle();
			} else if (!box.length) {
				$('.account-dropdown').hide();
			}
		});
		$(document).on('click', function(e) {
			var elem = $(e.target).closest('.header .notifications'),
				box  = $(e.target).closest('.notifications-dropdown');

			if (elem.length) {
				e.preventDefault();
				$('.notifications-dropdown').toggle();
			} else if (!box.length) {
				$('.notifications-dropdown').hide();
			}
		});
		/* /toggle dropdown */

		/* modals */
		$('.modalLink').modal({
			trigger: '.modalLink',
			olay:'div.overlay',
			modals:'div.modal',
			animationEffect: 'fadeIn',
			animationSpeed: 500,
			moveModalSpeed: 'slow',
			background: '000000',
			opacity: 0.6,
			openOnLoad: false,
			docClose: true,
			closeByEscape: true,
			moveOnScroll: true,
			resizeWindow: true,
			close: 'button.false'
		});
		/* /modals*/

		/* toggle password visibility */
		$('input[type="password"].password_toggler').hideShowPassword(false, true);

		$('.rollmenu a.roll').click(function () {
			$(this).next().slideToggle('slow');
			$('.rollmenu a').not(this).next().slideUp('slow');
		});

		$('.container .col-right .become-merchant .close').click(function() {
			$('.container .col-right .become-merchant').hide();
		});

		// activate chosen select plugin
		if (($('.chzn-select').length > 0) && $('.chzn-select').chosen) {
			$('.chzn-select').chosen();
		}
	});

	$('.vertical_menu').find('.chapter').click(function() {
		if ($(this).hasClass('open')){
			$(this).next('ul').slideUp('slow');
			$(this).next('div').slideUp('slow');
			$(this).removeClass('open')
		} else {
			// close other content
			$('.vertical_menu').find('.chapter').not(this).next('ul').slideUp('slow');
			$('.vertical_menu').find('.chapter').not(this).next('div').slideUp('slow');
			$('.vertical_menu').find('.chapter').not(this).removeClass('open');

			// open clicked content
			$(this).next('ul').slideDown('slow');
			$(this).next('div').slideDown('slow');

			// add open class
			$(this).addClass('open');
		}
	});

	if ($('.tooltip').length > 0 && $('.tooltip').tooltipster) {
		$('.tooltip').tooltipster({
			position: 'bottom',
			maxWidth: 160
		});
	}

	// Navigation
	$('.left_col').find('ul').hide();
	$('.contact_dev').hide();


	// disable export button after click (to avoid spam on it)
	$(document).one('click', '.js-export-report', function() {
		var myThis = $(this);

		myThis.addClass('disabled');

		$(myThis).on('click', function(e) {
			e.preventDefault();
		});
	});

})(jQuery);
