<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_group_model extends CI_Model {

	var $table = 'db_tax';
	var $column_order = array('id','tax_name','tax','subtax_ids','status'); //set column field database for datatable orderable
	var $column_search = array('id','tax_name','tax','subtax_ids','status'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$this->db->where('group_bit',1);

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

		$subtax_ids='';
		if(isset($_POST["subtax_ids"])){ 
            foreach ($_POST['subtax_ids'] as $ids)
            if(!empty($subtax_ids)){
            	$subtax_ids.=",".$ids;
            }
            else{
            	$subtax_ids=$ids;
            }
        } 
        if(empty($subtax_ids)){
        	return "Please Select Sub Taxes";
        }

		//Validate This tax already exist or not
		$query=$this->db->query("select * from db_tax where tax_name='$tax_name'");
		if($query->num_rows()>0){
			return "Tax Name Already Exist!";
			
		}
		else{
			$query1="insert into db_tax(tax_name,tax,group_bit,subtax_ids,status) values('$tax_name','$tax',1,'$subtax_ids',1)";

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
			$data['subtax_ids']=$query->subtax_ids;
			
			return $data;
		}
	}
	public function update_tax(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		
		$subtax_ids='';
		if(isset($_POST["subtax_ids"])){ 
            foreach ($_POST['subtax_ids'] as $ids)
            if(!empty($subtax_ids)){
            	$subtax_ids.=",".$ids;
            }
            else{
            	$subtax_ids=$ids;
            }
        } 
        if(empty($subtax_ids)){
        	return "Please Select Sub Taxes";
        }

		//Validate This tax already exist or not
		$query=$this->db->query("select * from db_tax where upper(tax_name)=upper('$tax_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "Tax Name Already Exist.";
			
		}
		else{
			
			$query1="update db_tax set tax_name='$tax_name', tax='$tax', subtax_ids='$subtax_ids' where id=$q_id";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! tax Percentage Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}

	
}
