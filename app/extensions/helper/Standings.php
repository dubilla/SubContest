<?php

namespace app\extensions\helper;

class Standings extends \lithium\template\Helper {

	public function score($score) {
		if (!isset($score)) {
			return '0';
		}
		else {
			$floor = floor($score);
			$half = $score - $floor;

			if ($half > 0) {
				return strval($floor) . ' &frac12;';
			}
			else {
				return strval($score);
			}
		}
	}

}

?>
