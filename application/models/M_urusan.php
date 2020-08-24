<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_urusan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database('');
	}

   

    public function get_by_id($id)
    {   
        
        return $this->db->get_where('kat_urusan', ['id' => $id])->row_array();
        
    }

     
    public function get_data(){
        
        $this->db->select('*');
        $this->db->from('kat_urusan');
        return $this->db->get();
    }

    public function insert_data(){
          
        $data =[
            
            "name"            => $this->input->post('name', true),
            "created_at"        => date('Y-m-d'),
        ];
        $this->db->insert('kat_urusan',$data);
        return true;
    }

    public function edit_data($id){
        
        $this->db->select('*');
        $this->db->from('kat_urusan');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result_array();
    }

   public function update_data(){
          
        $data =[
            "name"            => $this->input->post('name', true),
            "edited_at"        => date('Y-m-d'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kat_urusan', $data);
    }
    
    public function delete_data($id){
        
        $this->db->where('id', $id);
        $this->db->delete('kat_urusan');
        return true;
    }
}