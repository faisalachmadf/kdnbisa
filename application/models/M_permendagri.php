<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permendagri extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database('');
	}

   

    public function get_by_id($id)
    {   
        
        return $this->db->get_where('permendagri', ['id' => $id])->row_array();
        
    }

    public function get_data_admin()
    {

        $this->db->select('*');
        $this->db->from('permendagri');
        return $this->db->get();

    }

     
    public function get_data()
    {
        
        return $this->db->get('permendagri')->result_array();
    }


    public function get_data_pagination($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nomor', $keyword);
            $this->db->or_like('tentang', $keyword);
        }

        return $this->db->get('permendagri', $limit, $start)->result_array();
    }

    public function count_data()
    {
        return $this->db->get('permendagri')->num_rows();
    }

    public function insert_data(){
          
        $data =[
            "nomor"             => $this->input->post('nomor', true),
            "tentang"           => $this->input->post('tentang', true),
            "segmen"            => $this->input->post('segmen', true),
            "file"              => $this->upload->data('file_name'),
            "created_at"        => date('Y-m-d H-i:s'),
        ];
        $this->db->insert('permendagri',$data);
        return true;
    }

    public function edit_data($id)
    {
        
        $this->db->select('*');
        $this->db->from('permendagri');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result_array();
    }

   public function update_data(){
          
        $data =[
            "nomor"             => $this->input->post('nomor', true),
            "tentang"           => $this->input->post('tentang', true),
            "segmen"            => $this->input->post('segmen', true),
            /*"file"              => $this->upload->data('file_name'),*/
            "edited_at"         => date('Y-m-d H-i:s'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('permendagri', $data);
    }
    
    public function delete_data($id){
        
        $this->db->where('id', $id);
        $query = $this->db->get('permendagri');
        $row = $query->row();
        unlink("./assets/permendagri/$row->file");
        $this->db->delete('permendagri', array('id' => $id));
        return true;
    }

}