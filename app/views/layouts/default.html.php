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
	<meta content="user-scalable=no, width=device-width" name="viewport"/>
	<?php echo $this->html->style(array('reset', 'core', 'general', 'game', 'team', 'standings', 'users')); ?>
	<?php echo $this->html->script(array('jquery', 'subcontest')); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="app">
	<div id="container">
		<div id="header">
			<h1>SubContest</h1>
			<ul id="navigation">
				<li><?= $this->html->link('Games', '/', array('class' => ($this->_request->controller == 'weeks') ? 'selected' : '')); ?></li>
				<li><?= $this->html->link('Standings', '/standings', array('class' => ($this->_request->controller == 'standings') ? 'selected' : '')); ?></li>
				<li><?= $this->html->link('Lines', 'http://www.thelvh.com/supercontestweeklycard'); ?></li>

				<?php if ($this->user->isLoggedIn()): ?>
					<li><?= $this->html->link('Log Out', '/logout'); ?></li>
				<?php else: ?>
					<li><?= $this->html->link('Log In', '/login'); ?></li>
				<?php endif; ?>
			</ul>
		</div>
		<div id="content">
			<?php echo $this->content(); ?>
		</div>
	</div>
</body>
</html>
