<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryItem_model extends CI_Model
{

	var $table = 'db_category_item';
	var $column_order = array(null, 'category_id', 'category_item_name', 'description', 'status'); //set column field database for datatable orderable
	var $column_search = array('category_id', 'category_item_name', 'description', 'status'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

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


	public function verify_and_save()
	{
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST))));


		// $query = $this->db->query("select * from db_category_item where category_item_name = '$category' and category_id = $category_id ");
		// if ($query->num_rows() > 0) {
		// 	return "This Category Name already Exist.";
		// } else {

		$query1 = "insert into db_category_item(category_id,category_item_name,description,status) 
								values($category_id,'$category','$description',1)";
		if ($this->db->simple_query($query1)) {
			$this->session->set_flashdata('success', 'Success!! New Category Added Successfully!');
			return "success";
		} else {
			return "failed";
		}
		//	}
	}

	//Get category_details
	public function get_details($id, $data)
	{
		//Validate This category already exist or not
		$query = $this->db->query("select * from db_category_item where upper(id)=upper('$id')");
		if ($query->num_rows() == 0) {
			show_404();
			exit;
		} else {
			$query = $query->row();
			$data['q_id'] = $query->id;
			$data['category_id'] = $query->category_id;
			$data['category'] = $query->category_item_name;
			$data['description'] = $query->description;
			return $data;
		}
	}
	public function update_category()
	{
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST))));

		//Validate This category already exist or not
		$query = $this->db->query("select * from db_category_item where upper(category_item_name)=upper('$category') and id<>$q_id");
		if ($query->num_rows() > 0) {
			return "This Category Name already Exist.";
		} else {
			$query1 = "update db_category_item set category_id=$category_id, category_item_name='$category',description='$description' where id=$q_id";
			if ($this->db->simple_query($query1)) {
				$this->session->set_flashdata('success', 'Success!! Category Updated Successfully!');
				return "success";
			} else {
				return "failed";
			}
		}
	}
	public function update_status($id, $status)
	{

		$query1 = "update db_category_item set status='$status' where id=$id";
		if ($this->db->simple_query($query1)) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	public function delete_categories_from_table($ids)
	{

		if (demo_app()) {
			echo "Demo không cho phép xóa";
			return;
		}
		
		$tot = $this->db->query('SELECT COUNT(*) AS tot,b.category_name FROM db_items a,`db_category` b WHERE b.id=a.`category_id` AND a.category_id IN (' . $ids . ') GROUP BY a.category_id');
		if ($tot->num_rows() > 0) {
			foreach ($tot->result() as $res) {
				$category_name[] = $res->category_name;
			}
			$list = implode(",", $category_name);
			echo "Sorry! Can't Delete,<br>Category Name {" . $list . "} already in use in Items!";
			exit();
		} else {
			$query1 = "delete from db_category_item where id in($ids)";
			if ($this->db->simple_query($query1)) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}
