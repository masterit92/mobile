<?php

class Model_maker extends CI_Model{

    private $table_name='makers';

    public function __construct()
    {
        parent::__construct();
    }

    public function all_maker()
    {
        $query=$this->db->get($this->table_name);
        return $query->result_array();
    }

    public function maker_by_id($arr_m_id)
    {
        $this->db->where_in('m_id',$arr_m_id);
        $query=$this->db->get($this->table_name);
        return $query->result_array();
    }

}
