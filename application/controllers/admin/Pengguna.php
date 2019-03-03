<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->load->library('form_validation');
		if (!$this->session->logged_in == TRUE) {
			redirect('Welcome','refresh');
		}
	}
	
	public function index()
	{
		$data['page'] = 'Pengguna';
		$data['page_title'] = 'Profil Pengguna';
		$data['pengguna'] = $this->pengguna_model->get();
		
		$limit_per_page = 5;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->pengguna_model->get_total();
		if ($total_records > 0) {
			$data['pengguna'] = $this->pengguna_model->get($limit_per_page, $start_index);
			
			$config['base_url'] = base_url() . 'Pengguna/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
			
			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('admin/templates/footer');
	}
	
	public function get($id)
	{
		$data['pengguna'] = $this->pengguna_model->get_by_id($id);
		$this->load->view('pengguna/view', $data);
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
				$excel->setActiveSheetIndex(0)->setCellValue('B3', "id_admin"); // Set kolom A3 dengan tulisan "NO"
				$excel->setActiveSheetIndex(0)->setCellValue('C3', "username"); // Set kolom B3 dengan tulisan "NIS"
				$excel->setActiveSheetIndex(0)->setCellValue('D3', "password"); // Set kolom C3 dengan tulisan "NAMA"
				$excel->setActiveSheetIndex(0)->setCellValue('E3', "level"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
				$excel->setActiveSheetIndex(0)->setCellValue('F3', "rayon"); // Set kolom E3 dengan tulisan "ALAMAT"
				
				// Apply style header yang telah kita buat tadi ke masing-masing kolom header
				$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
				
				// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya 

				$admin = $this->pengguna_model->get();
				
				$no = 1; // Untuk penomoran tabel, di awal set dengan 1
				$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
				foreach($admin as $data){ // Lakukan looping pada variabel siswa
					$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
					$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_admin);
					$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->username);
					$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->password);
					$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_level);
					$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_rayon);
					
					// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
					$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
					$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
 					
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
 				
				// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
				$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
				
				// Set orientasi kertas jadi LANDSCAPE
				$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
				
				// Set judul file excel nya
				$excel->getActiveSheet(0)->setTitle("Laporan Data Pengguna");
				$excel->setActiveSheetIndex(0);
				
				// Proses file excel
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment; filename="Data Pengguna.xlsx"'); // Set nama file excel nya
				header('Cache-Control: max-age=0');
				
				$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
				$write->save('php://output');
			}
			
			public function preview()
			{
				$data['pengguna'] = $this->pengguna_model->get();
				$this->load->view('admin/pengguna/preview', $data);
			}
		}
		