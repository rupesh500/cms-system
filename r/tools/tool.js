$(document).ready(function () {
	function clearColor() {
		$('body').removeClass('color-green color-orange color-light-blue color-turquoise color-sienna')
		$('header .logo img.colors').addClass('hidden');
	}
	$('.tools a').on('click', function (e) {
		e.preventDefault();
		var $this = $(this);
		clearColor();
		if ($this.hasClass('color-green')) {
			$('body').addClass('color-green');
			$('header .logo img.color-green').removeClass('hidden');
		}
		if ($this.hasClass('color-orange')) {
			$('body').addClass('color-orange');
			$('header .logo img.color-orange').removeClass('hidden');
		}
		if ($this.hasClass('color-light-blue')) {
			$('body').addClass('color-light-blue');
			$('header .logo img.color-light-blue').removeClass('hidden');
		}
		if ($this.hasClass('color-turquoise')) {
			$('body').addClass('color-turquoise');
			$('header .logo img.color-turquoise').removeClass('hidden');
		}
		if ($this.hasClass('color-sienna')) {
			$('body').addClass('color-sienna');
			$('header .logo img.color-sienna').removeClass('hidden');
		}
		if ($this.hasClass('color-blue')) {
			$('header .logo img.color-blue').removeClass('hidden');
		}
	})

})