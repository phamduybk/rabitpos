<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	public function xss_html_filter($input){
		return $this->security->xss_clean(html_escape($input));
	}
	public function verify_and_save($data){
		extract($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));
		$query=$this->db->query("select * from db_warehouse where warehouse_name='$warehouse_name'")->num_rows();
		if($query>0){ return "This Warehouse Name Already Exist.";}

		$query=$this->db->query("select * from db_warehouse where mobile='$mobile'")->num_rows();
		if($query>0){ return "This Moble Number already exist.";}

		$query=$this->db->query("select * from db_warehouse where email='$email'")->num_rows();
		if($query>0){ return "This Email ID already exist.";}
		
		$query1="insert into db_warehouse(warehouse_name,mobile,email,status) 
									values('$warehouse_name','$mobile','$email',1)";
		
		if ($this->db->simple_query($query1)){
				$this->session->set_flashdata('success', 'Success!! New Warehouse Created Succssfully!!');
		        return "success";
		}
		else{
		        return "failed";
		}

		

	}
	public function verify_and_update($data){
		
		extract($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));

		$query=$this->db->query("select * from db_warehouse where warehouse_name='$warehouse_name' and id<>$q_id")->num_rows();
		if($query>0){ return "This Warehouse Name Already Exist.";}
		$query=$this->db->query("select * from db_warehouse where mobile='$mobile' and id<>$q_id")->num_rows();
		if($query>0){ return "This Moble Number already exist.";}
		$query=$this->db->query("select * from db_warehouse where email='$email' and id<>$q_id")->num_rows();
		if($query>0){ return "This Email ID already exist.";}
		
		$query1="UPDATE db_warehouse SET warehouse_name='$warehouse_name', mobile='$mobile', email='$email' where id=$q_id";
		
		if ($this->db->simple_query($query1)){
				$this->session->set_flashdata('success', 'Success!! Warehouse Updated Succssfully!!');
		        return "success";
		}
		else{
		        return "failed";
		}

		

	}
	public function status_update($id,$status){
		
        $query1="update db_warehouse set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	
	//Get users deatils
	public function get_details($id){
		$data=$this->data;

		//Validate This suppliers already exist or not
		$query=$this->db->query("select * from db_warehouse where id=$id");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['warehouse_name']=$query->warehouse_name;
			$data['mobile']=$query->mobile;
			$data['email']=$query->email;
			return $data;
		}
	}

	public function delete_warehouse($id){
      	$this->db->trans_begin();
      	
        $q2=$this->db->query("delete from db_warehouse where id='$id'");
      
		if($q2!=1)
		{
			$this->db->trans_rollback();
		    return "failed";
		}
		else{
			$this->db->trans_commit();
		        return "success";
		}
	}
}
