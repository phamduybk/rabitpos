<?php 
	/**
	 * Author: Askarali
	 * Date: 13-04-2019
	 */
	class Warehouse extends MY_Controller{
		public function __construct(){
			parent::__construct();
			$this->load_global();
			$this->load->model('warehouse_model','warehouse');
		}
		public function index(){
			$data=$this->data;//My_Controller constructor data accessed here
			$data['page_title']='Warehouse List';
			$this->load->view('warehouse-list',$data);
		}
		public function save_or_update(){
			
			$data=$this->data;//My_Controller constructor data accessed here
			$this->form_validation->set_rules('warehouse_name', 'Warehouse Name', 'required|trim');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post('command')=='save'){
					$result=$this->warehouse->verify_and_save($data);
				}
				else{
					$result=$this->warehouse->verify_and_update($data);
				}
				
				echo $result;
			} 
			else {
				//echo validation_errors();
				echo "Please Fill Compulsory(* marked) Fields.";
			}
		
		}
		public function add(){
			$data=$this->data;//My_Controller constructor data accessed here
			$data['page_title']='Create/Update Warehouse';
			$data['page_title']='Warehouse';
			$this->load->view('warehouse',$data);
		}
		public function status_update(){
			$id=$this->input->post('id');
			$status=$this->input->post('status');
			$result=$this->warehouse->status_update($id,$status);
			return $result;

		}
		public function edit($id){
			$data=$this->warehouse->get_details($id);
			$data['page_title']='Warehouse';
			$this->load->view('warehouse', $data);
		}
		public function delete_warehouse(){
			$id=$this->input->post('id');
			$result=$this->warehouse->delete_warehouse($id);
			echo $result;
		}
	}

	

?>
