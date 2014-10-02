(function (window) {
    "use strict";

    var corvus = {
        /**
        * Displays a bootstrap Alert, customised by the options provided.
        * 
        * @param {String} title Title to display in the header of the Alert
        * @param {String} body A message to display in the body of the Alert
        * @param {String} alertType The bootsrap type of alert (default, primary, info, warning, danger)
        * 
        * @returns {undefined}
        */
        displayAlertTemplate: function (title, body, alertType, options) {
            var alertId = 'custom-alert',
                customAlert,
                alertLeft = ($(window).width() / 2) - 125,
                // Clone the alertTemplate then configure the Alert details
                alertTemplate = $('#alert-template').clone()
                    .removeAttr('id')
                    .removeClass('hidden')
                    .addClass('alert-top')
                    .addClass('alert-' + alertType)
                    .css({
                        left: alertLeft,
                        display: 'none'
                    }),
                optionsSelector = false,
                optionsHighlightPreserve = false,
                optionsTargetSelector;

            // Setup the title and body of the alert and then append it to the body
            $('strong', alertTemplate).html(title);
            $('p', alertTemplate).html(body);

            // If any Options were provided, customise the Alert
            if (options !== undefined) {
                // Set a custom id for this alert
                // Will stop conflicting when existing alerts slideUp
                if (options.hasOwnProperty('id')) {
                    alertId = options.id;
                }

                // If theres a Custom target for the alert
                // (which we can put highlight or put the alert after)
                if (options.hasOwnProperty('target')) {
                    // Now find the Actual target's selector
                    if (options.target.hasOwnProperty('selector')) {
                        optionsSelector = true;

                        optionsTargetSelector = options.target.selector;

                        // Custom method of how to put the Alert into the DOM
                        if (options.target.hasOwnProperty('method')) {
                            switch (options.target.method) {
                                case 'after':
                                    $(optionsTargetSelector).after(alertTemplate);
                                    break;
                                case 'append':
                                    $(optionsTargetSelector).append(alertTemplate);
                                    break;
                                default:
                                    $(optionsTargetSelector).after(alertTemplate);
                                    break;
                            }
                        } else {
                            $(optionsTargetSelector).after(alertTemplate);
                        }
                    } else {
                        // Default to appending to the body (will display at the top of window)
                        $('body').append(alertTemplate);
                    }

                    // If we want to highlight the Target/Selector
                    if (options.target.hasOwnProperty('highlight')) {
                        if (optionsSelector) {
                            // Add the Highlight to the Target
                            $(options.target.selector).addClass('alert-highlight');

                            // If the preserve option was provided, we may wish to keep the highlight
                            // of the target once the Alert disapears
                            if (options.target.highlight.hasOwnProperty('preserve')) {
                                optionsHighlightPreserve = options.target.highlight.preserve;
                            }
                        }
                    }

                    // We can also highlight a Custom target, not just the target above
                    if (options.hasOwnProperty('highlight')) {
                        if (options.hasOwnProperty('target')) {
                            // Add the Highlight to the Custome target
                            $(options.highlight.target).addClass('alert-highlight');
                        }
                    }

                    // As its not being appended to the Body
                    // We wont need the alert-top class
                    $(alertTemplate)
                        .removeAttr('style')
                        .removeClass('alert-top');
                } else {
                    // Fallback to Displaying the Alert normally, at the top of window
                    $('body').append(alertTemplate);
                }

                // If we dont want the Alert to be dismissable, remove the close button
                if (options.hasOwnProperty('dismissable')) {
                    if (options.dismissable === false) {
                        $('button.close', alertTemplate).remove();
                    }
                }
            } else {
                // Fallback to Displaying the Alert normally, at the top of window
                $('body').append(alertTemplate);
            }

            // Find previous Alerts (if they are general ones)
            customAlert = document.getElementById(alertId);

            // If an Alert already is displayed
            if (customAlert !== null) {
                // Slideup then remove the old alert
                $(customAlert).slideUp(function () {
                    $(this).remove();
                    // Now set the id of the new alert so the same can be pefromed again, then display it
                    $(alertTemplate)
                        .attr('id', alertId)
                        .slideDown();
                });
            } else {
                // Set the Id of the alert and display it
                $(alertTemplate)
                    .attr('id', alertId)
                    .slideDown();
            }

            // After 4000 milliseconds slide up the Alert then remove
            setTimeout(function () {
                // If we dont want to preserve the highlight when the Alert disappears
                // remove the alet-highlight class
                if (optionsSelector && optionsHighlightPreserve === false) {
                    $(options.target.selector).removeClass('alert-highlight');
                }

                // If preserve = true, we dont want to slide up, so return
                if (options !== undefined) {
                    if (options.hasOwnProperty('preserve') && options.preserve === true) {
                        return;
                    }
                }

                $(alertTemplate).slideUp(function () { $(this).remove(); });
            }, 4000);
        }
    };

    // Expore the Core Corvus object to the Global namespace
    window.Corvus = corvus;
})(window);