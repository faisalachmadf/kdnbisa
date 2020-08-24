<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // {c} Cek Sesi Login
        if ($this->session->userdata('is_logged') != '')
		redirect(base_url().'admin/auth/Dashboard');

        $this->load->database();
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('form_validation');
        
        $this->load->model('M_user');
        $this->load->helper('url');

    }

	public function index()
	{
		$data = array();
		$data['title'] = 'Admin Login';
		$this->load->view('admin/template/v_auth_header', $data);
        $this->load->view('admin/auth/v_login');
        $this->load->view('admin/template/v_auth_footer');
	}

	public function auth()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE)
		{
            $username = $this->input->post("username", TRUE);
            $password = MD5($this->input->post('password', TRUE));

            // {c} cek data via model
            $is_logged = $this->M_user->login('user', array('username' => $username), array('password' => $password), array('status' => 1));

            // {c} jika ditemukan, maka buat session
            if ($is_logged != FALSE)
            {
                foreach ($is_logged as $logged)
                {
                    $session_data = array(
                        'user_id'   	=> $logged->user_id,
                        'nama'  		=> $logged->nama,
                        'username'  	=> $logged->username,
                        'role'  		=> $logged->role,
                        'status'  		=> $logged->status,
                        // Sesi ID Unik
                        'is_logged'		=> uniqid(rand()),
                    );
                    // set session userdata
                    $this->session->set_userdata($session_data);

                    redirect(base_url() . 'admin/auth/Dashboard');
                }
            }
			else {

                // jika salah password

		        redirect(base_url() . 'admin/auth/Login');
		    }
		}
		
	}

}
