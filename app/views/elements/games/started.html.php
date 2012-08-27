<div class="game started <?= $game->isPickedBy('jpnance') ? 'picked' : ''; ?>">
	<div class="at"><br />at</div>
	<div class="teams">
		<span class="team"><?= $game->awayTeam()->location; ?></span><br />
		<span class="team"><?= $game->homeTeam()->location; ?></span> <span class="line"><?= $this->game->line($game->line); ?></span>
	</div>
</div>
