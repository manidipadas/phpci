<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->input->post())
		{
			//echo '11';exit();
			if($this->madmin->verify_login()){
	                redirect('admin/dashboard', 'refresh');
	            }else{
	                $this->session->set_flashdata('msg', 'Either username or password is incorrect !');
	                redirect('Inside/', 'refresh');
	            }
	        }else{
	        	
	            $this->load->view('view_login');
	    }
	}
}
