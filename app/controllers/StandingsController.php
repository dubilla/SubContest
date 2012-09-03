<?php

namespace app\controllers;

use app\models\Games;
use app\models\Users;

class StandingsController extends \lithium\action\Controller {

	public function index() {
		$userConditions = array('seasons' => 2012);
		$userFields = array('password' => 0);
		$users = Users::all(array('conditions' => $userConditions, 'fields' => $userFields));

		$gameConditions = array('season' => 2012);
		$games = Games::all(array('conditions' => $gameConditions));

		$standings = array();

		foreach ($users as $user) {
			$standings[$user['username']] = 0;
		}

		foreach ($games as $game) {
			if (isset($game->picks) && $game->isFinal()) {
				foreach ($game->picks as $username => $pick) {
					if ($pick == $game->winner) {
						$standings[$username] += 1;
					}
					else if (isset($game->push)) {
						$standings[$username] += 0.5;
					}
				}
			}
		}

		arsort($standings);

		return compact('users', 'standings');
	}

}

?>
