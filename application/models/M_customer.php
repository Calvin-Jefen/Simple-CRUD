<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_customer extends CI_Model
{
    function getCustomerData()
    {
        $query = $this->db->get('tb_customer');
        return $query->result();
    }
    function InsertCustData($data)
    {
        $this->db->insert('tb_customer', $data);
    }
    function GetCustDetail($ID)
    {
        $this->db->where('ID', $ID);
        $query = $this->db->get('tb_customer');
        return $query->row();
    }
    function CustDataUpdate($ID, $data)
    {
        $this->db->where('ID', $ID);
        $this->db->update('tb_customer', $data);
    }
    function DeleteCustData($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('tb_customer');
    }
}
