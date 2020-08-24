<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
      
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_perencanaan');
    }

	public function index()
	{
		redirect(base_url());
       /* $this->load->view('admin/cetak/v_cetak');*/
		
	}

    public function cetak()
    {   
        $data['cetak']  = $this->M_perencanaan->get_data();
        $this->load->view('admin/cetak/v_cetak', $data);
    }

	public function laporan()
    {   
        $id = $this->uri->segment(3);

        $data['laporan']  = $this->M_home->get_laporan($id);

        if ($data['laporan'])
        { 
        	$this->load->view('frontend/printout/v_laporan', $data);
        }
        else {
            redirect(base_url());
        }
    }

    public function notulen()
    {   
        $id = $this->uri->segment(3);

        $data['notulen']  = $this->M_home->get_notulen($id);

        if ($data['notulen'])
        { 
        	$this->load->view('frontend/printout/v_notulen', $data);
        }
        else {
            redirect(base_url());
        }
    }
}