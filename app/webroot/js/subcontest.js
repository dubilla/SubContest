$(document).ready(function() {
	$('a.team').click(pickGame);
});

function pickGame(e) {
	var $this = $(this);
	$.getJSON($this.attr('href') + '.json');

	return false;
}
