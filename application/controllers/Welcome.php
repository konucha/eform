<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// Constructor untuk memanggil model
	public function __construct() {
		parent::__construct();
		$this->load->model('form_model');
	}

	// // Index
	public function index() {
		$queryDataForm = $this->form_model->getDataForm();
		$DATA = array('queryDataForms' => $queryDataForm);
	
		$this->load->view('form', $DATA);
	}
	// public function index() {
	// 	$this->load->view('form');
	// }

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

		$queryDataForm = $this->form_model->getDataForm();
		$DATA = array('queryDataForms' => $queryDataForm);

        $this->form_model->insertDataForm($ArrInsert);
		$this->load->view('detail_form', $DATA);
        // redirect(base_url(''));

	}

	// public function index() {
	// 	$this->load->view('form');
	// }
}

 ?>