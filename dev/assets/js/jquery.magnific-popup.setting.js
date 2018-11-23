export function module_magnific_setting() {
	$(function() {
		//magnific-popup
		$(".popup").magnificPopup({
			type: 'image',
			mainClass: 'mfp-with-zoom',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			gallery:{enabled:true}
		});
	});
}
