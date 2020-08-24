<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_provinsi');
        $this->load->helper(array('form', 'url'));
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Segmen Batas Provinsi';
		$data['judul'] = 'Segmen Batas Provinsi';

		/*$data['provinsi'] = $this->M_provinsi->getAllProvinsi();*/
        $this->load->view('admin/template/v_header', $data);
        $this->load->view('admin/template/v_menu');
        $this->load->view('admin/template/v_navbar', $data);
        $this->load->view('admin/segmenbatas/v_provinsi', $data);
	}

	public function get_data()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$provinsi = $this->M_provinsi->get_data();

		$data = array();
		$num = 0;
		foreach ($provinsi->result() as $prov) {
			$num = $num + 1;

			$data[] = array(
				$num,
				$prov->id_katprov,
				'<a href="' . base_url('admin/segmenbatas/Provinsi/detail') . "/" . $prov->id . '">' .
					$prov->kabkot . '</a>',
				'<a href="' . base_url('assets/segmenprovinsi')."/".$prov->file .'"><i class="far fa-file-pdf text-danger"></i></a>'. '<br/><small>'. $prov->aturan. '</small>',
				/*'<a href="' . base_url('admin/segmenbatas/Provinsi/detail')."/".$prov->id . '" class="btn btn-circle btn-warning" title="Detil"><i class="fas fa-bars"></i></a>'.' 
					'.*/
				'<a href="' . base_url('admin/segmenbatas/Provinsi/edit') . "/" . $prov->id . '" title="Ubah"><i class="fas fa-edit"></i></a>' . '  
					' . '<a href="' . base_url('admin/segmenbatas/Provinsi/delete') . "/" . $prov->id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $provinsi->num_rows(),
			"recordsFiltered" => $provinsi->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit();
	}



	public function add()
	{
		$data['judul'] = 'Tambah';
		$data['title'] = 'Tambah Segmen Batas Provinsi';

		$this->validasi();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/segmenbatas/v_provinsi_add', array('error' => '' ));
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {
        	$config['upload_path']          = './assets/segmenprovinsi/';
            $config['allowed_types']        = 'pdf|PDF|doc|docx';
	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('file_upload')) 
	        {
	        	$error = array('error' => $this->upload->display_errors());
	        	$this->load->view('admin/template/v_header', $data);
	        	$this->load->view('admin/template/v_menu');
	        	$this->load->view('admin/template/v_navbar');
	        	$this->load->view('admin/permendagri/v_provinsi_add', array('error' => '' ));
	        	$this->load->view('admin/template/v_footer', $data);

	        } else {

	        	$this->M_provinsi->insert_data();
	        	$this->session->set_flashdata('flash', 'Ditambahkan');
	        	redirect('admin/segmenbatas/Provinsi');
	        }

            
        }
		
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail';
		$data['title'] = 'Detail Segmen Batas Provinsi';
		$data['provinsi'] = $this->M_provinsi->get_by_id($id);

		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar');
		$this->load->view('admin/segmenbatas/v_provinsi_detail', $data);
		$this->load->view('admin/template/v_footer');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah ';
		$data['title'] = 'Ubah Segmen Batas Provinsi';
		$data['provinsi'] = $this->M_provinsi->get_by_id($id);
		$data['id_katprov'] = ['Prov. Jawa Barat dengan Prov. DKI Jakarta', 'Prov. Jawa Barat dengan Prov. Banten', 'Prov. Jawa Barat dengan Prov. Jawa Tengah'];

		$this->validasiedit();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/segmenbatas/v_provinsi_edit', array('error' => '' ));
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {
        	// cek jika ada file yang akan diupload

        	$upload_file = $_FILES['file_upload']['name'];

        	if ($upload_file) {
        		
        		$config['upload_path']          = './assets/segmenprovinsi/';
        		$config['allowed_types']        = 'pdf|PDF|doc|docx';
        		$this->load->library('upload', $config);

        		if (!$this->upload->do_upload('file_upload')) 
        		{
        			$error = array('error' => $this->upload->display_errors());
        			$this->load->view('admin/template/v_header', $data);
        			$this->load->view('admin/template/v_menu');
        			$this->load->view('admin/template/v_navbar');
        			$this->load->view('admin/segmenbatas/v_provinsi_edit', array('error' => '' ));
        			$this->load->view('admin/template/v_footer', $data);
        			

        		} else {
        			
        			$new_file = $this->upload->data('file_name');
        			$this->db->set('file', $new_file);
        			
        		} 

        	}

            $this->M_provinsi->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/segmenbatas/Provinsi');
        }
		
	}

	public function delete($id)
	{
		$this->M_provinsi->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/segmenbatas/Provinsi');
	}

	public function validasi()
    {
        $this->form_validation->set_rules('id_katprov', 'Provinsi Perbatasan', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'trim|required|min_length[3]|max_length[255]');
		$this->form_validation->set_rules('aturan', 'Aturan', 'trim|required|min_length[3]|max_length[255]');
		if (empty($_FILES['file_upload']['name']))
		{
			$this->form_validation->set_rules('file_upload', 'Aturan', 'required');
		}
    }

    public function validasiedit()
    {
        $this->form_validation->set_rules('id_katprov', 'Provinsi Perbatasan', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'trim|required|min_length[3]|max_length[255]');
		$this->form_validation->set_rules('aturan', 'Aturan', 'trim|required|min_length[3]|max_length[255]');
    }

	
}