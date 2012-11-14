<?php

class Usuarios extends CI_Controller {

    private $uRole;     # credencial do usuário
    
	public function __construct()
	{
		parent::__construct();
        // if user is NOT logged in...
		if ( ! $this->session->userdata('logged_in')) {
		    // initialize user role with FALSE;
			$this->uRole = FALSE;
		}
        // else, user is logged in...
        else {
            $u = new Usuario();
            $u->select('credencial')->where('id', $this->session->userdata('id'))->get();
            // initialize user role with proper value
            $this->uRole = $u->credencial;
        }

	}
	
	public function index() {
		
	}
	
	public function listar() {
		// dump unauthorized users
        if ( ! $this->uRole) {
            redirect('main');
        }
        
		$data['title'] = 'Lista de usuários';
        $data['uRole'] = $this->uRole;
		$this->load->view('usuario_listar', $data);
	}
	
	public function adicionar() {
		
		// @TODO RN's abaixo
		// *DONE*	cadastrar usuário com credencial de usuário "comum" e status "inativo"
		// *DONE*	enviar e-mail de confirmação de cadastro e após confirmado alterar status para "ativo"
		// *DONE*	username deve ser único mesmo dentro os já excluídos do sistema
		// campo de selação de credencial só é mostrado para usuários superadministradores
		// um superadministrador pode fazer o cadastro de quantos usuários quiser, enquanto usuários comuns e administradores só podem registrar a si mesmos
		// uma vez registrados e logados, comuns e administradores não terão mais acesso ao formulário de cadastro
		
		// dump unauthorized users
		if ( $this->uRole === CREDENCIAL_USUARIO_ADMIN || $this->uRole === CREDENCIAL_USUARIO_COMUM ) {
		    redirect('main');
		}
        
        // default view
        $view = 'usuario_adicionar';
		
		if ( $this->input->post('submit') ) {
			/* 
			 * 1- gravar usuário no banco
			 * 2- enviar e-mail de confirmação
			 * 3- mostrar mensagem de sucesso
			 * */
			$u = new Usuario();
			$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			
			$u->username 		= $post['username'];
			$u->senha			= $post['senha'];
			$u->senha_conf		= $post['senha_conf'];
			$u->nome			= $post['nome'];
			$u->sobrenome		= $post['sobrenome'];
			$u->endereco		= $post['endereco'];
			$u->cidade			= $post['cidade'];
			$u->uf				= $post['uf'];
			$u->instituicao		= $post['instituicao'];
			$u->departamento	= $post['departamento'];
			$u->data_nascimento	= $post['data_nascimento'];
			$u->key				= create_guid();
			$u->status			= STATUS_USUARIO_INATIVO;
			// $u->obs			= '';
			$u->credencial		= $this->uRole ? $post['credencial'] : CREDENCIAL_USUARIO_COMUM; // check if user submitting form is an admin
			$u->email			= $post['email'];
			$u->celular			= isset($post['celular']) ? $post['celular'] : 0;
			$u->telefone		= $post['telefone'];
			$u->cpf				= $post['cpf'];
			$u->tipo            = $post['tipo'];
			$u->newsletter		= isset($post['newsletter']) ? $post['newsletter'] : 0;
			$u->cep				= $post['cep'];
			
			if( !$u->save() ) { // error on save
				
				if ( $u->valid ) { // validation ok; database error on insert or update
					
					$data['msg'] = '<strong>Erro na gravação no banco de dados.</strong><br />Tente novamente e, se o problema persistir, notifique o administrador do sistema.';
					$data['msg_type'] = 'error';
					
				} else { // validation error
					
					$data['msg'] = $u->error->string;
					$data['msg_type'] = 'error';
					
				}
				
			} else { // success
				
				$this->load->library('email');
				
				$this->email->from('renato.trajettoria@trajettoria.com', 'Renato');
				$this->email->to($u->email);
				
				$this->email->subject('Confirmação de Cadastro');
				$this->email->message('Olá, ' .$u->nome. '! Confirme seu cadastro <a href="' .base_url('usuarios/ativar/'.$u->key). '">clicando aqui</a>.');
				
				$this->email->send();
				
				echo $this->email->print_debugger();
				
                $data['msg']        = 'Novo usário ' .$u->username. ' cadastrado com sucesso!';
                $data['msg_type']   = 'success';
                
				// if user is just a guest (not logged in thus registering himself) he can't do this more than once
				if ( ! $this->uRole ) {
				    /*
                     * @TODO talvez implementar uma view 'sucesso' que renderize somente a mensagem de sucesso
                     * e redirecione automaticamente para o controller 'main' via js, sendo assim reutilizável para qualquer ação bem sucedida?
                     */  
				    $data['msg']        = 'Obrigado por ter se registrado! Será lhe enviado um e-mail para que você confirme o cadastro.';
				    $data['msg_type']   = 'success';
                    // change view to success page
                    $view = 'inicial';
				}
				
			}
			
		}

		$data['title'] = 'Cadastro de Usuário';
		$this->load->view($view, $data);
		
	}
	
