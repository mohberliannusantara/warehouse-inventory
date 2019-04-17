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
    if ($this->session->id_level == 2) {
      redirect('beranda', 'refresh');
    }
  }

  public function index()
  {
    $data['page'] = 'Properti';
    $data['properti'] = $this->properti_model->get();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/properti/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function get($id)
  {
    $data['properti'] = $this->properti_model->get_by_id($id);
    $this->load->view('admin/properti/view', $data);
  }

  public function create()
  {
    $data['page'] = 'Properti';
    $data['rayon'] = $this->rayon_model->get();

    $this->form_validation->set_rules('nama_properti', 'Nama Properti', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('rayon', 'Rayon', 'trim|required');
    $this->form_validation->set_rules('jenis_properti', 'Jenis Properti', 'trim|required');
    $this->form_validation->set_rules('tahun_perolehan', 'Tahun Perolehan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('no_sertifikat', 'Nomor Sertifikat', 'trim|required');
    $this->form_validation->set_rules('tanggal_berlaku_sertifikat', 'Tanggal Berlaku Sertifikat', 'trim|required');
    $this->form_validation->set_rules('tanggal_kadaluarsa_sertifikat', 'Tanggal Kadaluarsa Sertifikat', 'trim|required');
    $this->form_validation->set_rules('status', 'Status', 'trim');
    $this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim');
    $this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'trim');
    $this->form_validation->set_rules('no_pajak', 'Nomor Pajak', 'trim|required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

    $sertifikat_data = '';
    $pajak_data = '';
    $properti_data = '';

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/properti/create', $data);
      $this->load->view('admin/templates/footer');
    }
    else
    {
      if ( isset($_FILES['foto_sertifikat']) && $_FILES['foto_sertifikat']['size'] > 0 || isset($_FILES['foto_pajak']) && $_FILES['foto_pajak']['size'] > 0 || isset($_FILES['foto_properti']) && $_FILES['foto_properti']['size'] > 0 )
      {
        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/sertifikat/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'sertifikat'); // Create custom object for sertifikat upload
        $this->sertifikat->initialize($config);
        $upload_sertifikat = $this->sertifikat->do_upload('foto_sertifikat');

        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/pajak/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'pajak'); // Create custom object for pajak upload
        $this->pajak->initialize($config);
        $upload_pajak = $this->pajak->do_upload('foto_pajak');

        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'properti'); // Create custom object for properti upload
        $this->properti->initialize($config);
        $upload_properti = $this->properti->do_upload('foto_properti');

        if ( !$this->properti->do_upload('foto_properti') || !$this->sertifikat->do_upload('foto_sertifikat') || !$this->pajak->do_upload('foto_pajak'))
        {
          // $data['upload_error'] = $this->upload->display_errors();

          $sertifikat_data = '';
          $pajak_data = '';
          $properti_data = '';

          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/properti/create', $data);
          $this->load->view('admin/templates/footer');

        }
        else
        { //jika berhasil upload

          $img_data = $this->sertifikat->data();
          $sertifikat_data = $img_data['file_name'];

          $img_data = $this->pajak->data();
          $pajak_data = $img_data['file_name'];

          $img_data = $this->properti->data();
          $properti_data = $img_data['file_name'];

        }
      }
      else
      { //jika tidak upload gambar

        $sertifikat_data = '';
        $pajak_data = '';
        $properti_data = '';

      }

      // // Check uploads success
      $post_data = array(
        'nama_properti' => $this->input->post('nama_properti'),
        'alamat' => $this->input->post('alamat'),
        'id_rayon' => $this->input->post('rayon'),
        'jenis_properti' => $this->input->post('jenis_properti'),
        'tahun_perolehan' => $this->input->post('tahun_perolehan'),
        'harga' => $this->input->post('harga'),
        'no_sertifikat' => $this->input->post('no_sertifikat'),
        'tanggal_berlaku_sertifikat' => $this->input->post('tanggal_berlaku_sertifikat'),
        'tanggal_kadaluarsa_sertifikat' => $this->input->post('tanggal_kadaluarsa_sertifikat'),
        'luas_tanah' => $this->input->post('luas_tanah'),
        'luas_bangunan' => $this->input->post('luas_bangunan'),
        'keterangan' => $this->input->post('nama_properti'),
        'no_pajak' => $this->input->post('no_pajak'),
        'lokasi' => $this->input->post('lokasi'),
        'status' => $this->input->post('status'),
        'foto_properti' => $properti_data,
        'foto_pajak' => $pajak_data,
        'foto_sertifikat' => $sertifikat_data
      );

      if( empty($data['upload_error']) ) {
        $this->properti_model->create($post_data);
        redirect('admin/properti','refresh');
      }
    }
  }

  public function edit($id = null)
  {
    $data['page'] = 'Properti';

    $data['properti'] = $this->properti_model->get_by_id($id);
    $data['rayon'] = $this->rayon_model->get();

    $this->form_validation->set_rules('nama_properti', 'Nama Properti', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('rayon', 'Rayon', 'trim|required');
    $this->form_validation->set_rules('jenis_properti', 'Jenis Properti', 'trim|required');
    $this->form_validation->set_rules('tahun_perolehan', 'Tahun Perolehan', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('no_sertifikat', 'Nomor Sertifikat', 'trim|required');
    $this->form_validation->set_rules('tanggal_berlaku_sertifikat', 'Tanggal Berlaku Sertifikat', 'trim|required');
    $this->form_validation->set_rules('tanggal_kadaluarsa_sertifikat', 'Tanggal Kadaluarsa Sertifikat', 'trim|required');
    $this->form_validation->set_rules('status', 'Status', 'trim');
    $this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim');
    $this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'trim');
    $this->form_validation->set_rules('no_pajak', 'Nomor Pajak', 'trim|required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

    $sertifikat_data = '';
    $pajak_data = '';
    $properti_data = '';

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/properti/edit', $data);
      $this->load->view('admin/templates/footer');
    }
    else
    {
      if ( isset($_FILES['foto_sertifikat']) && $_FILES['foto_sertifikat']['size'] > 0 || isset($_FILES['foto_pajak']) && $_FILES['foto_pajak']['size'] > 0 || isset($_FILES['foto_properti']) && $_FILES['foto_properti']['size'] > 0 )
      {
        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/sertifikat/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'sertifikat'); // Create custom object for sertifikat upload
        $this->sertifikat->initialize($config);
        $upload_sertifikat = $this->sertifikat->do_upload('foto_sertifikat');

        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/pajak/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'pajak'); // Create custom object for pajak upload
        $this->pajak->initialize($config);
        $upload_pajak = $this->pajak->do_upload('foto_pajak');

        // Sertifikat upload
        $config = array();
        $config['upload_path']    = './assets/uploads/properti/';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['max_size'] 			= '1000000000';
        $config['max_width']			= '5000';
        $config['max_height'] 		= '5000';
        $this->load->library('upload', $config, 'properti'); // Create custom object for properti upload
        $this->properti->initialize($config);
        $upload_properti = $this->properti->do_upload('foto_properti');

        if ( !$this->properti->do_upload('foto_properti') || !$this->sertifikat->do_upload('foto_sertifikat') || !$this->pajak->do_upload('foto_pajak'))
        {
          // $data['upload_error'] = $this->upload->display_errors();

          $sertifikat_data = '';
          $pajak_data = '';
          $properti_data = '';

          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/properti/edit', $data);
          $this->load->view('admin/templates/footer');

        }
        else
        { //jika berhasil upload

          $img_data = $this->sertifikat->data();
          $sertifikat_data = $img_data['file_name'];

          $img_data = $this->pajak->data();
          $pajak_data = $img_data['file_name'];

          $img_data = $this->properti->data();
          $properti_data = $img_data['file_name'];

        }
      }
      else
      { //jika tidak upload gambar

        $sertifikat_data = '';
        $pajak_data = '';
        $properti_data = '';

      }

      // // Check uploads success
      $post_data = array(
        'nama_properti' => $this->input->post('nama_properti'),
        'alamat' => $this->input->post('alamat'),
        'id_rayon' => $this->input->post('rayon'),
        'jenis_properti' => $this->input->post('jenis_properti'),
        'tahun_perolehan' => $this->input->post('tahun_perolehan'),
        'harga' => $this->input->post('harga'),
        'no_sertifikat' => $this->input->post('no_sertifikat'),
        'tanggal_berlaku_sertifikat' => $this->input->post('tanggal_berlaku_sertifikat'),
        'tanggal_kadaluarsa_sertifikat' => $this->input->post('tanggal_kadaluarsa_sertifikat'),
        'luas_tanah' => $this->input->post('luas_tanah'),
        'luas_bangunan' => $this->input->post('luas_bangunan'),
        'keterangan' => $this->input->post('nama_properti'),
        'no_pajak' => $this->input->post('no_pajak'),
        'lokasi' => $this->input->post('lokasi'),
        'status' => $this->input->post('status'),
        'foto_properti' => $properti_data,
        'foto_pajak' => $pajak_data,
        'foto_sertifikat' => $sertifikat_data
      );

      if( empty($data['upload_error']) ) {
        $this->properti_model->update($post_data, $id);
        redirect('admin/properti','refresh');
      }
    }
  }

  public function delete($id)
  {
    $this->properti_model->delete($id);
    redirect('admin/properti', 'refresh');
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
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "nama_properti"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "jenis_properti"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "rayon"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "luas_tanah"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "luas_bangunan"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "harga"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "tahun_perolehan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "keterangan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "no_sertifikat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "tanggal_berlaku_sertifikat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "tanggal_kadaluarsa_sertifikat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "no_pajak"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "alamat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "lokasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "status"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

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
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $barang = $this->properti_model->get();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach ($barang as $data) { // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->id_properti);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_properti);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->jenis_properti);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_rayon);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->luas_tanah);
      $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->luas_bangunan);
      $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->harga);
      $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->tahun_perolehan);
      $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->keterangan);
      $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->no_sertifikat);
      $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->tanggal_berlaku_sertifikat);
      $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->tanggal_kadaluarsa_sertifikat);
      $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->no_pajak);
      $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->lokasi);
      $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->status);

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
      $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);

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
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Properti");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Properti.xls"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

  public function preview()
  {
    $id_rayon = $this->input->post('rayon6');

    $data['properti'] = $this->properti_model->get_by_rayon($id_rayon);

    $this->load->view('admin/properti/preview', $data);

  }
}
