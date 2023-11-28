<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_model extends CI_Model {

	var $table = 'db_tax';
	var $column_order = array('id','tax_name','tax','status','undelete_bit'); //set column field database for datatable orderable
	var $column_search = array('id','tax_name','tax','status','undelete_bit'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$this->db->where('group_bit is null');
		
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

		//Validate This tax already exist or not
		$query=$this->db->query("select * from db_tax where upper(tax_name)=upper('$tax_name')");
		if($query->num_rows()>0){
			return "Tax Name Already Exist.";
			
		}
		else{
			$query1="insert into db_tax(tax_name,tax,status) values('$tax_name','$tax',1)";

			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! New tax Percentage Added Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}

	//Get tax_details
	public function get_details($id){
		$data=$this->data;
		extract($data);
		extract($_POST);

		//Validate This tax already exist or not
		$query=$this->db->query("select * from db_tax where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['tax_name']=$query->tax_name;
			$data['tax']=$query->tax;
			
			return $data;
		}
	}
	public function update_tax(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		
		//Validate This tax already exist or not
		$query=$this->db->query("select * from db_tax where upper(tax_name)=upper('$tax_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "Tax Name Already Exist.";
			
		}
		else{
			$undelete_bit = $this->db->select('*')->where("id",$q_id)->get("db_tax")->row()->undelete_bit;
			if($undelete_bit==1){
				echo "Sorry! Can't Update Status,<br><b>This Record is Restricted!</b>";exit();
			}

			$query1="update db_tax set tax_name='$tax_name', tax='$tax' where id=$q_id";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! tax Percentage Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}
	public function update_status($id,$status){
		$undelete_bit = $this->db->select('*')->where("id",$id)->get("db_tax")->row()->undelete_bit;
		if($undelete_bit==1){
			echo "Sorry! Can't Update Status,<br><b>This Record is Restricted!</b>";exit();
		}
        $query1="update db_tax set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function delete_tax_from_table($ids){	


		$tot=$this->db->query('SELECT COUNT(*) AS tot,b.tax_name FROM db_items a,`db_tax` b WHERE b.id=a.`tax_id` AND a.tax_id IN ('.$ids.') GROUP BY a.tax_id');
		if($tot->num_rows() > 0){
			foreach($tot->result() as $res){
				$tax_name[] =$res->tax_name;
			}
			$list=implode (",",$tax_name);
			echo "Sorry! Can't Delete,<br>Tax Name {".$list."} already in use in Items List!";
			exit();
		}
		else{
			$query1="delete from db_tax where id in($ids) and undelete_bit=0";
	        if ($this->db->simple_query($query1)){
	            echo "success";
	        }
	        else{
	            echo "failed";
	        }
		}
	}
	
}
