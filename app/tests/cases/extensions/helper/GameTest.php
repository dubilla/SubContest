<?php

namespace app\tests\cases\extensions\helper;

use app\extensions\helper\Game;

class GameTest extends \lithium\test\Unit {

	public function setUp() {
		$this->game = new Game();
	}

	public function testLine() {
		$this->assertEqual('--', $this->game->line(null));
		$this->assertEqual('--', $this->game->line(''));
		$this->assertEqual('PK', $this->game->line(0));
		$this->assertEqual('+1.5', $this->game->line(1.5));
		$this->assertEqual('-10.5', $this->game->line(-10.5));
		$this->assertEqual('+4.0', $this->game->line(4));
		$this->assertEqual('-3.0', $this->game->line(-3));
		$this->assertEqual('-7.0', $this->game->line(-7.0));
	}

}

?>
