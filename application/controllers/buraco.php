<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buraco extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('buraco_model');
		date_default_timezone_set('America/Sao_Paulo');			
	}
	public function index()
	{
		redirect('buraco/novo');
	}
	public function novo()
	{
		$this->load->model('localizacao_model');
		$dados['localizacoes'] = $this->localizacao_model->todas_localizacoes()->result();
		$this->load->view('buraco/novo',$dados);
	}
	public function create()
	{

		$foto = file_get_contents($_FILES['foto']['tmp_name']);
		$data = date('Y').'-'.date('m').'-'.date('d');
		$dados = array(
			'localizacao_id' => $this->input->post('localizacao_id'),
			'usuario_id' 	 => $this->session->userdata('id_usuario'),
			'confirmado' 	 => False,
			'foto'			 => $foto,
			'data' 		 	 => $data
		);
		$this->buraco_model->novo_buraco($dados);

		redirect('buraco/read?id_localizacao=' . $this->input->post('localizacao_id'));
	}
	public function read()
	{
		$id = $this->input->get('id_localizacao');
		$dados['buracos'] = $this->buraco_model->buscar_buracos($id);
		// var_dump($dados);
		// die();
		$this->load->view('buraco/ver_buraco', $dados);
	}
	public function delete()
	{
		$localizacao_id = $this->input->get('localizacao_id');
		$usuario_id = $this->input->get('usuario_id');
		$data= $this->input->get('data');
		$this->buraco_model->deleta_buraco($localizacao_id,$usuario_id,$data);

		redirect('buraco/read?id_localizacao=' . $this->input->get('localizacao_id'));
	}
	public function fechar()
	{
		$localizacao_id = $this->input->get('localizacao_id');
		$usuario_id = $this->input->get('usuario_id');
		$data= $this->input->get('data');
		$fechamento = $data = date('Y').'-'.date('m').'-'.date('d');
		$this->buraco_model->fecha_buraco($localizacao_id,$usuario_id,$data,$fechamento);
		redirect('buraco/read?id_localizacao=' . $localizacao_id);
	}
	public function confirmar()
	{
		$localizacao_id = $this->input->get('localizacao_id');
		$usuario_id = $this->input->get('usuario_id');
		$data= $this->input->get('data');
		$this->buraco_model->confirmar_buraco($localizacao_id,$usuario_id,$data,$fechamento);
		redirect('buraco/read?id_localizacao=' . $localizacao_id);
	}
	public function desconfirmar()
	{
		$localizacao_id = $this->input->get('localizacao_id');
		$usuario_id = $this->input->get('usuario_id');
		$data= $this->input->get('data');
		$this->buraco_model->desconfirmar_buraco($localizacao_id,$usuario_id,$data,$fechamento);
		redirect('buraco/read?id_localizacao=' . $localizacao_id);
	}
}

?>