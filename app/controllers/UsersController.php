<?php

namespace app\controllers;

use lithium\security\Auth;
use app\models\Users;

class UsersController extends \lithium\action\Controller {

	public function add() {
		$user = Users::create($this->request->data);

		if ($this->request->data) {
			if ($user->save()) {
				$this->redirect('Users::add');
			}
		}

		return compact('user');
	}

	public function index() {
		$adminCheck = Auth::check('default');

		if ($adminCheck && $adminCheck['username'] == 'jpnance') {
			$order = array('firstName' => 1);
			$users = Users::all(compact('order'));
		}

		return compact('users');
	}

}

?>
