<?php
class Model_products extends CI_Model{

    protected $table_name = 'products';

    public function __construct()
    {
        parent::__construct();
    }

    public function selected_product()
    {
        $this->db->where('selected', 1);
        $this->db->where('status', 1);
        $this->db->limit(5, 0);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    public function all_product()
    {
        $this->db->where('status', 1);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }
    public function count_all()
    {
        $this->db->where('status', 1);
        return $this->db->count_all($this->table_name);
    }

    public function product_by_id($p_id)
    {
        $this->db->where('p_id', $p_id);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    public function limit_product($num_row, $start)
    {
        $this->db->where('status', 1);
        $this->db->limit($num_row, $start);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    public function product_category($c_id)
    {
        $this->db->where('c_id', $c_id);
        $query = $this->db->get('cat_and_pro');
        return $query->result_array();
    }

    public function product_by_category($c_id)
    {
        $arr_p_id = array();
        foreach($this->product_category($c_id) as $p_id)
        {
            $arr_p_id[] = $p_id['p_id'];
        }
        if(count($arr_p_id) > 0)
        {
            $this->db->where_in('p_id', $arr_p_id);
        }
        $this->db->where('status', 1);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

}