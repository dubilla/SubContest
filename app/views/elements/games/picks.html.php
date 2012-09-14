<table class="picks">
	<tr>
		<th><?= $game->awayTeam->abbreviation; ?></th>
		<td>
			<?php foreach ($game->awayTeam->picks as $username): ?>
				<?= $username; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th><?= $game->homeTeam->abbreviation; ?></th>
		<td>
			<?php foreach ($game->homeTeam->picks as $username): ?>
				<?= $username; ?>
			<?php endforeach; ?>
		</td>
	</tr>
</table>
