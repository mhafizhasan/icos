<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('base');
	}

	// Registration
	public function submitRegistration()
	{
		$id = $this->mwelcome->mediaRegistration();

		echo json_encode(array(
			'status' => '200',
			'id' => $id
		));
	}


	// Admin
	public function allRegistration()
	{
		$dt = $this->mwelcome->allMediaRegistration();

		echo $dt;
	}

	public function applicantByRegId()
	{
		$app = $this->mwelcome->getApplicantByRegId();
		echo json_encode(array(
			'status' => '200',
			'app' => $app
		));
	}

	// Views
	public function view($view)
	{
		if($view == 'register') {
			$this->load->view('welcome/register');
		} else if($view == 'header') {
			$this->load->view('header/register');
		} else if($view == 'header_admin') {
			$this->load->view('header/admin');
		} else if($view == 'dashboard') {
			$this->load->view('welcome/dashboard');
		} else if($view == 'print') {
			$this->load->view('welcome/print');
		}

	}
}
