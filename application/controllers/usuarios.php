<?php

class Usuarios extends CI_Controller {
	
	public function index(){
		
	}
	
	public function listar() {
		//@TODO checar se usuário é admin
		$data['title'] = 'Lista de usuários';
		$this->load->view('usuario_listar', $data);
	}
	
	public function adicionar() {
		
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
			$user->nome				= $post['nome'];
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
	
}

?>