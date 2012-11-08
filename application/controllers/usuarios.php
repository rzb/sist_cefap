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
		// *DONE*	cadastrar usuário com credencial de usuário "comum" e status "inativo"
		// *DONE*	enviar e-mail de confirmação de cadastro e após confirmado alterar status para "ativo"
		// *DONE*	username deve ser único mesmo dentro os já excluídos do sistema
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
			$u = new Usuario();
			$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			
			$u->username 		= $post['username'];
			$u->senha			= $post['senha'];
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
			$u->credencial		= CREDENCIAL_USUARIO_COMUM;
			$u->email			= $post['email'];
			$u->celular			= isset($post['celular']) ? $post['celular'] : 0;
			$u->telefone		= $post['telefone'];
			$u->cpf				= $post['cpf'];
			// @TODO implementar no formulário e modificar documentação para: $u->tipo				= '';
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
				/*
					$msg = urlencode(htmlentities("<strong>Usuário(s) adicionado(s) com sucesso!</strong>"));
					$msg_type = urlencode('success');
					redirect("/usuarios/?msg=$msg&msg_type=$msg_type");
					return;
				*/
				
			}
			
		}
		
		$this->load->view('usuario_adicionar', $data);
		
	}
	
	public function ativar() {
		
		$u = new Usuario();
		
		// se o segmento 3 existe e é uma key válida cadastrada para um usuário do banco, ativa o usuário
		if($this->uri->segment(3) && $u->where('key', $this->uri->segment(3))->count()) {
			
			$key = $this->uri->segment(3);
			
			$u->where('key', $this->uri->segment(3))->update('status', STATUS_USUARIO_ATIVO);
			
			$data['title'] = "Cadastro Confirmado";
			// @TODO preparar $data['msg'] para ser mostrada na view
			$this->load->view('usuario_ativar', $data);
			
		// se não há key para se trabalhar, então redireciona à home
		} else {
			redirect(base_url("/main/"));
		}
		
	}
	
}

?>