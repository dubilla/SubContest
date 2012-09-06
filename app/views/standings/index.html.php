<?php $this->title('Standings'); ?>
<table id="standings">
	<tr>
		<th>Player</th>
		<th>Score</th>
	</tr>
	<?php foreach ($standings as $username => $score): ?>
		<tr>
			<td><?= $username; ?></td>
			<td><?= $this->standings->score($score); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
