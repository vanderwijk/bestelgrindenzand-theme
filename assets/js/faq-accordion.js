(function ($) {

	var rankMath = {
		accordion: function () {
			$('.rank-math-block').find('.rank-math-answer').hide();
			$('.rank-math-block').find('.rank-math-question').click(function () {  
				//Expand or collapse this panel
				$(this).nextAll('.rank-math-answer').eq(0).slideToggle('fast', function () {
					if ($(this).hasClass('collapse')) {
						$(this).removeClass('collapse');
					}
					else {
						$(this).addClass('collapse');
					}
				});
				//Hide the other panels
				$(".rank-math-answer").not($(this).nextAll('.rank-math-answer').eq(0)).slideUp('fast');
			});

			$('.rank-math-block .rank-math-question').click(function () {
				$('.rank-math-block .rank-math-question').not($(this)).removeClass('collapse');
				if ($(this).hasClass('collapse')) {
					$(this).removeClass('collapse');
				}
				else {
					$(this).addClass('collapse');
				}
			});
		}
	};

	rankMath.accordion();

})(jQuery);