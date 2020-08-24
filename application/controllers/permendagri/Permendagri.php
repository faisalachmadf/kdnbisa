<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permendagri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
       /* //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');*/
        /*$this->load->library('form_validation');*/
        $this->load->model('M_permendagri');
        $this->load->helper(array('form', 'url'));
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Sistem Informasi Batas Daerah Provinsi';

		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/simbad/permendagri/Permendagri/index';
		// ambil data keyword
		if($this->input->post('submit')) {

			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = null;
		}

		// config
		$this->db->like('nomor', $data['keyword']);
		$this->db->or_like('tentang', $data['keyword']);
		$this->db->from('permendagri');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 4;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(4);
		/*var_dump($config['total_rows']); die;*/
		// initialize
		$this->pagination->initialize($config);

		
		$data['permen'] = $this->M_permendagri->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/permendagri/v_permendagri.php', $data);
		$this->load->view('frontend/template/v_footer');
	}

	public function search()
	{
		$data['title'] = 'Sistem Informasi Batas Daerah Provinsi';
		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost/simbad/permendagri/Permendagri/search';
		// ambil data keyword
		if($this->input->post('submit')) {

			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata['keyword'];
		}

		// config
		$this->db->like('nomor', $data['keyword']);
		$this->db->or_like('tentang', $data['keyword']);
		$this->db->from('permendagri');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 4;

		// untuk mengambil data dari segmen berapa
		$data['start'] = $this->uri->segment(4);
		/*var_dump($config['total_rows']); die;*/
		// initialize
		$this->pagination->initialize($config);

		
		$data['permen'] = $this->M_permendagri->get_data_pagination($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/permendagri/v_permendagri.php', $data);
		$this->load->view('frontend/template/v_footer');
	}
}
