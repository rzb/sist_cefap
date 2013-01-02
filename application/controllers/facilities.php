<?php

class Facilities extends CI_Controller {
    
    public function __constructor(){
        
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
    
    public function index(){
        
        redirect('main');
    }
    
    public function listar(){
        
        //COMUM: apenas facilities com o status "ATIVO";
        //ADMINISTRADOR: apenas com status "ATIVO" e "INATIVO";
        //SUPERADMINISTRADOR: são mostradas também as facilities com o status "EXCLUÍDO", permitindo que sejam ativadas novamente. Mostrar botão "adicionar" no topo da página;
        //A opção de reativar uma facility inativa só é mostrada se o usuário logado estiver associado à facility como um de seus gestores (esta opção é configurável para cada facility).
        
        $total = $this->db->count_all("facilities");

        if ($total > 0 ){
            $order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
            $limit = $this->uri->segment(4, 5); #limite de resultados por página
            $npage = $this->uri->segment(5, 0); //número da página 
            $exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.


            if($limit == 'usuarios' && $npage == 'adicionar'){
                redirect('usuarios/adicionar');
            }


            $offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
            if($offset <= 0){
                $offset = 1;
            }                    
            $fclt = new Facility();
            $u = $this->session->userdata('credencial');
            
            switch ($u){
                
                case CREDENCIAL_USUARIO_COMUM :
                    $fclt->select('nome, tipo_agendamento,  arquivos, status')->limit($limit, $offset);
                break;
                case CREDENCIAL_USUARIO_SUPERADMIN :
                    $fclt->select('nome, tipo_agendamento,  arquivos, status')->limit($limit, $offset);
                break;
                //usuário com a credencial de admin não poderá ver a lista de usuários excluídos.
                case CREDENCIAL_USUARIO_ADMIN :
                    $fclt->select('nome, tipo_agendamento,  arquivos, status')->limit($limit, $offset)->where_not_in('status', STATUS_FACILITIES_EXCLUIDO)->limit($limit, $offset); 
                break;
                }
            //ordena de acordo com a opção que o usuário escolher    
            if(empty($order)){
                $fclt->order_by('id', $exib);

            }else{
                $fclt->order_by($order, $exib);
            }

            $fclt->get();

            $data['img'] = $order;
            $data['fclts'] = $fclt; 
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['perpage'] = $npage;

        }else{
            $data['msg'] = '<strong>Nenhum usuário encontrado.</strong>';
            $data['msg_type'] = 'alert-block';
        }     

        /* PAGINAÇÃO */
            $pagination = $total / $limit;
            $page = ceil($pagination);
            $links = "";
            for($i = 1; $i <= $page; $i++){
                $order = $this->uri->segment(3, 'id');

                $url = base_url("usuarios/listar/$order/$limit/$i");
                $links .= "<a href='$url'>$i</a>";   

                }     
                $data['page'] =  $links;
         /*END PAGINAÇÃO*/     

        $data['title'] = 'Lista de Usuários';
        $this->load->view('facilities_listar',$data);
    }
    
    public function adicionar(){
        /*// dump unauthorized users
        if ( $this->uRole != CREDENCIAL_USUARIO_SUPERADMIN ) {
                redirect('main');
        }

        // default view
        $view = 'facilities_adicionar';

        if ( $this->input->post('submit') ) {

                $fclt = new Facility();
                $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

                $fclt->nome		= $post['nome'];
                $fclt->nome_abreviado	= $post['nome_abreviado'];
                $fclt->descricao	= $post['descricao'];
                $fclt->status		= STATUS_FACILITIES_ATIVO;		# status padrão para novas facilities
                $fclt->tipo_agendamento	= $post['tipo_agendamento'];		# @TODO use case datas de agendamento (TIPO_AGENDAMENTO_AGENDA) - implementar google calendar ou similar
                $fclt->arquivos		= explode(',', $post['arquivos']);	# @TODO tratar arquivos enviados
                $fclt->valor		= $post['valor'];
                $fclt->unidade_valor	= $post['unidade_valor'];

                $coo = new Usuario();
                $coo->where_in('id', $post['coordenadores'])->get();

                // tip: formularios é um campo tipo hidden cujo valor é construído via javascript (id's separados por vírgula)
                $forms = new Formulario();
                $forms->where_in( 'id', explode(',', $post['formularios']) )->get();

                // preparing related objects to save
                $related = array(
                                'coordenadores'	=> $coo->all, 
                                'formularios'	=> $forms->all
                            );

                // error on save
                if ( ! $fclt->save($related) ) {
                    // validation ok; database error on insert or update
                    if ( $fclt->valid ) {
                            $data['msg'] = MSG_ERRO_BD;
                            $data['msg_type'] = 'error';
                    // validation error
                    } else {
                            $data['msg'] = $fclt->error->string;
                            $data['msg_type'] = 'error';
                    }
                // success
                } else {
                        $data['msg'] = 'Nova facility ' .$fclt->nome. ' cadastrada com sucesso!';
                        $data['msg_type'] = 'success';
                }
        }

        $data['title'] = 'Cadastro de Facility';
        $data['currUser'] = $this->currUser;
        $this->load->view($view, $data);
        */
        $data['title'] = 'Cadastro de Facility';
        $this->load->view('facilities_adicionar');
    }
    
    public function editar(){
        
        
    }
    
    public function alterar_status(){
        
        
    }
    
    public function ver(){
        
        
    }
    
    public function excluir(){
        
        
    }
    
    public function extrato(){
        
        
    }
    
    public function extrato_pdf(){
        
        
    }
    
    public function editar_agenda(){
        
        
    }
    
    public function __destruct(){
        
    }
}

?>
