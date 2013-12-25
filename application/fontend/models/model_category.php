<?php

class Model_category extends CI_Model {

	protected $table_name = 'category';

	public function __construct()
	{
		parent::__construct();
	}

	public function all_category()
	{
		$this->db->where('status', 1);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function category_by_id($c_id)
	{
		$this->db->where('c_id', $c_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function category_by_parent_id($parent_id)
	{
		$this->db->where('parent_id', $parent_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

}
