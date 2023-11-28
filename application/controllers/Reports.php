<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('reports_model','reports');
	}
	
		
	//Sales Report 
	public function sales(){
		$this->permission_check('sales_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_report');
		$this->load->view('report-sales', $data);
	}
	public function show_sales_report(){
		echo $this->reports->show_sales_report();
	}

	//Sales Return Report 
	public function sales_return(){
		$this->permission_check('sales_return_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_return_report');
		$this->load->view('report-sales-return', $data);
	}
	public function show_sales_return_report(){
		echo $this->reports->show_sales_return_report();
	}

	//Purchase report
	public function purchase(){
		$this->permission_check('purchase_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('purchase_report');
		$this->load->view('report-purchase', $data);
	}
	public function show_purchase_report(){
		echo $this->reports->show_purchase_report();
	}

	//Purchase Return report
	public function purchase_return(){
		$this->permission_check('purchase_return_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('purchase_return_report');
		$this->load->view('report-purchase-return', $data);
	}
	public function show_purchase_return_report(){
		echo $this->reports->show_purchase_return_report();
	}

	//Expense report
	public function expense(){
		$this->permission_check('expense_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expense_report');
		$this->load->view('report-expense', $data);
	}
	public function show_expense_report(){
		echo $this->reports->show_expense_report();
	}
	//Profit report
	public function profit_loss(){
		$this->permission_check('profit_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('profit_and_loss_report');
		$this->load->view('report-profit-loss', $data);
	}
	public function get_profit_loss_report(){
		echo json_encode($this->reports->get_profit_loss_report());
	}
	public function get_profit_by_item(){
		echo $this->reports->get_profit_by_item();
	}
	public function get_profit_by_invoice(){
		echo $this->reports->get_profit_by_invoice();
	}

	//Summary report
	public function stock(){
		$this->permission_check('stock_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('stock_report');
		$this->load->view('report-stock', $data);
	}

	public function get_stock_report(){
		$data = array(
			'item_wise_report' => $this->show_stock_report(),
			'brand_wise_stock' => $this->brand_wise_stock(),
			'category_wise_stock' => $this->category_wise_stock(),
		);
		echo json_encode($data); 
	}
	/*Stock Report*/
	public function show_stock_report(){
		return $this->reports->show_stock_report();
	}
	public function brand_wise_stock(){
		return $this->reports->brand_wise_stock();
	}
	public function category_wise_stock(){
		return $this->reports->category_wise_stock();
	}
	//Item Sales Report 
	public function item_sales(){
		$this->permission_check('item_sales_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('item_sales_report');
		$this->load->view('report-sales-item', $data);
	}
	public function show_item_sales_report(){
		echo $this->reports->show_item_sales_report();
	}
	//Item purchase Report 
	public function item_purchase(){
		$this->permission_check('item_purchase_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('item_purchase_report');
		$this->load->view('report-purchase-item', $data);
	}
	public function show_item_purchase_report(){
		echo $this->reports->show_item_purchase_report();
	}
	//Purchase Payments report
	public function purchase_payments(){
		$this->permission_check('purchase_payments_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('purchase_payments_report');
		$this->load->view('report-purchase-payments', $data);
	}
	public function show_purchase_payments_report(){
		echo $this->reports->show_purchase_payments_report();
	}
	public function supplier_payments_report(){
		echo $this->reports->supplier_payments_report();
	}

	//Sales Payments report
	public function sales_payments(){
		$this->permission_check('sales_payments_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('sales_payments_report');
		$this->load->view('report-sales-payments', $data);
	}
	public function show_sales_payments_report(){
		echo $this->reports->show_sales_payments_report();
	}
	public function customer_payments_report(){
		echo $this->reports->customer_payments_report();
	}
	//Expired Items Report 
	public function expired_items(){
		$this->permission_check('expired_items_report');
		$data=$this->data;
		$data['page_title']=$this->lang->line('expired_items_report');
		$this->load->view('report-expired-items', $data);
	}
	public function show_expired_items_report(){
		echo $this->reports->show_expired_items_report();
	}

	
}

