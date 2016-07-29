<?php

/**
 * User model
 */
class Mwelcome extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function mediaRegistration()
    {
        $p = json_decode(file_get_contents('php://input'));

        $uid = uniqid();

        // Generate image and save locally
        if($p->image) {
            $imgexp = explode(",", $p->image);
            $img_data = base64_decode($imgexp[1]);
            $img_file = FCPATH."/repos/person_".$uid.".png";
            $img_content = file_put_contents($img_file, $img_data);
        }

        if($p->passfile) {
            $imgexp = explode(",", $p->passfile);
            $img_data = base64_decode($imgexp[1]);
            $img_file = FCPATH."/repos/passport_".$uid.".png";
            $img_content = file_put_contents($img_file, $img_data);
        }

        if($p->presscard) {
            $imgexp = explode(",", $p->presscard);
            $img_data = base64_decode($imgexp[1]);
            $img_file = FCPATH."/repos/press_".$uid.".png";
            $img_content = file_put_contents($img_file, $img_data);
        }

        $data = array(
            'reg_idexpiry' => $p->expdate,
            'reg_dob' => $p->dob,
            'reg_name' => $p->fullname,
            'reg_picture' => $p->image,
            'org_desig' => $p->lkp_designation,
            'reg_gender' => $p->lkp_gender,
            'reg_idtype' => $p->lkp_id,
            'org_type' => $p->lkp_org,
            'reg_type' => $p->lkp_type,
            'reg_card' => $p->namecard,
            'reg_nationality' => $p->nationality,
            'org_address' => $p->orgadd,
            'org_country' => $p->orgcountry,
            'org_desigo' => $p->orgdesgo,
            'org_email' => $p->orgemail,
            'org_fax' => $p->orgfax,
            'org_mobile' => $p->orgmobile,
            'org_name' => $p->orgname,
            'org_telo' => $p->orgtelo,
            'org_typeo' => $p->orgtypeo,
            'reg_idfile' => $p->passfile,
            'reg_idno' => $p->passport,
            'pc_file' => $p->presscard,
            'pc_no' => $p->presscardno,
            'pc_editor' => $p->pressedi,
            'uid' => $uid
        );
        $this->db->insert('media', $data);

        return $this->db->insert_id();
    }

    public function allMediaRegistration()
    {
        $p = json_decode(file_get_contents('php://input'));

        // Determine filter and sorting type
        $order_status = $p->order;
        if($order_status[0] == "-") {
            $order_col =substr($p->order, 1);
            $order_type = 'desc';
        } else {
            $order_col = $p->order;
            $order_type = 'asc';
        }

        // Limit and offset
        $skip = ($p->limit * $p->page) - $p->limit;

        $ufilter = $p->filter;
        $ulimit = $p->limit;

        // Get data
        $sql = "SELECT *
                FROM media
                WHERE reg_name LIKE '%$ufilter%'
                OR reg_type LIKE '%$ufilter%'
                OR reg_idno LIKE '%$ufilter%'
                OR org_name LIKE '%$ufilter%'
                ORDER BY $order_col $order_type
                LIMIT $skip, $ulimit";

        $query = $this->db->query($sql);

        $data = array();
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[] = $row;
            }
        }

        $data_count = $query->num_rows();

        return json_encode(array(
            'users' => $data,
            'count' => $data_count
        ));

    }

    public function getApplicantByRegId()
    {
        $p = json_decode(file_get_contents('php://input'));

        $this->db->where('reg_idno', $p->regid);
        $rs =  $this->db->get('media');

        $data = null;
        if($rs->num_rows() > 0)
            $data = $rs->row();

        return $data;
    }
}
