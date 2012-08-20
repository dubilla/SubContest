<div class="game not-started">
	<?= $this->html->link($game->awayTeam()->location, 'games/pick/' . $game->_id . '/' . $game->awayTeam->abbreviation); ?><br />
	<?= $this->html->link($game->homeTeam()->location, 'games/pick/' . $game->_id . '/' . $game->homeTeam->abbreviation); ?> (<?= $this->game->line($game->line); ?>)
</div>
