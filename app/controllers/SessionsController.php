<?php

namespace app\controllers;

use lithium\security\Auth;
use lithium\security\Password;

class SessionsController extends \lithium\action\Controller {

	public function add() {
		if ($this->request->data) {
			if (Auth::check('default', $this->request)) {
				return $this->redirect('/');
			}
			else {
				return $this->redirect('/sessions/add');
			}
		}
	}

}

?>
