<table class="picks">
	<tr>
		<th class="<?= isset($game->push) ? 'push' : ((isset($game->winner) && $game->winner == $game->awayTeam->abbreviation) ? 'winner' : 'loser'); ?>"><?= $game->awayTeam->abbreviation; ?></th>
		<td>
			<?php foreach ($game->awayTeam->picks as $name): ?>
				<?= $name; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th class="<?= isset($game->push) ? 'push' : ((isset($game->winner) && $game->winner == $game->homeTeam->abbreviation) ? 'winner' : 'loser'); ?>"><?= $game->homeTeam->abbreviation; ?></th>
		<td>
			<?php foreach ($game->homeTeam->picks as $name): ?>
				<?= $name; ?>
			<?php endforeach; ?>
		</td>
	</tr>
</table>
