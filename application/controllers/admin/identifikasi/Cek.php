<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_identifikasi');
        $this->load->model('M_produk');
        $this->load->model('M_urusan');
        $this->load->helper(array('form', 'url'));
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Pengecekan Produk Hukum Daerah';
		$data['judul'] = 'Produk Hukum Daerah';
		$data['produk_hukum'] = 'Produk Hukum';

		
	/*	$data['identifikasis']  = $this->M_identifikasi->ambil_semua_urusan();*/
		$this->load->library('pagination');
		
		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/produkdaerahnew/admin/identifikasi/Cek/index';
		// ambil data keyword
		if($this->input->post('submit')) {

			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = null;
		}

		// config
		$this->db->like('judul', $data['keyword']);
		$this->db->or_like('abstraksi', $data['keyword']);
		$this->db->from('identifikasi');

		$this->db->like('ket', $data['keyword']);
		$this->db->from('bab');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(5);
		/*var_dump($config['total_rows']); die;*/
		// initialize
		$this->pagination->initialize($config);

		$data['cek'] = $this->M_identifikasi->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);
		

		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar', $data);
		$this->load->view('admin/identifikasi/v_cek');
	}

	public function search()
	{	
		
		// ambil data dari table BAB field Ket berdasarkan ID
		/*$data['bab'] = $this->M_identifikasi->get_by_id_bab($id);*/

		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/produkdaerahnew/admin/identifikasi/Cek/search';
		// ambil data keyword
		$this->load->library('pagination');

		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata['keyword'];
		}

		// config
		/*$this->db->like('judul', $data['keyword']);
		$this->db->or_like('abstraksi', $data['keyword']);
		$this->db->from('identifikasi');*/

		
 
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(5);
		/*var_dump($config['total_rows']); die;*/
		
		// initialize
		$this->pagination->initialize($config);
		$cek = $this->M_identifikasi->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);
		$data = array (
			'produk_hukum' => 'Ditemukan Jumlah Peraturan dengan Kata kunci',
			'title' => 'Pengecekan Produk Hukum Daerah',
			'judul' => 'Biro Hukum dan HAM',
			'jumlah_data' => count($cek),
			'cek'	=> $cek,
			'bab'	=> $this->M_identifikasi->get_data_bab($data['keyword']),

		);

		//print "<pre>"; print_r($data); exit;

		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar', $data);
		$this->load->view('admin/identifikasi/v_cek_search', $data);
	}

	/*public function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_identifikasi->get_data_bab($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->ket;
                echo json_encode($arr_result);
            }
        }
    }*/

	public function detail($id)
	{
		$data['judul'] = 'Detail';
		$data['title'] = 'Detail Segmen Batas Kabupaten/Kota';
		$data['data_identifikasi'] = $this->M_identifikasi->get_by_id($id);

		$this->load->view('admin/template/v_header', $data);
	    $this->load->view('admin/template/v_menu');
	    $this->load->view('admin/template/v_navbar');
		$this->load->view('admin/identifikasi/v_identifikasi_detail', $data);
		$this->load->view('admin/template/v_footer');
	}


	
}