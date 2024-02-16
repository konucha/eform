<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Import file input data user
// require APPPATH.'/controllers/Input_data.php';

use Milon\Barcode\DNS1D;

// Import library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Welcome extends CI_Controller {

    // Constructor untuk memanggil model
	public function __construct() {
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('form_model');

	}

    public function index() {	
		$this->load->view('form');
		
	}

	// public function formUser() {
    // 	$this->load->view('form');
	// }

	public function fetchDataFromDummyApi() {
        // URL of the dummy API endpoint
        $api_url = 'https://jsonplaceholder.typicode.com/posts';

        // Fetch data from the API
        $api_response = file_get_contents($api_url);

        // Decode JSON response
        $data = json_decode($api_response, TRUE);

        // Pass data to view
        $this->load->view('dummy_api_view', array('data' => $data));
    }

	public function fungsiFormInputUser() {
		$supplier = $this->input->post('supplier');
		$petani = $this->input->post('petani');
		$supervisor = $this->input->post('supervisor');
		$kapal = $this->input->post('kapal');
		$conveyor = $this->input->post('conveyor');
		$sortir = $this->input->post('sortir');
		$tally = $this->input->post('tally');
        $bongkar = $this->input->post('bongkar');
        $area = $this->input->post('area');
        $tanggal = $this->input->post('tanggal');

		$ArrInsert = array(
            'supplier' => $supplier,
            'petani' => $petani,
            'supervisor' => $supervisor,
			'kapal' => $kapal,
			'conveyor' => $conveyor,
			'sortir' => $sortir,
            'tally' => $tally,
            'bongkar' => $bongkar,
            'area' => $area,
            'tanggal' => $tanggal 
        );

		// $this->session->set_flashdata('success','Data Berhasil di simpan!'); 	
        $this->user_model->insertDataUser($ArrInsert);
		redirect("welcome/fungsiGetDataUser");

	}

	public function fungsiGetDataUser() {
		$supplier = $this->input->get('supplier');
		$petani = $this->input->get('petani');
		$supervisor = $this->input->get('supervisor');
		$kapal = $this->input->get('kapal');
		$conveyor = $this->input->get('conveyor');
		$sortir = $this->input->get('sortir');
        $tally = $this->input->get('tally');
        $bongkar = $this->input->get('bongkar');
        $area = $this->input->get('area');
        $tanggal = $this->input->get('tanggal');

		$ArrInsert = array(
            'supplier' => $supplier,
            'petani' => $petani,
            'supervisor' => $supervisor,
			'kapal' => $kapal,
			'conveyor' => $conveyor,
            'sortir' => $sortir,
			'tally' => $tally,
            'bongkar' => $bongkar,
            'area' => $area,
            'tanggal' => $tanggal
        );

		$queryDataUser = $this->user_model->getDataUser();
		$queryDataForm = $this->form_model->getDataForm();

		$DATA = array('queryDataUsers' => $queryDataUser, 
					  'queryDataForms' => $queryDataForm);

		$this->load->view('detail_form', $DATA);

		$this->session->set_flashdata('success','Data Berhasil disimpan!');

	}

	public function fungsiFormInput() {
    	$this->load->view('form_utama');

	}

	public function formInput() {
		$berat = $this->input->post('berat');
		$jaring = $this->input->post('jaring');
		$persen = $this->input->post('persen');
		$beratnet = $this->input->post('beratnet');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$ArrInsert = array(
            'berat' => $berat,
            'jaring' => $jaring,
            'persen' => $persen,
			'beratnet' => $beratnet,
			'harga' => $harga,
			'jumlah' => $jumlah,
        );

        $this->form_model->insertDataForm($ArrInsert);
		redirect("welcome/fungsiGetDataUser");

	}

	public function fungsiGetData() {
		$berat = $this->input->get('berat');
		$jaring = $this->input->get('jaring');
		$persen = $this->input->get('persen');
		$beratnet = $this->input->get('beratnet');
		$harga = $this->input->get('harga');
		$jumlah = $this->input->get('jumlah');

		$ArrInsert = array(
            'berat' => $berat,
            'jaring' => $jaring,
            'persen' => $persen,
			'beratnet' => $beratnet,
			'harga' => $harga,
			'jumlah' => $jumlah,
        );

		$queryDataUser = $this->user_model->getDataUser();
		$queryDataForm = $this->form_model->getDataForm();

		$DATA = array('queryDataUsers' => $queryDataUser, 
					  'queryDataForms' => $queryDataForm);

		$this->session->set_flashdata('success','Data Berhasil di simpan!'); 
		$this->load->view('detail_form', $DATA);
        redirect('detail_form');

	}

	public function tampilEditForm($id) {
		$queryDataEdit = $this->form_model->getDataFormEdit($id);
        $DATA = array('queryDataEdits' => $queryDataEdit);

		// print_r($queryDataEdit);
		// die;

        $this->load->view('form_edit', $DATA);

	}

    public function fungsiEdit() {
        $id = $this->input->post('id');
        $berat = $this->input->post('berat');
		$jaring = $this->input->post('jaring');
		$persen = $this->input->post('persen');
		$beratnet = $this->input->post('beratnet');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

        $ArrEdit = array(
            'id' => $id,
            'berat' => $berat,
            'jaring' => $jaring,
            'persen' => $persen,
			'beratnet' => $beratnet,
			'harga' => $harga,
			'jumlah' => $jumlah,
        );
		// 	print_r($id);
		// die;
        $this->form_model->editDataForm($id, $ArrEdit);
		$this->session->set_flashdata('success','Data Berhasil diperbaharui'); 
        redirect("welcome/fungsiGetDataUser");

    }

    public function fungsiHapusData($id) {
		$this->form_model->hapusDataForm($id);
		$this->session->set_flashdata('delete','Data Berhasil di hapus!');
		redirect('welcome/fungsiGetDataUser');

	}

	public function export() {
		$spreadsheet = new Spreadsheet();
    	$sheet = $spreadsheet->getActiveSheet();

		$this->session->set_flashdata('success','Data Berhasil di ekspor!'); 

		// load data database
		$queryDataForm = $this->form_model->getDataForm();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head =[
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			  	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
			]
		];

		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
			  'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			  'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
			  'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			  'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			  'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			  'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		  ];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
			  'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
			  'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			  'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			  'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			  'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		  ];

		  // tambah gambar logo
		  $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();

		  $drawing->setName('Logo');
		  $drawing->setPath('assets/logo.png');
		  $drawing->setCoordinates('A1');
		  $drawing->setWorksheet($spreadsheet->getActiveSheet());

		//   $sheet->getHeaderFooter()->addImage($drawing, \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooter::IMAGE_HEADER_LEFT);
		//   $sheet->getHeaderFooter()->setOddHeader('&L&G');

		  // Header
		//   $sheet->setCellValue('A1', "<?php echo base_url('')
		//   $sheet->mergeCells('A1:B1');
        
          $queryDataUser = $this->user_model->getDataUser();
          $DATA = array('queryDataUsers' => $queryDataUser, 
          'queryDataForms' => $queryDataForm);

          foreach ($queryDataUser as $key => $row) {
            $tanggal = $row->tanggal;
            $id = $row->id;
            $supplier = $row->supplier;
            $petani = $row->petani;
            $supervisor= $row->supervisor;
            $sortir = $row->sortir;
            $tally = $row->tally;
            $bongkar = $row->bongkar;
            $kapal = $row->kapal;
            $area = $row->area;
            $conveyor = $row->conveyor;
          }

		  $sheet->setCellValue('C1',   "PT Pulau Sambu");
		  $sheet->mergeCells('C1:F2');
		  $sheet->setCellValue('C3',   "Faktur Timbang Kelapa Bulat Jambul Pancang");
		  $sheet->mergeCells('C3:F4');
		  $sheet->setCellValue('C5',   "Coconut Purchase Invoice");
		  $sheet->mergeCells('C5:F6');
		  $sheet->setCellValue('G2', "Tanggal   : ".$tanggal);
		  $sheet->mergeCells('G2:H2');
		  $sheet->setCellValue('G3', "No. Nota  : ".$id."/PCG/II/2023");
		  $sheet->mergeCells('G3:H3');
		  $sheet->setCellValue('G4', "Page      : 1/1");
		  $sheet->mergeCells('G4:H4');
		  //Info
		  $sheet->setCellValue('A8', "Supplier         : ".$supplier);
		  $sheet->mergeCells('A8:C8');
		  $sheet->setCellValue('A9', "Nama Petani : ".$petani);
		  $sheet->mergeCells('A9:C9');
		  $sheet->setCellValue('A10', "Supervisor     : ".$supervisor);
		  $sheet->mergeCells('A10:C10');

		  $sheet->setCellValue('D8', "Sortir              : ".$sortir);
		  $sheet->mergeCells('D8:F8');
		  $sheet->setCellValue('D9', "Tally               : ".$tally);
		  $sheet->mergeCells('D9:F9');
		  $sheet->setCellValue('D10', "Bongkar         : ".$bongkar);
		  $sheet->mergeCells('D10:F10');

		  $sheet->setCellValue('G8', "Kapal              : ".$kapal);
		  $sheet->mergeCells('G8:H8');
		  $sheet->setCellValue('G9', "Area                : ".$area);
		  $sheet->mergeCells('G9:H9');
		  $sheet->setCellValue('G10', "Conveyor        : ".$conveyor);
		  $sheet->mergeCells('G10:H10');

		  // Kolom
		  $sheet->setCellValue('A12', "No.");
		  $sheet->setCellValue('B12', "Berat Brutto (Kg)");
		  $sheet->setCellValue('C12', "Jaring (kg)");
		  $sheet->setCellValue('D12', "Persen (kg)");
		  $sheet->setCellValue('E12', "Berat Net (kg)");
		  $sheet->setCellValue('F12', "Harga (@Kg)");
		  $sheet->setCellValue('G12', "Jumlah Barang (Butir)");
		  $sheet->setCellValue('H12', "Total");

		  $sheet->getStyle('C1')->applyFromArray($style_head);
		  $sheet->getStyle('C3')->applyFromArray($style_head);
		  $sheet->getStyle('C5')->applyFromArray($style_head);

		  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
		  $sheet->getStyle('A12')->applyFromArray($style_col);
		  $sheet->getStyle('B12')->applyFromArray($style_col);
		  $sheet->getStyle('C12')->applyFromArray($style_col);
		  $sheet->getStyle('D12')->applyFromArray($style_col);
		  $sheet->getStyle('E12')->applyFromArray($style_col);
		  $sheet->getStyle('F12')->applyFromArray($style_col);
		  $sheet->getStyle('G12')->applyFromArray($style_col);
		  $sheet->getStyle('H12')->applyFromArray($style_col);

		  	// $dataForms = $this->queryDataForms->view();
		  	$numrow = 13;
		  	$count = 1; // Untuk penomoran tabel, di awal set dengan 1
			$grade_total = 0;
			$berat_total = 0;

			foreach($queryDataForm as $row){ // Lakukan looping pada variabel
				$total = $row->beratnet*$row->harga;
				$grade_total += $total;
				$berat_total += $row->beratnet;

				$sheet->setCellValue('A'.$numrow, $count);
				$sheet->setCellValue('B'.$numrow, $row->berat);
				$sheet->setCellValue('C'.$numrow, $row->jaring);
				$sheet->setCellValue('D'.$numrow, $row->persen);
				$sheet->setCellValue('E'.$numrow, $row->beratnet);
				$sheet->setCellValue('F'.$numrow, 'Rp'.$row->harga.',-');
				$sheet->setCellValue('G'.$numrow, $row->jumlah);
				$sheet->setCellValue('H'.$numrow, 'Rp'.$total.',-');

				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
				
				$count++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}

			$sheet->setCellValue('H'.$numrow, 'Rp'.$grade_total.',-');
			$sheet->setCellValue('E'.$numrow, $berat_total);

			$sheet->getStyle('E'.$numrow)->applyFromArray($style_col);
			$sheet->getStyle('H'.$numrow)->applyFromArray($style_col);


			// Set width kolom
			$sheet->getColumnDimension('A')->setWidth(5); 
			$sheet->getColumnDimension('B')->setWidth(20);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(20);
			$sheet->getColumnDimension('H')->setWidth(15);

			//TTD bawah
			//TTD 1

			//pemposisian tempat untuk numrow
			$numrow_footer = $numrow + 4;
			$numrow_footer_ttd = $numrow + 2;
			
			$numrow_footer_2 = $numrow + 4;
			$numrow_footer_2_ttd = $numrow + 2;

			$numrow_footer_cetak = $numrow + 5;
			$numrow_footer_masa = $numrow + 9;
			$numrow_footer_kode = $numrow + 9;


			$sheet->setCellValue('B'.$numrow_footer++, "Dibuat oleh");
			$sheet->setCellValue('B'.$numrow_footer++, "Nama     : ".$queryDataUser['0']->petani);
			$sheet->setCellValue('B'.$numrow_footer++, "Tanggal  : ".$queryDataUser['0']->tanggal);
			
			// $sheet->getStyle('B'.$numrow_footer)->applyFromArray($style_row);
			// $sheet->getStyle('B'.$numrow_footer)->applyFromArray($style_row);
			// $sheet->getStyle('B'.$numrow_footer)->applyFromArray($style_row);


			$ttd_1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$ttd_1->setName('ttd-1');
			$ttd_1->setPath('assets/ttd.png');
			$ttd_1->setCoordinates('C'.$numrow_footer_ttd);
			$ttd_1->setWorksheet($spreadsheet->getActiveSheet());

			// $sheet->getStyle('C'.$numrow_footer_ttd)->applyFromArray($style_row);

			//TTD 2
			$sheet->setCellValue('D'.$numrow_footer_2++, "Dibuat oleh");
			$sheet->setCellValue('D'.$numrow_footer_2++, "Nama     : ".$queryDataUser['0']->supervisor);
			$sheet->setCellValue('D'.$numrow_footer_2++, "Tanggal  : ".$queryDataUser['0']->tanggal);

			// $sheet->getStyle('D'.$numrow_footer_2)->applyFromArray($style_row);
			// $sheet->getStyle('D'.$numrow_footer_2)->applyFromArray($style_row);
			// $sheet->getStyle('D'.$numrow_footer_2)->applyFromArray($style_row);

			$ttd_1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$ttd_1->setName('ttd-1');
			$ttd_1->setPath('assets/ttd.png');
			$ttd_1->setCoordinates('E'.$numrow_footer_2_ttd);
			$ttd_1->setWorksheet($spreadsheet->getActiveSheet());

			// $sheet->getStyle('E'.$numrow_footer_2_ttd)->applyFromArray($style_row);

			//Cetak oleh
			$sheet->setCellValue('G'.$numrow_footer_cetak++, "Di Cetak Pada : ".$queryDataUser['0']->tanggal);
			$sheet->setCellValue('G'.$numrow_footer_cetak++, "Oleh          : ".$queryDataUser['0']->supervisor);

			// $sheet->getStyle('G'.$numrow_footer_cetak)->applyFromArray($style_row);
			// $sheet->getStyle('G'.$numrow_footer_cetak)->applyFromArray($style_row);

			//Masa berlaku dan Kode Unik
			$sheet->setCellValue('B'.$numrow_footer_masa++, "Masa Berlaku : 01.06.2024");
			$sheet->setCellValue('G'.$numrow_footer_kode, "FQM-0192384958603995");


			$sheet->getDefaultRowDimension()->setRowHeight(-1);

			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

			// Set judul file excel nya
			$sheet->setTitle("Laporan Data Timbangan");

			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Data Timbangan.xls"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output');

		  
	}

}

