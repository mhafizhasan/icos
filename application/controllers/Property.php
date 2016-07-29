<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Nothing
	}


	// Views
	public function view($view)
	{
		if($view == 'register') {
			$this->load->view('property/register');

		}

	}

	// Controllers
	public function basic()
	{
		// Step 1
	}

}
