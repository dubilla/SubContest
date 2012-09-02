<div class="game started <?= $game->isPickedBy($username) ? 'picked' : ''; ?>">
	<div class="at"><br />at</div>
	<div class="teams">
		<span class="team"><?= $this->team->name($game->awayTeam()); ?></span><br />
		<span class="team"><?= $this->team->name($game->homeTeam()); ?></span> <span class="line"><?= $this->game->line($game->line); ?></span>
	</div>
</div>
