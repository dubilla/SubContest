<?php

namespace app\controllers;

use app\models\Games;

class WeeksController extends \lithium\action\Controller {

	public function view($week) {
		if (!isset($week)) {
			$week = 1;
		}

		$conditions = array('week' => intval($week));
		$order = array('kickoff' => 1);

		$games = Games::all(compact('conditions', 'order'));

		return compact('games');
	}
}

?>
