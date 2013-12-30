<?php

class Model_products extends CI_Model {

	protected $table_name = 'product';
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

	public function product_category($arr_c_id)
	{
		$this->db->where_in('c_id', $arr_c_id);
		$query = $this->db->get('cat_and_pro');
		$arr_pro_id = array();
		foreach ($query->result_array() as $pro_id)
		{
			$arr_pro_id[] = $pro_id['p_id'];
		}
		return $arr_pro_id;
	}

	public function maker_product($arr_c_id)
	{
		$arr_product = $this->product_category($arr_c_id);
		if (count($arr_product) > 0)
		{
			$arr = implode(',', $arr_product);
			$arr_c_id = implode(',', $arr_c_id);
			$sql = "SELECT DISTINCT `m_id` FROM `product`
						JOIN `cat_and_pro` ON `product`.`p_id`= `cat_and_pro`.`p_id`
						JOIN `category` ON `cat_and_pro`.`c_id`=`category`.`c_id`
						WHERE `product`.`p_id` IN($arr) AND `category`.`c_id` IN($arr_c_id)";
			$query = $this->db->query($sql);
			$arr_maker_id = array();
			foreach ($query->result_array() as $pro)
			{
				$arr_maker_id[] = $pro['m_id'];
			}
			return $arr_maker_id;
		}
		return NULL;
	}

	public function product_in_category($arr_c_id)
	{
		$this->db->where_in('c_id', $arr_c_id);
		$query = $this->db->get('cat_and_pro');
		$arr_pro_id = array();
		foreach ($query->result_array() as $pro_id)
		{
			$arr_pro_id[] = $pro_id['p_id'];
		}
		return $arr_pro_id;
	}

	public function filter_by($filter_by)
	{
		$arr_where_in = array();
		$arr_where = array();
		if (isset($filter_by['arr_m_id']) && $filter_by['arr_m_id'] !== 'NULL')
		{
			$arr_where_in['m_id'] = $filter_by['arr_m_id'];
		}
		if (isset($filter_by['arr_c_id']))
		{
			$arr_c_id = $filter_by['arr_c_id'];
			$arr_pro_id = $this->product_in_category($arr_c_id);;
			$arr_where_in['p_id'] = $arr_pro_id;
		}
		if (isset($filter_by['sort_name']))
		{
			$this->arr_order_by['name'] = $filter_by['sort_name'];
		}
		else if (isset($filter_by['sort_price']))
		{
			$this->arr_order_by['price'] = $filter_by['sort_price'];
		}
		if (isset($filter_by['price_min']) && isset($filter_by['price_max']))
		{
			$arr_where['price >= '] = floatval($filter_by['price_min']);
			$arr_where['price <= '] = floatval($filter_by['price_max']);
		}
		if (isset($filter_by['search']))
		{
			$this->arr_like['name'] = $filter_by['search'];
		}
		$this->arr_where = $arr_where;
		$this->arr_where_in = $arr_where_in;
	}
}