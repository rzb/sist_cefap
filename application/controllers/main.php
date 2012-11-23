<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Página inicial';
		if ( $this->session->userdata('logged_in')) {
                    // @TODO implementar direcionamento ao dashboard de acordo com a credencial
                    // mensagem abaixo meramente para debugar.
                    $data['msg'] = 'Bem-vindo, ' .$this->session->userdata('username'). '! <a href="' .base_url('usuarios/logout'). '">LOGOUT</a>';
                    $data['msg_type'] = 'success';
                    
                    $u = $this->session->userdata('credencial');
                    switch ($u){
                        case CREDENCIAL_USUARIO_COMUM:
                            $this->load->view('dashboard_comum',$data);
                            break;

                        case CREDENCIAL_USUARIO_ADMIN:
                            $this->load->view('dashboard',$data);
                            break;

                        case CREDENCIAL_USUARIO_SUPERADMIN:
                            $this->load->view('dashboard_superadmin',$data);
                            break;

                        default:
                            echo'erro ao validar credencial',$data;
                            break;
                    }
                }else{
                    $view = 'inicial';
                    $this->load->view($view,$data);
                }
                
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */