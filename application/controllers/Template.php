<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function index()
	{
		$this->load->view('base');
	}

	// Views
	public function view($view)
	{
		if($view == 'header') {
			$this->load->view('template/header');

		} else if($view == 'footer') {
			$this->load->view('welcome/footer');
		}

	}
}
