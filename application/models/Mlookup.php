<?php

/**
 * User model
 */
class Mlookup extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getLkp($lookupCategory = '')
    {
        switch ($lookupCategory) {
            case 'propertyType':
                $lookupCategory = "PROPERTY_TYPE";
                break;
            case 'lkpAmenities':
                $lookupCategory = "GENERAL_AMENITIES";
                break;

            default:
                $lookupCategory = '';
                break;
        }

        $this->db->where(array('lookupCategory'=>$lookupCategory,'lookupStatus'=>1));
        $this->db->select('lookupAssignID,lookupDescription');
        $q = $this->db->get('lookup');

        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
              $data[] = $row;
            }
            return $data;
        }
    }
}
