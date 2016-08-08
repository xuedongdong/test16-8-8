<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class goods_model extends CI_Model {

	public $table = 'goods';
	public function goods($goods){
		return $this->db->select('*')
						->from($this->table)
						->where($goods)
						->get()
						->row_array();
	}

	public function goods_list(){
		return $this->db->select('*')
						->from($this->table)
						->get()
						->result_array();
	}

	public function goods_add($data){
		return $this->db->insert($this->table,$data);
	}

	public function goods_edit($data){
		$where['goods_id'] = $data['goods_id'];
		unset($data['goods_id']);
		return $this->db->update($this->table,$data,$where);
	}

	public function del($data){
		return $this->db->delete($this->table,$data);
	}

}
