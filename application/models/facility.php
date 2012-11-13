<?php
class Facility extends Datamapper{
    
    public $model = 'facility';
    public $table = 'facilities';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array();
    
    public $has_many = array(
        'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'fclts'
         ),
        
        'coordenadores'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'fclts_coordenadas'
         ),
        
        'logs'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'log',			// This relationship is with the model class 'book'
                'other_field'   => 'facility'
         ),
        
        'agendamentos'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'agendamento',			// This relationship is with the model class 'book'
                'other_field'   => 'facility'
         ),
        
        'formularios'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'formulario',			// This relationship is with the model class 'book'
                'other_field'   => 'facilities'
         ),
        
        'periodos'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'perdiodo',			// This relationship is with the model class 'book'
                'other_field'   => 'facility'
         )
    );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
