<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Import library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Welcome extends CI_Controller {

	// Constructor untuk memanggil model
	public function __construct() {
		parent::__construct();

		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

		$this->load->model('form_model');
	}

	// // Index
	public function index() {
		// $queryDataForm = $this->form_model->getDataForm();
		// $DATA = array('queryDataForms' => $queryDataForm);
	
		$this->load->view('form');
	}

	public function formInput() {
    	$this->load->view('detail_form');
	}

	public function fungsiFormInput() {
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

		$this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
		redirect("welcome/fungsiGetData");

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

		$queryDataForm = $this->form_model->getDataForm();
		$DATA = array('queryDataForms' => $queryDataForm);

		$this->load->view('detail_form', $DATA);

	}


	public function export() {
		$spreadsheet = new Spreadsheet();
    	$sheet = $spreadsheet->getActiveSheet();

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
		  $sheet->setCellValue('C1',   "PT Pulau Sambu");
		  $sheet->mergeCells('C1:F2');
		  $sheet->setCellValue('C3',   "Faktur Timbang Kelapa Bulat Jambul Pancang");
		  $sheet->mergeCells('C3:F4');
		  $sheet->setCellValue('C5',   "Coconut Purchase Invoice");
		  $sheet->mergeCells('C5:F6');
		  $sheet->setCellValue('G2', "Tanggal   : 12 Juni 2023");
		  $sheet->mergeCells('G2:H2');
		  $sheet->setCellValue('G3', "No. Nota  : 123/PCG/2023");
		  $sheet->mergeCells('G3:H3');
		  $sheet->setCellValue('G4', "Page      : 1/1");
		  $sheet->mergeCells('G4:H4');

		  //Info
		  $sheet->setCellValue('A8', "Supplier         : PCG19 - Eko Cahyo");
		  $sheet->mergeCells('A8:C8');
		  $sheet->setCellValue('A9', "Nama Petani : Sujono");
		  $sheet->mergeCells('A9:C9');
		  $sheet->setCellValue('A10', "Supervisor     : Saiman");
		  $sheet->mergeCells('A10:C10');

		  $sheet->setCellValue('D8', "Sortir              : 32");
		  $sheet->mergeCells('D8:F8');
		  $sheet->setCellValue('D9', "Tally               : 88039");
		  $sheet->mergeCells('D9:F9');
		  $sheet->setCellValue('D10', "Bongkar         : 12.06.2023 s/d 15.06.2023");
		  $sheet->mergeCells('D10:F10');

		  $sheet->setCellValue('G8', "Kapal              : Marina 123");
		  $sheet->mergeCells('G8:H8');
		  $sheet->setCellValue('G9', "Area                : PCG Sungai Guntung");
		  $sheet->mergeCells('G9:H9');
		  $sheet->setCellValue('G10', "Conveyor        : C61");
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
				$sheet->setCellValue('F'.$numrow, $row->harga);
				$sheet->setCellValue('G'.$numrow, $row->jumlah);
				$sheet->setCellValue('H'.$numrow, $total);

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

			$sheet->setCellValue('H'.$numrow, $grade_total);
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
			$sheet->setCellValue('B'.$numrow_footer++, "Nama     : Abdan R");
			$sheet->setCellValue('B'.$numrow_footer++, "Tanggal  : 12 Juni 2023");
			
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
			$sheet->setCellValue('D'.$numrow_footer_2++, "Nama     : Abdan R");
			$sheet->setCellValue('D'.$numrow_footer_2++, "Tanggal  : 12 Juni 2023");

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
			$sheet->setCellValue('G'.$numrow_footer_cetak++, "Di Cetak Pada : 12 Juni 2023 19:23:30");
			$sheet->setCellValue('G'.$numrow_footer_cetak++, "Oleh          : Abdan R");

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

 ?>