
<?php 
    $this->load->view('header');
     
    
?>
<style>
   .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
</style>

<div id="main_content">	
 <?php    echo set_breadcrumb();?>
<!-- tabela -->	
<div class="well">
        <h2 class="pull-left">Lista de Usuários</h2>
        <h3 class="pull-right">Usuários por página:
            <select id="selectQntd" class="input-mini">
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
?>   

<?php }else{ ?>
    
    <table class="table">
        <caption>Lista de Usuários</caption>
            <thead>
                    <tr>
                            <th></th>
                            <th><a href="<?php echo base_url('usuarios/listar/id'); ?>">ID</a></th>
                            <th><a href="<?php echo base_url('usuarios/listar/nome'); ?>">Nome</a></th>
                            <th><a href="<?php echo base_url('usuarios/listar/email'); ?>">E-mail</a></th>
                            <th><a href="<?php echo base_url('usuarios/listar/instituicao'); ?>">Instituição</a></th>
                            <th><a href="<?php echo base_url('usuarios/listar/tipo'); ?>">Tipo</a></th>
                            <th><a href="<?php echo base_url('usuarios/listar/status'); ?>">Status</a></th>
                            <th>Opções</th>
                    </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
            <?php foreach($user as $u){ ?>
                
                    <tr class="listar_usuario" id="usuario-<?php echo $u->id; ?>">
                            <td><input type="checkbox" class="teste" name="user_List"/></td>
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
                                    <option value="dados_pessoais">Dados Pessoais</option>
                                    <option value="trocar_senha">Enviar Mensagem</option>
                                    <option value="usuario_lembrete_senha">Log de Acesso</option>
                                    <option value="usuario_dados_pessoais">Agendamentos</option>
                                    <option value="usuario_dados_pessoais">Créditos</option>
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
</div>
<?php
    }
    $this->load->view('footer'); 
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#selectQntd').change(function(){
            var option = jQuery(this).val();
            window.location.href = '<?php echo base_url('usuarios/listar');  ?>' + '/' + option;
        });
   
        jQuery(".change_option").change(function(){
         
           var option = jQuery(this).val();
           
           if (jQuery(this).attr('id') == 'comMarcados' ) {
           
                var checked = jQuery("input[name='user_List']:checked");

                if(checked.length > 0){
                    var userIds = [];

                     checked.each(function(index){
                         var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                         id = id[1];
                         userIds[index] = id;
                     });
                     id = userIds.join('_');
                     
                     window.location.href = '<?php echo base_url('usuarios/mudar_status'); ?>' + '/' + id + '/' + option;
                }else{
                     alert('Selecione pelo menos um usuário');
                     return;
                }
            } else {
                var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                id = id[1];
                window.location.href = '<?php echo base_url('usuarios'); ?>' + '/' + option + '/' + id;
            }  
           });    
    });

</script>