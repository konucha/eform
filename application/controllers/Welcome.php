<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('form');
	}

	public function formInput()
	{
		$this->load->view('detail_form');
	}
}
