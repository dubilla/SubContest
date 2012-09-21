<?php

namespace app\controllers;

use app\models\Games;
use app\models\Users;

class StandingsController extends \lithium\action\Controller {

	public function index() {
		$userConditions = array('seasons' => 2012);
		$userFields = array('password' => 0);
		$users = Users::all(array('conditions' => $userConditions, 'fields' => $userFields));

		$gameConditions = array(
			'season' => 2012, 
			'picks' => array('$exists' => true), 
			'$or' => array(
				array('winner' => array('$exists' => true)),
				array('push' => array('$exists' => true))
			)
		);
		$games = Games::all(array('conditions' => $gameConditions));

		$standings = array();

		foreach ($users as $user) {
			$standings[$user['username']] = array('name' => $user['firstName'], 'score' => 0);
		}

		foreach ($games as $game) {
			foreach ($game->picks as $username => $pick) {
				if ($pick == $game->winner) {
					$standings[$username]['score'] += 1;
				}
				else if (isset($game->push)) {
					$standings[$username]['score'] += 0.5;
				}
			}
		}

		uasort($standings, array($this, 'sortStandings'));

		return compact('users', 'standings', 'time');
	}

	private static function sortStandings($a, $b) {
		if ($a['score'] == $b['score']) {
			if ($a['name'] == $b['name']) {
				return 0;
			}

			return ($a['name'] < $b['name']) ? -1 : 1;
		}

		return ($a['score'] > $b['score']) ? -1 : 1;
	}

}

?>
