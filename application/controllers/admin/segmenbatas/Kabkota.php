<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabkota extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_kabkota');
        $this->load->model('M_katkabkot');
        $this->load->helper(array('form', 'url'));
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Segmen Batas Kabupaten/Kota';
		$data['judul'] = 'Segmen Batas Kabupaten/Kota';
		$data['kabkotas']  = $this->M_kabkota->ambil_semua_katkabkota();

		/*$data['provinsi'] = $this->M_kabkota->getAllProvinsi();*/
		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar', $data);
		$this->load->view('admin/segmenbatas/v_kabkota', $data);
	}

	

	public function get_data(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $kabkota = $this->M_kabkota->get_data();
			
          $data = array();
		  $num=0;
          foreach($kabkota as $kk) {
			$num=$num+1;

			$data[] = array(
				$num,

				'<img src="' . base_url('assets/logo')."/".$kk->logo .'" style="width:50px; height:50px;">'.
				'<i class="fas fa-"></i>',
				$kk->kabkot,
				/*  '<a href="' . base_url('admin/segmenbatas/Kabkota/detail')."/".$kk->id .'">' .*/
				$kk->batas . '</a>',
				'<a href="' . base_url('assets/segmenkabkota')."/".$kk->file .'"><i class="far fa-file-pdf text-danger"></i></a>'. '<br/><small>'. $kk->aturan. '</small>',
				'<a href="' . base_url('admin/segmenbatas/Kabkota/edit') . "/" . $kk->id . '" title="Ubah"><i class="fas fa-edit"></i></a>' . '  
				' . '<a href="' . base_url('admin/segmenbatas/Kabkota/delete') . "/" . $kk->id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
			);
          }

          $output = array(
               "draw" => $draw,
               "recordsTotal" => $kabkota,
               "recordsFiltered" => $kabkota,
               "data" => $data

            );
          echo json_encode($output);
          exit();
	}

	public function add()
	{
		$data['judul'] = 'Tambah';
		$data['title'] = 'Tambah Segmen Batas Kabupaten/Kota';
		$data['kabkotas']  = $this->M_kabkota->ambil_semua_katkabkota();
		$data['kabkotass']  = $this->M_kabkota->ambil_semua_katkabkota();

		$this->validasi();

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/template/v_header', $data);
			$this->load->view('admin/template/v_menu', $data);
			$this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/segmenbatas/v_kabkota_add' , array('error' => '' ));
			$this->load->view('admin/template/v_footer');
		} 
		else 
		{

			$config['upload_path']          = './assets/segmenkabkota/';
			$config['allowed_types']        = 'pdf|PDF|doc|docx';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file_upload')) 
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/template/v_header', $data);
				$this->load->view('admin/template/v_menu');
				$this->load->view('admin/template/v_navbar');
				$this->load->view('admin/segmenbatas/v_kabkota_add', array('error' => '' ));
				$this->load->view('admin/template/v_footer', $data);

			} else {

				$this->M_kabkota->insert_data();
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/segmenbatas/Kabkota');
			}


			
		}
		
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail';
		$data['title'] = 'Detail Segmen Batas Kabupaten/Kota';

		$this->load->view('admin/template/v_header', $data);
	    $this->load->view('admin/template/v_menu');
	    $this->load->view('admin/template/v_navbar');
		$this->load->view('admin/segmenbatas/v_kabkota_detail', $data);
		$this->load->view('admin/template/v_footer');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah ';
		$data['title'] = 'Ubah Segmen Batas Kabupaten/Kota';
		$data['kabkotapilih'] = $this->M_kabkota->get_by_id($id);
		$data['kabkotas']  = $this->M_kabkota->ambil_semua_katkabkota($id);

		$this->validasiedit();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/segmenbatas/v_kabkota_edit', $data);
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {
            $this->M_kabkota->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/segmenbatas/Kabkota');
        }
		
	}

	public function delete($id)
	{
		$this->M_kabkota->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/segmenbatas/Kabkota');
	}

	public function validasi()
    {
        
    	$this->form_validation->set_rules('katkabkot_id', 'Kabupaten/Kota Perbatasan', 'required');
    	$this->form_validation->set_rules('batas', 'Kabupaten/Kota Batas', 'required');
    	$this->form_validation->set_rules('aturan', 'Aturan', 'trim|required|min_length[3]');
    	if (empty($_FILES['file_upload']['name']))
    	{
    		$this->form_validation->set_rules('file_upload', 'Aturan', 'required');
    	}

    }

    public function validasiedit()
    {
        
    	$this->form_validation->set_rules('katkabkot_id', 'Kabupaten/Kota Perbatasan', 'required');
    	$this->form_validation->set_rules('batas', 'Kabupaten/Kota Batas', 'required');
    	$this->form_validation->set_rules('aturan', 'Aturan', 'trim|required|min_length[3]');
    	

    }

	
}