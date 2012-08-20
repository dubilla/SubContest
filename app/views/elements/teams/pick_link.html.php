<?php if (isset($game->picks[$username]) && $game->picks[$username] == $team->abbreviation): ?>
	<?= $this->html->link($team->location, 'games/unpick/' . $game->_id, array('class' => 'team picked')); ?>
<?php else: ?>
	<?= $this->html->link($team->location, 'games/pick/' . $game->_id . '/' . $team->abbreviation, array('class' => 'team')); ?>
<?php endif; ?>

