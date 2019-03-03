<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kendaraan_model');
		$this->load->model('jenis_kendaraan_model');
		$this->load->model('kondisi_model');
		$this->load->library('form_validation');
		if (!$this->session->logged_in == TRUE) {
			redirect('welcome','refresh');
		}
		if ($this->session->id_level == 2 ) {
			redirect('beranda','refresh');
		}
	}

	public function index()
	{
		$data['page'] = 'Kendaraan';
		$data['kendaraan'] = $this->kendaraan_model->get();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kendaraan/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function get($id)
  {
    $data['kendaraan'] = $this->kendaraan_model->get_by_id($id);
		$this->load->view('admin/kendaraan/view', $data);
  }

	public function create()
	{
		$data['page'] = 'Kendaraan';
		$data['page_title'] = 'Tambah Kendaraan';
		$data['page_content'] = 'Tambahkan kendaraan kedalam daftar dengan informasi yang lengkap';

		$data['jenis_kendaraan'] = $this->jenis_kendaraan_model->get();
		$data['kondisi'] = $this->kondisi_model->get();

		// validasi input
		$this->form_validation->set_rules('nama_kendaraan', 'Nama_kendaraan', 'required');
		$this->form_validation->set_rules('plat', 'Plat', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('kendaraan/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/kendaraan/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header', $data);
					$this->load->view('kendaraan/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_kendaraan' => $this->input->post('nama_kendaraan'),
				'plat' => $this->input->post('plat'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
				'id_kondisi' => $this->input->post('kondisi'),
				'id_rayon' => $this->session->userdata('id_rayon'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->kendaraan_model->create($post_data);
				$data['kendaraan'] = $this->kendaraan_model->get();
				$this->load->view('templates/header', $data);
				$this->load->view('kendaraan/index', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function edit($id = null)
	{
		$data['page'] = 'Kendaraan';
		$data['page_title'] = 'Ubah Kendaraan';
		$data['page_content'] = 'Ubah kendaraan kedalam daftar dengan informasi yang lengkap';

		$data['kendaraan'] = $this->kendaraan_model->get_by_id($id);
		$data['jenis_kendaraan'] = $this->jenis_kendaraan_model->get();
		$data['kondisi'] = $this->kondisi_model->get();
		// validasi input
		$this->form_validation->set_rules('nama_kendaraan', 'Nama_kendaraan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		// Cek apakah input valid atau tidak
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('kendaraan/edit', $data);
			$this->load->view('templates/footer');

		} else {
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/kendaraan/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 3000;
				$config['max_height']           = 3000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$data['upload_error'] = $this->upload->display_errors();

					$post_image = '';

					$this->load->view('templates/header');
					$this->load->view('kendaraan/create', $data);
					$this->load->view('templates/footer');

				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

				}
			} else { //jika tidak upload gambar

				$post_image = '';

			}

			$post_data = array(
				'nama_kendaraan' => $this->input->post('nama_kendaraan'),
				'harga' => str_replace(',', '', $this->input->post('harga')),
				'id_jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
				'id_kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => date("Y-m-d H:i:s"),
				'gambar' => $post_image
			);

			if( empty($data['upload_error']) ) {
				$this->kendaraan_model->update($post_data,$id);
				//$data['kendaraan'] = $this->kendaraan_model->get();
				// $this->load->view('templates/header');
				// $this->load->view('kendaraan/index', $data);
				// $this->load->view('templates/footer');
				redirect('Kendaraan','refresh');
			}
		}
	}

	public function move()
	{
		$data['page_title'] = 'Pindah Kendaraan';
		$data['page_content'] = 'Pindahkan kendaraan dan memberi detail keterangan kendaraan';

		$this->load->view("templates/header");
		$this->load->view('kendaraan/edit', $data);
		$this->load->view("templates/footer");
	}

	public function delete($id)
	{
		$this->kendaraan_model->delete($id);
	}

	public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')->setLastModifiedBy('My Notes Code')->setTitle("Data Kendaraan")->setSubject("Kendaraan")->setDescription("Laporan Semua Data Kendaraan")->setKeywords("Data Kendaraan");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array(
                'bold' => true,
            ), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border top dengan garis tipis
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border right dengan garis tipis
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border bottom dengan garis tipis
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border left dengan garis tipis
            ),
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border top dengan garis tipis
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border right dengan garis tipis
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border bottom dengan garis tipis
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ), // Set border left dengan garis tipis
            ),
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KENDARAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Kendaraan"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nomor Polisi"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Pengguna"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Rayon"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Nama Jenis Kendaraan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Stan awal"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Stan akhir"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Keteragan----"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Vendor"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Lama Berlaku"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Status"); // Set kolom E3 dengan tulisan "ALAMAT"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$id_rayon = $this->input->post('rayon3');
		$kendaraan = $this->kendaraan_model->get_by_rayon($id_rayon);

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($kendaraan as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_kendaraan);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nomor_polisi);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->pengguna);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_rayon);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->nama_jenis_kendaraan);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->stan_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->stan_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->keterangan);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->nama_pemilik_kendaraan);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->lama_berlaku);
			$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->status);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);

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
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Kendaraan");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Kendaraan.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
	}
	
	public function preview()
	{
		$id_rayon = $this->input->post('rayon4');
		//echo $id_rayon;
		$data['kendaraan'] = $this->kendaraan_model->get_by_rayon($id_rayon);
		
		$this->load->view('admin/kendaraan/preview', $data);
		
	}
}