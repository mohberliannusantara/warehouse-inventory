<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('properti_model');
        $this->load->model('rayon_model');
        $this->load->library('form_validation');

        if (!$this->session->logged_in == true) {
            redirect('welcome', 'refresh');
        }
        if ($this->session->id_level == 1) {
            redirect('admin/beranda', 'refresh');
        }
    }

    public function index()
    {
      $data['page'] = 'Properti';
      $data['properti'] = $this->properti_model->get();

      $this->load->view('templates/header', $data);
      $this->load->view('properti/index', $data);
      $this->load->view('templates/footer');
    }

    public function get($id)
    {
        $data['properti'] = $this->properti_model->get_by_id($id);
        $this->load->view('properti/view', $data);
    }

    public function create()
    {
        $data['page'] = 'Properti';

        // validasi input
        $this->form_validation->set_rules('nama_properti', 'Nama_properti', 'required');
        // $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/properti/create', $data);
            $this->load->view('admin/templates/footer');
        } else {
            if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
                // Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
                $config['upload_path'] = './assets/uploads/properti/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000000000000;
                $config['max_width'] = 5000;
                $config['max_height'] = 5000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data['upload_error'] = $this->upload->display_errors();

                    $post_image = '';

                    $this->load->view('templates/header', $data);
                    $this->load->view('properti/create', $data);
                    $this->load->view('templates/footer');

                } else { //jika berhasil upload

                    $img_data = $this->upload->data();
                    $post_image = $img_data['file_name'];

                }
            } else { //jika tidak upload gambar

                $post_image = '';

            }

            $post_data = array(
                'nama_properti' => $this->input->post('nama_properti'),
                'jenis_properti' => $this->input->post('jenis_properti'),
                'id_rayon' => $this->input->post('rayon'),
                'alamat' => $this->input->post('alamat'),
                'lokasi' => $this->input->post('lokasi'),
                'luas_tanah' => $this->input->post('luas_tanah'),
                'luas_bangunan' => $this->input->post('luas_bangunan'),
                'harga' => str_replace(',', '', $this->input->post('harga')),
                // 'tanggal' => date("Y-m-d"),
                'tahun_perolehan' => $this->input->post('tangal_perolehan'),
                'no_sertifikat' => $this->input->post('no_sertifikat'),
                'tanggal_berlaku_sertifikat' => $this->input->post('tangal_berlaku_sertifikat'),
                'tangal_kadaluarsa_sertifikat' => $this->input->post('tangal_kadaluarsa_sertifikat'),
                'no_pajak' => $this->input->post('no_pajak'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $post_image,
            );

            if (empty($data['upload_error'])) {
                $this->properti_model->create($post_data);
                $data['properti'] = $this->properti_model->get();

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/properti/index', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function edit($id = null)
    {
        $data['page'] = 'Properti';
        $data['page_title'] = 'Ubah Properti';
        $data['page_content'] = 'Ubah properti kedalam daftar dengan informasi yang lengkap';

        $data['properti'] = $this->properti_model->get_by_id($id);

        // validasi input
        $this->form_validation->set_rules('nama_properti', 'Nama_properti', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        // Cek apakah input valid atau tidak
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('properti/edit', $data);
            $this->load->view('templates/footer');

        } else {
            if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
                // Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
                $config['upload_path'] = './assets/uploads/properti/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000000000000;
                $config['max_width'] = 3000;
                $config['max_height'] = 3000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data['upload_error'] = $this->upload->display_errors();

                    $post_image = '';

                    $this->load->view('templates/header');
                    $this->load->view('properti/create', $data);
                    $this->load->view('templates/footer');

                } else { //jika berhasil upload

                    $img_data = $this->upload->data();
                    $post_image = $img_data['file_name'];

                }
            } else { //jika tidak upload gambar

                $post_image = '';

            }

            $post_data = array(
                'nama_properti' => $this->input->post('nama_properti'),
                'harga' => str_replace(',', '', $this->input->post('harga')),
                'id_jenis_properti' => $this->input->post('jenis_properti'),
                'id_kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan'),
                'tanggal' => date("Y-m-d H:i:s"),
                'gambar' => $post_image,
            );

            if (empty($data['upload_error'])) {
                $this->properti_model->update($post_data, $id);
                //$data['properti'] = $this->properti_model->get();
                // $this->load->view('templates/header');
                // $this->load->view('properti/index', $data);
                // $this->load->view('templates/footer');
                redirect('Properti', 'refresh');
            }
        }
    }

    public function move()
    {
        $data['page_title'] = 'Pindah Properti';
        $data['page_content'] = 'Pindahkan properti dan memberi detail keterangan properti';

        $this->load->view("templates/header");
        $this->load->view('properti/edit', $data);
        $this->load->view("templates/footer");
    }

    public function delete($id)
    {
        $this->properti_model->delete($id);
    }

    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')->setLastModifiedBy('My Notes Code')->setTitle("Data Properti")->setSubject("Properti")->setDescription("Laporan Semua Data Properti")->setKeywords("Data Properti");

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

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PROPERTI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "id_properti"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "luas"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "harga"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "keterangan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "no_sertifikat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $barang = $this->properti_model->get();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($barang as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->id_properti);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->luas);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->harga);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->keterangan);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->no_sertifikat);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

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
        $excel->getActiveSheet(0)->setTitle("Laporan Data Properti");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Properti.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
