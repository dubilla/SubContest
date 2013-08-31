<?php $this->title('All Users'); ?>
<ul id="user-list">
<?php foreach ($users as $user): ?>
	<li><?= $user->firstName; ?> <?= $user->lastName; ?></li>
<?php endforeach; ?>
</ul>
