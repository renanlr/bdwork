<?php
	class Buraco_model extends CI_Model{
		public function novo_buraco($buraco)
		{
			$this->db->insert('buraco', $buraco);
			return $this->db->insert_id();
		}
		public function buscar_buracos($id)
		{
			$this->db->select('*');
			$this->db->select('bairro.nome as bairro_nome');
			$this->db->select('rua.nome as rua_nome');
			$this->db->from('localizacao');
			$this->db->join('buraco','localizacao.id = buraco.localizacao_id','INNER');
			$this->db->join('rua','localizacao.rua_id = rua.id','INNER');
			$this->db->join('bairro','rua.bairro_id = bairro.id','INNER');
			$this->db->where('localizacao_id', $id);
			// var_dump($this->db->get_compiled_select());
			// die();
			return $this->db->get()->result();
		}
		public function deleta_buraco($localizacao_id,$usuario_id,$data){
			return $this->db->delete('buraco', array('localizacao_id' => $localizacao_id,'usuario_id' => $usuario_id,'data'=>$data)); 
		}
		public function fecha_buraco($localizacao_id,$usuario_id,$data,$fechamento)
		{
			$this->db->where('localizacao_id', $localizacao_id);
			$this->db->where('usuario_id',$usuario_id);
			$this->db->where('data',$data);
			return $this->db->update('buraco',array('data_fechado' => $fechamento));
		}
		public function confirmar_buraco($localizacao_id,$usuario_id,$data)
		{
			$this->db->where('localizacao_id', $localizacao_id);
			$this->db->where('usuario_id',$usuario_id);
			$this->db->where('data',$data);
			return $this->db->update('buraco',array('confirmado' => 1));
		}
		public function desconfirmar_buraco($localizacao_id,$usuario_id,$data)
		{
			$this->db->where('localizacao_id', $localizacao_id);
			$this->db->where('usuario_id',$usuario_id);
			$this->db->where('data',$data);
			return $this->db->update('buraco',array('confirmado' => 0));
		}
	}
?>