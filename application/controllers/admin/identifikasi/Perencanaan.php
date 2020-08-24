<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_perencanaan');
        $this->load->model('M_identifikasi');
        $this->load->model('M_produk');
        $this->load->model('M_urusan');
        $this->load->helper(array('form', 'url'));
         // {f} Load Library Ignited-Datatables
        $this->load->library('Datatables');
	}

	public function index()
	{
		$data['title'] = 'Rencana Produk Hukum Daerah';
		$data['judul'] = 'Form Rencana Produk Hukum';
		$data['identifikasis']  = $this->M_perencanaan->ambil_semua_urusan();
		$data['identifikasiss'] = $this->M_perencanaan->ambil_semua_produk();

		/*$data['provinsi'] = $this->M_perencanaan->getAllProvinsi();
		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar', $data);
		$this->load->view('admin/perencanaan/v_perencanaan', $data);*/

		$this->validasi();

		if ($this->form_validation->run() == FALSE) {

			/*$data['provinsi'] = $this->M_perencanaan->getAllProvinsi();*/
			$this->load->view('admin/template/v_header', $data);
			$this->load->view('admin/template/v_header', $data);
			$this->load->view('admin/template/v_menu');
			$this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/perencanaan/v_perencanaan', $data);
		
		} 
		else 
		{

			/*$config['upload_path']          = './assets/produk_hukum/';
			$config['allowed_types']        = 'pdf|PDF|doc|docx';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file_upload')) 
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/template/v_header', $data);
				$this->load->view('admin/template/v_menu');
				$this->load->view('admin/template/v_navbar');
				$this->load->view('admin/identifikasi/v_identifikasi_add', array('error' => '' ));
				$this->load->view('admin/template/v_footer', $data);

			} else {

				$this->M_identifikasi->insert_data();
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/identifikasi/Produk_daerah');
			}*/

			$this->M_perencanaan->insert_data();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/identifikasi/Perencanaan');

		}
	}


    function datatable()
    {
        header('Content-Type: application/json');
        echo $this->M_perencanaan->get_all_data();
    
    }

	public function get_data(){
		

		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $identifikasi = $this->M_perencanaan->get_data();
			
          $data = array();
		  $num=0;
          foreach($identifikasi as $kk) {
			/*$num=$num+1;*/

			if ($kk->status == "Menunggu Persetujuan") {
				$kk->status = "<span class='badge badge-danger text-xs'>Menunggu Persetujuan</span>";
			} else if ($kk->status == "Sedang Disusun" ) {
				$kk->status = "<span class='badge badge-warning text-xs'>Sedang Disusun</span>";
			} 

			if ($kk->selesai == 0){
				$kk->selesai = "<i class='fas fa-paper-plane text-warning' title='Sedang disusun'></i>";
			} else if ($kk->selesai == 1){
				$kk->selesai = "<i class='fas fa-check text-success' title='selesai'></i>";
			} else if ($kk->selesai == 2){
				$kk->selesai = "<i class='fas fa-times text-danger' title='dibatalkan'></i>";
			}

			$data[] = array(
				/*$num,*/
				$kk->name,
				$kk->produk,
				$kk->nama_produk,
				$kk->opd,
				'<span class="text-xs">'. $kk->nama .'</span>',
				$kk->status ,
				$kk->selesai,
				

				/*  '<a href="' . base_url('admin/identifikasi/Produk_daerah/detail')."/".$kk->id .'">' .*/
				/*$kk->batas . '</a>',
				'<a href="' . base_url('assets/segmenkabkota')."/".$kk->file .'"><i class="far fa-file-pdf text-danger"></i></a>'. '<br/><small>'. $kk->aturan. '</small>',*/
				'<a href="' . base_url('admin/identifikasi/Perencanaan/edit') . "/" . $kk->id . '" title="Ubah"><i class="fas fa-edit"></i></a>' . '  
				' . '<a href="' . base_url('admin/identifikasi/Perencanaan/delete') . "/" . $kk->id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
			);
          }

          $output = array(
               "draw" => $draw,
               "recordsTotal" => $identifikasi,
               "recordsFiltered" => $identifikasi,
               "data" => $data,


            );

          echo json_encode($output);
          exit();
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail';
		$data['title'] = 'Detail Segmen Batas Kabupaten/Kota';

		$this->load->view('admin/template/v_header', $data);
	    $this->load->view('admin/template/v_menu');
	    $this->load->view('admin/template/v_navbar');
		$this->load->view('admin/identifikasi/v_identifikasi_detail', $data);
		$this->load->view('admin/template/v_footer');
	}

	public function edit($id)
	{
		$data['judul'] = 'Form Ubah Data Perencanaan Produk Hukum ';
		$data['title'] = 'Form Ubah';
		$data['data_perencanaan'] = $this->M_perencanaan->get_by_id($id);
		$data['identifikasis']  = $this->M_perencanaan->ambil_semua_urusan();
		$data['identifikasiss']  = $this->M_perencanaan->ambil_semua_produk();

		$this->validasiedit();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/perencanaan/v_perencanaan_edit', $data);
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {
        	// cek jika ada file yang akan diupload

        	/*$upload_file = $_FILES['file_upload']['name'];

        	if ($upload_file) {
        		
        		$config['upload_path']          = './assets/produk_hukum/';
        		$config['allowed_types']        = 'pdf|PDF';
        		$this->load->library('upload', $config);

        		if (!$this->upload->do_upload('file_upload')) 
        		{
        			$error = array('error' => $this->upload->display_errors());
        			$this->load->view('admin/template/v_header', $data);
        			$this->load->view('admin/template/v_menu');
        			$this->load->view('admin/template/v_navbar');
        			$this->load->view('admin/identifikasi/v_identifikasi_edit', array('error' => '' ));
        			$this->load->view('admin/template/v_footer', $data);
        			

        		} else {
        			
        			$new_file = $this->upload->data('file_name');
        			$this->db->set('file', $new_file);
        		} 

        	}

            $this->M_perencanaan->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/identifikasi/Produk_daerah');
        }*/

        
            $this->M_perencanaan->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/identifikasi/Perencanaan');
        }
		
		
	}
	public function delete($id)
	{
		$this->M_perencanaan->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/identifikasi/Perencanaan');
	}

	public function validasi()
    {
        
    	$this->form_validation->set_rules('kat_produk_id', 'Kategori Produk Hukum', 'required');
    	$this->form_validation->set_rules('kat_urusan_id', 'Urusan', 'required');
    	$this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('opd', 'opd', 'trim|required|min_length[3]');
    	/*$this->form_validation->set_rules('abstraksi', 'abstraksi', 'trim|required|min_length[3]');*/
    	/*$this->form_validation->set_rules('tanggal', 'Tanggal Penetapan', 'required'); */
    	/*if (empty($_FILES['file_upload']['name']))
    	{
    		$this->form_validation->set_rules('file_upload', 'Produk Hukum', 'required');
    	}*/

    }

    public function validasiedit()
    {
        
    	$this->form_validation->set_rules('kat_produk_id', 'Kategori Produk Hukum', 'required');
    	$this->form_validation->set_rules('kat_urusan_id', 'Urusan', 'required');
    	$this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('opd', 'opd', 'trim|required|min_length[3]');
    	/*$this->form_validation->set_rules('abstraksi', 'abstraksi', 'trim|required|min_length[3]');*/
    	/*$this->form_validation->set_rules('tanggal', 'Tanggal Penetapan', 'required'); */
    	/*if (empty($_FILES['file_upload']['name']))
    	{
    		$this->form_validation->set_rules('file_upload', 'Produk Hukum', 'required');
    	}*/

    }


	
}