<?php

namespace app\controllers;

use app\models\Games;

class GamesController extends \lithium\action\Controller {

	public function pick($gameId, $team) {
		$conditions = array('_id' => $gameId);
		$game = Games::first(compact('conditions'));

		$success = $game->pick('jpnance', $team);

		return compact('success');
	}

	public function unpick($gameId) {
		$conditions = array('_id' => $gameId);
		$game = Games::first(compact('conditions'));

		$success = $game->unpick('jpnance');

		return compact('success');
	}

}

?>
