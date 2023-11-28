<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	public function verify_and_save(){
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		//echo "<pre>";print_r($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));exit();

		$subdomain_ = 'localhost';

		
		$profile_picture='';
		if(!empty($_FILES['profile_picture']['name'])){
			$config['upload_path']          = './uploads/' . $subdomain_ . '/users/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 500;
	        $config['max_width']            = 500;
	        $config['max_height']           = 500;

			$config['local_path'] = './uploads/' . $subdomain_ . '/';

			if (!is_dir($config['local_path'])) {
				// Thư mục không tồn tại, hãy tạo nó
				if (mkdir($config['local_path'], 0755, true)) {
					//echo "Thư mục đã được tạo thành công.";
				}
			}

			if (!is_dir($config['upload_path'])) {
				// Thư mục không tồn tại, hãy tạo nó
				if (mkdir($config['upload_path'], 0755, true)) {
					//echo "Thư mục đã được tạo thành công.";
				}
			}


	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('profile_picture'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                print($error['error']);
	                exit();
	        }
	        else
	        {
	        	   $profile_picture='uploads/' . $subdomain_ . '/users/'.$this->upload->data('file_name');
	        }
		}

		$query=$this->db->query("select * from db_users where username='$new_user'")->num_rows();
		if($query>0){ return "This username already exist.";}
		$query=$this->db->query("select * from db_users where mobile='$mobile'")->num_rows();
		if($query>0){ return "This Moble Number already exist.";}
		$query=$this->db->query("select * from db_users where email='$email'")->num_rows();
		if($query>0){ return "This Email ID already exist.";}

		$pass = md5($pass);
		$query1="insert into db_users(username,password,mobile,email,role_id,
		created_date,created_time,created_by,system_ip,system_name,status,profile_picture) 
									values('$new_user','$pass','$mobile','$email',$role_id,
									'$CUR_DATE','$CUR_TIME','$CUR_USERNAME','$SYSTEM_IP','$SYSTEM_NAME',1,'$profile_picture')";
		//echo $query1;exit();
		if ($this->db->simple_query($query1)){
				$this->session->set_flashdata('success', 'Success!! New User created Succssfully!!');
		        return "success";
		}
		else{
		        return "failed";
		}

		

	}
	public function verify_and_update(){
		
		
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		//echo "<pre>";print_r($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));exit();
		$subdomain_ = 'localhost';
		

		$profile_picture='';
		if(!empty($_FILES['profile_picture']['name'])){
			
			$config['upload_path']          = './uploads/' . $subdomain_ . '/users/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 500;
	        $config['max_width']            = 500;
	        $config['max_height']           = 500;

			$config['local_path'] = './uploads/' . $subdomain_ . '/';

			if (!is_dir($config['local_path'])) {
				// Thư mục không tồn tại, hãy tạo nó
				if (mkdir($config['local_path'], 0755, true)) {
					//echo "Thư mục đã được tạo thành công.";
				}
			}

			if (!is_dir($config['upload_path'])) {
				// Thư mục không tồn tại, hãy tạo nó
				if (mkdir($config['upload_path'], 0755, true)) {
					//echo "Thư mục đã được tạo thành công.";
				}
			}

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('profile_picture'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                print($error['error']);
	                exit();
	        }
	        else
	        {
				$profile_picture='uploads/' . $subdomain_ . '/users/'.$this->upload->data('file_name');
	        }
		}
		

		if(isset($new_user)){
			$query=$this->db->query("select * from db_users where username='$new_user' and id<>$q_id")->num_rows();
			if($query>0){ return "This username already exist.";}
		}
		
		
		$query=$this->db->query("select * from db_users where mobile='$mobile' and id<>$q_id")->num_rows();
		if($query>0){ return "This Moble Number already exist.";}
		$query=$this->db->query("select * from db_users where email='$email' and id<>$q_id")->num_rows();
		if($query>0){ return "This Email ID already exist.";}
		
		if(isset($new_user)){
			$this->db->set("username",$new_user);
		}
		if(isset($role_id)){
			$this->db->set("role_id",$role_id);
		}
		if(isset($profile_picture)){
			$this->db->set("profile_picture",$profile_picture);
		}
		$this->db->set("mobile",$mobile);
		$this->db->set("email",$email);

		
		if(!empty($pass) && !empty($confirm) ){
			if($pass == $confirm){
				$this->db->set("password",md5($pass));
			}
		}

		$this->db->where("id",$q_id);
		$q1 = $this->db->update("db_users");

		if ($q1){
				$this->session->set_flashdata('success', 'Success!! User Updated Succssfully!!');
		        return "success";
		}
		else{
		        return "failed";
		}

		

	}
	public function status_update($userid,$status){
		
        $query1="update db_users set status='$status' where id=$userid";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function password_update($currentpass,$newpass,$data){
		
        $query=$this->db->query("select * from db_users where password='$currentpass' and id=".$data['CUR_USERID']);
		if($query->num_rows()==1){

			$query1="update db_users set password='$newpass' where id=".$data['CUR_USERID'];
			if ($this->db->simple_query($query1)){
			        return "success";
			}
			else{
			        return "failed";
			}
		}
		else{
			return "Invalid Current Password!";
			}
	}
	//Get users deatils
	public function get_details($id){
		$data=$this->data;

		//Validate This suppliers already exist or not
		$query=$this->db->query("select * from db_users where id=$id");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['username']=$query->username;
			$data['mobile']=$query->mobile;
			$data['email']=$query->email;
			$data['role_id']=$query->role_id;
			$data['profile_picture']=$query->profile_picture;
			return $data;
		}
	}

	public function delete_user($id){
		if($id==1){
			echo "Restricted! Can't Delete User Admin!!";
			exit();
		}
        $query1="delete from db_users where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
            $this->session->set_flashdata('success', 'Success!! User Deleted Succssfully!');
        }
        else{
            echo "failed";
        }
	}

}
