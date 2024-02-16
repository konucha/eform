<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Import controller
// include_once (dirname(__FILE__) . "/Welcome.php");

class inputDataUser extends CI_Controller {

	// Constructor untuk memanggil model
	public function __construct() {
		parent::__construct();

		$this->load->model('form_model');
	}

	// // Index
	public function index() {
		// $queryDataForm = $this->form_model->getDataForm();
		// $DATA = array('queryDataForms' => $queryDataForm);
	
		$this->load->view('form');
	}

	
}

 ?>