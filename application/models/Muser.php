<?php

/**
 * User model
 */
class Muser extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function auth()
    {
        $p = json_decode(file_get_contents('php://input'));

        $username = $p->username;
        $password = md5($p->password);

        $this->db->where('userEmail', $username);
        $rs = $this->db->get('user');

        if($rs->num_rows() > 0) {

            $salt = $rs->row()->userSalt;
            $pass = md5($password.$salt);

            if($rs->row()->userPassword == $pass) {
                // Valid
                $token = $this->setJwtPayload($rs->row()->userID);
                // echo json_encode(array(
        		// 	'status' => '200',
        		// 	'token' => $token
        		// ));
                return array(
                    'status' => '200',
                    'token' => $token
                );

            } else {
                // not valid
                return array(
        			'status' => '403'
        		);
            }

        } else {
            return array(
                'status' => '403'
            );
        }
    }

    public function signUp()
    {
        $p = json_decode(file_get_contents('php://input'));

        $password = md5($p->password);
        $salt = uniqid();
        $password = md5($password.$salt);

        $data = array(
            'userFullName' => ucwords($p->fullname),
            'userEmail' => $p->email,
            'userPhone' => $p->mobile,
            'userPassword' => $password,
            'userSalt' => $salt,
            'userRegisterDateTime' => date('Y-m-d H:i:s')
        );
        $this->db->insert('user', $data);

        return $this->db->insert_id();
    }

    public function setJwtPayload($id = '')
    {
        $this->db->where('userID', $id);
        $rs = $this->db->get('user');

        if($rs->num_rows() > 0) {

            $data = $rs->row();
            $payload = array(
                'uid' => $data->userID,
                'fullname' => $data->userFullName,
                'email' => $data->userEmail,
                'fbid' => $data->userFBID,
                'login' => TRUE
            );

            return JWT::encode($payload, $this->config->item('jwt_key'));
        }
    }
}
