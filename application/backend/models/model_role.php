<?php

class Model_role extends CI_Model{

    protected $table_name='role';

    public function __construct()
    {
        parent::__construct();
    }

    public function all_role($isStatus=FALSE)
    {
        if($isStatus)
        {
            $this->db->where('status',1);
        }
        $query=$this->db->get($this->table_name);
        return $query->result_array();
    }

    public function role_by_id($role_id)
    {
        $this->db->where('role_id',$role_id);
        $query=$this->db->get($this->table_name);
        return $query->result_array();
    }

    public function insert($arr_data)
    {
        $this->db->insert($this->table_name,$arr_data);
    }

    public function update($arr_data,$role_id)
    {
        $this->db->where('role_id',$role_id);
        $this->db->update($this->table_name,$arr_data);
    }

    public function delete($role_id)
    {
        $arr= $this->role_user($role_id);
        foreach($arr as $value)
        {
            $this->delete_role_user($value['user_id'],$role_id);
        }
        $this->db->where('role_id',$role_id);
        $this->db->delete($this->table_name);
    }

    public function check_role($name)
    {
        $this->db->where('name',$name);
        $query=$this->db->get($this->table_name);
        if($query->num_rows() > 0)
        {
            return FALSE;
        }
        return TRUE;
    }

    public function role_user($role_id)
    {
        $this->db->where('role_id',$role_id);
        $query=$this->db->get('role_and_user');
        return $query->result_array();
    }

    public function delete_role_user($user_id,$role_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->where('role_id',$role_id);
        $this->db->delete('role_and_user');
    }
}
