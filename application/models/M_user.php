<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function login($_table, $username, $password, $status)
    {
        $this->db->select('*');
        $this->db->from($_table);
        $this->db->where($username);
        $this->db->where($password);
        $this->db->where($status);

        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return FALSE;
        }
        else {
            return $query->result();
        }
    }

    public function get_data(){
        
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get();
    }


    public function get_by_id($id)
    {
        $this->db->from('user');

        $this->db->where('user_id', $id);

        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function delete_data($user_id){
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
        return true;
    }

     public function update_data(){
          
        $data =[
            "produk"            => $this->input->post('produk', true),
            "edited_at"        => date('Y-m-d'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kat_produk', $data);
    }


}