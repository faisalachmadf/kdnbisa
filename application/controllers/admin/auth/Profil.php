<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // {c} Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->database();
        $this->load->library('encrypt');
        $this->load->library('session');
        // {c} Load Template Admin
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('M_user');
        $this->load->model('M_profil');
 /*       $this->load->library('datatables');*/
    }

    public function index()
    {   
        $data['title'] = 'Ubah Profile';

        $id = $this->session->userdata('user_id');
        // {c} Ambil Sesi Disini
        $data['users'] = $this->M_profil->get_by_id($id);

        //print "<pre>"; print_r($data['users']); exit;
        $this->load->view('admin/template/v_header', $data);
        $this->load->view('admin/template/v_menu', $data);
        $this->load->view('admin/template/v_navbar', $data);
        $this->load->view('admin/auth/v_profil', $data);
        $this->load->view('admin/template/v_footer');
    }

    public function update()
    {   
        $data['judul'] = 'Ubah Profile';
        $data['title'] = 'Ubah Profile';
        $id = $this->session->userdata('user_id');

        $this->validasiForm();

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/template/v_header', $data);
            $this->load->view('admin/template/v_menu', $data);
            $this->load->view('admin/template/v_navbar', $data);
            $this->load->view('admin/auth/v_profil', $data);
            $this->load->view('admin/template/v_footer');
        }
        else {

            $update = array (
                'nama'              => $this->input->post('nama'),
                'email'             => $this->input->post('email'),
                'telepon'           => $this->input->post('telepon'),
                'jabatan'           => $this->input->post('jabatan'),
            );

            $this->db->where('user_id', $id);

            $this->db->update('user', $update);

            if ($this->input->post('password')) {
                $password = $this->input->post('password');
                $update  = array(
                    'password' => md5($password),
                );

                $this->db->where('user_id', $id);

                $this->db->update('user', $update);
                

            }
             $this->session->set_flashdata('flash', 'Dirubah');
             redirect('admin/identifikasi/Cek');

             
        }
    }

    private function validasiForm()
    {   
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[32]');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email Field', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'No. Telepon / HP', 'required|alpha_numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }
}