<h3>Digite seu username e senha abaixo</h3>

<?php	echo form_open('usuarios/login/', array('class' => 'form-horizontal', 'id' => 'form_logar')); ?>
	<input type="text" name="username" />
	<input type="password" name="senha" />
	<input type="submit" name="submit" value="submit" />
<?php 	echo form_close(); ?>