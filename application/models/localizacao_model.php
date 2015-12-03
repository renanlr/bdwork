<?php
	class Localizacao_model extends CI_Model{
		public function todas_localizacoes(){
			return $this->db->get('localizacao');
		}

		public function nova_localizacao($dados){
			$this->db->insert('localizacao', $dados);
			return $this->db->insert_id();
		}
	
		public function deleta_localizacao($id){
			return $this->db->delete('localizacao', array('id' => $id)); 
		}

		public function edita_localizacao($id, $dados){
			$this->db->where('id', $id);
			return $this->db->update('localizacao', $dados);
		}

		public function buscar_localizacao($id){
			$this->db->where('id', $id);
			$this->db->limit('1');
			$query = $this->db->get('localizacao')->result();
			
			return $query[0];
		}

		public function todas_ruas(){
			$this->db->select('rua.id as rua_id');
			$this->db->select('rua.nome as rua_nome');
			$this->db->select('bairro.nome as bairro_nome');
			$this->db->select('cidade.nome as cidade_nome');
			$this->db->select('estado.nome as estado_nome');
			$this->db->select('pais.nome as pais_nome');
			$this->db->select('continente.nome as continente_nome');
			$this->db->join('bairro', 'bairro.id = rua.bairro_id');
			$this->db->join('cidade', 'cidade.id = bairro.cidade_id');
			$this->db->join('estado', 'estado.id = cidade.estado_id');
			$this->db->join('pais', 'pais.id = estado.pais_id');
			$this->db->join('continente', 'continente.id = pais.continente_id');
			return $this->db->get('rua');
		}
	}
?>
