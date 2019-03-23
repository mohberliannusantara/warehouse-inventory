<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('jenis_barang_model');
		$this->load->model('kondisi_model');
		$this->load->model('rayon_model');

		$this->load->library('form_validation');
		// $this->load->library('dompdf_gen');
		if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 2 ) {
			redirect('beranda','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Extracomptable';
		$data['barang'] = $this->barang_model->get();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/barang/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function get($id)
	{
		$data['barang'] = $this->barang_model->get_by_id($id);
		$this->load->view('admin/barang/view', $data);
	}

	public function create()
	{
		$data['page'] = 'Extracomptable';

		$data['jenis'] = $this->jenis_barang_model->get();
		$data['kondisi'] = $this->kondisi_model->get();
		$data['rayon'] = $this->rayon_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_barang', 'Nama', 'trim|required');
		$this->form_validation->set_rules('rayon', 'Rayon', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/barang/create', $data);
			$this->load->view('admin/templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/barang/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 10000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header', $data);
					$this->load->view('admin/barang/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_barang' => $this->input->post('jenis'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'gambar' => $post_image,
				'id_rayon' => $this->input->post('rayon')
			);

			if( empty($data['upload_error']) ) {
				$this->barang_model->create($post_data);
				$data['barang'] = $this->barang_model->get();

				// $this->load->view('admin/templates/header', $data);
				// $this->load->view('admin/barang/index', $data);
				// $this->load->view('admin/templates/footer');
				redirect('admin/barang','refresh');
			}
		}
	}

	public function edit($id = null)
	{
		$data['page'] = 'Extracomptable';

		$data['barang'] = $this->barang_model->get_by_id($id);
		$data['jenis'] = $this->jenis_barang_model->get();
		$data['kondisi'] = $this->kondisi_model->get();
		$data['rayon'] = $this->rayon_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_barang', 'Nama', 'trim|required');
		$this->form_validation->set_rules('rayon', 'Rayon', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/barang/edit', $data);
			$this->load->view('admin/templates/footer');

		} else {
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/barang/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('admin/templates/header', $data);
					$this->load->view('admin/barang/edit', $data);
					$this->load->view('admin/templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_barang' => $this->input->post('jenis'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'gambar' => $post_image,
				'id_rayon' => $this->input->post('rayon')
			);

			if( empty($data['upload_error']) ) {
				$this->barang_model->update($post_data,$id);
				//$data['barang'] = $this->barang_model->get();
				// $this->load->view('templates/header');
				// $this->load->view('barang/index', $data);
				// $this->load->view('templates/footer');
				redirect('admin/barang','refresh');
			}
		}
	}

	public function move()
	{
		$data['page_title'] = 'Pindah Barang';
		$data['page_content'] = 'Pindahkan barang dan memberi detail keterangan barang';

		$this->load->view("templates/header");
		$this->load->view('barang/edit', $data);
		$this->load->view("templates/footer");
	}

	public function delete($id)
	{
		$this->barang_model->delete($id);

		redirect('admin/barang','refresh');

	}

	public function printBarang()
	{
		$data['barang'] = $this->barang_model->get_all($this->session->userdata('id_rayon'), $this->session->userdata('id_level'));
		$this->load->view('barang/print', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		// $dompdf = new Dompdf\DOMPDF();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf");
		unset($html);
		unset($dompdf);
	}

	public function export()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
		->setLastModifiedBy('My Notes Code')
		->setTitle("Data Barang")
		->setSubject("Barang")
		->setDescription("Laporan Semua Data Barang")
		->setKeywords("Data Barang");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);

			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
					)
				);

				$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BARANG"); // Set kolom A1 dengan tulisan "DATA SISWA"
				$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

				// Buat header tabel nya pada baris ke 3
				$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
				$excel->setActiveSheetIndex(0)->setCellValue('B3', "id_barang"); // Set kolom A3 dengan tulisan "NO"
				$excel->setActiveSheetIndex(0)->setCellValue('C3', "nama_barang"); // Set kolom B3 dengan tulisan "NIS"
				$excel->setActiveSheetIndex(0)->setCellValue('D3', "harga"); // Set kolom C3 dengan tulisan "NAMA"
				$excel->setActiveSheetIndex(0)->setCellValue('E3', "jenis_barang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
				$excel->setActiveSheetIndex(0)->setCellValue('F3', "kondisi_barang"); // Set kolom E3 dengan tulisan "ALAMAT"
				$excel->setActiveSheetIndex(0)->setCellValue('G3', "keterangan"); // Set kolom E3 dengan tulisan "ALAMAT"

				// Apply style header yang telah kita buat tadi ke masing-masing kolom header
				$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);

				// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
				$id_rayon = $this->input->post('rayon');
				$barang = $this->barang_model->get_by_rayon($id_rayon);

				$no = 1; // Untuk penomoran tabel, di awal set dengan 1
				$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
				foreach($barang as $data){ // Lakukan looping pada variabel siswa
					$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
					$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_barang);
					$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_barang);
					$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->harga);
					$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_jenis_barang);
					$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_kondisi);
					$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->keterangan);

					// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
					$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);

					$no++; // Tambah 1 setiap kali looping
					$numrow++; // Tambah 1 setiap kali looping
				}

				// Set width kolom
				$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
				$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
				$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
				$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
				$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
				$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
				$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E

				// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
				$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

				// Set orientasi kertas jadi LANDSCAPE
				$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

				// Set judul file excel nya
				$excel->getActiveSheet(0)->setTitle("Laporan Data Extra Countable");
				$excel->setActiveSheetIndex(0);

				// Proses file excel
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment; filename="Data Extra Countable.xlsx"'); // Set nama file excel nya
				header('Cache-Control: max-age=0');

				$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
				$write->save('php://output');
			}

	public function preview()
	{
		$id_rayon = $this->input->post('rayon');
		$data['barang'] = $this->barang_model->get_by_rayon($id_rayon);

		$this->load->view('admin/barang/preview', $data);

	}
}
