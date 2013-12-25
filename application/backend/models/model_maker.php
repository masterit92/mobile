<?php

class Model_maker extends CI_Model {

	private $table_name = 'makers';

	public function __construct()
	{
		parent::__construct();
	}

	public function all_maker()
	{
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function maker_by_id($m_id)
	{
		$this->db->where('m_id', $m_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function insert($arr_data)
	{
		$this->db->insert($this->table_name, $arr_data);
		return $this->db->insert_id();
	}

	public function update($arr_data, $m_id)
	{
		$this->db->where('m_id', $m_id);
		$this->db->where('m_id <> ', 0);
		$this->db->update($this->table_name, $arr_data);
	}

	public function delete($m_id)
	{
		$this->db->where('m_id', $m_id);
		$this->db->where('m_id <> ', 0);
		$this->db->delete($this->table_name);
	}

	public function product_maker($m_id)
	{
		$this->db->where('m_id', $m_id);
		$query = $this->db->get('products');
		return $query->result_array();
	}

}
