<?php

namespace app\models;

use lithium\storage\Cache;

class Users extends \lithium\data\Model {

	public static function findByUsername($username) {
		$conditions = array('username' => $username);
		$user = self::first(compact('conditions'));

		return $user;
	}

}

?>
