<?php 
    $this->load->view('header');
    echo set_breadcrumb(); 
?>
<div id="main_content">
    <div class="well"><h2>Editar Dados Pessoais</h2></div>
	          
            <?php
            $attributes = array(
                "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
                "label" => array('class' => 'control-label')
            );
                            
                echo form_open('usuarios/trocar_senha',$attributes['form']);
               
                 echo '<div class="control-group">';
                 echo form_label('Username OU E-mail cadastrado', 'lembrete_senha',$attributes['label']);
                 echo '<div class="controls">';
                 echo form_input('lembrete_senha');
                 echo '</div>';
                 echo '</div>'; ?>
    
                 <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
                        <button type="button" class="btn" name="cancelar">Cancelar</button> 
                </div>
        </form>   
    </div>
<?php
    
    $this->load->view('footer'); 
?>