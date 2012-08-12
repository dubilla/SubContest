<?php foreach ($games as $game): ?>
	<?= $game->awayTeam()->location; ?> vs. <?= $game->homeTeam()->location; ?><br />
<?php endforeach; ?>
