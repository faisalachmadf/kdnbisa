<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database('');
	}

   

    public function get_by_id($id)
    {   
        
        return $this->db->get_where('kat_produk', ['id' => $id])->row_array();
        
    }

     
    public function get_data(){
        
        $this->db->select('*');
        $this->db->from('kat_produk');
        return $this->db->get();
    }

    public function insert_data(){
          
        $data =[
            
            "produk"            => $this->input->post('produk', true),
            "created_at"        => date('Y-m-d'),
        ];
        $this->db->insert('kat_produk',$data);
        return true;
    }

    public function edit_data($id){
        
        $this->db->select('*');
        $this->db->from('kat_produk');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result_array();
    }

   public function update_data(){
          
        $data =[
            "produk"            => $this->input->post('produk', true),
            "edited_at"        => date('Y-m-d'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kat_produk', $data);
    }
    
    public function delete_data($id){
        
        $this->db->where('id', $id);
        $this->db->delete('kat_produk');
        return true;
    }
}