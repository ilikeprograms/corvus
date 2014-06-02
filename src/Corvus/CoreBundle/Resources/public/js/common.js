$(function () {
	var externalLinks = document.querySelectorAll('a[target="_blank"]'),
		extIcon = document.createElement('i'),
		spacer = document.createTextNode(String.fromCharCode(160));

	extIcon.classList.add('fa');
	extIcon.classList.add('fa-external-link');


	[].forEach.call([].slice.call(externalLinks), function (link) {
		link.appendChild(spacer.cloneNode(true));
		link.appendChild(extIcon.cloneNode(true));
	});
	
	$('*[data-toggle="tooltip"]').tooltip();
});