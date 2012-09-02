<?php

namespace app\tests\cases\extensions\helper;

use lithium\data\entity\Document;
use app\extensions\helper\Team;

class TeamTest extends \lithium\test\Unit {

	public function setUp() {
		$this->team = new Team();
	}

	public function testName() {
		$giants = new Document(array('data' => array(
			'abbreviation' => 'NYG',
			'location' => 'New York',
			'mascot' => 'Giants'
		)));

		$jets = new Document(array('data' => array(
			'abbreviation' => 'NYJ',
			'location' => 'New York',
			'mascot' => 'Jets'
		)));

		$cowboys = new Document(array('data' => array(
			'abbreviation' => 'DAL',
			'location' => 'Dallas',
			'mascot' => 'Cowboys'
		)));

		$this->assertEqual('NY Giants', $this->team->name($giants));
		$this->assertEqual('NY Jets', $this->team->name($jets));
		$this->assertEqual('Dallas', $this->team->name($cowboys));
	}

}

?>
