<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
	
	/*return 1;*/
	public $table = 'users';
	public function user($user){
		return $this->db->select('*')
						->from($this->table)
						->where($user)
						->get()
						->row_array();
	}

	public function user_list(){
		return $this->db->select('*')
						->from($this->table)
						->get()
						->result_array();
	}

	public function user_add($data){
		return $this->db->insert($this->table,$data);
	}

	public function edit_user($data){
		$where['user_id'] = $data['user_id'];
		unset($data['user_id']);
		return $this->db->update($this->table,$data,$where);
	}

	public function del($data){
		return $this->db->delete($this->table,$data);
	}
}