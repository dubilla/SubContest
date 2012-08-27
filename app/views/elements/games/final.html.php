<div class="game final <?= $game->wasWonBy($username) ? 'picked won' : ($game->wasPushedBy($username) ? 'picked pushed' : ($game->wasLostBy($username) ? 'picked lost' : '')); ?>">
	<div class="at"><br />at</div>
	<div class="teams">
		<span class="team <?= $game->isPickedBy($username) && $game->picks[$username] == $game->awayTeam->abbreviation ? 'pick' : ''; ?>"><?= $game->awayTeam()->location; ?></span><br />
		<span class="team <?= $game->isPickedBy($username) && $game->picks[$username] == $game->homeTeam->abbreviation ? 'pick' : ''; ?>"><?= $game->homeTeam()->location; ?></span> <span class="line"><?= $this->game->line($game->line); ?></span>
	</div>
	<div class="scores">
		<span class="score"><?= $game->awayTeam->score; ?><br />
		<span class="score"><?= $game->homeTeam->score; ?><br />
	</div>
</div>
