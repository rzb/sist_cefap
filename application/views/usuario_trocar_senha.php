<?php 
    $this->load->view('header');
     
?>
<div id="main_content">
<?php echo set_breadcrumb(); ?>
    <div class="well"><h2>Trocar Senha</h2></div>
	          
            <?php
            $attributes = array(
                "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
            );
            $id = $this->uri->segment(3);
            echo form_open('usuarios/trocar_senha/'.$id, $attributes['form']);
            ?>              
                 <div class="control-group">
                     <label for="senha_atual" class="control-label">Senha Atual</label>
                        <div class="controls">
                            <input type="password" name="senha_atual">
                     </div>
                 </div>
                 
                 <div class="control-group">
                    <label for="nova_senha" class="control-label">Nova Senha</label>
                        <div class="controls">
                            <input type="password" name="nova_senha">
                    </div>
                </div>
                 
                <div class="control-group">
                    <label for="conf_senha" class="control-label">Redigite a Senha</label>
                         <div class="controls">
                            <input type="password" name="conf_senha">
                        </div>
                </div>
    
                <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
                        <button type="button" class="btn" name="cancelar">Cancelar</button> 
                </div>
            </form>   
    </div>
<?php
 
    $this->load->view('footer'); 
?>