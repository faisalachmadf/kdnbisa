<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabkota extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
       /* //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');*/
        /*$this->load->library('form_validation');*/
        $this->load->model('M_kabkota');
        $this->load->model('M_katkabkot');
        $this->load->helper(array('form', 'url'));
        /*$this->load->model('M_katprovinsi');*/
	}


	public function index()
	{
		$data['title'] = 'Sistem Informasi Batas Daerah Kabupaten/Kota di Jawa Barat';
		$data['katkabkota'] = $this->M_katkabkot->get_data()->result();

		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/simbad/segmenbatas/Kabkota/index';
		// ambil data keyword
		if($this->input->post('submit')) {

			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = null;
		}

		// config
		$this->db->like('batas', $data['keyword']);
		/*$this->db->or_like('kabkot', $data['keyword']);*/
		$this->db->from('kabkota');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(4);
		/*var_dump($config['total_rows']); die;*/
		// initialize
		$this->pagination->initialize($config);

		$data['segmenkabkota'] = $this->M_kabkota->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/segmenbatas/v_segmenbatas_kabkota.php', $data);
		$this->load->view('frontend/template/v_footer');
	}

	public function kategori($katkatkabkot_id)
	{
		$data['title'] = 'Sistem Informasi Batas Daerah Kabupaten/Kota di Jawa Barat';
		$data['kategori'] = $this->M_kabkota->get_kabkota_by_katkabkot($katkatkabkot_id);

		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/segmenbatas/v_segmenbatas_kabkota_kategori.php', $data);
		$this->load->view('frontend/template/v_footer');
	}

	public function search()
	{
		$data['title'] = 'Sistem Informasi Batas Daerah Kabupaten/Kota di Jawa Barat';
		$data['katkabkota'] = $this->M_katkabkot->get_data()->result();
		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/simbad/segmenbatas/Kabkota/search';
		// ambil data keyword
		if($this->input->post('submit')) {

			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata['keyword'];
		}

		// config
		$this->db->like('batas', $data['keyword']);
		/*$this->db->or_like('kabkot', $data['keyword']);*/
		$this->db->from('kabkota');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 4;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(4);
		/*var_dump($config['total_rows']); die;*/
		// initialize
		$this->pagination->initialize($config);

		
		$data['segmenkabkota'] = $this->M_kabkota->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);
		
		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/segmenbatas/v_segmenbatas_kabkota.php', $data);
		$this->load->view('frontend/template/v_footer');
	}
}
