<?php

class Model_products extends CI_Model{

    protected $table_name='products';

    public function __construct()
    {
        parent::__construct();
    }

    public function selected_product()
    {
        $this->db->where('selected',1);
        $query=$this->db->get($this->table_name);
        return $query->result_array();
    }

    public function all_product()
    {
        $this->db->where('status',1);
        $query= $this->db->get($this->table_name);
        return $query->result_array();
    }

    public function product_by_id($p_id)
    {
        $this->db->where('p_id',$p_id);
        $query= $this->db->get($this->table_name);
        return $query->result_array();
    }

}