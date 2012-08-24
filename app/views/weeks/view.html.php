<?php $this->title('Week ' . $week); ?>
<h1>Week <?= $week; ?></h1>
<?php foreach ($games as $game): ?>
	<?php if ($game->hasStarted()): ?>
		<?= $this->view()->render(array('element' => 'games/started'), compact('game')); ?>
	<?php else: ?>
		<?= $this->view()->render(array('element' => 'games/not_started'), compact('game')); ?>
	<?php endif; ?>
<?php endforeach; ?>
