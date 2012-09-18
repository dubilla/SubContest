<?php

namespace app\extensions\command;

use app\models\Games;

class Scoring extends \lithium\console\Command {

	public function determineWinners() {
		$games = Games::all();

		foreach ($games as $game) {
			if (!$game->isFinal()) {
				if (isset($game->line) && isset($game->homeTeam->score) && isset($game->awayTeam->score)) {
					$handicappedScore = ($game->homeTeam->score + $game->line) - $game->awayTeam->score;

					if ($handicappedScore == 0) {
						$game->push = true;
					}
					else if ($handicappedScore > 0) {
						$game->winner = $game->homeTeam->abbreviation;
					}
					else if ($handicappedScore < 0) {
						$game->winner = $game->awayTeam->abbreviation;
					}

					$game->save();
				}
			}
		}
	}

	public function loadNflScores() {
		$scores = file_get_contents('http://www.nfl.com/liveupdate/scorestrip/ss.xml');

		$weekSeasonPattern = '/<gms .*?w="(\d\d?)".*?y="(\d\d\d\d)".*?>/';
		preg_match($weekSeasonPattern, $scores, $weekSeasonMatches);
		$week = intval($weekSeasonMatches[1]);
		$season = intval($weekSeasonMatches[2]);

		$gamePattern = '/<g .*?q="F".*?h="(.*?)".*?hs="(\d\d?)".*?v="(.*?)".*?vs="(\d\d?)".*?\/>/';
		preg_match_all($gamePattern, $scores, $gameMatches);

		foreach ($gameMatches[0] as $i => $gameMatch) {
			$awayTeam = $gameMatches[3][$i];
			$awayScore = intval($gameMatches[4][$i]);
			$homeTeam = $gameMatches[1][$i];
			$homeScore = intval($gameMatches[2][$i]);

			$awayTeam = ($awayTeam == 'JAC') ? 'JAX' : $awayTeam;
			$homeTeam = ($homeTeam == 'JAC') ? 'JAX' : $homeTeam;

			$conditions = array(
				'season' => $season,
				'week' => $week,
				'awayTeam.abbreviation' => $awayTeam,
				'homeTeam.abbreviation' => $homeTeam,
				'awayTeam.score' => array('$exists' => false),
				'homeTeam.score' => array('$exists' => false),
				'winner' => array('$exists' => false),
				'push' => array('$exists' => false)
			);

			$game = Games::first(compact('conditions'));

			if ($game) {
				$game->awayTeam->score = $awayScore;
				$game->homeTeam->score = $homeScore;

				$game->save();
			}
		}

		return;
	}

	public function run() {
		$this->loadNflScores();
		$this->determineWinners();
	}

}

?>
