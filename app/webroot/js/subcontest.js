$(document).ready(function() {
	$('a.team').click(pickGame);
});

function pickGame(e) {
	var $this = $(this);
	$.get($this.attr('href'));

	return false;
}
