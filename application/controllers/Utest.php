<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utest extends CI_Controller {

	public function __construct(){
			parent::__construct();
			/*$this->load_global();

			$this->load->model('state_model','state');*/
		}

	public function user_test($id){

		$id=$this->security->xss_clean(html_escape($id));
				
		$query=$this->db->query("select a.id,a.username,a.role_id,b.role_name from db_users a, db_roles b where b.id=a.role_id and  a.id='$id'");

		if($query->num_rows()==1){

			$logdata = array('inv_username'  => $query->row()->username,
				        	 'inv_userid'  => $query->row()->id,
				        	 'logged_in' => TRUE,
				        	 'role_id' => $query->row()->role_id,
				        	 'role_name' => trim($query->row()->role_name),
				        	);
			$this->session->set_userdata($logdata);
			return true;
		}
		else{
			return false;
		}		
	}
}