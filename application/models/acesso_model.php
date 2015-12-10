<?php
	class Acesso_model extends CI_Model{
		public function procurar_usuario($user, $senha)
		{
			$this->db->where('nome', $user);
			$this->db->where('senha', $senha);
			return $this->db->get('usuario')->row();
		}
	}
?>