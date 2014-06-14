document.addEventListener("DOMContentLoaded", function() {
		// Get the is_current_position and end_date fields
	var isCurrent = document.getElementById('workHistory_is_current_position'),
		endDate = document.getElementById('workHistory_end_date'),
		// Find the individual selects which make up the end_date (slice = array like to array)
		endDateSelects = Array.prototype.slice.call(endDate.children),
		
		/**
		 * Toggles the End date field between having the disabled attribute true/false.
		 * 
		 * @returns {undefined}
		 */
		toggleEndDateDisabled = function () {
			// Apply to each select
			endDateSelects.forEach(function (select) {
				// If not disabled
				if (select.getAttribute('disabled') === null) {
					// Make it disabled
					select.setAttribute('disabled', true);
				} else {
					// Else remove the disabled attribute
					select.removeAttribute('disabled');
				}
			});
		};
	
	// If the is_current field is checked when the page loads, we disabled the end_date field
	if (isCurrent.checked) {
		toggleEndDateDisabled();
	}
	
	// Add a change event listener to toggle the end_date field when the is_current_position checkbox is clicked
	isCurrent.addEventListener('change', function (e) {
		toggleEndDateDisabled();
	}, false);
}, false);