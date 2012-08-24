<div class="game not-started">
	<div class="at"><br />at</div>
	<div class="teams">
		<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->awayTeam(), 'username' => 'jpnance')); ?><br /> 
		<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->homeTeam(), 'username' => 'jpnance')); ?> (<?= $this->game->line($game->line); ?>)
	</div>
</div>
