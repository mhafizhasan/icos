<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function property($type = '')
	{
		if($type == 'type') {
			$jwt = $this->msecurity->gateKeeper();
			$jwt->status = "200";
			$jwt->lkp = $this->mlookup->getLkp('propertyType');

			echo json_encode($jwt);
		}
	}
}
