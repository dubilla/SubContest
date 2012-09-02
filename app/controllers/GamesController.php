<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Games;

class GamesController extends \lithium\action\Controller {

	public function pick($gameId, $team) {
		$action = 'pick';

		$conditions = array('_id' => $gameId);
		$fields = array('awayTeam' => 1, 'homeTeam' => 1, 'kickoff' => 1);
		$game = Games::first(compact('conditions'));

		$pick = $team;

		$success = false;
		$user = Auth::check('default');

		if ($user) {
			$success = $game->pick($user['username'], $team);
		}

		return compact('success', 'action', 'pick', 'game');
	}

	public function unpick($gameId) {
		$action = 'unpick';

		$conditions = array('_id' => $gameId);
		$fields = array('kickoff' => 1);
		$game = Games::first(compact('conditions'));

		$success = false;
		$user = Auth::check('default');

		if ($user) {
			$success = $game->unpick($user['username']);
		}

		return compact('success', 'action', 'game');
	}

}

?>
