<div class="game not-started">
	<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->awayTeam(), 'username' => 'jpnance')); ?><br /> 
	<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->homeTeam(), 'username' => 'jpnance')); ?> (<?= $this->game->line($game->line); ?>)
</div>
