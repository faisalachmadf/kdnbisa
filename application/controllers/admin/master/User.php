<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('form_validation');
        $this->load->model('M_user');
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Master User ';
		$data['judul'] = 'Master User';

		/*$data['permendagri'] = $this->M_user->getAllProvinsi();*/
        $this->load->view('admin/template/v_header', $data);
        $this->load->view('admin/template/v_menu');
        $this->load->view('admin/template/v_navbar', $data);
        $this->load->view('admin/master/v_user', $data);
        
	}

	public function get_data(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $user = $this->M_user->get_data();
			
          $data = array();
		  $num=0;
          foreach($user->result() as $u) {
			$num=$num+1;
			
               $data[] = array(
				   $num,
                   $u->nama,
                   $u->jabatan,
                   $u->telepon,
                   $u->username,
                   $u->role,
					'<a href="' . base_url('admin/master/User/edit')."/".$u->user_id . '"  title="Ubah"><i class="fas fa-edit"></i></a>'.'  
					'.'<a href="' . base_url('admin/master/User/delete')."/".$u->user_id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
               );
          }

          $output = array(
               "draw" => $draw,
               "recordsTotal" => $user->num_rows(),
               "recordsFiltered" => $user->num_rows(),
               "data" => $data

            );
          echo json_encode($output);
          exit();
	}



	public function add()
	{
        $data['judul'] = 'Tambah Data Pengguna';
		$data['title'] = 'Tambah Data Pengguna';

        $this->validasiFormAdd();
      
        if ($this->form_validation->run() == FALSE)
        {
        
        	$this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/master/v_user_add', $data);
			$this->load->view('admin/template/v_footer');

        }
        else 
        {

            $password = $this->input->post('password');
            
            $tambah = array (
                'username'          => $this->input->post('username'),
                'password'          => md5($password),
                'nama'              => $this->input->post('nama'),
                'jabatan'           => $this->input->post('jabatan'),
                'email'             => $this->input->post('email'),
                'telepon'           => $this->input->post('telepon'),
                'role'              => 'admin_tu',
                'status'            => 1,
                'date_added'        => date('Y-m-d H-i:s'),//true dihilangin krna masuknya 1970
            );

            $this->db->insert('user', $tambah);

            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin/master/User');
        }
    }

	public function edit($id)
	{
        $data['judul'] = 'Ubah Data Pengguna';
		$data['title'] = 'Ubah Data Pengguna';
		$data['user'] = $this->M_user->get_by_id($id);

        $this->validasiFormEdit();

        if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/master/v_user_edit', $data);
			$this->load->view('admin/template/v_footer');
        }
        else {

            $update = array (
                'nama'              => $this->input->post('nama'),
                'email'             => $this->input->post('email'),
                'telepon'           => $this->input->post('telepon'),
                'jabatan'           => $this->input->post('jabatan'),
                'role'              => 'admin_tu',
                'status'            => 1,
            );

            $this->db->where('user_id', $this->input->post('id'));

            $this->db->update('user', $update);

            if ($this->input->post('password')) {
                $password = $this->input->post('password');

                $update  = array(
                    'password' => md5($password),
                );

                $this->db->where('user_id', $this->input->post('id'));

                $this->db->update('user', $update);
                $this->session->set_flashdata('flash', 'Dirubah');
            	redirect('admin/master/User');
            }
        }
    }

	public function delete($id)
	{
		$this->M_user->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/master/User');
	}


    private function validasiFormAdd()
    {   
        
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[3]|max_length[32]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email Field', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'No. Telepon / HP', 'required|alpha_numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }
	
	private function validasiFormEdit()
    {   
        if ($this->input->post('password')) 
        {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[16]');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[16]');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email Field', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'No. Telepon / HP', 'required|alpha_numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }
	
}