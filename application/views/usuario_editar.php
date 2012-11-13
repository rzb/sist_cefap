<?php	$this->load->view('header');	?>

<div id="main_content">

<?php echo set_breadcrumb();	?>

    <div class="well">Formulário</div>
    
<?php	echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : '';	?> 

<?php	echo form_open('usuarios/editar/' .$u->id, array('class' => 'form-horizontal', 'id' => 'form_editar')); ?>
			
			<div class="control-group">
				<label class="control-label" for="username">Username</label>
				<div class="controls">
					<input type="text" name="username" value="<?php echo $u->username; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="nome">Nome</label>
				<div class="controls">
					<input type="text" name="nome" value="<?php echo $u->nome; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="sobrenome">Sobrenome</label>
				<div class="controls">
					<input type="text" name="sobrenome" value="<?php echo $u->sobrenome; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="endereco">Endereço</label>
				<div class="controls">
					<input type="text" name="endereco" value="<?php echo $u->endereco; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cep">CEP</label>
				<div class="controls">
					<input type="text" name="cep" value="<?php echo $u->cep; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cidade">Cidade</label>
				<div class="controls">
					<input type="text" name="cidade" value="<?php echo $u->cidade; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="uf">UF</label>
				<div class="controls">
					<select name="uf">
                    	<option value="SP" <?php echo ($u->uf == "SP") ? 'selected="selected"' : ''; ?> >São Paulo</option>
                    	<option value="RJ" <?php echo ($u->uf == "RJ") ? 'selected="selected"' : ''; ?> >Rio de Janeiro</option>
                    	<option value="PE" <?php echo ($u->uf == "PE") ? 'selected="selected"' : ''; ?> >Pernambuco</option>
                 	</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="instituicao">Instituição</label>
				<div class="controls">
					<input type="text" name="instituicao" value="<?php echo $u->instituicao; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="departamento">Departamento</label>
				<div class="controls">
					<input type="text" name="departamento" value="<?php echo $u->departamento; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="telefone">Telefone</label>
				<div class="controls">
					<input type="text" name="telefone" value="<?php echo $u->telefone; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="celular">Celular</label>
				<div class="controls">
					<input type="text" name="celular" value="<?php echo $u->celular; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="data_nascimento">Data de Nascimento</label>
				<div class="controls">
					<input type="text" name="data_nascimento" value="<?php echo $u->data_nascimento; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cpf">CPF</label>
				<div class="controls">
					<input type="text" name="cpf" value="<?php echo $u->cpf; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">E-mail</label>
				<div class="controls">
					<input type="text" name="email" value="<?php echo $u->email; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="tipo">Nível Acadmêmico</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PROFESSOR; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_PROFESSOR) ? 'checked="checked"' : ''; ?>/>Professor
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_POSDOC;	?>"				<?php echo ($u->tipo == TIPO_USUARIO_POSDOC) ? 'checked="checked"' : ''; ?>/>Pós-doc
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_JOVEM_PESQUISADOR; ?>"	<?php echo ($u->tipo == TIPO_USUARIO_JOVEM_PESQUISADOR) ? 'checked="checked"' : ''; ?>/>Jovem Pesquisador
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_MESTRANDO; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_MESTRANDO) ? 'checked="checked"' : ''; ?>/>Mestrando
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_DOUTORANDO; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_DOUTORANDO) ? 'checked="checked"' : ''; ?>/>Doutorando
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PESQUISADOR; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_PESQUISADOR) ? 'checked="checked"' : ''; ?>/>Pesquisador
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" name="newsletter" value="<?php echo NEWSLETTER_RECEBE; ?>" <?php echo ($u->newsletter == NEWSLETTER_RECEBE) ? 'checked="checked"' : ''; ?>/>Desejo receber informações sobre o CEFAP
					</label>
				</div>
			</div>
			<div class="form-actions">
            	<input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
            	<input type="button" class="btn" name="cancelar" value="Cancelar" />
            </div>
			
<?php	echo form_close();	?>

</div>

<?php	echo $this->load->view('footer'); ?>