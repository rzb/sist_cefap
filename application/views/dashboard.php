<?php 
    $this->load->view('header'); 
?>
<div id="main_content">
    
    <!-- Se o usuário não for Admin ou SuperAdmin não terá permissão para visualizar a class 'top-->
    <div class="top">
        <?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; ?> 
        <h1>Estatísticas do Sistema</h1>

            <select id="selectDashboard">
                <option>Acessos</option>
                <option>Solicitações de agendamento</option>
                <option>Novos boletos R$</option>
                <option>Agendamentos aprovados</option>
                <option>Novos cadastro de usuários</option>
                <option>Hora de uso das facilities</option>
            </select>
    </div>
    <br>
    <div class="middle-left">
        <h1>Acesso Rápido</h1>

        <div class="pull-left">
            <ul>
                <li><a href="<?php echo base_url('usuarios/editar'); ?>">Editar meu dados cadastrais</a></li>
                <li><a href="<?php echo base_url('usuarios/trocar_senha'); ?>">Trocar minha senha de acesso ao sistema</a></li> <!-- Tem que passar a senha do usuário pela URL para trocar senha. -->
                <li>Editar as configurações do sistema</li>
                <li><a href="<?php echo base_url('usuarios/listar'); ?>">Listar</a></li>
            </ul>
        </div>
        <div class="hr">&nbsp;</div>
        <div class="pull-right">
            <ul>
                <li>Criar novo backup</li>
                <li>Editar conteúdo da ajuda aos usuários</li>
                <li>Boletos emitidos</li>                   
            </ul>
        </div>
        
    </div>
    <div class="middle-right">
        <h1>Último acesso</h1>
        <div>
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                Sáb ado, 1 3/0 8 /2 0 1 2 2 0 : 4 0<br><br>
                IP: 2 0 0 . 1 2 9. 34 5 . 4 5 6
            </p>
        </div>
    </div>
    
    <div class="middle-down-left" id="middle-down">
        <h1>Mensagens recebidas</h1><br>
        <div>
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                <a href=''>mais...</a>
            </p>
            <br>
            
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                <a href=''>mais...</a>
            </p>
        </div>
    </div>
    
    <div class="middle-down-center" id="middle-down">
        <h1>Boletos</h1><br>
        <div>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <input type="submit" value="todos os boletos"><br><br>
            <a href="">lista de lançamentos</a>
            <br>
        </div>
    </div>
    <div class="middle-down-right" id="middle-down">
        <h1>Solicitações de agendamentos</h1><br>
        <div>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <input type="submit" value="novo agendamento"><br><br>
            <a href="">todas as solicitações</a>
            <br>
        </div>
    </div>
    
    <div class="down-left" id="down">
        <h1>Notícias do site do CEFAP via RSS</h1><br>
        
    </div>
    <div class="down-right" id="down">
        <h1>Notícias do site do CEFAP via RSS</h1><br>
        
    </div>
    
    
    
    
</div>
<?php
    
    $this->load->view('footer'); 
?>  