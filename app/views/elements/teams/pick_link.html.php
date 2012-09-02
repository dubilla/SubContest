<?php if (isset($game->picks[$username]) && $game->picks[$username] == $team->abbreviation): ?>
	<?= $this->html->link($this->team->name($team), 'games/unpick/' . $game->_id, array('id' => $team->abbreviation, 'class' => 'team picked')); ?>
<?php else: ?>
	<?= $this->html->link($this->team->name($team), 'games/pick/' . $game->_id . '/' . $team->abbreviation, array('id' => $team->abbreviation, 'class' => 'team')); ?>
<?php endif; ?>

