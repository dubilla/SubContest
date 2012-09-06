<?php

namespace app\extensions\command;

use app\models\Games;

class Scoring extends \lithium\console\Command {

	public function run() {
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

}

?>
