<?php foreach ($games as $game): ?>
	<?= $game->awayTeam->abbreviation; ?> vs. <?= $game->homeTeam->abbreviation; ?><br />
<?php endforeach; ?>
