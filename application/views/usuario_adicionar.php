<?php 
    $this->load->view('header');
     
?>
<div id="main_content">
<?php echo set_breadcrumb(); ?>
    <div class="well"><h2>Cadastrar Usuário</h2></div>
	          
	        <?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; ?>  
	          
            <?php
            $attributes = array(
                "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
                "label" => array('class' => 'control-label')
            );
            
                echo form_open('usuarios/adicionar',$attributes['form']);
               
                 echo '<div class="control-group">';
                 echo form_label('Username', 'username',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('username');
                 echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('Senha', 'senha',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_password('senha');
                 echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('Redigite a Senha', 'senha_conf',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_password('senha_conf');
                 echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('Nome', 'nome',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('nome');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Sobrenome', 'sobrenome',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('sobrenome');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Endereço', 'endereco',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('endereco');
                 echo "<span class='help-inline'>Ex: Av. Brig. Faria Lima, 400 - ap.35</span>";
                 echo '</div>';
                 echo '</div>';
                 

                 echo '<div class="control-group">';
                 echo form_label('CEP', 'cep',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('cep');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Cidade', 'cidade',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('cidade');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('UF', 'uf',$attributes['label']);
                 echo '<div class="controls">'; ?>
                 <select name="uf">
                     <option value="SP" <?php echo set_select('uf', 'SP'); ?> >São Paulo</option>
                     <option value="RJ" <?php echo set_select('uf', 'RJ'); ?> >Rio de Janeiro</option>
                     <option value="PE" <?php echo set_select('uf', 'PE'); ?> >Pernambuco</option>
                 </select>
                 <?php echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('Instituição', 'instituicao',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('instituicao');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Departamento', 'departamento',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('departamento');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Telefone', 'telefone', $attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('telefone');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Celular', 'celular',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('celular');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('Data de Nascimento', 'data_nascimento',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('data_nascimento');
                 echo '</div>';
                 echo '</div>';

                 echo '<div class="control-group">';
                 echo form_label('CPF', 'cpf',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('cpf');
                 echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('E-mail', 'email',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('email');
                 echo '</div>';
                 echo '</div>';
                 
                 echo '<div class="control-group">';
                 echo form_label('Nível Acadêmico', 'nivel',$attributes['label']); 
                 echo '<div class="controls">'; ?>
                 <input type="radio" name="nivel" value="Mestrado" /> Mestrado
                 <input type="radio" name="nivel" value="Doutorando" /> Doutorando
                 <input type="radio" name="nivel" value="Pós-doc" /> Pós-doc
                 <input type="radio" name="nivel" value="Professor" /> Professor
                 <?php echo '</div>';
                 echo '</div>';  ?>

                 <div class="control-group">
                 	<div class="controls"> 
                		<label class="checkbox">
                 			<input type="checkbox" name="newsletter" value="1" /> Desejo receber informações sobre o CEFAP
                 		</label>
                 	</div>
                 </div>
                 <div class="form-actions">
                        <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
                        <input type="button" class="btn" name="cancelar" value="Cancelar" />
                </div>
        </form>   
    </div>
<?php
    
    $this->load->view('footer'); 
?>