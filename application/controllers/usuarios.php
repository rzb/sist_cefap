<?php
class Usuarios extends CI_Controller{
    
    public function __construct(){
        
        parent:: __construct();
                
    }
    
    public function index(){ 
        
        
    }
    
    public function listar(){
        // @TODO Verificar se o usuário é admin 
        /*if(user == superadmin*/
        
        if($this->uri->segment(3) == null){
           $user = new Usuario();
            $user->select('id, nome, email, tipo, status, instituicao'); 
        
            $user->get();
        
            $data['user'] = $user;
        
            $this->load->view('usuario_listar',$data);
        }
        else{
            $order = $this->uri->segment(3);
            $user = new Usuario();
            $user->select('id, nome, email, tipo, status, instituicao'); 
            $user->order_by($order);
            
            $user->get();
        
            $data['user'] = $user;
        
            $this->load->view('usuario_listar',$data);
            
        }
        
        /*if(user == admin)
         * $user = new Usuario();
         * $user->where('tipo',$excetoExcluidos);
         * $user->get();
         * $data['user'] = $user;
         * $this->load->view('usuario_listar',$data);
         */
        
    }
    
    public function adicionar(){
        
        // @TODO RN's abaixo
		// cadastrar usuário com credencial de usuário "comum" e status "inativo"
		// enviar e-mail de confirmação de cadastro e após confirmado alterar status para "ativo"
		// username deve ser único mesmo dentro os já excluídos do sistema
		// campo de selação de credencial só é mostrado para usuários superadministradores
		// um superadministrador pode fazer o cadastro de quantos usuários quiser, enquanto usuários comuns e administradores só podem registrar a si mesmos
		// uma vez registrados e logados, comuns e administradores não terão mais acesso ao formulário de cadastro

		$data['title'] = 'Cadastro de Usuário';

		if ($this->input->post('submit')) {
			/* 
			 * 1- gravar usuário no banco
			 * 2- enviar e-mail de confirmação
			 * 3- mostrar mensagem de sucesso
			 * */
			$user = new Usuario();
			$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

			$user->username 		= $post['username'];
			$user->senha			= $post['senha'];
			$user->nome			= $post['nome'];
			$user->sobrenome		= $post['sobrenome'];
			$user->endereco			= $post['endereco'];
			$user->cidade			= $post['cidade'];
			$user->uf				= $post['uf'];
			$user->instituicao		= $post['instituicao'];
			$user->departamento		= $post['departamento'];
			$user->data_nascimento	= $post['data_nascimento'];
			$user->key				= '';
			$user->status			= STATUS_USUARIO_INATIVO;
			// $user->obs				= '';
			$user->credencial		= CREDENCIAL_USUARIO_COMUM;
			$user->email			= $post['email'];
			$user->celular			= isset($post['celular']) ? $post['celular'] : 0;
			$user->telefone			= $post['telefone'];
			$user->cpf				= $post['cpf'];
			// @TODO implementar no formulário e modificar documentação para: $user->tipo				= '';
			$user->newsletter		= isset($post['newsletter']) ? $post['newsletter'] : 0;
			$user->cep				= $post['cep'];

			if( !$user->save() ) { // error on save

				if ( $user->valid ) { // validation ok; database error on insert or update

					$data['msg'] = '<strong>Erro na gravação no banco de dados.</strong><br />Tente novamente e, se o problema persistir, notifique o administrador do sistema.';
					$data['msg_type'] = 'error';

				} else { // validation error

					$data['msg'] = $user->error->string;
					$data['msg_type'] = 'error';

				}

			} else { // success

				$msg = urlencode(htmlentities("<strong>Usuário(s) adicionado(s) com sucesso!</strong>"));
				$msg_type = urlencode('success');
				redirect("/usuarios/?msg=$msg&msg_type=$msg_type");
				return;

			}

		}

		$this->load->view('usuario_adicionar', $data);

    }
    
    public function excluir(){
        
      /* $ids = $this->uri->segment(3);
       $ids = explode('_', $ids);
        
       if(isset($ids))
            {
             $u = new Usuario();
                $u->where_in('id',$ids)->update('status', STATUS_USUARIO_EXCLUIDO);
            
                if($u->delete() ) // delete user
                    {
                            $msg = urlencode(htmlentities("<strong>Usuário excluído com sucesso! (ID: $ids)</strong>"));
                            $msg_type = urlencode('success');
                    }
                    else
                    {
                            $msg = urlencode(htmlentities("<strong>Ocorreu um erro durante a exclusão do usuário (ID: $ids)</strong><br />Por favor, tente novamente. Se o problema persistir, contate o administrador do sistema."));
                            $msg_type = urlencode('error');
                    }
            
            }
         redirect(base_url('usuarios/listar'));*/
    }
    
    public function mudar_status(){
            
            $ids = $this->uri->segment(3);
            $id = explode('_', $ids);
            
            $option = $this->uri->segment(4);
            
           switch($option){
                case STATUS_USUARIO_EXCLUIDO:
                    $u = new Usuario();
                    $u->where_in('id',$id)->update('status', $option);
                    redirect(base_url('usuarios/listar'));
                    break;
                
                case STATUS_USUARIO_BLOQUEADO:
                    $u = new Usuario();
                    $u->where_in('id',$id)->update('status', $option);
                    redirect(base_url('usuarios/listar'));
                    break;
                    
                case STATUS_USUARIO_ATIVO:
                    $u = new Usuario();
                    $u->where_in('id',$id)->update('status', $option);
                    redirect(base_url('usuarios/listar'));
                    break;
                
                case STATUS_USUARIO_INATIVO:
                    $u = new Usuario();
                    $u->where_in('id',$id)->update('status', $option);
                    redirect(base_url('usuarios/listar'));
                    break;
                
                case 4:
                    $this->load->view('usuario_trocar_senha', $id); 
                    break;
                
                                   
                default:
                    redirect(base_url('usuarios/listar')); 
                    break;
            }
    }
    
    public function mudar_credencial(){
        
        
    }
    
    public function editar(){
        
        
            
        
    }
    
    public function trocar_senha(){
        
        $id = $this->uri->segment(3);
        if ($this->input->post(NULL,TRUE)) {

            $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
            
            $user->senha = $post['senha_atual'];

            $senhaBD = new Usuario();
            $senhaBD->where('id',$id);
            $senhaBD->get();
            
            if($user->senha == $senhaBD->senha){
                
                $user->senha_nova = $post['nova_senha'];
                $user->conf_senha = $post['conf_senha'];
                 
                if($user->senha_nova == $user->conf_senha){
                    $usuario = new Usuario();
                    $usuario->where('id',$id)->update('senha', $user->senha_nova);
                    $usuario->get();
                    echo 'atualizado com sucesso!';


                    }else {

                        echo 'senha digitada não confere com a conf_senha';
                    }
                    
                }else {
                    
                    echo 'senha digitada não confere com a senha do BD';
                    
                }
        }else{
            $id = $this->uri->segment(3);
            $this->load->view('usuario_trocar_senha', $id);
        }
    }
    public function ativar(){
        
        
    }
    
    public function lembrete_senha(){
        
        $this->load->view('usuario_lembrete_senha');
    }
    
    public function dados_pessoais(){
        
        $id = $this->uri->segment(3);
        
        $user = new Usuario();
        $user->where('id', $id);
        $user->get();
        
        $data['user'] = $user;
        
        $this->load->view('usuario_dados_pessoais',$data);
    }
    
    public function __destruct(){
        
    }
}
?>
