
<?php 
    $this->load->view('header');
     
    
?>
<style>
   .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
</style>

<div id="main_content">	
 <?php    echo set_breadcrumb(); 
echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; 

?> 
<!-- tabela -->	
<div class="well">
        <h2 class="pull-left">Lista de Usuários</h2>
        <h3 class="pull-right">Usuários por página:
            <select id="selectQntd" class="input-mini">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
            </select>
        
        </h3>
</div>
        <ul class="pager">
                <li><a href="#"><i class="icon-fast-backward"></i></a></li>
                <li><a href="#"><i class="icon-backward"></i></a></li>
                <li><input type="text" class="input-mini input-page" /></li>
                <li><a href="#"><i class="icon-forward"></i></a></li>
                <li><a href="#"><i class="icon-fast-forward"></i></a></li>
        </ul>

<?php if(is_null($user)){
        
       echo "<p>Nenhum usuário encontrado.</p>";
       
       }else{ 
?>
    
    <table class="table">
        <caption>Lista de Usuários</caption>
            <thead>
                    <tr>
                            <th></th>
                            <th><a href='<?php echo base_url("usuarios/listar/id/$limit/$offset"); ?>'>Nome</a></th>
                            <th><a href='<?php echo base_url("usuarios/listar/nome/$limit/$offset"); ?>'>Agendamento</a></th>
                            <th><a href='<?php echo base_url("usuarios/listar/email/$limit/$offset"); ?>'>Administradores</a></th>
                            <th><a href='<?php echo base_url("usuarios/listar/instituicao/$limit/$offset"); ?>'>Arquivos</a></th>
                            <th>Opções</th>
                    </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
            <?php foreach($user as $u){ ?>
                
                    <tr class="listar_usuario" id="usuario-<?php echo $u->id; ?>">
                            <td><input type="checkbox" name="user_List"/></td>
                            <td><?php echo $u->id;?></td>
                            <td><?php echo $u->nome;?></td>
                            <td><?php echo $u->email;?></td>
                            <td><?php echo $u->instituicao;?></td>
                            <td><?php echo $u->tipo;?></td>
                            <td><?php 
                                switch ($u->status){
                                        default :
                                            
                                        case STATUS_USUARIO_EXCLUIDO:
                                            echo 'Excluido';
                                            break;
                                        
                                        case STATUS_USUARIO_BLOQUEADO:
                                            echo 'Bloqueado';
                                            break;
                                            
                                        case STATUS_USUARIO_ATIVO:
                                            echo 'Ativo';
                                            break;
                                        
                                        case STATUS_USUARIO_INATIVO:
                                            echo 'Inativo';
                                            break;
                                    }
                                ?>
                            </td>
                            <td>
                                <select class="input-medium change_option" id="select_emlinha">
                                    <option>Selecione...</option>
                                    <option value="dados_pessoais">Editar</option>
                                    <option value="trocar_senha">Ver detalhes</option>
                                    <option value="usuario_lembrete_senha">Inativar</option>
                                    <option value="usuario_dados_pessoais">Agendamentos</option>
                                    <option value="usuario_dados_pessoais">Créditos</option>
                                    <optgroup label="Mudar credencial">
                                        <option value="mudar_credencial/<?php echo CREDENCIAL_USUARIO_ADMIN; ?>">Administrador</option>
                                        <option value="mudar_credencial/<?php echo CREDENCIAL_USUARIO_SUPERADMIN; ?>">Super-Administrador</option>
                                        <option value="mudar_credencial/<?php echo CREDENCIAL_USUARIO_COMUM; ?>">Comum</option>
                                   </optgroup>
                                </select>
                            </td>
                    </tr>
                
               <?php } ?>  
               </tbody>
        </table>

    <div class="select">
        <p>Com marcados:
            <select class="change_option" id="comMarcados">
                <option>Selecione...</option>
                <option value="<?php echo STATUS_USUARIO_ATIVO; ?>">Ativar</option>
                <option value="<?php echo STATUS_USUARIO_INATIVO; ?>">Inativar</option>
                <option value="<?php echo STATUS_USUARIO_BLOQUEADO; ?>">Bloquear</option>
                <option value="<?php echo STATUS_USUARIO_EXCLUIDO; ?>">Excluir</option>
                <option value="4">Trocar Senha</option>
                <option value="ativar">Enviar Mensagem</option>
            </select>
        </p>
    </div>
    <?php echo $links; ?>
</div>
<?php
    }
    $this->load->view('footer'); 
?>