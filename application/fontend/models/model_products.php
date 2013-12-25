<?php

class Model_products extends CI_Model {

	protected $table_name = 'products';
	public $start = 0;
	public $num_row = 6;
	public $num_page;
	//arr_where=array('key'=>'value');
	public $arr_where = NULL;
	//arr_where_in=array('key'=>array('value1','value2'));
	public $arr_where_in = NULL;
	//arr_order_by=array('key'=>'value');
	public $arr_order_by = NULL;
	//arr_like=array('key'=>'value');
	public $arr_like = NULL;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_infor($start, $num_row)
	{
		$this->start = $start;
		$this->num_row = $num_row;
	}

	public function set_data()
	{
		if (count($this->arr_where) > 0)
		{
			foreach ($this->arr_where as $key => $value)
			{
				$this->db->where($key, $value);
			}
		}
		if (count($this->arr_where_in) > 0)
		{
			foreach ($this->arr_where_in as $key => $value)
			{
				$this->db->where_in($key, $value);
			}
		}
		if (count($this->arr_order_by) > 0)
		{
			foreach ($this->arr_order_by as $key => $value)
			{
				$this->db->order_by($key, $value);
			}
		}
		if (count($this->arr_like) > 0)
		{
			foreach ($this->arr_like as $key => $value)
			{
				$this->db->like($key, $value);
			}
		}
	}

	public function get_num_page()
	{
		$this->set_data();
		$this->db->where('status', 1);
		return $this->db->count_all_results($this->table_name);
	}

	public function product_by_id($p_id)
	{
		$this->db->where('p_id', $p_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function limit_product()
	{
		$this->set_data();
		$this->db->where('status', 1);
		$this->db->limit($this->num_row, $this->start);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function product_category($c_id)
	{
		$this->db->where('c_id', $c_id);
		$query = $this->db->get('cat_and_pro');
		return $query->result_array();
	}

}