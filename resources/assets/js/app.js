require('./bootstrap');

let opVars = {};

let openingsSavePos = function () {
	let ue = ((opVars.oc.offset().top - $(window).scrollTop()) + opVars.oc.outerHeight()) - $(window).height() - 2;
	opVars.ob.css('bottom', ue > 0 ? ue : 0);
};

$(function () {
	let oc = $('#openings-card');
	if (oc.length) {
		opVars.oc = oc;
		opVars.ob = $('#openings-save-bar');
		opVars.oh = opVars.ob.outerHeight();
		$(window).scroll(openingsSavePos).scroll();
	}
});
