<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Games;

class WeeksController extends \lithium\action\Controller {

	public function view($week = null) {
		if (!isset($week)) {
			$start = mktime(0, 0, 0, 9, 5, 2012);
			$now = mktime();

			$days = intval(($now - $start) / 86400);

			if ($days < 7) {
				$week = 1;
			}
			else {
				$week = intval(($days / 7) + 1);
			}

			if ($week > 17) {
				$week = 17;
			}
		}

		date_default_timezone_set('US/Eastern');

		$user = Auth::check('default');
		$username = $user['username'];

		$conditions = array('week' => intval($week));
		$order = array('kickoff' => 1, 'awayTeam.abbreviation' => 1);
		$fields = array('awayTeam' => 1, 'homeTeam' => 1, 'kickoff' => 1, 'line' => 1, 'picks.' . $username => 1);

		$games = Games::all(compact('conditions', 'order', 'fields'));

		return compact('games', 'week', 'username');
	}

}

?>
