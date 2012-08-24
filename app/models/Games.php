<?php

namespace app\models;

use app\models\Teams;

class Games extends \lithium\data\Model {

	protected $_schema = array(
		'_id' => array('type' => 'id')
	);

	public function awayTeam($entity) {
		return self::team($entity->awayTeam->abbreviation);
	}

	public function homeTeam($entity) {
		return $this->team($entity->homeTeam->abbreviation);
	}

	public function hasStarted($entity) {
		return ($entity->kickoff->sec < time());
	}

	public function pick($entity, $username, $team) {
		if ($entity->hasStarted()) {
			return false;
		}

		if (!isset($entity->picks)) {
			$entity->picks = array();
		}

		$entity->picks[$username] = $team;
		return $entity->save();
	}

	private function team($abbreviation) {
		$conditions = array('abbreviation' => $abbreviation);
		$team = Teams::first(compact('conditions'));

		return $team;
	}

	public function unpick($entity, $username) {
		if ($entity->hasStarted()) {
			return false;
		}

		if (isset($entity->picks[$username])) {
			unset($entity->picks[$username]);
		}

		return $entity->save();
	}

}

?>