	public function ativar() {
		
		$u = new Usuario();
		
		// se o segmento 3 existe e é uma key válida cadastrada para um usuário do banco, ativa o usuário
		if($this->uri->segment(3) && $u->where('key', $this->uri->segment(3))->count() > 0) {
			
			$key = $this->uri->segment(3);
			
			$u->where('key', $key)->update('status', STATUS_USUARIO_ATIVO);
			
			$data['title'] = "Cadastro Confirmado";
			// @TODO preparar $data['msg'] para ser mostrada na view
			$this->load->view('usuario_ativar', $data);
			
		// se não há key para se trabalhar, então redireciona à home
		} else {
			redirect('main');
		}
		
	}
	
	public function editar() {
		
		if( $this->uRole !== FALSE && $this->uri->segment(3) && $u->where('id', $this->uri->segment(3))->count() > 0) {
			
            $u = new Usuario();
			$u->where('id', $this->uri->segment(3))->get();
			
			if ($this->input->post('submit')) {

				$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
					
				$u->username 		= $post['username'];
				$u->nome			= $post['nome'];
				$u->sobrenome		= $post['sobrenome'];
				$u->endereco		= $post['endereco'];
				$u->cidade			= $post['cidade'];
				$u->uf				= $post['uf'];
				$u->instituicao		= $post['instituicao'];
				$u->departamento	= $post['departamento'];
				$u->data_nascimento	= $post['data_nascimento'];
				$u->email			= $post['email'];
				$u->celular			= isset($post['celular']) ? $post['celular'] : null;
				$u->telefone		= $post['telefone'];
				$u->cpf				= $post['cpf'];
				$u->tipo			= $post['tipo'];
				$u->newsletter		= isset($post['newsletter']) ? $post['newsletter'] : NEWSLETTER_NAO_RECEBE;
				$u->cep				= $post['cep'];
					
				if( !$u->save() ) { // error on update
			
					if ( $u->valid ) { // validation ok; database error on insert or update
							
						$data['msg'] = '<strong>Erro na gravação no banco de dados.</strong><br />Tente novamente e, se o problema persistir, notifique o administrador do sistema.';
						$data['msg_type'] = 'error';
							
					} else { // validation error
							
						$data['msg'] = $u->error->string;
						$data['msg_type'] = 'error';
							
					}
			
				} else { // success
			
					$data['msg'] = 'Dados atualizados com sucesso.';
					$data['msg_type'] = 'success';
			
				}
					
			}
			
			$data['u'] = $u;
			$data['title'] = 'Edição de Usuário';
			$this->load->view('usuario_editar', $data);
			
		} else {
			redirect('main');
		}
		
	}
	
	public function trocar_senha() {
		
	}
	
	// @TODO ... estender: checar se usuário já está logado verificando sessão...
    public function login() {
        // Create user object
        $u = new Usuario();
		$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
		
        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $post['username'];
        $u->senha	 = $post['senha'];

        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        if ($u->login()) {
        	$data['msg'] = 'Bem-vindo, ' .$u->username. '!';
        	$data['msg_type'] = 'success';
        	$userdata = array(
        			'id'		=> $u->id,
        			'username'  => $u->username,
        			'email'     => $u->email,
        			'logged_in' => TRUE
        	);
        	
        	$this->session->set_userdata($userdata);

        }
        else {
            $data['msg'] = 'Usuário ou senha inválido.';
        	$data['msg_type'] = 'error';
        }
        
        redirect('main');
        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('main');
    }
	
}

?>