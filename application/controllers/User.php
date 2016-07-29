<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// JWT Test
		$jwt = $this->msecurity->gateKeeper();
		$jwt->status = "200";
		echo json_encode($jwt);
	}


	// Views
	public function view($view)
	{
		if($view == 'dashboard') {
			$this->load->view('user/dashboard');

		} else if($view == 'login') {
			$this->load->view('welcome/login');
		}

	}

	// Controllers
	public function signUp()
	{
		$userid = $this->muser->signUp();
		$token = $this->muser->setJwtPayload($userid);

		echo json_encode(array(
			'status' => '200',
			'token' => $token
		));
	}

	public function login()
	{
		$status = $this->muser->auth();

		echo json_encode($status);
	}
}
