<?php
    $this->load->view('header');
?>
<style>
  .control-group {margin: 0 auto;}  
</style>
<div id="main_content">	
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies molestie molestie. Curabitur aliquam ligula sit amet lectus malesuada sed elementum nisi vulputate. 
    Etiam tempor laoreet neque id sodales. Suspendisse potenti. Morbi sed ante in justo vestibulum rhoncus. Pellentesque tincidunt molestie pretium.</p>
    <div class="well"><h2>Informações Gerais</h2></div>
    
    <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
        "label" => array('class' => 'control-label')
    );

        echo form_open('facilities/adicionar',$attributes['form']);
    ?>
            <div class="control-group">
                <label for="nomeabrev" class="control-label">Nome Abreviado</label>
                <div class="controls">
                    <input type="text" name="nomeabrev" id="nomeabrev">
                </div>
            </div>     
            <div class="control-group">
                <label for="nomecompl" class="control-label">Nome Completo</label>
                <div class="controls">
                    <input type="text" name="nomecompl" id="nomecompl">
                </div>
            </div>
            <div class="control-group">
                <label for="desc" class="control-label">Descrição</label>
                <div class="controls">
                    <textarea></textarea>
                </div>    
            </div>
            <div class="control-group">
                <label for="tipoagendamento" class="control-label">Tipo de Agendamento</label>
                <div class="controls">
                    <input type="radio" value="teste" name="teste">Calendario
                    <input type="radio" value="teste" name="teste">Individualizado
                </div>
            </div>

            <div class="well"><h2>Administradores</h2></div>

            <div>
                <label for="text1"></label>
                <textarea></textarea>

                <input type="submit" value="Adicionar >>">
                <input type="submit" value="<< Remover">

                <label for="text2"></label>
                <textarea></textarea>
            </div>

            <div class="well"><h2>Arquivos</h2></div>
            <div>
                <p>Selecione os arquivos que deseja disponibilizar para download aos usuários que solicitarem o agendamente desta</p>

                <input type="file" name="file1">
                <input type="submit">
            </div>
            <div class="well"><h2>Formulários de requisição de agendamento</h2></div>

            <div>
                <input type="submit" name="confirmar"  value="confirmar">
                <a href="">cancelar</a>
            </div>
</form>
</div>
<?php
    $this->load->view('footer');
?>