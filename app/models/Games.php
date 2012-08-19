<?php

namespace app\models;

use app\models\Teams;

class Games extends \lithium\data\Model {

	public function awayTeam($entity) {
		return self::team($entity->awayTeam->abbreviation);
	}

	public function homeTeam($entity) {
		return $this->team($entity->homeTeam->abbreviation);
	}

	public function hasStarted($entity) {
		return ($entity->kickoff->sec < time());
	}

	private function team($abbreviation) {
		$conditions = array('abbreviation' => $abbreviation);
		$team = Teams::first(compact('conditions'));

		return $team;
	}

}

?>
