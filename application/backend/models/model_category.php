<?php

class Model_category extends CI_Model {

	protected $table_name = 'category';

	public function __construct()
	{
		parent::__construct();
	}

	public function all_category()
	{
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function category_by_id($c_id)
	{
		$this->db->where('c_id', $c_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function insert($arr_data)
	{
		$this->db->insert($this->table_name, $arr_data);
	}

	public function update($arr_data, $c_id)
	{
		$this->db->where('c_id', $c_id);
		$this->db->update($this->table_name, $arr_data);
	}

	public function delete($c_id)
	{
		$this->delete_category_product($c_id);
		$category = $this->category_by_id($c_id);
		$arr_data = array('parent_id' => $category[0]['parent_id']);
		$this->db->where('parent_id', $c_id);
		$this->db->update($this->table_name, $arr_data);
		$this->db->where('c_id', $c_id);
		$this->db->delete($this->table_name);
	}

	public function delete_category_product($c_id)
	{
		$this->db->where('c_id', $c_id);
		$this->db->delete('cat_and_pro');
	}

	public function chirden_category($c_id)
	{
		$this->db->where('parent_id', $c_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

}
