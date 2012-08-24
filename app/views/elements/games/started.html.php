<div class="game started <?= $game->isPickedBy('jpnance') ? 'picked' : ''; ?>">
	<span class="team"><?= $game->awayTeam()->location; ?></span><br />
	<span class="team"><?= $game->homeTeam()->location; ?></span>
</div>
