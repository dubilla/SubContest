<div id="week-navigation">
	<?php for ($n = 1; $n <= 17; $n++): ?>
		<?php if ($week == $n): ?>
			<span class="current week">Week <?= $week; ?></span>
		<?php else: ?>
			<?= $this->html->link('Week ' . $n, 'weeks/view/' . $n, array('class' => 'week week-' . $n)); ?>
		<?php endif; ?>
	<?php endfor; ?>
</div>
