<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Games;
use app\models\Users;

class WeeksController extends \lithium\action\Controller {

	public function view($week = null) {
		if (!isset($week)) {
			$start = mktime(0, 0, 0, 9, 4, 2013);
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

		$conditions = array('season' => 2013, 'week' => intval($week));
		$order = array('kickoff' => 1, 'awayTeam.abbreviation' => 1);
		$fields = array('awayTeam' => 1, 'homeTeam' => 1, 'kickoff' => 1, 'line' => 1, 'picks' => 1, 'push' => 1, 'winner' => 1);

		$games = Games::all(compact('conditions', 'order', 'fields'));

		foreach ($games as $game) {
			if ($game->hasStarted()) {
				$awayPicks = array();
				$homePicks = array();

				if (isset($game->picks)) {
					foreach ($game->picks as $username => $pick) {
						$user = Users::findByUsername($username);

						if ($pick == $game->awayTeam->abbreviation) {
							array_push($awayPicks, $user->firstName);
						}
						else if ($pick == $game->homeTeam->abbreviation) {
							array_push($homePicks, $user->firstName);
						}
					}
				}

				sort($awayPicks);
				sort($homePicks);

				$game->awayTeam->picks = $awayPicks;
				$game->homeTeam->picks = $homePicks;
			}
		}

		$user = Auth::check('default');
		$username = $user['username'];

		return compact('games', 'week', 'username');
	}

}

?>
