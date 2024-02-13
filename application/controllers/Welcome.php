<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Import file input data user
require APPPATH.'/controllers/Input_data.php';

// buat class inheritance dari inputDataUser
class Welcome extends inputDataUser {

    // Constructor untuk memanggil model
	public function __construct() {
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('form_model');
	}

    public function index() {	
		$this->load->view('form');
		redirect("welcome/inputFormAwal");
		
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

	}

	// load input data 
	public function inputFormUtama() {	
		$this->load->view('form_utama');

	}

	public function inputFormAwal() {	
		$this->load->view('form');

	}
	
	// load fungsi inheritance
	public function exportData() {
		$this->export();
	}

	public function inputData() {
		$this->formInput();
	}



}

