<?php $this->title('Week ' . $week); ?>
<?php foreach ($games as $game): ?>
	<?php if ($game->hasStarted()): ?>
		<?= $this->view()->render(array('element' => 'games/started'), compact('game')); ?>
	<?php else: ?>
		<?= $this->view()->render(array('element' => 'games/not_started'), compact('game')); ?>
	<?php endif; ?>
<?php endforeach; ?>
