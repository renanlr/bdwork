<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Acesso extends CI_Controller {

		public function __construct() {
	   		parent::__construct();
	   		$this->load->model('acesso_model');
		}
		public function index(){
			if($this->session->userdata('id_usuario') != false){
				redirect('localizacao');
			}
			else{
				$this->load->view('acesso/login');
			}
		}
		public function login() {
			$user = $this->input->post('usuario');
			$senha = $this->input->post('senha');
			$usuario = $this->acesso_model->procurar_usuario($user, $senha);
			if(!$usuario){
				redirect('acesso');
			}
			else{	
				$newdata = array(
					'id_usuario' => $usuario->id
				);
				$this->session->set_userdata($newdata);

				redirect('localizacao');
			}
		}
		public function deslogar() {
			$this->session->sess_destroy();
			redirect('acesso/login');
		}
	}
?>
