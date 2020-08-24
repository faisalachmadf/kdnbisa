<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perencanaan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database('');
    }



    public function get_by_id($id)
    {

        return $this->db->get_where('perencanaan', ['id' => $id])->row_array();
    }


    public function ambil_semua_urusan()
    {
        $query = $this->db->get('kat_urusan');

        return $query->result();
    }

    public function ambil_semua_produk()
    {
        $query = $this->db->get('kat_produk');

        return $query->result();
    }

     public function count_data()
    {
       return $this->db->get('perencanaan')->num_rows();
    }

    public function count_data_perda()
    {
        $query = $this->db->query('SELECT * FROM perencanaan WHERE kat_produk_id= "1"');
        $hitungperda=$query->num_rows();
        return $hitungperda;

      /*  return $this->db->get('perencanaan')->num_rows();*/
    }

    public function count_data_pergub()
    {
        $query = $this->db->query('SELECT * FROM perencanaan WHERE kat_produk_id= "2"');
        $hitungpergub=$query->num_rows();
        return $hitungpergub;

    }

     public function count_data_kepgub()
    {
        $query = $this->db->query('SELECT * FROM perencanaan WHERE kat_produk_id= "3"');
        $hitungkepgub=$query->num_rows();
        return $hitungkepgub;

    }


  /*  public function get_kabkota_by_katkabkot($katkatkabkot_id)
    {

        $kat_id = $this->db->get_where('katkabkot',array('id' =>$katkatkabkot_id))->row('katkabkot_id');
        return $this->db->order_by('created_at', 'DESC')->get_where('perencanaan', $kat_id)->result();
    }*/

     public function get_all_data()
    {
        $this->datatables->select('
            perencanaan.id as id_perencanaan,
            urus.name as kat_urusan_id,
            prod.produk as kat_produk_id,
            perencanaan.opd as opd,
            perencanaan.status as status
        ');

        $this->datatables->from('perencanaan');

        $this->datatables->join('kat_produk prod', 'prod.id = perencanaan.kat_produk_id','left');

        $this->datatables->join('kat_urusan urus', 'urus.id = perencanaan.kat_urusan_id','left');

        $this->datatables->add_column('view', 

            '<a href="' . base_url('admin/identifikasi/Produk_daerah/edit') . "/" . 'id_perencanaan' . '" title="Ubah"><i class="fas fa-edit"></i></a>

            <a href="' . base_url('admin/identifikasi/Produk_daerah/delete') . "/" . 'id' . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>','id_perencanaan');

        return $this->datatables->generate();
    }

    public function get_data()
    {
        $role = $this->session->userdata('role');

        $user_id = $this->session->userdata('user_id');

        $this->db->select('perencanaan.*, kat_urusan.id AS kat_urusan_id, kat_urusan.name, kat_produk.id AS kat_produk_id, kat_produk.produk, user.user_id AS id_user, user.nama');
        $this->db->join('kat_urusan', 'perencanaan.kat_urusan_id = kat_urusan.id', 'left');
        $this->db->join('kat_produk', 'perencanaan.kat_produk_id = kat_produk.id', 'left');
        $this->db->join('user', 'perencanaan.id_user = user.user_id', 'left');
        $this->db->from('perencanaan');
        $this->db->order_by('perencanaan.created_at','DESC');

        if ($role != 'root') {
          $this->db->where('perencanaan.id_user', $user_id);
         } 
            
      

                
            
        $query = $this->db->get();
        return $query->result();
    }


   /* public function get_data_pagination($limit, $start, $keyword = null)
    {
        if ($keyword) {*/
          /*  $this->db->like('batas', $keyword);*/
            /*$this->db->or_like('kabkot', $keyword);
        }

        $this->db->select('kabkota.*, katkabkot.id AS katkabkot_id, katkabkot.kabkot, katkabkot.logo');
        $this->db->join('katkabkot', 'kabkota.katkabkot_id = katkabkot.id', 'left');
        return $this->db->get('perencanaan')->result_array();
    }*/

   /* public function count_data()
    {
        return $this->db->get('perencanaan')->num_rows();
    }*/


    public function insert_data()
    {

        $data = [
            "kat_urusan_id" => $this->input->post('kat_urusan_id', true),
            "kat_produk_id" => $this->input->post('kat_produk_id', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "opd" => $this->input->post('opd', true),
            'id_user'    => $this->session->userdata('user_id'),
           /* "abstraksi" => $this->input->post('abstraksi', true),*/
           /* "tanggal" => date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),*/
           /* "file"              => $this->upload->data('file_name'),*/
            "status" => $this->input->post('status', true),
            "created_at"        => date('Y-m-d H-i:s'),
        ];
        $this->db->insert('perencanaan', $data);
        return true;
    }

    public function edit_data($id)
    {

        $this->db->select('*');
        $this->db->from('perencanaan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_data()
    {

        $data = [
            "kat_urusan_id" => $this->input->post('kat_urusan_id', true),
            "kat_produk_id" => $this->input->post('kat_produk_id', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "opd" => $this->input->post('opd', true),
            /*'id_user'    => $this->session->userdata('user_id'),*/
            "status" => $this->input->post('optradio1'),
            "selesai" => $this->input->post('selesai'),
            "keterangan" => $this->input->post('keterangan'),
           /* "abstraksi" => $this->input->post('abstraksi', true),*/
            // File
            "edited_at"        => date('Y-m-d H-i:s'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('perencanaan', $data);
    }
    
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('perencanaan');
        $row = $query->row();
        unlink("./assets/perencanaan/$row->file");
        $this->db->delete('perencanaan', array('id' => $id));
        return true;

      
    }
}