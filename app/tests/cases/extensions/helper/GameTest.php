<?php

namespace app\tests\cases\extensions\helper;

use app\extensions\helper\Game;

class GameTest extends \lithium\test\Unit {

	public function setUp() {
		$this->game = new Game();
	}

	public function testLine() {
		$this->assertEqual('--', $this->game->line(null));
		$this->assertEqual('PK', $this->game->line(doubleval(0)));
		$this->assertEqual('+1.5', $this->game->line(doubleval(1.5)));
		$this->assertEqual('-10.5', $this->game->line(doubleval(-10.5)));
		$this->assertEqual('+4.0', $this->game->line(doubleval(4)));
		$this->assertEqual('-3.0', $this->game->line(doubleval(-3)));
		$this->assertEqual('-7.0', $this->game->line(doubleval(-7.0)));
	}

}

?>
