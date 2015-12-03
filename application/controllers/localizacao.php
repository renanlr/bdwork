<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacao extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('localizacao_model');
		date_default_timezone_set('America/Sao_Paulo');			
	}

	public function index()
	{
		$dados['localizacoes'] = $this->localizacao_model->todas_localizacoes()->result();
		$this->load->view('localizacao/index', $dados);
	}

	public function nova()
	{
		$dados['ruas'] = $this->localizacao_model->todas_ruas()->result();
		$this->load->view('localizacao/nova', $dados);
	}

	public function create()
	{
		$dados = array(
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'rua_id' => $this->input->post('rua_id')
		);

		$id_new = $this->localizacao_model->nova_localizacao($dados);

		redirect('localizacao/read?id_localizacao=' . $id_new);
	}

	public function read()
	{
		$id = $this->input->get('id_localizacao');
		$dados['localizacao'] = $this->localizacao_model->buscar_localizacao($id);
	
		$this->load->view('localizacao/ver_localizacao', $dados);
	}

	public function delete()
	{
		$id = $this->input->get('id');
		$deleta = $this->localizacao_model->deleta_localizacao($id);

		redirect('localizacao');
	}

	public function edit()
	{
		$dados['ruas'] = $this->localizacao_model->todas_ruas()->result();
		$dados['id'] = $this->input->get('id');
		$this->load->view('localizacao/editar_localizacao', $dados);
	}

	public function update()
	{
		$id = $this->input->post('id');

		$dados = array(
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'rua_id' => $this->input->post('rua_id')
		);

		$update = $this->localizacao_model->edita_localizacao($id, $dados);

		redirect('localizacao/read?id_localizacao=' . $id);
	}
}

?>