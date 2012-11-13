<h3>Digite seu username e senha abaixo</h3>

<?php	echo form_open('usuarios/login/', array('class' => 'form-horizontal', 'id' => 'form_logar')); ?>
	<div class="control-group">
		<label class="control-label" for="username">Username</label>
		<div class="controls">	
			<input type="text" name="username" />
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="senha">Senha</label>	
		<div class="controls">	
			<input type="password" name="senha" />
		</div>
	</div>
	
	<div class="form-actions">
    	<input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
        <input type="button" class="btn" name="cancelar" value="Cancelar" />
    </div>
<?php 	echo form_close(); ?>