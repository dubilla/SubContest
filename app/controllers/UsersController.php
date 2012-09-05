<?php

namespace app\controllers;

use app\models\Users;

class UsersController extends \lithium\action\Controller {

	public function add() {
		$user = Users::create($this->request->data);

		if ($this->request->data && $user->save()) {
			$this->redirect('Users::add');
		}

		return compact('user');
	}

}

?>
