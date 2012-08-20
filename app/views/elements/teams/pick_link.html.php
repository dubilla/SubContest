<?php if (isset($game->picks[$username]) && $game->picks[$username] == $team->abbreviation): ?>
	<?= $this->html->link($team->location, 'games/unpick/' . $game->_id); ?>
<?php else: ?>
	<?= $this->html->link($team->location, 'games/pick/' . $game->_id . '/' . $team->abbreviation); ?>
<?php endif; ?>

