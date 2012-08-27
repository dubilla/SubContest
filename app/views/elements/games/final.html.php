<div class="game final <?= $game->isPickedBy('jpnance') ? 'picked' : ''; ?>">
	<div class="at"><br />at</div>
	<div class="teams">
		<span class="team"><?= $game->awayTeam()->location; ?></span><br />
		<span class="team"><?= $game->homeTeam()->location; ?></span>
	</div>
	<div class="scores">
		<span class="score"><?= $game->awayTeam->score; ?><br />
		<span class="score"><?= $game->homeTeam->score; ?><br />
	</div>
</div>
