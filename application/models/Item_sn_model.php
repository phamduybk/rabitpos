<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_sn_model extends CI_Model {

	var $table = 'db_item_sn';
	var $column_order = array('code','description','status'); //set column field database for datatable orderable
	var $column_search = array('code','description','status'); //set column field database for datatable searchable 
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
		
		//Validate This units already exist or not
		$query=$this->db->query("select * from db_item_sn where upper(code)=upper('$code')");
		if($query->num_rows()>0){
			return "failed";
			
		}
		else{
			$query1="insert into db_item_sn(code,description,status,item_id) 
								values('$code','$description',1,'$item_id')";
			if ($this->db->simple_query($query1)){
					//$this->session->set_flashdata('success', 'Success!! mã SN thêm thành công!');
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
		$query=$this->db->query("select * from db_item_sn where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['code']=$query->code;
			$data['item_id']=$query->item_id;
			return $data;
		}
	}
	public function update_unit(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		//Validate This units already exist or not
		$query=$this->db->query("select * from db_item_childs where upper(item_child_name)=upper('$item_child_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This units Name already Exist.";
			
		}
		else{
			$query1="update db_item_childs set item_child_name='$item_child_name',description='$description',price='$price',group_id='$group_id' where id=$q_id";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! Sản phẩm phụ được update thành công');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}
	public function update_status($id,$status){
		
        $query1="update db_item_sn set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function delete_unit($id){

		if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}

        $query1="delete from db_item_sn where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}

}
