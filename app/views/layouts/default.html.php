<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title><?php echo $this->title(); ?> &laquo; SubContest &laquo; Coinflipper</title>
	<?php echo $this->html->style(array('reset', 'core', 'general', 'game', 'team', 'standings')); ?>
	<?php echo $this->html->script(array('jquery', 'subcontest')); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="app">
	<div id="container">
		<div id="header">
			<h1>SubContest</h1>
			<p>
				<?php if ($this->user->isLoggedIn()): ?>
					<?= $this->html->link('Games', '/'); ?> |
					<?= $this->html->link('Standings', '/standings'); ?> |
					<?= $this->html->link('Log Out', '/logout'); ?>
				<?php else: ?>
					<?= $this->html->link('Log In', '/login'); ?>
				<?php endif; ?>
			</p>
		</div>
		<div id="content">
			<?php echo $this->content(); ?>
		</div>
	</div>
</body>
</html>
