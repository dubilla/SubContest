<?php

namespace app\extensions\command;

use app\models\Games;
use app\models\Teams;

class Lines extends \lithium\console\Command {

	public $update;

	public function run() {
		$weeklyCard = file_get_contents('http://www.thelvh.com/supercontestweeklycard');

		$weekPattern = '/<strong>PRO FOOTBALL WEEK #(\d\d?)<\/strong>/';
		preg_match($weekPattern, $weeklyCard, $weekMatches);
		$week = intval($weekMatches[1]);

		$gamePattern = '/<tr.*?>\s*<td.*?>\d\d? (.*?)<\/td>\s*<td.*?>.*?<\/td>\s*<td.*?>\d\d?:\d\d [AP]M<\/td>\s*<td.*?>\d\d? (.*?)<\/td>\s*<td.*?>(.*?)<\/td>\s*<\/tr>/';
		preg_match_all($gamePattern, $weeklyCard, $gameMatches);

		$gameCount = count($gameMatches[0]);

		for ($i = 0; $i < $gameCount; $i++) {
			$unparsed = array(
				'favorite' => $gameMatches[1][$i],
				'underdog' => $gameMatches[2][$i],
				'line' => $gameMatches[3][$i]
			);

			$parsed = array();
			$searches = array(' 1/2', 'PK');
			$replacements = array('.5', '0');

			if (strpos($unparsed['favorite'], '*') !== FALSE) {
				$parsed['awayTeam'] = $unparsed['underdog'];
				$parsed['homeTeam'] = str_replace('*', '', $unparsed['favorite']);

				array_push($searches, '+');
				array_push($replacements, '-');

				$parsed['line'] = doubleval(str_replace($searches, $replacements, $unparsed['line']));
			}
			else if (strpos($unparsed['underdog'], '*') !== FALSE) {
				$parsed['awayTeam'] = $unparsed['favorite'];
				$parsed['homeTeam'] = str_replace('*', '', $unparsed['underdog']);

				array_push($searches, '+');
				array_push($replacements, '');

				$parsed['line'] = doubleval(str_replace($searches, $replacements, $unparsed['line']));
			}

			$homeTeam = Teams::first(array('conditions' => array(
				'mascot' => array(
					'$regex' => $parsed['homeTeam'],
					'$options' => 'i'
				)
			)));

			$awayTeam = Teams::first(array('conditions' => array(
				'mascot' => array(
					'$regex' => $parsed['awayTeam'],
					'$options' => 'i'
				)
			)));

			if ($this->update == 'true') {
				$conditions = array(
					'season' => 2013,
					'week' => $week,
					'awayTeam.abbreviation' => $awayTeam->abbreviation,
					'homeTeam.abbreviation' => $homeTeam->abbreviation,
					'awayTeam.score' => array('$exists' => false),
					'homeTeam.score' => array('$exists' => false),
					'winner' => array('$exists' => false),
					'push' => array('$exists' => false),
					'line' => array('$exists' => false)
				);

				$game = Games::first(compact('conditions'));

				if ($game) {
					$game->line = $parsed['line'];
					$game->save();
				}
			}
			else {
				$this->out($awayTeam->abbreviation . ' at ' . $homeTeam->abbreviation . ' (' . $parsed['line'] . ')');
			}
		}
	}

}

?>
