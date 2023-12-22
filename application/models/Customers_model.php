<?php
 defined("\102\x41\123\x45\120\101\124\110") or die("\x4e\157\x20\144\151\x72\x65\143\x74\x20\163\x63\162\151\x70\x74\40\x61\143\143\145\x73\x73\x20\x61\154\154\x6f\167\x65\144"); class Customers_model extends CI_Model { var $table = "\x64\142\137\x63\x75\x73\164\x6f\x6d\x65\162\x73\40\141\x73\x20\x61"; var $column_order = array("\141\56\143\x75\163\164\x6f\x6d\x65\x72\137\143\x6f\144\145", "\141\x2e\151\144", "\x61\56\x63\165\163\164\x6f\x6d\145\162\137\156\141\155\x65", "\x61\56\155\x6f\x62\151\154\145", "\x61\56\x74\x79\x70\145\x5f\151\x64", "\x61\x2e\x73\164\x61\164\x75\x73", "\141\56\x73\141\x6c\x65\163\x5f\144\x75\145", "\141\x2e\163\x61\x6c\145\163\137\162\x65\164\x75\162\156\x5f\144\x75\145"); var $column_search = array("\141\56\x63\165\163\x74\x6f\155\x65\x72\137\x63\x6f\x64\x65", "\x61\56\151\144", "\141\56\143\x75\x73\164\157\x6d\x65\162\x5f\156\x61\x6d\x65", "\x61\56\155\x6f\142\151\154\145", "\x61\x2e\164\171\x70\145\137\x69\x64", "\141\x2e\x73\x74\141\164\165\163", "\141\x2e\x73\x61\154\145\163\x5f\144\x75\145", "\141\x2e\x73\141\x6c\x65\x73\137\x72\145\x74\x75\162\156\137\144\x75\x65"); var $order = array("\141\56\x69\x64" => "\x64\145\163\x63"); public function __construct() { parent::__construct(); } private function _get_datatables_query() { $this->db->select($this->column_order); $this->db->from($this->table); $i = 0; foreach ($this->column_search as $item) { if ($_POST["\163\145\141\x72\143\150"]["\x76\x61\x6c\x75\x65"]) { if ($i === 0) { $this->db->group_start(); $this->db->like($item, $_POST["\x73\145\x61\162\x63\x68"]["\x76\x61\x6c\x75\145"]); } else { $this->db->or_like($item, $_POST["\163\145\x61\x72\x63\x68"]["\x76\x61\154\165\145"]); } if (count($this->column_search) - 1 == $i) { $this->db->group_end(); } } $i++; } if (isset($_POST["\157\162\144\x65\x72"])) { $this->db->order_by($this->column_order[$_POST["\x6f\162\x64\145\162"]["\60"]["\143\157\154\165\155\156"]], $_POST["\x6f\162\144\x65\162"]["\x30"]["\x64\151\162"]); } else { if (isset($this->order)) { $order = $this->order; $this->db->order_by(key($order), $order[key($order)]); } } } function get_datatables() { $this->_get_datatables_query(); if ($_POST["\x6c\x65\x6e\147\164\150"] != -1) { $this->db->limit($_POST["\x6c\145\x6e\x67\x74\150"], $_POST["\x73\x74\141\x72\164"]); } $query = $this->db->get(); return $query->result(); } function count_filtered() { $this->_get_datatables_query(); $query = $this->db->get(); return $query->num_rows(); } public function count_all() { $this->db->from($this->table); return $this->db->count_all_results(); } public function verify_and_save() { extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST)))); $state = !empty($state) ? $state : "\116\x55\x4c\x4c"; $query2 = $this->db->query("\163\145\154\145\143\x74\40\x2a\40\x66\162\157\155\40\x64\142\x5f\x63\x75\163\x74\x6f\155\145\162\x73\40\x77\x68\145\x72\145\x20\155\157\142\151\x6c\145\x3d\x27{$mobile}\47"); if ($query2->num_rows() > 0 && !empty($mobile)) { return "\123\x6f\162\x72\x79\41\x54\150\x69\163\40\115\157\142\x69\154\x65\40\x4e\x75\155\x62\x65\x72\40\x61\154\x72\145\141\144\x79\40\105\170\151\x73\x74\x2e"; } $qs5 = "\x73\x65\154\x65\143\x74\40\x63\x75\163\164\157\x6d\x65\162\137\x69\x6e\x69\x74\40\146\x72\x6f\155\x20\x64\x62\137\x63\157\x6d\x70\141\156\x79"; $q5 = $this->db->query($qs5); $customer_init = $q5->row()->customer_init; $qs4 = "\x73\x65\154\145\x63\x74\x20\x63\x6f\x61\x6c\x65\163\143\x65\x28\x6d\141\170\50\151\144\x29\54\x30\51\x2b\x31\x20\141\163\40\x6d\x61\x78\151\x64\x20\146\162\x6f\155\40\144\142\137\x63\165\163\164\x6f\155\145\162\163"; $q1 = $this->db->query($qs4); $maxid = $q1->row()->maxid; $customer_code = $customer_init . str_pad($maxid, 4, "\60", STR_PAD_LEFT); $query1 = "\x69\156\163\145\162\164\40\x69\x6e\x74\157\x20\x64\x62\137\143\165\x73\x74\157\155\145\162\163\x28\x63\x75\x73\x74\x6f\155\145\162\x5f\143\x6f\x64\x65\x2c\x63\x75\x73\164\x6f\x6d\145\x72\137\156\141\155\145\x2c\155\x6f\142\151\x6c\145\54\x70\x68\x6f\x6e\x65\x2c\145\x6d\x61\x69\x6c\x2c\xa\11\11\11\11\11\x9\11\11\x9\x9\x9\x63\157\165\156\164\x72\171\x5f\151\x64\x2c\x73\164\x61\x74\x65\137\151\144\54\143\151\164\x79\54\x70\x6f\x73\x74\143\157\144\x65\54\141\x64\144\162\x65\163\163\54\x6f\160\x65\156\151\156\x67\x5f\142\x61\154\141\156\143\145\54\12\11\11\11\11\11\11\x9\x9\x9\x9\x9\163\171\x73\x74\145\155\x5f\x69\x70\54\x73\171\163\164\145\155\x5f\156\141\155\x65\x2c\xa\11\11\x9\x9\11\11\11\11\x9\11\11\x63\162\x65\141\164\x65\144\137\144\x61\164\x65\54\143\x72\145\141\x74\145\144\x5f\x74\x69\x6d\x65\54\x63\162\145\x61\164\145\144\x5f\x62\x79\x2c\x73\164\141\164\165\x73\x2c\147\163\x74\x69\x6e\54\x74\x61\x78\x5f\156\x75\x6d\x62\145\162\x2c\x74\x79\160\x65\137\x69\144\x29\xa\x9\x9\x9\11\11\x9\11\x9\x9\11\11\x76\x61\154\165\145\x73\x28\47{$customer_code}\x27\x2c\x27{$customer_name}\x27\x2c\x27{$mobile}\47\54\x27{$phone}\x27\x2c\x27{$email}\47\x2c\xa\x9\x9\11\11\x9\x9\x9\x9\11\11\11\47{$country}\x27\54{$state}\54\47{$city}\x27\x2c\x27{$postcode}\x27\x2c\47{$address}\47\54\47{$opening_balance}\47\54\xa\11\11\11\11\11\x9\11\11\11\x9\11\x27{$SYSTEM_IP}\x27\54\x27{$SYSTEM_NAME}\x27\54\xa\11\x9\x9\x9\x9\11\11\x9\x9\11\x9\47{$CUR_DATE}\x27\54\x27{$CUR_TIME}\47\x2c\47{$CUR_USERNAME}\x27\54\x31\x2c\x27{$gstin}\47\54\x27{$tax_number}\x27\54\47{$type_id}\x27\51"; if ($this->db->simple_query($query1)) { $this->session->set_flashdata("\163\165\x63\143\x65\x73\x73", "\x53\165\143\x63\145\x73\163\41\41\40\116\145\x77\40\x43\165\x73\x74\x6f\155\145\162\x20\x41\x64\144\x65\x64\40\x53\165\x63\x63\145\x73\163\146\165\154\x6c\x79\x21"); return "\163\165\x63\143\x65\163\163"; } else { return "\146\x61\151\x6c\x65\144"; } } public function get_details($id, $data) { $query = $this->db->query("\163\145\x6c\145\x63\164\x20\x2a\x20\x66\162\x6f\x6d\40\x64\142\137\x63\165\x73\164\157\x6d\145\162\x73\x20\x77\x68\x65\162\x65\x20\x75\x70\160\145\x72\50\151\144\x29\75\165\160\x70\x65\x72\x28\47{$id}\47\51"); if ($query->num_rows() == 0) { show_404(); die; } else { $query = $query->row(); $data["\x71\x5f\151\144"] = $query->id; $data["\143\x75\163\x74\157\x6d\x65\162\137\156\141\x6d\145"] = $query->customer_name; $data["\x6d\157\142\x69\154\145"] = $query->mobile; $data["\160\x68\157\x6e\145"] = $query->phone; $data["\145\x6d\141\x69\154"] = $query->email; $data["\x63\157\165\156\164\x72\171\x5f\x69\144"] = $query->country_id; $data["\x73\x74\x61\x74\145\x5f\x69\144"] = $query->state_id; $data["\143\x69\x74\x79"] = $query->city; $data["\x70\x6f\163\x74\x63\x6f\x64\145"] = $query->postcode; $data["\141\144\x64\162\145\x73\163"] = $query->address; $data["\147\x73\x74\151\x6e"] = $query->gstin; $data["\164\x61\170\x5f\x6e\x75\155\142\x65\162"] = $query->tax_number; $data["\x6f\x70\x65\x6e\x69\x6e\147\137\142\141\154\x61\x6e\x63\x65"] = $query->opening_balance; $data["\x74\171\160\x65\137\x69\144"] = $query->type_id; return $data; } } public function update_customers() { extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST)))); if ($q_id == 1) { echo "\123\157\x72\162\171\x21\40\124\150\x69\x73\40\x52\x65\143\x6f\x72\144\40\x52\145\163\164\162\x69\x63\x74\x65\x64\41\x20\x43\x61\x6e\47\x74\40\125\x70\144\x61\164\145"; die; } $state = !empty($state) ? $state : "\116\125\114\114"; $query1 = "\165\160\x64\141\164\x65\x20\x64\x62\x5f\x63\165\163\x74\x6f\x6d\x65\162\163\x20\x73\x65\164\40\143\x75\163\x74\157\155\x65\162\137\156\141\x6d\145\x3d\47{$customer_name}\47\x2c\155\x6f\142\151\154\145\x3d\47{$mobile}\x27\x2c\160\150\157\x6e\145\x3d\47{$phone}\47\54\xa\11\x9\x9\11\11\11\11\145\155\x61\x69\154\75\47{$email}\x27\54\x63\157\x75\156\164\162\x79\137\x69\x64\x3d\47{$country}\x27\x2c\x73\164\x61\164\x65\137\151\x64\75{$state}\x2c\x63\x69\164\171\x3d\47{$city}\47\x2c\12\x9\11\x9\11\x9\x9\11\157\160\x65\156\x69\156\x67\x5f\x62\141\154\141\156\x63\145\75\47{$opening_balance}\x27\54\xa\x9\x9\x9\x9\x9\x9\11\160\x6f\x73\164\143\x6f\x64\145\75\47{$postcode}\47\54\141\144\144\162\x65\163\x73\x3d\x27{$address}\x27\54\147\163\164\x69\156\75\x27{$gstin}\x27\54\x74\141\170\137\156\x75\155\142\145\162\x3d\x27{$tax_number}\x27\x2c\x74\x79\160\x65\137\x69\144\x3d\47{$type_id}\47\12\x9\x9\11\11\x9\11\x9\40\x77\150\145\162\145\40\x69\x64\x3d{$q_id}"; if ($this->db->simple_query($query1)) { $this->session->set_flashdata("\x73\165\x63\143\x65\163\x73", "\123\165\x63\143\145\163\163\41\x21\40\103\165\x73\x74\157\155\x65\162\x20\125\160\x64\x61\x74\145\144\x20\x53\165\x63\143\145\x73\x73\x66\165\154\x6c\x79\41"); return "\163\165\x63\143\x65\x73\x73"; } else { return "\x66\141\x69\x6c\x65\144"; } } public function update_status($id, $status) { if ($id == 1) { echo "\x53\x6f\x72\162\171\41\x20\124\150\151\163\x20\x52\x65\143\157\x72\144\40\x52\145\x73\x74\162\x69\x63\164\145\144\41\40\x43\141\x6e\x27\x74\40\125\160\144\x61\164\145\40\123\x74\x61\164\165\163"; die; } $query1 = "\x75\x70\144\141\x74\x65\40\144\x62\x5f\x63\165\x73\x74\x6f\155\x65\x72\163\40\x73\x65\x74\40\163\x74\141\x74\x75\x73\75\x27{$status}\47\40\x77\x68\x65\x72\145\40\x69\x64\x3d{$id}"; if ($this->db->simple_query($query1)) { echo "\163\x75\143\143\x65\x73\x73"; } else { echo "\146\x61\151\x6c\145\144"; } } public function delete_customers_from_table($ids) { if (demo_app()) { echo "\104\145\155\x6f\40\x6b\150\xc3\264\x6e\x67\x20\x63\x68\x6f\40\160\150\xc3\xa9\160\x20\170\xc3\263\141"; return; } if ($ids == 1) { echo "\x53\157\x72\x72\171\x21\x20\x54\x68\151\x73\40\x52\x65\x63\x6f\162\144\x20\122\x65\x73\x74\162\x69\143\164\x65\144\41\40\103\141\x6e\x27\x74\40\104\x65\154\145\164\145"; die; } $q1 = $this->db->query("\x73\x65\154\x65\x63\164\40\x63\x6f\x75\156\x74\50\52\x29\40\x61\163\40\x74\157\164\x5f\145\x6e\164\x72\x79\163\40\146\x72\x6f\x6d\x20\144\142\137\x73\x61\154\x65\163\40\x77\x68\145\x72\x65\40\143\x75\x73\164\157\155\145\162\137\x69\144\x20\151\x6e\40\50{$ids}\x29"); if ($q1->row()->tot_entrys > 0) { echo "\x53\141\154\145\x73\40\x49\156\x76\157\x69\143\145\x73\x20\105\170\x69\x73\x74\x20\x6f\x66\40\103\165\x73\x74\157\x6d\x65\162\x21\40\120\154\x65\141\x73\145\x20\x44\145\x6c\x65\x74\145\x20\x53\x61\154\x65\x73\40\111\x6e\166\x6f\151\143\145\163\x21"; die; } $q1 = $this->db->query("\x64\145\x6c\145\x74\x65\x20\146\162\x6f\x6d\x20\144\142\137\143\157\142\160\x61\171\155\x65\156\x74\163\40\167\x68\145\162\x65\40\143\165\x73\x74\x6f\155\x65\162\137\151\144\x3c\76\x31\x20\141\x6e\x64\40\x63\x75\163\x74\157\x6d\x65\x72\137\x69\144\x20\151\156\40\50{$ids}\51"); $query1 = "\x64\145\154\x65\x74\x65\40\x66\x72\x6f\155\40\x64\x62\137\x63\165\163\164\157\155\145\x72\x73\40\x77\150\x65\x72\x65\x20\151\x64\40\151\156\x28{$ids}\x29\40\141\156\x64\x20\x69\x64\74\76\61"; if ($this->db->simple_query($query1)) { echo "\x73\165\x63\x63\x65\163\163"; } else { echo "\x66\x61\x69\x6c\x65\144"; } } public function show_pay_now_modal($customer_id) { $CI =& get_instance(); $sales_id = ''; $q2 = $this->db->query("\x73\145\x6c\x65\143\164\40\x2a\x20\146\x72\x6f\x6d\x20\x64\142\x5f\143\165\x73\x74\157\155\145\162\163\x20\x77\150\145\162\x65\40\151\144\75{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $customer_sales_due = $res2->sales_due; $sales_date = ''; $reference_no = ''; $sales_code = ''; $sales_note = ''; $grand_total = 0; $paid_amount = 0; if (!empty($customer_country)) { $customer_country = $this->db->query("\163\x65\154\145\x63\x74\x20\x63\157\165\x6e\164\x72\171\40\x66\162\x6f\x6d\40\x64\x62\x5f\x63\x6f\x75\156\164\x72\171\x20\167\150\145\162\x65\40\151\x64\75\x27{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\163\x65\154\x65\143\164\40\163\x74\141\x74\x65\x20\x66\x72\x6f\155\40\x64\142\x5f\163\164\x61\x74\145\163\40\167\x68\x65\x72\x65\40\x69\144\x3d\47{$customer_state}\47")->row()->state; } $sum_of_ob_paid = $this->db->query("\163\145\x6c\x65\x63\x74\x20\x63\x6f\141\154\145\163\143\145\50\163\x75\x6d\x28\160\x61\x79\x6d\145\156\164\51\54\60\x29\x20\x73\165\x6d\137\157\146\137\157\x62\137\x70\141\151\x64\x20\x66\x72\157\x6d\40\x64\x62\137\x63\x6f\x62\160\x61\x79\x6d\x65\156\x74\x73\x20\x77\150\145\x72\145\40\x63\165\163\164\x6f\x6d\x65\162\x5f\x69\144\75{$customer_id}")->row()->sum_of_ob_paid; $customer_opening_balance_due = $customer_opening_balance - $sum_of_ob_paid; $q6 = $this->db->query("\163\x65\x6c\x65\143\x74\x20\x63\x6f\x61\x6c\145\x73\x63\x65\50\x73\x75\155\x28\x67\162\x61\x6e\144\137\164\157\164\x61\154\51\54\60\x29\40\141\x73\40\x74\157\x74\x61\x6c\x5f\163\x61\154\145\163\137\141\155\x6f\165\156\164\x2c\x63\157\141\x6c\x65\x73\x63\145\x28\163\x75\155\50\x70\141\151\144\137\141\x6d\157\165\156\x74\x29\54\x30\51\40\x61\x73\40\164\157\164\x61\154\x5f\160\x61\x69\x64\x5f\141\x6d\157\x75\x6e\x74\x20\x66\x72\157\155\x20\144\x62\x5f\x73\x61\154\x65\163\40\167\150\145\162\x65\40\x63\165\163\x74\157\155\x65\162\x5f\151\144\75{$customer_id}"); $total_sales_amount = $q6->row()->total_sales_amount; $total_paid_amount = $q6->row()->total_paid_amount; $due_amount = number_format($customer_sales_due + $customer_opening_balance_due, 2, "\x2e", ''); ?>
		<div class="modal fade" id="pay_now">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Pay Due Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-12 invoice-col">
			          <i><?php  echo $this->lang->line("\143\x75\163\x74\157\155\x65\162\137\144\145\x74\141\x69\154\163"); ?>
</i>
			          <address>
			            <strong><?php  echo $customer_name; ?>
</strong><br>
			            <?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\155\157\142\151\154\x65") . "\x3a\x20" . $customer_mobile . "\74\x62\162\76" : ''; ?>
			            <?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\160\x68\157\x6e\x65") . "\x3a\40" . $customer_phone . "\x3c\142\162\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_email)) ? $this->lang->line("\145\155\x61\x69\154") . "\72\40" . $customer_email . "\74\x62\x72\76" : ''; ?>
			            <?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\147\x73\x74\137\156\165\x6d\142\x65\x72") . "\x3a\x20" . $customer_gst_no . "\x3c\x62\162\76" : ''; ?>
			            <?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\164\x61\x78\x5f\156\x75\x6d\x62\145\162") . "\72\x20" . $customer_tax_number . "\x3c\142\162\76" : ''; ?>
			            
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-12 invoice-col">

			        	<table class="table table-sm table-bordered bg-info" width="100%">
			        		<tr>
			        			<td class="text-right"><?php  echo $this->lang->line("\x6f\x70\145\156\151\x6e\x67\137\x62\x61\154\x61\156\x63\145"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($customer_opening_balance); ?>
</td>
			        			<td class="text-right"><?php  echo $this->lang->line("\x74\157\164\x61\x6c\137\x73\141\x6c\x65\x73\137\x61\x6d\x6f\165\156\x74"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($total_sales_amount); ?>
</td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?php  echo $this->lang->line("\157\160\x65\156\151\x6e\x67\x5f\142\x61\x6c\141\x6e\x63\145\x5f\x64\165\145"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($customer_opening_balance_due); ?>
</td>
			        			<td class="text-right"><?php  echo $this->lang->line("\160\141\151\144\137\141\155\x6f\x75\x6e\164"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($total_paid_amount); ?>
</td>
			        		</tr>
			        		<tr>
			        			<td colspan="2"></td>
			        			<td class="text-right"><?php  echo $this->lang->line("\x73\141\x6c\x65\163\x5f\x64\x75\x65"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($customer_sales_due); ?>
</td>
			        		</tr>
			        	</table>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		        <div>
		        <input type="hidden" name="payment_row_count" id='payment_row_count' value="1">
		        <div class="col-md-12  payments_div">
		          <div class="box box-solid bg-gray">
		            <div class="box-body">
		              <div class="row">
		         		<div class="col-md-4">
		                  <div class="">
		                  <label for="payment_date">Date</label>
		                    <div class="input-group date">
			                      <div class="input-group-addon">
			                      <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control pull-right datepicker" value="<?php  echo show_date(date("\x64\55\x6d\55\x59")); ?>
" id="payment_date" name="payment_date" readonly>
			                    </div>
		                      <span id="payment_date_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                  <label for="amount">Amount</label>
		                    <input type="text" class="form-control text-right paid_amt" data-due-amt='<?php  echo $due_amount; ?>
' id="amount" name="amount" placeholder="" value="<?php  echo $due_amount; ?>
" onkeyup="calculate_payments()">
		                      <span id="amount_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                    <label for="payment_type">Payment Type</label>
		                    <select class="form-control" id='payment_type' name="payment_type">
		                      <?php  $q1 = $this->db->query("\163\145\154\x65\x63\164\x20\52\40\146\x72\157\155\40\x64\x62\x5f\x70\141\171\155\145\156\164\x74\171\160\x65\163\40\x77\x68\145\x72\x65\40\163\164\x61\x74\165\x73\75\x31"); if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\74\157\160\164\x69\x6f\156\x20\x76\141\x6c\x75\145\75\x27" . $res1->payment_type . "\47\x3e" . $res1->payment_type . "\x3c\x2f\157\160\164\x69\x6f\x6e\76"; } } else { echo "\x4e\x6f\40\x52\x65\x63\x6f\162\144\163\x20\106\157\x75\156\144"; } ?>
		                    </select>
		                    <span id="payment_type_msg" style="display:none" class="text-danger"></span>
		                  </div>
		                </div>
		            <div class="clearfix"></div>
		        </div>  
		        <div class="row">
		               <div class="col-md-12">
		                  <div class="">
		                    <label for="payment_note">Payment Note</label>
		                    <textarea type="text" class="form-control" id="payment_note" name="payment_note" placeholder="" ></textarea>
		                    <span id="payment_note_msg" style="display:none" class="text-danger"></span>
		                  </div>
		               </div>
		                
		            <div class="clearfix"></div>
		        </div>   
		        </div>
		        </div>
		      </div><!-- col-md-12 -->
		    </div>
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        <button type="button" onclick="save_payment(<?php  echo $customer_id; ?>
)" class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php  } public function save_payment() { $this->db->trans_begin(); extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST, $_GET)))); $this->load->model("\x73\x61\x6c\145\x73\137\155\157\144\x65\x6c"); if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $q2 = $this->db->query("\x73\145\x6c\x65\143\x74\40\x2a\x20\x66\x72\157\x6d\x20\144\142\137\143\x75\163\x74\157\155\x65\162\x73\x20\167\150\145\162\145\x20\x69\144\x3d{$customer_id}"); $res2 = $q2->row(); $customer_opening_balance = $res2->opening_balance; $customer_sales_due = $res2->sales_due; $sum_of_ob_paid = $this->db->query("\163\145\x6c\x65\x63\164\40\143\x6f\141\x6c\x65\163\x63\x65\50\163\165\155\50\160\141\171\155\145\x6e\164\51\x2c\x30\x29\x20\x73\165\x6d\137\157\x66\x5f\x6f\142\137\x70\141\x69\144\40\x66\162\x6f\155\x20\x64\142\137\143\157\x62\160\141\x79\155\145\x6e\164\x73\x20\167\150\145\x72\x65\x20\x63\x75\x73\164\157\155\x65\162\137\151\144\75{$customer_id}")->row()->sum_of_ob_paid; $customer_opening_balance_due = $customer_opening_balance - $sum_of_ob_paid; while ($amount > 0) { if ($amount <= $customer_opening_balance_due && $customer_opening_balance_due > 0) { $row_data = array("\x63\165\x73\164\157\x6d\145\x72\137\x69\144" => $customer_id, "\x70\x61\x79\x6d\145\x6e\x74\x5f\144\x61\164\x65" => date("\131\55\x6d\55\x64", strtotime($payment_date)), "\160\x61\171\155\x65\x6e\x74\x5f\164\x79\x70\145" => $payment_type, "\160\141\x79\155\145\156\164" => $amount, "\x70\141\x79\x6d\x65\156\x74\x5f\x6e\x6f\x74\145" => $payment_note, "\143\x72\145\141\x74\x65\x64\x5f\144\141\164\x65" => $CUR_DATE, "\143\162\145\x61\164\145\144\137\x74\151\155\145" => $CUR_TIME, "\143\162\x65\x61\164\145\x64\137\x62\x79" => $CUR_USERNAME, "\163\x79\163\x74\145\155\137\151\x70" => $SYSTEM_IP, "\163\x79\163\x74\145\155\x5f\x6e\x61\x6d\145" => $SYSTEM_NAME, "\x73\164\x61\164\x75\x73" => 1); $q3 = $this->db->insert("\144\142\x5f\143\x6f\142\x70\141\x79\155\145\156\164\163", $row_data); $amount = 0; } if ($amount >= $customer_opening_balance_due && $customer_opening_balance_due) { $row_data = array("\143\x75\x73\x74\157\x6d\145\162\137\x69\144" => $customer_id, "\160\141\x79\x6d\145\x6e\x74\137\144\x61\164\x65" => date("\131\55\x6d\55\x64", strtotime($payment_date)), "\160\141\x79\x6d\145\156\x74\137\x74\171\x70\x65" => $payment_type, "\x70\141\171\x6d\145\x6e\164" => $customer_opening_balance_due, "\x70\x61\171\x6d\x65\156\x74\x5f\x6e\157\164\145" => $payment_note, "\x63\x72\x65\x61\164\x65\x64\x5f\144\x61\x74\145" => $CUR_DATE, "\143\162\145\x61\x74\145\x64\137\x74\x69\155\x65" => $CUR_TIME, "\143\x72\145\x61\x74\145\144\x5f\142\x79" => $CUR_USERNAME, "\163\171\163\x74\x65\x6d\137\x69\x70" => $SYSTEM_IP, "\x73\171\163\x74\145\155\x5f\x6e\x61\x6d\145" => $SYSTEM_NAME, "\x73\x74\141\x74\x75\x73" => 1); $q3 = $this->db->insert("\x64\x62\137\x63\157\142\x70\141\171\x6d\x65\x6e\x74\x73", $row_data); $amount -= $customer_opening_balance_due; } if ($amount <= $customer_sales_due) { $qs4 = $this->db->query("\x73\145\x6c\x65\143\x74\x20\151\x64\54\147\x72\141\x6e\144\137\164\157\x74\x61\x6c\x2c\160\141\151\144\137\x61\155\157\165\x6e\164\x2c\143\157\141\154\145\163\x63\x65\x28\147\162\141\x6e\x64\x5f\164\157\164\141\154\x2d\160\141\x69\144\137\x61\x6d\x6f\x75\x6e\164\54\x30\x29\x20\141\163\x20\x73\141\x6c\145\x73\x5f\144\x75\x65\40\146\162\157\155\40\144\142\x5f\163\x61\x6c\145\x73\x20\167\150\x65\x72\145\40\147\x72\x61\156\144\x5f\164\157\164\141\154\x21\75\x70\141\151\x64\137\141\155\x6f\165\156\x74\x20\141\x6e\x64\40\143\x75\163\164\x6f\155\x65\x72\137\151\144\75" . $customer_id); foreach ($qs4->result() as $res) { $grand_total = $res->grand_total; $paid_amount = $res->paid_amount; $sales_due = $res->sales_due; $sales_id = $res->id; if ($amount <= $sales_due && $sales_due > 0) { $salespayments_entry = array("\163\141\x6c\145\x73\137\x69\144" => $sales_id, "\x70\141\x79\x6d\145\x6e\164\137\x64\141\x74\x65" => date("\x59\x2d\155\55\144", strtotime($payment_date)), "\x70\141\x79\x6d\145\156\x74\137\164\x79\160\145" => $payment_type, "\160\x61\171\x6d\145\156\164" => $amount, "\x70\141\171\x6d\x65\x6e\x74\137\156\157\164\145" => $payment_note, "\x63\162\x65\141\x74\145\144\137\144\x61\164\145" => $CUR_DATE, "\143\162\145\x61\164\145\x64\137\x74\x69\x6d\x65" => $CUR_TIME, "\x63\x72\x65\141\x74\145\x64\x5f\142\x79" => $CUR_USERNAME, "\163\x79\163\x74\145\x6d\137\x69\160" => $SYSTEM_IP, "\163\x79\x73\164\x65\155\137\x6e\x61\155\145" => $SYSTEM_NAME, "\163\x74\x61\164\165\x73" => 1); $amount = 0; } if ($amount >= $sales_due && $sales_due > 0) { $salespayments_entry = array("\x73\141\154\145\163\137\x69\x64" => $sales_id, "\x70\x61\x79\x6d\145\156\x74\x5f\x64\x61\x74\x65" => date("\x59\x2d\x6d\x2d\x64", strtotime($payment_date)), "\x70\141\171\155\145\x6e\164\137\x74\171\160\x65" => $payment_type, "\x70\x61\x79\x6d\145\x6e\x74" => $sales_due, "\160\x61\x79\155\x65\x6e\164\x5f\156\157\164\145" => $payment_note, "\143\x72\x65\x61\x74\145\144\137\x64\x61\x74\145" => $CUR_DATE, "\143\x72\145\141\164\x65\x64\137\x74\x69\x6d\x65" => $CUR_TIME, "\143\x72\145\x61\164\x65\144\x5f\x62\171" => $CUR_USERNAME, "\x73\171\163\164\145\155\x5f\151\x70" => $SYSTEM_IP, "\x73\x79\x73\x74\145\155\x5f\156\x61\x6d\x65" => $SYSTEM_NAME, "\x73\164\x61\164\x75\x73" => 1); $amount -= $sales_due; } $q3 = $this->db->insert("\144\x62\137\x73\x61\154\145\163\x70\141\171\155\x65\x6e\164\x73", $salespayments_entry); $q10 = $this->sales_model->update_sales_payment_status($sales_id, $customer_id); if ($q10 != 1) { return "\x66\x61\151\x6c\145\144"; } } } } } else { return "\120\154\145\141\163\x65\x20\105\x6e\x74\x65\x72\40\x56\141\x6c\x69\x64\40\x41\155\157\x75\x6e\x74\x21"; } $this->db->trans_commit(); return "\x73\165\143\x63\145\163\163"; } public function show_pay_return_due_modal($customer_id) { $CI =& get_instance(); $sales_id = ''; $q2 = $this->db->query("\x73\145\x6c\145\143\x74\40\x2a\x20\x66\162\157\x6d\40\144\x62\137\143\165\163\164\157\x6d\x65\162\x73\40\x77\x68\145\x72\145\40\x69\x64\x3d{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_sales_return_due = $res2->sales_return_due; $sales_date = ''; $reference_no = ''; $sales_code = ''; $sales_note = ''; $grand_total = 0; $paid_amount = 0; if (!empty($customer_country)) { $customer_country = $this->db->query("\x73\x65\x6c\145\x63\x74\40\x63\x6f\165\156\164\x72\x79\40\x66\x72\x6f\155\x20\144\x62\x5f\x63\x6f\165\x6e\x74\162\x79\40\167\150\x65\162\145\x20\x69\x64\x3d\47{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\163\145\x6c\145\x63\164\x20\x73\164\x61\x74\145\40\x66\x72\157\155\40\144\142\x5f\x73\164\x61\x74\145\x73\x20\167\x68\145\x72\145\40\x69\x64\75\47{$customer_state}\x27")->row()->state; } $q6 = $this->db->query("\x73\145\x6c\145\x63\164\40\x63\x6f\x61\x6c\x65\163\143\x65\50\x73\165\x6d\50\147\x72\141\156\144\x5f\164\x6f\x74\141\154\x29\x2c\x30\51\40\x61\163\x20\164\x6f\164\x61\x6c\x5f\163\x61\x6c\x65\163\x5f\141\155\157\x75\156\164\54\143\157\141\154\145\x73\143\145\x28\x73\165\155\x28\x70\141\151\x64\137\141\x6d\x6f\165\156\164\51\54\60\x29\40\141\163\40\164\x6f\164\x61\x6c\137\x70\x61\151\x64\x5f\x61\x6d\157\165\156\164\x20\x66\162\157\x6d\x20\x64\142\x5f\x73\141\154\145\x73\162\x65\164\x75\x72\156\x20\x77\x68\145\x72\145\x20\143\x75\x73\164\157\x6d\x65\162\137\151\144\x3d{$customer_id}"); $total_sales_amount = $q6->row()->total_sales_amount; $total_paid_amount = $q6->row()->total_paid_amount; $due_amount = number_format($total_sales_amount - $total_paid_amount, 0, "\x2e", ''); ?>
		<div class="modal fade" id="pay_return_due">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Pay Sales Return Due Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-12 invoice-col">
			          <i><?php  echo $this->lang->line("\x63\x75\x73\164\x6f\155\x65\x72\x5f\x64\x65\x74\x61\x69\154\163"); ?>
</i>
			          <address>
			            <strong><?php  echo $customer_name; ?>
</strong><br>
			            <?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\155\x6f\142\x69\x6c\145") . "\x3a\x20" . $customer_mobile . "\x3c\x62\x72\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\x70\x68\x6f\x6e\145") . "\72\40" . $customer_phone . "\x3c\142\x72\76" : ''; ?>
			            <?php  echo !empty(trim($customer_email)) ? $this->lang->line("\x65\x6d\141\x69\154") . "\72\40" . $customer_email . "\74\x62\162\76" : ''; ?>
			            <?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\x67\163\x74\x5f\x6e\165\x6d\x62\145\162") . "\x3a\40" . $customer_gst_no . "\74\x62\162\76" : ''; ?>
			            <?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\x74\x61\170\x5f\156\x75\x6d\142\x65\x72") . "\72\40" . $customer_tax_number . "\74\x62\x72\x3e" : ''; ?>
			            
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-12 invoice-col">

			        	<table class="table table-sm table-bordered bg-info" width="100%">
			        		<tr>
			        			<td class="text-right"><?php  echo $this->lang->line("\x74\x6f\164\141\154\137\x73\x61\154\x65\x73\x5f\x61\155\157\165\156\164"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($total_sales_amount); ?>
</td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?php  echo $this->lang->line("\x70\141\x69\x64\137\x61\x6d\x6f\x75\156\164"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($total_paid_amount); ?>
</td>
			        		</tr>
			        		<tr>
			        			<td class="text-right"><?php  echo $this->lang->line("\x73\x61\x6c\x65\163\x5f\144\x75\145"); ?>
</td>
			        			<td class="text-right"><?php  echo $CI->currency($customer_sales_return_due); ?>
</td>
			        		</tr>
			        	</table>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		        <div>
		        <input type="hidden" name="payment_row_count" id='payment_row_count' value="1">
		        <div class="col-md-12  payments_div">
		          <div class="box box-solid bg-gray">
		            <div class="box-body">
		              <div class="row">
		         		<div class="col-md-4">
		                  <div class="">
		                  <label for="payment_date">Date</label>
		                    <div class="input-group date">
			                      <div class="input-group-addon">
			                      <i class="fa fa-calendar"></i>
			                      </div>
			                      <input type="text" class="form-control pull-right datepicker" value="<?php  echo show_date(date("\144\x2d\155\x2d\x59")); ?>
" id="return_due_payment_date" name="return_due_payment_date" readonly>
			                    </div>
		                      <span id="return_due_payment_date_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                  <label for="amount">Amount</label>
		                    <input type="text" class="form-control text-right return_due_paid_amt" data-due-amt='<?php  echo $due_amount; ?>
' id="return_due_amount" name="return_due_amount" placeholder="" value="<?php  echo $due_amount; ?>
" >
		                      <span id="return_due_amount_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                    <label for="payment_type">Payment Type</label>
		                    <select class="form-control" id='return_due_payment_type' name="return_due_payment_type">
		                      <?php  $q1 = $this->db->query("\163\145\154\145\x63\164\x20\52\x20\x66\x72\157\x6d\40\144\142\x5f\160\x61\171\155\x65\156\x74\164\171\x70\145\163\40\167\150\x65\162\x65\40\163\164\x61\x74\x75\163\x3d\x31"); if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\x3c\x6f\160\164\151\157\156\40\x76\x61\154\x75\x65\75\47" . $res1->payment_type . "\47\76" . $res1->payment_type . "\x3c\57\157\x70\164\151\x6f\x6e\x3e"; } } else { echo "\x4e\x6f\x20\122\x65\x63\x6f\x72\x64\x73\x20\106\x6f\165\x6e\144"; } ?>
		                    </select>
		                    <span id="return_due_payment_type_msg" style="display:none" class="text-danger"></span>
		                  </div>
		                </div>
		            <div class="clearfix"></div>
		        </div>  
		        <div class="row">
		               <div class="col-md-12">
		                  <div class="">
		                    <label for="payment_note">Payment Note</label>
		                    <textarea type="text" class="form-control" id="return_due_payment_note" name="return_due_payment_note" placeholder="" ></textarea>
		                    <span id="return_due_payment_note_msg" style="display:none" class="text-danger"></span>
		                  </div>
		               </div>
		                
		            <div class="clearfix"></div>
		        </div>   
		        </div>
		        </div>
		      </div><!-- col-md-12 -->
		    </div>
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        <button type="button" onclick="save_return_due_payment(<?php  echo $customer_id; ?>
)" class="btn bg-green btn-lg place_order btn-lg return_due_payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php  } public function save_return_due_payment() { $this->db->trans_begin(); extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST, $_GET)))); $this->load->model("\163\141\x6c\x65\x73\x5f\x72\145\x74\x75\x72\156\x5f\155\157\x64\x65\x6c"); if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $q2 = $this->db->query("\163\x65\154\145\143\164\x20\52\x20\x66\x72\x6f\x6d\x20\144\142\137\143\x75\x73\164\x6f\155\x65\162\163\40\167\150\145\162\145\x20\x69\x64\x3d{$customer_id}"); $res2 = $q2->row(); $customer_sales_return_due = $res2->sales_return_due; while ($amount > 0) { if ($amount <= $customer_sales_return_due) { $qs4 = $this->db->query("\163\145\x6c\145\143\x74\x20\x69\144\54\x67\x72\x61\156\144\x5f\164\x6f\164\x61\x6c\54\160\x61\x69\144\x5f\x61\155\x6f\165\156\164\54\143\157\x61\x6c\x65\x73\143\x65\50\147\162\141\x6e\x64\x5f\164\157\164\141\x6c\x2d\x70\x61\151\144\137\x61\x6d\157\x75\x6e\x74\54\x30\x29\40\x61\x73\40\163\141\x6c\x65\163\x5f\144\x75\145\40\146\x72\x6f\x6d\40\x64\x62\137\163\141\x6c\x65\163\x72\145\x74\165\162\156\40\x77\150\x65\x72\x65\x20\147\x72\x61\x6e\x64\137\x74\157\164\141\154\41\x3d\160\x61\x69\x64\x5f\x61\x6d\157\165\x6e\164\40\x61\156\x64\x20\x63\165\163\164\157\155\145\x72\137\151\144\x3d" . $customer_id); foreach ($qs4->result() as $res) { $grand_total = $res->grand_total; $paid_amount = $res->paid_amount; $sales_due = $res->sales_due; $return_id = $res->id; if ($amount <= $sales_due && $sales_due > 0) { $salespayments_entry = array("\x72\145\164\x75\162\156\137\151\x64" => $return_id, "\160\141\x79\x6d\x65\156\164\137\144\x61\x74\x65" => date("\131\x2d\x6d\x2d\144", strtotime($payment_date)), "\x70\141\x79\x6d\145\x6e\164\137\x74\x79\160\x65" => $payment_type, "\160\141\x79\155\145\156\164" => $amount, "\160\x61\x79\155\x65\156\164\x5f\156\157\164\145" => $payment_note, "\x63\x72\145\x61\x74\145\144\137\x64\141\x74\145" => $CUR_DATE, "\143\162\x65\141\x74\x65\144\137\x74\x69\x6d\x65" => $CUR_TIME, "\143\162\x65\x61\164\145\x64\x5f\142\x79" => $CUR_USERNAME, "\x73\171\163\x74\145\x6d\x5f\x69\160" => $SYSTEM_IP, "\x73\171\x73\164\145\155\137\156\x61\155\145" => $SYSTEM_NAME, "\x73\164\141\x74\x75\163" => 1); $amount = 0; } if ($amount >= $sales_due && $sales_due > 0) { $salespayments_entry = array("\x72\x65\164\165\x72\x6e\137\151\144" => $return_id, "\160\x61\171\x6d\x65\x6e\x74\x5f\144\x61\x74\145" => date("\131\x2d\155\55\144", strtotime($payment_date)), "\x70\x61\x79\155\145\156\x74\137\164\171\x70\x65" => $payment_type, "\x70\x61\171\x6d\x65\x6e\x74" => $sales_due, "\160\x61\x79\x6d\x65\x6e\164\137\x6e\157\164\x65" => $payment_note, "\143\162\x65\x61\164\x65\144\x5f\x64\141\164\145" => $CUR_DATE, "\143\162\x65\141\164\145\144\137\x74\151\x6d\145" => $CUR_TIME, "\x63\x72\x65\x61\x74\x65\x64\137\x62\x79" => $CUR_USERNAME, "\x73\171\x73\x74\x65\x6d\137\x69\160" => $SYSTEM_IP, "\x73\171\x73\164\145\x6d\x5f\x6e\x61\x6d\145" => $SYSTEM_NAME, "\x73\164\x61\x74\165\x73" => 1); $amount -= $sales_due; } $q3 = $this->db->insert("\x64\x62\x5f\163\141\x6c\x65\x73\160\x61\171\155\x65\156\164\163\162\x65\x74\165\x72\x6e", $salespayments_entry); $q10 = $this->sales_return_model->update_sales_payment_status($return_id, $customer_id); if ($q10 != 1) { return "\x66\141\x69\x6c\x65\144"; } } } } } else { return "\x50\154\145\x61\x73\145\x20\x45\156\x74\145\x72\x20\126\141\154\x69\x64\40\x41\x6d\157\x75\x6e\x74\41"; } $this->db->trans_commit(); return "\x73\165\x63\143\145\163\x73"; } public function delete_opening_balance_entry($entry_id) { $customer_id = $this->input->post("\x63\x75\x73\x74\x6f\155\x65\162\137\151\144"); $this->db->trans_begin(); $q1 = $this->db->query("\x64\x65\154\x65\x74\145\40\146\162\157\155\x20\144\x62\137\143\x6f\x62\x70\141\171\x6d\145\156\x74\163\x20\167\150\x65\162\x65\x20\x69\x64\75{$entry_id}"); if (!$q1) { return "\x66\141\151\x6c\145\x64"; } $this->session->set_flashdata("\163\165\x63\143\x65\x73\163", "\123\x75\x63\143\x65\x73\x73\41\41\x20\x4f\x70\145\x6e\x69\156\x67\x20\102\141\154\141\x6e\143\x65\x20\105\156\x74\162\x79\x20\x44\x65\x6c\x65\164\x65\x64\41"); $this->db->trans_commit(); return "\x73\x75\143\143\x65\163\163"; } public function getCustomersArray($id = '') { $q = ''; $this->db->select("\x69\x64\x2c\40\143\x75\163\164\x6f\155\x65\x72\x5f\156\x61\155\145\54\x20\x6d\157\142\x69\154\x65\40\54\40\x74\x79\160\x65\137\x69\x64\54\163\141\x6c\145\x73\137\x64\165\145")->from("\x64\x62\x5f\143\x75\x73\x74\x6f\x6d\x65\x72\x73"); if (!empty($id)) { $this->db->where("\x69\144", $id); } else { $q = isset($_POST["\x73\x65\141\162\143\x68\x54\145\162\x6d"]) ? strtoupper($_POST["\163\x65\x61\162\143\x68\124\145\162\155"]) : ''; $type_id = isset($_POST["\x74\x79\x70\x65\x5f\151\x64"]) ? $_POST["\164\171\160\x65\137\151\x64"] : ''; if (!empty($type_id)) { $this->db->where("\50\50\x75\160\160\x65\x72\x28\143\x75\163\164\x6f\155\x65\162\137\x6e\141\155\145\51\x20\154\x69\153\145\x20\x27\x25{$q}\45\x27\x20\x6f\x72\40\x75\160\x70\x65\162\x28\155\157\x62\151\154\x65\51\40\x6c\x69\153\x65\x20\x27\x25{$q}\x25\x27\51\40\x61\156\144\40\x74\171\160\x65\x5f\151\144\40\75\40{$type_id}\x29"); } else { $this->db->where("\50\x75\x70\160\145\162\x28\143\x75\x73\x74\157\155\x65\162\x5f\156\141\155\x65\51\x20\x6c\151\x6b\x65\x20\x27\45{$q}\x25\x27\40\157\x72\x20\x75\x70\x70\145\162\50\x6d\x6f\x62\151\x6c\145\51\40\x6c\151\153\145\x20\47\45{$q}\x25\x27\51"); } } $this->db->limit(10); $query = $this->db->get(); $display_json = array(); if ($query->num_rows() > 0) { foreach ($query->result() as $res) { $json_arr["\151\144"] = $res->id; $json_arr["\164\x65\x78\x74"] = $res->customer_name; $json_arr["\x6d\157\x62\x69\154\x65"] = $res->mobile; $json_arr["\163\141\x6c\145\x73\x5f\x64\x75\x65"] = $res->sales_due; $type_id = $res->type_id; $q1 = $this->db->query("\123\105\x4c\105\x43\124\x20\164\x79\x70\x65\137\x6e\x61\155\145\x2c\160\x65\162\143\145\156\164\137\144\x65\x63\x72\145\x61\x73\145\54\x70\x72\151\x63\x65\x5f\x74\171\160\145\54\144\x69\163\143\x6f\165\156\x74\x5f\164\x79\x70\145\x2c\x64\x69\x73\143\x6f\x75\x6e\x74\x20\106\x52\x4f\115\x20\x64\x62\137\x74\171\160\x65\x73\x20\x77\150\x65\x72\145\40\151\x64\x20\75\40\x27{$type_id}\x27")->row(); $json_arr["\164\171\160\x65\137\x6e\141\155\x65"] = $q1->type_name; $json_arr["\160\145\x72\143\x65\x6e\164\137\144\145\143\x72\x65\141\163\145"] = $q1->percent_decrease; $json_arr["\160\162\x69\143\145\x5f\164\171\160\145"] = $q1->price_type; $json_arr["\144\x69\163\143\157\165\x6e\x74\x5f\164\171\160\x65"] = $q1->discount_type; $json_arr["\x64\151\x73\143\x6f\165\x6e\164"] = $q1->discount; array_push($display_json, $json_arr); } } return $display_json; } public function getCustomersJson($id) { return json_encode($this->getCustomersArray($id)); } }