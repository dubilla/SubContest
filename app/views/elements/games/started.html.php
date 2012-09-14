<div class="game started <?= $game->isPickedBy($username) ? 'picked' : ''; ?>">
	<div class="at"><br />at</div>
	<div class="teams">
		<span class="team <?= $game->isPickedBy($username) && $game->picks[$username] == $game->awayTeam->abbreviation ? 'pick' : ''; ?>"><?= $this->team->name($game->awayTeam()); ?></span><br />
		<span class="team <?= $game->isPickedBy($username) && $game->picks[$username] == $game->homeTeam->abbreviation ? 'pick' : ''; ?>"><?= $this->team->name($game->homeTeam()); ?></span> <span class="line"><?= $this->game->line($game->line); ?></span>
	</div>
	<?= $this->view()->render(array('element' => 'games/picks'), compact('game')); ?>
</div>
