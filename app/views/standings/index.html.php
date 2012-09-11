<?php $this->title('Standings'); ?>
<table id="standings">
	<tr>
		<th>Player</th>
		<th class="score">Score</th>
	</tr>
	<?php foreach ($standings as $username => $score): ?>
		<tr>
			<td><?= $username; ?></td>
			<td class="score"><?= $this->standings->score($score); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
