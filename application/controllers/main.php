<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Página inicial';
		$this->load->view('header', $data);
		if ( ! $this->session->userdata('logged_in')) {
			$this->load->view('login');
		} else {
			$data['msg'] = 'Bem-vindo, ' .$this->session->userdata('username'). '! <a href="' .base_url('usuarios/logout'). '">LOGOUT</a>';
        	$data['msg_type'] = 'success';
		}
		$this->load->view('inicial', $data);
		$this->load->view('footer', $data);

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */