<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_identifikasi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database('');
	}

    public function get_by_id($id)
    {
        /*$this->db->select('*');
        $this->db->from('identifikasi iden');
        $this->db->join('kat_urusan b', 'iden.kat_urusan_id = b.id', 'left');
        $this->db->join('kat_produk c', 'iden.kat_produk_id = c.id', 'left');
        $this->db->get_where('identifikasi',$id);
        $query = $this->db->row_array(); */


        $this->db->select('iden.*, b.name as name, s.produk as produk');
        $this->db->from('identifikasi iden');
        $this->db->join('kat_urusan b', 'b.id = iden.kat_urusan_id', 'left');
        $this->db->join('kat_produk s', 's.id = iden.kat_produk_id', 'left');
        $this->db->where('iden.id', $id);
        $query = $this->db->get(); 
        return $query->row_array();

    /* return $this->db->get_where('identifikasi', ['id' => $id])->row_array();*/
    }

    public function get_by_id_bab($id)
    {
        $this->db->select('*');
        $this->db->from('bab');
        $this->db->where('id_identifikasi', $id);
        $query = $this->db->get(); 
        return $query->result();
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
       return $this->db->get('identifikasi')->num_rows();
    }

    public function count_data_perda()
    {
        $query = $this->db->query('SELECT * FROM identifikasi WHERE kat_produk_id= "1"');
        $hitungperda=$query->num_rows();
        return $hitungperda;

      /*  return $this->db->get('identifikasi')->num_rows();*/
    }

    public function count_data_pergub()
    {
        $query = $this->db->query('SELECT * FROM identifikasi WHERE kat_produk_id= "2"');
        $hitungpergub=$query->num_rows();
        return $hitungpergub;

    }

     public function count_data_kepgub()
    {
        $query = $this->db->query('SELECT * FROM identifikasi WHERE kat_produk_id= "3"');
        $hitungkepgub=$query->num_rows();
        return $hitungkepgub;

    }

        public function get_data_pagination_cek($limit, $start, $keyword = null)
    {
       /* $this->db->select('identifikasi.*, kat_urusan.id AS kat_urusan_id, kat_urusan.name, kat_produk.id AS kat_produk_id, kat_produk.produk');
        $this->db->join('kat_urusan', 'identifikasi.kat_urusan_id = kat_urusan.id', 'left');
        $this->db->join('kat_produk', 'identifikasi.kat_produk_id = kat_produk.id', 'left');
        $this->db->from('identifikasi');
         $query = $this->db->get();
        return $query->result_array();*/

        if ($keyword) {
            $this->db->like('bb.ket', $keyword);

            /*$this->db->or_like('name', $keyword);
          $this->db->or_like('produk', $keyword);*/
        }

      

        $this->db->select('identifikasi.*, bb.ket as ket, bb.id_identifikasi as bbidentifikasi');
        $this->db->join('bab bb', 'bb.id_identifikasi = identifikasi.id', 'left');
        $this->db->from('identifikasi');
         $query = $this->db->get();
        return $query->result_array();

       /* if ($keyword) {
            $this->db->like('bab', $keyword);
        }*/
         
        /*$this->db->select('sk.*, b.name as name, s.produk as produk');
        $this->db->from('identifikasi sk');
        $this->db->join('kat_urusan b', 'b.id = sk.kat_urusan_id', 'left');
        $this->db->join('kat_produk s', 's.id = sk.kat_produk_id', 'left');*/
/*        $this->db->select('*');
        $this->db->from('identifikasi');*/

        $this->db->order_by('identifikasi.created_at','DESC');
         return $this->db->get('identifikasi', $limit, $start)->result_array();

        /*return $this->db->get('identifikasi', $limit, $start)->result_array();*/
    }   

    public function get_data_pagination($limit, $start, $keyword = null)
    {
       
        if ($keyword) {
            $this->db->like('bb.ket', $keyword);

            /*$this->db->or_like('name', $keyword);
          $this->db->or_like('produk', $keyword);*/
        }

      

        $this->db->select('identifikasi.*, bb.ket as ket, bb.id_identifikasi as bbidentifikasi');
        $this->db->join('bab bb', 'bb.id_identifikasi = identifikasi.id', 'left');
        $this->db->from('identifikasi');
        $this->db->group_by('identifikasi.id');
         $query = $this->db->get();
        return $query->result_array();

       /* if ($keyword) {
            $this->db->like('bab', $keyword);
        }*/
         
        /*$this->db->select('sk.*, b.name as name, s.produk as produk');
        $this->db->from('identifikasi sk');
        $this->db->join('kat_urusan b', 'b.id = sk.kat_urusan_id', 'left');
        $this->db->join('kat_produk s', 's.id = sk.kat_produk_id', 'left');*/
/*        $this->db->select('*');
        $this->db->from('identifikasi');*/

        $this->db->order_by('identifikasi.created_at','DESC');
         return $this->db->get('identifikasi', $limit, $start)->result_array();

        /*return $this->db->get('identifikasi', $limit, $start)->result_array();*/
    }


    public function get_data_bab($keyword)
    {
        if ($keyword) {
            $this->db->like('bab.ket', $keyword);
            /*$this->db->or_like('id.keterkaitan', $keyword);*/
            /*$this->db->or_like('name', $keyword);
          $this->db->or_like('produk', $keyword);*/
        }

       /* $this->db->select('identifikasi.*, kat_urusan.id AS kat_urusan_id, kat_urusan.name, kat_produk.id AS kat_produk_id, kat_produk.produk');*/
        $this->db->select('bab.*, id.id');
        $this->db->join('identifikasi id', 'id.id = bab.id_identifikasi', 'left');
        $this->db->from('bab');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data()
    {

       /* $this->db->select('identifikasi.*, kat_urusan.id AS kat_urusan_id, kat_urusan.name, kat_produk.id AS kat_produk_id, kat_produk.produk');*/
        $this->db->select('identifikasi.*,kat_produk.id AS kat_produk_id, kat_produk.produk, kat_urusan.id AS  kat_urusan_id,kat_urusan.name');
        $this->db->join('kat_urusan', 'identifikasi.kat_urusan_id = kat_urusan.id', 'left');
        $this->db->join('kat_produk', 'identifikasi.kat_produk_id = kat_produk.id', 'left');
        $this->db->from('identifikasi');
        $this->db->order_by('identifikasi.created_at','DESC');
        $query = $this->db->get();
        return $query->result();
    }

     public function get_data_pagination_produk($limit, $start)
    {

        /*if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('produk', $keyword);
        }*/
         
        $this->db->select('identifikasi.*, kat_urusan.name as name, kat_produk.produk as produk');
        $this->db->from('identifikasi');
        $this->db->join('kat_urusan', 'kat_urusan.id = identifikasi.kat_urusan_id', 'left');
        $this->db->join('kat_produk', 'kat_produk.id = identifikasi.kat_produk_id', 'left');
        $this->db->order_by('identifikasi.created_at','DESC');
          return $this->db->get()->result_array('identifikasi', $limit, $start);

    }


   /* public function get_data_pagination($limit, $start, $keyword = null)
    {
        if ($keyword) {*/
          /*  $this->db->like('batas', $keyword);*/
            /*$this->db->or_like('kabkot', $keyword);
        }

        $this->db->select('kabkota.*, katkabkot.id AS katkabkot_id, katkabkot.kabkot, katkabkot.logo');
        $this->db->join('katkabkot', 'kabkota.katkabkot_id = katkabkot.id', 'left');
        return $this->db->get('identifikasi')->result_array();
    }*/

   /* public function count_data()
    {
        return $this->db->get('identifikasi')->num_rows();
    }*/


    public function insert_data()
    {
        $data = [
            "kat_urusan_id" => $this->input->post('kat_urusan_id', true),
            "kat_produk_id" => $this->input->post('kat_produk_id', true),
            "tahun" => $this->input->post('tahun', true),
            "nomor" => $this->input->post('nomor', true),
            "judul" => $this->input->post('judul', true),
            "lembaran_perda" => $this->input->post('lembaran_perda', true),
            "lembaran_pergub" => $this->input->post('lembaran_pergub', true),
            "opd" => $this->input->post('opd', true),
            "abstraksi" => $this->input->post('abstraksi', true),
            "tgl_penetapan" => date_format(date_create($this->input->post('tgl_penetapan')), 'Y-m-d'),
            "tgl_perundangan" => date_format(date_create($this->input->post('tgl_perundangan')), 'Y-m-d'),
            "file"              => $this->upload->data('file_name'),
            "keterkaitan" => $this->input->post('keterkaitan', true),
            "created_at"        => date('Y-m-d H-i:s'),
        ];

        $this->db->insert('identifikasi', $data);

        $last_id = $this->db->insert_id();

        $jum_tbs  = $this->input->post('jml_tbs')-1;

        $bab = $this->input->post('bab');

        $i=0;

        while($i < $jum_tbs)
        {
            $data_bab = array(
                'ket'               => $bab[$i],
                'id_identifikasi'   => $last_id,
            );

            $this->db->insert('bab', $data_bab);

            $i++;
        }

        return true;
    }

    public function edit_data($id)
    {

        $this->db->select('*');
        $this->db->from('identifikasi');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function update_data()
    {
        $data = [
            "kat_urusan_id" => $this->input->post('kat_urusan_id', true),
            "kat_produk_id" => $this->input->post('kat_produk_id', true),
            "tahun" => $this->input->post('tahun', true),
            "nomor" => $this->input->post('nomor', true),
            "judul" => $this->input->post('judul', true),
            "lembaran_perda" => $this->input->post('lembaran_perda', true),
            "lembaran_pergub" => $this->input->post('lembaran_pergub', true),
            "opd" => $this->input->post('opd', true),
            "abstraksi" => $this->input->post('abstraksi', true),
            "tgl_penetapan" => date_format(date_create($this->input->post('tgl_penetapan')), 'Y-m-d'),
            "tgl_perundangan" => date_format(date_create($this->input->post('tgl_perundangan')), 'Y-m-d'),
            "keterkaitan" => $this->input->post('keterkaitan', true),
            // File
            "edited_at"        => date('Y-m-d H-i:s'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('identifikasi', $data);     
    }
    


    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('identifikasi');
        $row = $query->row();
        unlink("./assets/produk_hukum/$row->file");
        $this->db->delete('identifikasi', array('id' => $id));
        return true;

      
    }
}