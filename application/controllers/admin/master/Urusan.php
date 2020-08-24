<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urusan extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('form_validation');
        $this->load->model('M_urusan');
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Data Master Urusan ';
		$data['judul'] = 'Data Master Urusan';

		/*$data['permendagri'] = $this->M_urusan->getAllProvinsi();*/
        $this->load->view('admin/template/v_header', $data);
        $this->load->view('admin/template/v_menu');
        $this->load->view('admin/template/v_navbar', $data);
        $this->load->view('admin/master/v_urusan', $data);
        
	}

	public function get_data(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $urusan = $this->M_urusan->get_data();
			
          $data = array();
		  $num=0;
          foreach($urusan->result() as $kk) {
			$num=$num+1;
			
               $data[] = array(
				   $num,
				/*  '<img src="' . base_url('assets/logo')."/".$kk->logo .'" style="width:50px; height:50px;">'.
				   '<i class="fas fa-"></i>',*/
                   $kk->name,
					'<a href="' . base_url('admin/master/Urusan/edit')."/".$kk->id . '" title="Ubah"><i class="fas fa-edit"></i></a>'.'  
					'.'<a href="' . base_url('admin/master/Urusan/delete')."/".$kk->id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
               );
          }

          $output = array(
               "draw" => $draw,
               "recordsTotal" => $urusan->num_rows(),
               "recordsFiltered" => $urusan->num_rows(),
               "data" => $data,


            );
          echo json_encode($output);
          exit();
	}



	public function add()
	{
		$data['judul'] = 'Tambah Data Urusan';
		$data['title'] = 'Tambah Data Urusan';

		$this->validasi();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/master/v_urusan_add');
			$this->load->view('admin/template/v_footer', $data);
        
        }
        else
        {

        	// Upload Fhoto

        	/*$config['upload_path']          = './assets/logo/';
	        $config['allowed_types']        = 'svg|jpg|png';

	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('image_upload')) 
	        {
	        	$error = array('error' => $this->upload->display_errors());
	        	$this->load->view('admin/template/v_header', $data);
	        	$this->load->view('admin/template/v_menu');
	        	$this->load->view('admin/template/v_navbar');
	        	$this->load->view('admin/master/v_urusan_add', array('error' => '' ));
	        	$this->load->view('admin/template/v_footer', $data);

	        } */


            $this->M_urusan->insert_data();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/master/Urusan');
        }
		
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah ';
		$data['title'] = 'Ubah Data Urusan';
		$data['urusan'] = $this->M_urusan->get_by_id($id);
		/*$data['nomor'] = ['Prov. Jawa Barat dengan Prov. DKI Jakarta', 'Prov. Jawa Barat dengan Prov. Banten', 'Prov. Jawa Barat dengan Prov. Jawa Tengah'];*/

		$this->validasiedit();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/master/v_urusan_edit', $data);
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {


        	/*// cek jika ada file yang akan diupload


        	$upload_image = $_FILES['image_upload']['name'];

        	if ($upload_image) {
        		
        		$config['allowed_types']        = 'svg|jpg|png';
        		$config['upload_path']          = './assets/logo/';
        		
        		$this->load->library('upload', $config);

        		if (!$this->upload->do_upload('image_upload')) 
        		{
        			$error = array('error' => $this->upload->display_errors());
        			$this->load->view('admin/template/v_header', $data);
        			$this->load->view('admin/template/v_menu');
        			$this->load->view('admin/template/v_navbar');
        			$this->load->view('admin/permendagri/v_urusan_edit', array('error' => '' ));
        			$this->load->view('admin/template/v_footer', $data);

        		} else {

        			$new_file = $this->upload->data('file_name');
        			$this->db->set('logo', $new_file);
        		}
        	}*/

            $this->M_urusan->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/master/Urusan');
        }
		
	}

	public function delete($id)
	{
		$this->M_urusan->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/master/Urusan');
	}

	public function validasi()
	{
		$this->form_validation->set_rules('name', 'Nama Urusan', 'trim|required|min_length[3]');
	/*	if (empty($_FILES['image_upload']['name']))
		{
			$this->form_validation->set_rules('image_upload', 'Logo', 'required');
		}*/
	}

	public function validasiedit()
	{
		$this->form_validation->set_rules('name', 'Nama Urusan', 'trim|required|min_length[3]');
		
	}
	
	
}