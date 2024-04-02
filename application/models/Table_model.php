<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{

	var $table = 'db_table';
	var $column_order = array(null, 'table_type_id', 'table_name', 'description', 'status'); //set column field database for datatable orderable
	var $column_search = array('table_type_id', 'table_name', 'description', 'status'); //set column field database for datatable searchable 
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

		$query1 = "insert into db_table(category_id,category_item_name,description,status) 
								values($category_id,'$category','$description',1)";
		if ($this->db->simple_query($query1)) {
		//	$this->session->set_flashdata('success', 'Success!! New Category Added Successfully!');
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
		$query = $this->db->query("select * from db_table where upper(id)=upper('$id')");
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


	public function get_data_details()
	{


		$table = "";

		extract($_POST);

		$this->db->select("a.id,a.table_name,a.status,b.table_type_name");
		$this->db->from("db_table a");
		$this->db->join("db_table_type b", "b.id=a.table_type_id", "left");

		/* if (!empty($table_type_id)) {
			$this->db->where("a.table_type_id", $table_type_id);
		} */


		if (!empty($table_kind_id)) {
			if ($table_kind_id == 2) {
				$this->db->where("a.status", 0);
			} else if ($table_kind_id == 3) {
				$this->db->where("a.status", 1);
			}
		}

		$this->db->limit(30);

		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			show_404();
			exit;
		}

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $res2) {
				$table_id = $res2->id;
				$table_name = $res2->table_name;
				$status = $res2->status;
				$table_type_name = $res2->table_type_name;
				if ($status == 1) {
					$img_src = base_url('theme/images/table_on.png');

				} else {
					$img_src = base_url('theme/images/table_off.png');
				}



				$table .= '<div class="col-md-3 col-xs-6 " id="' . $table_id . '"  data-toggle="tooltip" title="' . $table_name . '" style="padding-left:5px;padding-right:5px;">
	               <div class="box box-default item_box" id="table_' . $table_id . '" onclick="chooseTable(' . $table_id . ')"

				   data-item-room="' . $table_type_name . '"
				   data-item-id="' . $table_id . '"
				   data-item-name="' . $table_name . '"
				   data-item-status="' . $status . '"
				  
	                style="max-height: 100px;min-height: 100px;cursor: pointer;">
	       	           
	            	<center>
					<img class="img-responsive item_image" src="' . $img_src . '" alt="Item picture">
	              </center>
				  <center>
				  <lable class="text-center " style="font-weight: bold;font-family: sans-serif;" id="item_' . $table_id . '">' . substr($table_name, 0, 35) . '</label><br>
				  </center>
	            </div>
	          </div>
	        </div>';

			} //for end

			return $table;
		} //if num_rows() end

	}

	public function update_category()
	{
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST))));

		//Validate This category already exist or not
		$query = $this->db->query("select * from db_table_type where upper(table_type_name)=upper('$category') and id<>$q_id");
		if ($query->num_rows() > 0) {
			return "This Table Type Name already Exist.";
		} else {
			$query1 = "update db_table_type set table_type_name='$category',description='$description' where id=$q_id";
			if ($this->db->simple_query($query1)) {
			//	$this->session->set_flashdata('success', 'Success!! Category Updated Successfully!');
				return "success";
			} else {
				return "failed";
			}
		}
	}
	public function update_status($id, $status)
	{

		$query1 = "update db_table set status='$status' where id=$id";
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

		$tot = $this->db->query('SELECT COUNT(*) AS tot,b.table_name FROM db_holds a,`db_table` b WHERE b.id=a.`table_id` AND a.table_id IN (' . $ids . ') GROUP BY a.table_id');
		if ($tot->num_rows() > 0) {
			foreach ($tot->result() as $res) {
				$category_name[] = $res->category_name;
			}
			$list = implode(",", $category_name);
			echo "Sorry! Can't Delete,<br>Table Name {" . $list . "} already in use in Items!";
			exit();
		} else {
			$query1 = "delete from db_table where id in($ids)";
			if ($this->db->simple_query($query1)) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}
