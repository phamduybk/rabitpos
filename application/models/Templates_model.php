<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates_model extends CI_Model {

	var $table = 'db_smstemplates';
	var $column_order = array('template_name','content','status'); //set column field database for datatable orderable
	var $column_search = array('template_name','content','status'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 

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
		
		//Validate This category already exist or not
		$query=$this->db->query("select * from db_smstemplates where upper(template_name)=upper('$template_name')");
		if($query->num_rows()>0){
			return "This Template Name already Exist.";
			
		}
		else{
			
			$query1="insert into db_smstemplates(template_name,content,status) 
								values('$template_name','$content',1)";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! New Template Added Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}

	//Get category_details
	public function get_details($id,$data){
		//Validate This category already exist or not
		$query=$this->db->query("select * from db_smstemplates where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['template_name']=$query->template_name;
			$data['content']=$query->content;
			$data['undelete_bit']=$query->undelete_bit;
			$data['variables']=$query->variables;
			return $data;
		}
	}
	public function update_template(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));

		//Validate This category already exist or not
		$query=$this->db->query("select * from db_smstemplates where upper(template_name)=upper('$template_name') and id<>$q_id");
		if($query->num_rows()>0){
			return "This Category Name already Exist.";
			
		}
		else{
			$query1="update db_smstemplates set template_name='$template_name',content='$content' where id=$q_id";
			if ($this->db->simple_query($query1)){
					$this->session->set_flashdata('success', 'Success!! Template Updated Successfully!');
			        return "success";
			}
			else{
			        return "failed";
			}
		}
	}
	public function update_status($id,$status){
		
        $query1="update db_smstemplates set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	public function delete_template($id){
		//FIND THIS CATEGORY ALREADY USED IN ITEMS OR NOT
		$tot_count=$this->db->query("select count(*) as tot_count from db_smstemplates where id=$id and undelete_bit=1")->row()->tot_count;
		if($tot_count>0){
			echo "Sorry! Can't Delete.\nThis Template Restricted!";exit();
		}
        $query1="delete from db_smstemplates where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
}
