<?php

class Usuario extends DataMapper {
	
	protected $senha_conf;
	
	public function setSenha_conf($senha_conf){
		$this->senha_conf = $senha_conf;
	}
	
	// @TODO terminar validação
	public $validation = array(
				array(
						'field'   => 'username',
						'label'   => 'Username',
						'rules'   => array('required')
				), // checar se username é único
				array(
						'field'   => 'senha',
						'label'   => 'Senha',
						'rules'   => array('required')
				),
				array(
						'field'   => 'senha_conf',
						'label'   => 'Redigite a Senha',
						'rules'   => array('matches'=>'senha')
				),
				array(
						'field'		=> 'nome',
						'label'		=> 'Nome',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'sobrenome',
						'label'		=> 'Sobrenome',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'endereco',
						'label'		=> 'Endereço',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'cep',
						'label'		=> 'CEP',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'cidade',
						'label'		=> 'Cidade',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'uf',
						'label'		=> 'UF',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'instituicao',
						'label'		=> 'Instituição',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'departamento',
						'label'		=> 'Departamento',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'telefone',
						'label'		=> 'Telefone',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'celular',
						'label'		=> 'Celular',
						'rules'		=> ''
				),
				array(
						'field'		=> 'data_nascimento',
						'label'		=> 'Data de Nascimento',
						'rules'		=> ''
				),
				array(
						'field'		=> 'cpf',
						'label'		=> 'CPF',
						'rules'		=> array('required')
				),
				array(
						'field'		=> 'email',
						'label'		=> 'E-mail',
						'rules'		=> array('required','valid_email')
				),
				array(
						'field'		=> 'nivel_academico',
						'label'		=> 'Nível Acadêmico',
						'rules'		=> ''
				)
		);
	
    // Insert related models that User can have just one of.
    public $has_one = array(
    			'conta' => array(
    						'class' 		=> 'conta',
    						'other_field'	=> 'usuario'
    					)
    			
    		);
    
    // Insert related models that User can have more than one of.
    // @TODO testar e adicionar parâmetros das relações mais complexas, como em 'fclts_coordenadas'
	public $has_many = array(
				'fclts'					=> array(
							'class'			=> 'facility',
							'other_field'	=> 'usuarios'
						),
				'fclts_coordenadas'		=> array(
							'class'			=> 'facility',
							'other_field'	=> 'coordenadores',
							'join_self_as'	=> 'usuario_id',
							'join_other_as'	=> 'facility_id',
							'join_table'	=> 'coordenadores_facilities'
						),
				'projetos'				=> array(
							'class'			=> 'projeto',
							'other_field'	=> 'usuarios'
						),
				'projetos_criados'		=> array(
							'class'			=> 'projeto',
							'other_field'	=> 'autor'
						),
				'boletos'				=> array(
							'class'			=> 'boleto',
							'other_field'	=> 'usuario'
						),
				'lancamentos'			=> array(
							'class'			=> 'lancamento',
							'other_field'	=> 'usuario'
						),
				'lancamentos_criados'	=> array(
							'class'			=> 'lancamento',
							'other_field'	=> 'autor'
						),
				'lancamentos_cancelados'=> array(
							'class'			=> 'lancamento',
							'other_field'	=> 'cancelamento_autor'
						),
				'formularios'			=> array(
							'class'			=> 'formulario',
							'other_field'	=> 'autor'
						),
				'respostas'				=> array(
							'class'			=> 'resposta',
							'other_field'	=> 'usuario'
						),
				'configuracoes' 		=> array(
							'class'			=> 'configuracao',
							'other_field'	=> 'autor'
						),
				'logs'					=> array(
							'class'			=> 'log',
							'other_field'	=> 'usuario'
						),
				'msgs_enviadas'			=> array(
							'class'			=> 'mensagem',
							'other_field'	=> 'from'
						),
				'msgs_recebidas'	=> array(
							'class'			=> 'mensagem',
							'other_field'	=> 'to'
						),
				'agdms'				=> array(
							'class'			=> 'agendamento',
							'other_field'	=> 'usuario'
						),
				'agdms_aprovados'	=> array(
							'class'			=> 'agendamento',
							'other_field'	=> 'aprovado_por'
						),
				'periodos'			=> array(
							'class'			=> 'periodo',
							'other_field'	=> 'usuario'
						),
				'relatorios'		=> array(
							'class'			=> 'relatorio',
							'other_field'	=> 'usuario'
						),
				'ajudas'			=> array(
							'class'			=> 'ajudas',
							'other_field'	=> 'autor'
						)
			);

}

?>