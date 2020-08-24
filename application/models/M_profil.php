<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

    public function get_by_id()
    {   
        $id = $this->session->userdata('user_id');

        $this->db->from('user');

        $this->db->where('user_id', $id);

        $query = $this->db->get();
        
        return $query->row();
    }
}