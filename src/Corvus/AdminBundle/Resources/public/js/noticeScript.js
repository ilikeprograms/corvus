jQuery(function() {
	// Slowly slide down the flash notice and pause for 2 seconds then fade out
	jQuery('#flash-notice').slideDown(2000).delay(2000).fadeOut();

	jQuery('#selectAll').click(function() {
		jQuery('.case').attr('checked', this.checked);
	});

	jQuery('.case').click(function() {
		if(jQuery('.case').length == jQuery('.case:checked').length) {
			jQuery('#selectAll').attr('checked', 'checked');
		} else {
			jQuery('#selectAll').removeAttr('checked');
		}
	});
});

(function () {
	var internalRoutes = document.getElementById('navigation_internalRoutes'),
		navigationHref = document.getElementById('navigation_href'),
		hrefValue = null;
	
	if (!navigationHref) { return }
	
	internalRoutes.addEventListener('change', function (e) {
		var selected = internalRoutes.selectedIndex,
			selectedRoute = internalRoutes.options[selected].value;

		if (selected === 0) {
			$(navigationHref).slideDown();
			navigationHref.value = hrefValue;
			hrefValue = null;
		} else {
			if (hrefValue === null) {
				hrefValue = navigationHref.value;
			}

			navigationHref.value = selectedRoute;
		
			$(navigationHref).slideUp();
		}

	}, false);
}());