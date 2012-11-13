<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<!--  jquery core -->
	<script src="<?php echo base_url('js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>
	<!--  jquery ui -->
	<script src="<?php echo base_url('js/jquery-ui-1.8.20.custom.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('js/jquery.maskedinput-1.3.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('js/bootstrap.js'); ?>" type="text/javascript"></script>
	
	<link rel='stylesheet' id='bootstrap-css' href='<?php echo base_url('css/bootstrap.css'); ?>' type='text/css' media='all' />
	<link rel='stylesheet' id='main-css-css' href='<?php echo base_url('css/style.css'); ?>' type='text/css' media='all' />	
	<title><?php echo $title ?> - CEFAP ICB-USP</title>
	<meta name='robots' content='noindex,nofollow' />
        
        <style>
            .form-actions {width:800px;}
            .well {width: 800px; margin-top:15px;}
            .user_info {margin-left:30px; margin-top:30px; width: 800px;}
            .pull-right #Creditos {width:500px;}
            h1 {font-size: 30px; color: #B1C5C9}
        </style>
    </head>
    <body>
        <div class="user_info">
            <?php foreach($user as $u){ ;?>
                    <h1 class="pull-left"><p><?php echo $u->username;?></p></h1>
                    <input type="submit" class="btn pull-right" name="submit" value="Log de acesso">
                    <input type="button" class="btn pull-right" name="cancelar" value="Escrever Mensagem">
                    <br><br>
            <div class="user_info">
                
                <div class="row">
                    <div class="span2">Status: 
                        <?php 
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
                    </div>
                    <div class="span2">Usuário  
                        <?php
                            switch($u->credencial){
                                case CREDENCIAL_USUARIO_COMUM:
                                    echo 'Comum';
                                    break;
                                case CREDENCIAL_USUARIO_ADMIN:
                                    echo 'Administrador';
                                    break;
                                case CREDENCIAL_USUARIO_SUPERADMIN:
                                    echo 'Super Administrador';
                                    break;
                            };
                        ?>
                    </div>             
                    <div class="span2">Cadastrado em <?php echo $u->created;?></div>
                    <div class="span2">Username: <?php echo $u->username;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span5">Chave de Ativa&ccedil;&atilde;o: <?php echo $u->key;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span4">&Uacuteltimo Acesso:  06/11/2012 14:10</div>
                </div>
          </div>
          <?php } ;?>  
            
                <div class="form-actions">
                    <h1 class="pull-left"><p>Dados Pessoais</p></h1>
                    <input type="submit" class="btn pull-right" name="submit" value="Editar">
                </div>
            
           <div class="user_info">  
               
                <div class="row">
                    <div class="span2">Data de Nascimento: <?php echo $u->data_nascimento;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">CPF: <?php echo $u->cpf;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">E-mail: <a href="mailto:<?php echo $u->email;?>"><?php echo $u->email;?></a></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">Endere&ccedil;o: <?php echo $u->endereco;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">Institui&ccedil;&atilde;o: <?php echo $u->instituicao;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">Departamento: <?php echo $u->departamento;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">Telefone: <?php echo $u->telefone;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span2">Celular:<?php echo $u->celular;?></div>
                </div>
                <br>
                <div class="row">
                    <div class="span3 offset1">
                        <?php
                            switch($u->newsletter){
                                case 1:
                                    echo 'Autoriza o envio de Newsletter.';
                                    break;
                                case 0:
                                    echo 'Não autoriza envio de neswletter.';
                                    break;
                            };
                        ?>
                    </div>                    
                </div>
            </div>
            
            
            <div class="form-actions">
                    <h1 class="pull-left"><p>Projetos</p></h1>
                    <input type="submit" class="btn pull-right" name="submit" value="Ver Todos">
            </div>
            
            <div class="user_info"> 
                <table class="table">
			<caption>table caption</caption>
			<thead>
                            <tr>
                                <th>Título</th>
                                <th>Responsável</th>
                                <th>Instituto</th>
                                <th>Departamento</th>

                            </tr>
			</thead>
			<tfoot></tfoot>
			<tbody>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                    commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus. </td>
                                <td>Prof. Dr. Ciclano da Silva Souza</td>
                                <td>Instituto de Ciências Biomédicas</td>
                                <td>Departamento de Imunologia</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                    commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus.</td>
                                <td>Prof. Dr. Ciclano da Silva Souza</td>
                                <td>Instituto de Ciências Biomédicas</td>
                                <td>Departamento de Imunologia</td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero turpis, porta id posuere in, 
                                    commodo eu neque. Sed nisi diam, lacinia nec cursus vel, tincidunt at risus.</td>
                                <td>Prof. Dr. Ciclano da Silva Souza</td>
                                <td>Instituto de Ciências Biomédicas</td>
                                <td>Departamento de Imunologia</td>
                            </tr>
			</tbody>
		</table>
            </div>
            
            <div class="form-actions">
                    <h1 class="pull-left"><p>Agendamentos</p></h1>
                    <input type="submit" class="btn pull-right" name="submit" value="Ver Todos">
            </div>
            
            <div class="user_info"> 
                <table class="table">
			<caption>table caption</caption>
			<thead>
                            <tr>
                                <th>Status</th>
                                <th>Período</th>
                                <th>Facility</th>
                                <th>Valor</th>

                            </tr>
			</thead>
			<tfoot></tfoot>
			<tbody>
                            <tr>
                                <td>solicitado</td>
                                <td>27/10/2012 14:00 - 16:00</td>
                                <td>BIOMASS</td>
                                <td>R$100,00</td>
                            </tr>
                            <tr>
                                <td>agendado</td>
                                <td>27/10/2012 14:00 - 16:00</td>
                                <td>CONFOCAL</td>
                                <td>R$20,00</td>
                            </tr>
                            <tr>
                                <td>faltou</td>
                                <td>27/10/2012 14:00 - 16:00</td>
                                <td>FLUIR</td>
                                <td>R$0,00</td>
                            </tr>
                            <tr>
                                <td>compareceu</td>
                                <td>27/10/2012 14:00 - 16:00</td>
                                <td>FLUIR</td>
                                <td>R$250,00</td>
                            </tr>
			</tbody>
		</table>
            </div>
            
            <div class="form-actions">
                    <h1 class="pull-left"><p>Créditos</p></h1>
                    <input type="submit" class="btn pull-right" name="lancamentos" value="Lançamentos">
                    <input type="submit" class="btn pull-right" name="boletos" value="Boletos">
                    <input type="submit" class="btn pull-right" name="inserir_creditos" value="Inserir Créditos">
                    <input type="submit" class="btn pull-right" name="ver_extrato" value="Ver Extrato">
            </div>
            
            <div class="user_info"> 
                <div class="pull-left">
                    Saldo<br>
                    R$70,00<br>
                    Total de Créditos já Inseridos:<br>
                    R$680,00<br>
                    Boleto(s) em aberto:<br>
                    R4$60,00 - venc: 13/11/2012
                </div>
                
                <div class="pull-right">
                    <table class="table" id="Creditos">
			<caption>table caption</caption>
                        <span>Últimos Lançamentos:</span>
			<thead>
                            <tr>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Referente a</th>

                            </tr>
			</thead>
			<tfoot></tfoot>
			<tbody>
                            <tr>
                                <td>R$30,00</td>
                                <td>C</td>
                                <td>Boleto 025450000034</td>
                            </tr>
                            <tr>
                                <td>R$15,00</td>
                                <td>D</td>
                                <td>Uso de BIOMASS 10/07/2012</td>
                            </tr>
                            <tr>
                                <td>R$140,00</td>
                                <td>C</td>
                                <td>Boleto 025450000034</td>
                            </tr>
			</tbody>
		</table>
                </div>
            </div>
        </div>   
    </body>
</html>