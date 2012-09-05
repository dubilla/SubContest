<?php $this->title('Add User'); ?>
<h2>Add user</h2>
<?= $this->form->create($user); ?>
	<?= $this->form->field('username'); ?>
	<?= $this->form->field('password', array('type' => 'password')); ?>
	<?= $this->form->field('firstName'); ?>
	<?= $this->form->field('lastName'); ?>
	<?= $this->form->field('nickname'); ?>
	<?= $this->form->submit('Create me'); ?>
<?= $this->form->end(); ?>
