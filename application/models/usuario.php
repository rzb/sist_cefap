<?php

class Usuario extends DataMapper {
	
	public $model = 'user';
	public $table = 'users';
	public $created_field = 'created';
    public $updated_field = 'modified';
	
    // Insert related models that User can have just one of.
    public $has_one = array(
    			'conta' => array(
    						'class' 		=> 'conta',
    						'other_field'	=> 'usuario'
    					)
    			
    		);
    
    // Insert related models that User can have more than one of.
	public $has_many = array(
				'facilities'			=> array(
							'class'			=> 'facility',
							'other_field'	=> 'usuario'
						),
				'projetos'				=> array(
							'class'			=> 'projeto',
							'other_field'	=> 'usuario'
						),
				'boletos'				=> array(
							'class'			=> 'boleto',
							'other_field'	=> 'usuario'
						),
				'lancamentos'			=> array(
							'class'			=> 'lancamento',
							'other_field'	=> 'usuario'
						),
				'formularios'			=> array(
							'class'			=> 'formulario',
							'other_field'	=> 'usuario'
						),
				'respostas'				=> array(
							'class'			=> 'resposta',
							'other_field'	=> 'usuario'
						),
				'configuracoes' 		=> array(
							'class'			=> 'configuracao',
							'other_field'	=> 'usuario'
						),
				'logs'					=> array(
							'class'			=> 'log',
							'other_field'	=> 'usuario'
						),
				'mensagens_enviadas'	=> array(
							'class'			=> 'mensagem',
							'other_field'	=> 'from'
						),
				'mensagens_recebidas'	=> array(
							'class'			=> 'mensagem',
							'other_field'	=> 'to'
						)
			);
    
}

?>