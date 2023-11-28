<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_info();
	}
	public function index()
	{
		$data = $this->data;
		/*$array_items = array('inv_username','inv_userid','logged_in','permissions','currency');
		$this->session->unset_userdata($array_items);*/

		//DELETE THE EXPIRED SESSION FROM SESSION, WHICH SAVED
		$this->db->where("timestamp<=",time()-config_item('sess_expiration'))->delete(config_item('sess_save_path'));
		//CLEAR ALL SESSION FROM VIRTUAL VARIABLES
		$this->session->sess_destroy();
		//LOGOUT
		redirect(base_url('login'));
	}
}
