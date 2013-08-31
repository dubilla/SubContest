<?php

namespace app\models;

use Exception;
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

	public function isFinal($entity) {
		return (isset($entity->winner) || (isset($entity->push) && $entity->push));
	}

	public function isPickedBy($entity, $username) {
		return (isset($entity->picks) && isset($entity->picks->$username));
	}

	public function pick($entity, $username, $team) {
		if ($entity->hasStarted() || $entity->isFinal()) {
			throw new Exception('You tried to pick a game that has already started.');
		}

		if ($team !== $entity->awayTeam->abbreviation && $team !== $entity->homeTeam->abbreviation) {
			throw new Exception('That team that isn\'t playing in that game.');
		}

		if (!$entity->isPickedBy($username)) {
			$week = $entity->week;

			$conditions = array('season' => 2013, 'week' => $week, ('picks.' . $username) => array('$exists' => true));
			$count = Games::count(compact('conditions'));

			if ($count >= 5) {
				throw new Exception('You\'ve already made five picks this week.');
			}
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
		if ($entity->hasStarted() || $entity->isFinal()) {
			throw new Exception('You tried to unpick a game that has already started.');
		}

		if (isset($entity->picks[$username])) {
			unset($entity->picks[$username]);
		}

		return $entity->save();
	}

	public function wasWonBy($entity, $username) {
		return ($entity->isFinal() && $entity->isPickedBy($username) && isset($entity->winner) && ($entity->picks->$username == $entity->winner));
	}

	public function wasPushedBy($entity, $username) {
		return ($entity->isFinal() && $entity->isPickedBy($username) && isset($entity->push));
	}

	public function wasLostBy($entity, $username) {
		return ($entity->isFinal() && $entity->isPickedBy($username) && isset($entity->winner) && ($entity->picks->$username != $entity->winner));
	}

}

?>
