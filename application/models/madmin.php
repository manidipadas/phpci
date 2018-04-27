<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Madmin extends CI_Model{

    function verify_login(){

        //print_r($_POST);die;

        $rs = $this->db
              ->select('id,concat(firstname, " ", lastname) as name,username', false)
              ->where('username', $this->input->post('username', true))
              ->where('password', $this->input->post('password', true))
              ->get('admins');

        //echo $this->db->last_query();die;
        if($rs->num_rows() > 0){    # authenticated make session
            $data   = array();
            $data   = $rs->row_array();
            $this->session->set_userdata('logged_admin', $data);
            return true;
        }else{
            return false;
        }
    }

   
}