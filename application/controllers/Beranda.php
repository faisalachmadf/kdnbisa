<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {


	public function index()
	{
		$data['title'] = 'Sistem Informasi Batas Daerah';
		$this->load->view('frontend/template/v_header', $data );
		$this->load->view('frontend/v_beranda.php');
		$this->load->view('frontend/template/v_footer');
	}
}
