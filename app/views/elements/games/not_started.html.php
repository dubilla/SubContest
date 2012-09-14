<div id="<?= $game->_id; ?>" class="game not-started <?= ($game->isPickedBy($username) ? 'picked ' . ($game->picks[$username] == $game->awayTeam->abbreviation ? 'away-team' : 'home-team') : 'not-picked'); ?>">
	<div class="kickoff">
		<?= date('l', $game->kickoff->sec); ?> at <?= date('g:ia', $game->kickoff->sec); ?> ET
	</div>
	<div class="at"><br />at</div>
	<div class="teams">
		<?php if (isset($username)): ?>
			<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->awayTeam(), 'username' => $username)); ?><br /> 
			<?= $this->view()->render(array('element' => 'teams/pick_link'), array('game' => $game, 'team' => $game->homeTeam(), 'username' => $username)); ?>
		<?php else: ?>
			<span class="team"><?= $this->team->name($game->awayTeam()); ?></span><br />
			<span class="team"><?= $this->team->name($game->homeTeam()); ?></span>
		<?php endif; ?>

		<span class="line"><?= $this->game->line($game->line); ?></span>
	</div>
</div>
