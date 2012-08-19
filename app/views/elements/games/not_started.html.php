<div class="game not-started">
	<?= $game->awayTeam()->location; ?><br />
	<?= $game->homeTeam()->location; ?> (<?= $this->game->line($game->line); ?>)
</div>
