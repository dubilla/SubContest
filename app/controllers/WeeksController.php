<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Games;

class WeeksController extends \lithium\action\Controller {

	public function view($week = null) {
		if (!isset($week)) {
			$week = 1;
		}

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
