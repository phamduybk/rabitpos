<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_types_model extends CI_Model {

	var $table = 'db_paymenttypes';
	var $column_order = array('payment_type','status'); //set column field database for datatable orderable
	var $column_search = array('payment_type','status'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function verify_and_save(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		$subdomain_ = getPathFolder();
		$bank_image='';
		if(!empty($_FILES['bank_image']['name'])){
			$config['upload_path']          = './uploads/' . $subdomain_ . '/users/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

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

	        if ( ! $this->upload->do_upload('bank_image'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                print($error['error']);
	                exit();
	        }
	        else
	        {
	        	   $bank_image='uploads/' . $subdomain_ . '/users/'.$this->upload->data('file_name');
	        }
		}

		
		//Validate This units already exist or not
		$query=$this->db->query("select * from db_paymenttypes where upper(payment_type)=upper('$payment_type_name')");
		if($query->num_rows()>0){
			return "This Payment Type Name Already Exist.";
			
		}
		else{
			$query1="insert into db_paymenttypes(payment_type,status,bank_number,bank_name,bank_infor,bank_image) 
								values('$payment_type_name',1,'$bank_number','$bank_name','$bank_infor','$bank_image')";
			if ($this->db->simple_query($query1)){
					//$this->session->set_flashdata('success', 'Success!! Record Added Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}

	//Get units_details
	public function get_details($id,$data){
		//Validate This units already exist or not
		$query=$this->db->query("select * from db_paymenttypes where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['payment_type_name']=$query->payment_type;
			$data['bank_number']=$query->bank_number;
			$data['bank_name']=$query->bank_name;
			$data['bank_infor']=$query->bank_infor;
			$data['bank_image']=$query->bank_image;
			return $data;
		}
	}
	public function update_payment_type(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));


		$subdomain_ = getPathFolder();
		$bank_image='';
		if(!empty($_FILES['bank_image']['name'])){
			$config['upload_path']          = './uploads/' . $subdomain_ . '/users/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

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

	        if ( ! $this->upload->do_upload('bank_image'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                print($error['error']);
	                exit();
	        }
	        else
	        {
	        	   $bank_image='uploads/' . $subdomain_ . '/users/'.$this->upload->data('file_name');
	        }
		}

		//Validate This units already exist or not
		$query=$this->db->query("select * from db_paymenttypes where upper(payment_type)=upper('$payment_type_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This Payment Type Name Already Exist.";
			
		}
		else{
			$query1="update db_paymenttypes set payment_type='$payment_type_name', bank_number='$bank_number' ,bank_name='$bank_name' ,bank_infor='$bank_infor' ,bank_image='$bank_image' where id=$q_id";
			if ($this->db->simple_query($query1)){
					//$this->session->set_flashdata('success', 'Success!! Record Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}
	public function update_status($id,$status){
		
        $query1="update db_paymenttypes set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function delete_payment_type($id){

		if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}

        $query1="delete from db_paymenttypes where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}


}
