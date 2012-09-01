<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Games;

class GamesController extends \lithium\action\Controller {

	public function pick($gameId, $team) {
		$conditions = array('_id' => $gameId);
		$game = Games::first(compact('conditions'));

		$success = false;
		$user = Auth::check('default');

		if ($user) {
			$success = $game->pick($user['username'], $team);
		}

		return compact('success');
	}

	public function unpick($gameId) {
		$conditions = array('_id' => $gameId);
		$game = Games::first(compact('conditions'));

		$success = false;
		$user = Auth::check('default');

		if ($user) {
			$success = $game->unpick($user['username']);
		}

		return compact('success');
	}

}

?>
