<?php

class Model_product extends CI_Model {

	protected $table_name = 'products';

	public function __construct()
	{
		parent::__construct();
	}

	public function all_product()
	{
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table_name);
	}

	public function product_by_id($p_id)
	{
		$this->db->where('p_id', $p_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function insert($arr_data)
	{
		$this->db->insert($this->table_name, $arr_data);
		return $this->db->insert_id();
	}

	public function insert_product_category($arr_data)
	{
		$this->db->insert('cat_and_pro', $arr_data);
	}

	public function update($arr_data, $p_id)
	{
		$this->db->where('p_id', $p_id);
		$this->db->update($this->table_name, $arr_data);
	}

	public function delete($p_id)
	{
		$this->db->delete_product_category($p_id);
		$this->db->where('p_id', $p_id);
		$this->db->delete($this->table_name);
	}

	public function delete_product_category($p_id, $c_id)
	{
		$this->db->where('p_id', $p_id);
		$this->db->where('c_id', $c_id);
		$this->db->delete('cat_and_pro');
	}

	public function limit_product($num_row, $start)
	{
		$this->db->limit($num_row, $start);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function product_category($p_id)
	{
		$this->db->where('p_id', $p_id);
		$query = $this->db->get('cat_and_pro');
		return $query->result_array();
	}

	public function check_product_category($p_id, $c_id)
	{
		$this->db->where('p_id', $p_id);
		$this->db->where('c_id', $c_id);
		$query = $this->db->get('cat_and_pro');
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function product_selected($selected)
	{
		$this->db->where('selected', $selected);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function set_selected($selected)
	{
		if (intval($selected) > 0)
		{
			$product = $this->product_selected($selected);
			if (isset($product[0]['selected']))
			{
				$arr_data=array('selected'=>0);
				$this->update($arr_data,$product[0]['p_id']);
			}
		}
	}
}
