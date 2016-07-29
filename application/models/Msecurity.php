<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Security Model
 */
class Msecurity extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function gateKeeper()
    {
        $p = json_decode(file_get_contents('php://input'));
        $jwt = $p->token;

		$payloads = JWT::decode($jwt, $this->config->item('jwt_key'));
        return $payloads;

    }

    public function logout()
    {
        $this->session->sess_destroy();
        // return FALSE;
        // echo 'FALSE';
        // TODO: redirect to welcome page
    }
}
