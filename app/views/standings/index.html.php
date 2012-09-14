<?php $this->title('Standings'); ?>
<table id="standings">
	<tr>
		<th>Player</th>
		<th class="score">Score</th>
	</tr>
	<?php foreach ($standings as $username => $standing): ?>
		<tr>
			<td><?= $standing['name']; ?></td>
			<td class="score"><?= $this->standings->score($standing['score']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
