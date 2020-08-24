<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_daerah extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
        //  Cek Sesi Login
        if ($this->session->userdata('is_logged') == '')
		redirect(base_url().'admin/Login');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_identifikasi');
        $this->load->model('M_produk');
        $this->load->model('M_urusan');
        $this->load->helper(array('form', 'url'));
        
        /*$this->load->model('M_katprovinsi');*/
	}

	public function index()
	{
		$data['title'] = 'Produk Hukum Daerah';
		$data['judul'] = 'Daftar Produk Hukum Daerah';
		$data['hitung'] = $this->M_identifikasi->count_data();
		$data['hitungperda'] = $this->M_identifikasi->count_data_perda();
		$data['hitungpergub'] = $this->M_identifikasi->count_data_pergub();
		$data['hitungkepgub'] = $this->M_identifikasi->count_data_kepgub();
		//load library
		$this->load->library('pagination');

		//config 
		$config['base_url'] ='http://localhost/produkdaerahnew/admin/identifikasi/Produk_daerah/index';
		$config['total_rows'] = $this->M_identifikasi->count_data();
		$config['per_page'] = 50;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);

		$data['produk'] = $this->M_identifikasi->get_data_pagination_produk($config['per_page'],$data['start']);
		

		$this->load->view('admin/template/v_header', $data);
		$this->load->view('admin/template/v_menu');
		$this->load->view('admin/template/v_navbar', $data);
		$this->load->view('admin/identifikasi/v_identifikasi', $data);
	}

	

	public function get_data(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $identifikasi = $this->M_identifikasi->get_data();
			
          $data = array();
		  $num=0;
          foreach($identifikasi as $kk) {
			$num=$num+1;

			$data[] = array(
				$num,
				$kk->name,
				$kk->produk,
				'<a href="' . base_url('admin/identifikasi/Produk_daerah/detail/').$kk->id .'" title="Detail">' .
				$kk->judul . '</a>',
				'<span class="text-xs"> #'. $kk->keterkaitan .'</span>',
				/*'<a href="' . base_url('assets/segmenkabkota')."/".$kk->file .'"><i class="far fa-file-pdf text-danger"></i></a>'. '<br/><small>'. $kk->aturan. '</small>',*/
			
                '<a href="' . base_url('admin/identifikasi/Produk_daerah/edit') . "/" . $kk->id . '" title="Ubah"><i class="fas fa-edit"></i></a>' . '  
				'.'
				<a href="' . base_url('admin/identifikasi/Produk_daerah/delete') . "/" . $kk->id . '" title="hapus" onclick="return confirm(\'Anda yakin hapus data ini?\') ;"><i class="fas fa-trash text-danger"></i></a>',
				/*	<?=base_url('admin/suratkeluar/Suratkeluar2/datatable')?>*/
			);
          }

          $output = array(
               "draw" => $draw,
               "recordsTotal" => $identifikasi,
               "recordsFiltered" => $identifikasi,
               "data" => $data

            );
          echo json_encode($output);
          exit();
	}

	public function add()
	{
		$data['judul'] = 'Tambah';
		$data['title'] = 'Tambah Produk Daerah';
		$data['identifikasis']  = $this->M_identifikasi->ambil_semua_urusan();
		$data['identifikasiss']  = $this->M_identifikasi->ambil_semua_produk();

		$this->validasi();

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/template/v_header', $data);
			$this->load->view('admin/template/v_menu', $data);
			$this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/identifikasi/v_identifikasi_add' , array('error' => '' ));
			$this->load->view('admin/template/v_footer');
		} 
		else 
		{

			$config['upload_path']          = './assets/produk_hukum/';
			$config['allowed_types']        = 'pdf|PDF|doc|docx|jpg|JPG|png|PNG';
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
				// print "<pre>"; print_r($data); die;
				$this->M_identifikasi->insert_data();
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/identifikasi/Produk_daerah');
			}
		}
		
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail';
		$data['title'] = 'Detail Produk Hukum Daerah';
		$data['data_identifikasi'] = $this->M_identifikasi->get_by_id($id);

		$data['bab'] = $this->M_identifikasi->get_by_id_bab($id);

		//print "<pre>"; print_r($data['bab']); exit;

		$this->load->view('admin/template/v_header', $data);
	    $this->load->view('admin/template/v_menu');
	    $this->load->view('admin/template/v_navbar');
		$this->load->view('admin/identifikasi/v_identifikasi_detail', $data);
		$this->load->view('admin/template/v_footer');
	}

	public function edit($id)
	{
		$data['judul'] = 'Ubah ';
		$data['title'] = 'Form Ubah';
		$data['data_identifikasi'] = $this->M_identifikasi->get_by_id($id);

		$data['bab'] = $this->M_identifikasi->get_by_id_bab($id);

		$data['identifikasis']  = $this->M_identifikasi->ambil_semua_urusan();
		$data['identifikasiss']  = $this->M_identifikasi->ambil_semua_produk();

		$this->validasiedit();

		if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/template/v_header', $data);
	        $this->load->view('admin/template/v_menu');
	        $this->load->view('admin/template/v_navbar');
			$this->load->view('admin/identifikasi/v_identifikasi_edit', $data);
			$this->load->view('admin/template/v_footer');
        
        }
        else
        {
        	// cek jika ada file yang akan diupload

        	$upload_file = $_FILES['file_upload']['name'];

        	if ($upload_file) {
        		
        		$config['upload_path']          = './assets/produk_hukum/';
        		$config['allowed_types']        = 'pdf|PDF|doc|docx|jpg|JPG|png|PNG';
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


            $this->M_identifikasi->update_data();

            $this->db->where_in('id_identifikasi', $this->input->post('id'));
            $this->db->delete('bab');
            
            $bab = $this->input->post('bab');

            for($i=0; $i < count($bab); $i++)
	        {
	            $data_bab = array(
	                'ket'               => $bab[$i],
	                'id_identifikasi'   => $this->input->post('id'),
	            );

	            $this->db->insert('bab', $data_bab);
	        }

            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/identifikasi/Produk_daerah');
        }

        /*{
            $this->M_identifikasi->update_data();
            $this->session->set_flashdata('flash', 'Dirubah');
            redirect('admin/identifikasi/Produk_daerah');
        }*/	
	}

	public function delete($id)
	{
		$this->M_identifikasi->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/identifikasi/Produk_daerah');
	}

	public function validasi()
    {
        
    	$this->form_validation->set_rules('kat_produk_id', 'Kategori Produk Hukum', 'required');
    	$this->form_validation->set_rules('kat_urusan_id', 'Urusan', 'required');
    	$this->form_validation->set_rules('nomor', 'Nomor', 'required');
    	$this->form_validation->set_rules('tahun', 'Tahun', 'required');
    	$this->form_validation->set_rules('judul', 'judul', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('opd', 'opd', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('abstraksi', 'abstraksi', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('tgl_penetapan', 'Tanggal Penetapan', 'required');
    	$this->form_validation->set_rules('tgl_perundangan', 'Tanggal Penetapan', 'required');
    	$this->form_validation->set_rules('keterkaitan', 'keterkaitan', 'trim|required|min_length[3]'); 
    	if (empty($_FILES['file_upload']['name']))
    	{
    		$this->form_validation->set_rules('file_upload', 'Produk Hukum', 'required');
    	} 

    }

    public function validasiedit()
    {
        
    	$this->form_validation->set_rules('kat_produk_id', 'Kategori Produk Hukum', 'required');
    	$this->form_validation->set_rules('kat_urusan_id', 'Urusan', 'required');
    	$this->form_validation->set_rules('nomor', 'Nomor', 'required');
    	$this->form_validation->set_rules('tahun', 'Tahun', 'required');
    	$this->form_validation->set_rules('judul', 'judul', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('opd', 'opd', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('abstraksi', 'abstraksi', 'trim|required|min_length[3]');
    	$this->form_validation->set_rules('tgl_penetapan', 'Tanggal Penetapan', 'required');
    	$this->form_validation->set_rules('tgl_perundangan', 'Tanggal Penetapan', 'required');
    	$this->form_validation->set_rules('keterkaitan', 'keterkaitan', 'trim|required|min_length[3]');  
    	

    }

	
}