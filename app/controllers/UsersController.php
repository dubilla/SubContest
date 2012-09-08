<?php

namespace app\controllers;

use app\models\Users;

class UsersController extends \lithium\action\Controller {

	public function add() {
		$user = Users::create($this->request->data);

		if ($this->request->data) {
			$user->seasons = array(2011, floatval(2012), doubleval(2013));

			if ($user->save()) {
				$this->redirect('Users::add');
			}
		}

		return compact('user');
	}

}

?>
