<?php

namespace app\extensions\helper;

class Team extends \lithium\template\Helper {

	public function name($team) {
		if ($team->abbreviation == 'NYG') {
			return 'NY Giants';
		}
		else if ($team->abbreviation == 'NYJ') {
			return 'NY Jets';
		}
		else {
			return $team->location;
		}
	}

}

?>
