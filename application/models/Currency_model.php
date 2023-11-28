<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends CI_Model {

	var $table = 'db_currency';
	var $column_order = array(null, 'currency_code','currency_name','currency','status'); //set column field database for datatable orderable
	var $column_search = array('currency_code','currency_name','currency','status'); //set column field database for datatable searchable 
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
		
		//Validate This currency already exist or not
		$query=$this->db->query("select * from db_currency where upper(currency_name)=upper('$currency_name')");
		if($query->num_rows()>0){
			return "This Currency Name or Symbol Already Exist!";
			
		}
		else{
			$query1="insert into db_currency(currency_code,currency_name,currency,status) 
								values('$currency_code','$currency_name','$currency',1)";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! New Currency Added Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}

	//Get currency_details
	public function get_details($id,$data){
		//Validate This currency already exist or not
		$query=$this->db->query("select * from db_currency where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['currency_code']=$query->currency_code;
			$data['currency_name']=$query->currency_name;
			$data['currency']=$query->currency;
			return $data;
		}
	}
	public function update_currency(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		//Validate This currency already exist or not
		$query=$this->db->query("select * from db_currency where upper(currency_name)=upper('$currency_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This Currency Name Already Exist!";
		}
		
		else{
			$query1="update db_currency set currency_name='$currency_name',currency_code='$currency_code',currency='$currency' where id=$q_id";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! Currency Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}
	public function update_status($id,$status){
		
        $query1="update db_currency set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function delete_currencies_from_table($ids){
			$query1="delete from db_currency where id in($ids)";
	        if ($this->db->simple_query($query1)){
	            echo "success";
	        }
	        else{
	            echo "failed";
	        }	
	}


}
