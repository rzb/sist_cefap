<?php 
    $this->load->view('header');
    echo set_breadcrumb(); 
?>
<div id="main_content">
    <div class="well">Formulário</div>
	          
	        <?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : '';  
	        
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
                 <select name="estado"> 
                    <option value="estado">Selecione o Estado</option> 
                    <option value="ac">Acre</option> 
                    <option value="al">Alagoas</option> 
                    <option value="am">Amazonas</option> 
                    <option value="ap">Amapá</option> 
                    <option value="ba">Bahia</option> 
                    <option value="ce">Ceará</option> 
                    <option value="df">Distrito Federal</option> 
                    <option value="es">Espírito Santo</option> 
                    <option value="go">Goiás</option> 
                    <option value="ma">Maranhão</option> 
                    <option value="mt">Mato Grosso</option> 
                    <option value="ms">Mato Grosso do Sul</option> 
                    <option value="mg">Minas Gerais</option> 
                    <option value="pa">Pará</option> 
                    <option value="pb">Paraíba</option> 
                    <option value="pr">Paraná</option> 
                    <option value="pe">Pernambuco</option> 
                    <option value="pi">Piauí</option> 
                    <option value="rj">Rio de Janeiro</option> 
                    <option value="rn">Rio Grande do Norte</option> 
                    <option value="ro">Rondônia</option> 
                    <option value="rs">Rio Grande do Sul</option> 
                    <option value="rr">Roraima</option> 
                    <option value="sc">Santa Catarina</option> 
                    <option value="se">Sergipe</option> 
                    <option value="sp">São Paulo</option> 
                    <option value="to">Tocantins</option> 
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
                 <input type="radio" name="tipo" value="TIPO_USUARIO_PROFESSOR" /> Professor
                 <input type="radio" name="tipo" value="TIPO_USUARIO_MESTRANDO" /> Mestrado
                 <input type="radio" name="tipo" value="TIPO_USUARIO_DOUTORANDO" /> Doutorando
                 <input type="radio" name="tipo" value="TIPO_USUARIO_POSDOC" /> Pós-doc
                 <input type="radio" name="tipo" value="TIPO_USUARIO_PESQUISADOR" /> Pesquisador
                 <input type="radio" name="tipo" value="TIPO_USUARIO_JOVEM_PESQUISADOR" /> Jovem Pesquisador
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