<?php

namespace app\tests\cases\extensions\helper;

use app\extensions\helper\Standings;

class StandingsTest extends \lithium\test\Unit {

	public function setUp() {
		$this->standings = new Standings();
	}

	public function testScore() {
		$this->assertEqual('0', $this->standings->score(null));
		$this->assertEqual('0', $this->standings->score(0));
		$this->assertEqual('&frac12;', $this->standings->score(0.5));
		$this->assertEqual('&frac12;', $this->standings->score(.5));
		$this->assertEqual('1', $this->standings->score(1));
		$this->assertEqual('1 &frac12;', $this->standings->score(1.5));
		$this->assertEqual('10', $this->standings->score(10.0));
		$this->assertEqual('10 &frac12;', $this->standings->score(10.5));
	}

}

?>
