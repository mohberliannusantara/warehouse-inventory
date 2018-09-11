<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('kendaraan_model');
		$this->load->model('properti_model');
		$this->load->library('dompdf_gen');
	}
	function printPdf($url)
	{
		if ($url == 'Barang') 
			$data['data'] = $this->barang_model->get_all($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		else if ($url == 'Kendaraan')
			$data['data'] = $this->kendaraan_model->get_all($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		else 
			$data['data'] = $this->properti_model->get();
		
		$this->load->view($url.'/print', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		// $dompdf = new Dompdf\DOMPDF();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream($url."_laporan.pdf");
		unset($html);
		unset($dompdf);
	}

	function a(){
		echo "a";
	}
}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */