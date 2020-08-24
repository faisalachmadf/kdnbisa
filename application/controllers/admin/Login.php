<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');

		if ($this->session->userdata('is_logged') == ''){
			redirect(base_url('admin/auth/Login'));
		}
		else {
			redirect(base_url('admin/identifikasi/Cek'));
		}
	}

	public function index()
	{
		if ($this->session->userdata('is_logged') == ''){
			redirect(base_url('admin/auth/Login'));
		}
		else {
			redirect(base_url('admin/identifikasi/Cek'));
		}
	}

	
}