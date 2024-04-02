<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kitchen_model extends CI_Model
{

	var $table = 'db_kitchen';
	var $column_order = array(null, 'kitchen_name', 'description', 'status'); //set column field database for datatable orderable
	var $column_search = array('kitchen_name', 'description', 'status'); //set column field database for datatable searchable 
	var $order = array('id' => 'esc'); // default order 

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
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

	//Get currency_details
	public function get_details($id, $data)
	{
		//Validate This currency already exist or not
		$query = $this->db->query("select * from db_kitchen where upper(id)=upper('$id')");
		if ($query->num_rows() == 0) {
			show_404();
			exit;
		} else {
			$query = $query->row();
			$data['q_id'] = $query->id;
			$data['kitchen_name'] = $query->kitchen_name;
			$data['description'] = $query->description;
			$data['status'] = $query->status;
			return $data;
		}
	}
	
	public function update_status($id, $status)
	{
		$query1 = "update db_kitchen set status='$status' where id=$id";
		if ($this->db->simple_query($query1)) {
			echo "success";
		} else {
			echo "failed";
		}
	}

	public function update_step($id, $step)
	{
		$query1 = "update db_holditems set step='$step' where id=$id";
		if ($this->db->simple_query($query1)) {
			echo "success";
		} else {
			echo "failed";
		}
	}

}
