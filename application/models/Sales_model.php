<?php
 defined("\x42\101\x53\x45\x50\x41\124\x48") or die("\x4e\x6f\40\x64\x69\162\x65\x63\x74\x20\x73\x63\162\x69\160\164\x20\x61\x63\x63\x65\x73\163\x20\141\x6c\154\157\167\145\144"); class Sales_model extends CI_Model { var $table = "\x64\142\137\x73\141\154\145\163\40\x61\x73\x20\141"; var $column_order = array("\x61\x2e\162\x65\164\165\162\x6e\x5f\x62\151\x74", "\141\56\151\144", "\x61\56\x73\x61\x6c\145\163\137\144\x61\164\x65", "\x61\56\x73\141\154\x65\163\x5f\x63\x6f\x64\x65", "\141\x2e\x72\145\146\x65\x72\x65\156\143\145\137\156\157", "\141\x2e\147\x72\x61\x6e\144\137\164\157\164\141\x6c", "\x61\x2e\160\x61\171\x6d\x65\156\164\137\x73\x74\141\164\x75\163", "\141\56\143\162\145\141\164\x65\144\137\x62\171", "\142\x2e\143\165\x73\x74\157\x6d\x65\x72\137\156\141\x6d\x65", "\x61\x2e\160\141\x69\x64\x5f\141\x6d\x6f\165\156\164", "\x61\x2e\163\x61\154\145\x73\x5f\x73\164\x61\164\165\163", "\141\x2e\160\157\x73"); var $column_search = array("\163\x61\154\145\x73\x5f\144\165\x65", "\141\x2e\x72\x65\x74\x75\x72\x6e\x5f\x62\x69\164", "\x61\x2e\x69\144", "\141\x2e\x73\x61\154\x65\163\137\x64\141\164\x65", "\x61\x2e\x73\141\154\x65\163\137\143\157\x64\x65", "\x61\56\162\x65\146\x65\162\145\x6e\143\145\x5f\156\157", "\141\x2e\x67\x72\x61\x6e\144\x5f\164\157\x74\141\x6c", "\x61\56\x70\x61\x79\x6d\x65\156\x74\137\163\164\x61\x74\x75\163", "\x61\56\x63\162\x65\x61\164\145\144\x5f\x62\x79", "\142\x2e\143\x75\163\164\157\x6d\145\162\x5f\x6e\x61\155\145", "\x61\56\160\x61\x69\144\x5f\x61\155\157\x75\x6e\x74", "\x61\56\163\141\x6c\x65\163\x5f\163\x74\141\x74\165\163", "\141\56\x70\x6f\163"); var $order = array("\141\56\x69\144" => "\x64\x65\163\143"); public function __construct() { parent::__construct(); $CI =& get_instance(); } private function _get_datatables_query() { $this->db->select($this->column_order); $this->db->from($this->table); $this->db->select("\143\x6f\141\x6c\145\163\x63\145\x28\141\56\x67\162\141\x6e\x64\x5f\164\x6f\x74\x61\154\x2c\x30\51\55\143\x6f\x61\x6c\145\163\x63\145\x28\x61\x2e\x70\x61\151\x64\x5f\x61\155\x6f\x75\156\164\54\60\x29\40\x61\x73\x20\163\141\x6c\x65\163\x5f\x64\x75\x65"); $this->db->from("\144\142\137\143\x75\x73\x74\157\x6d\145\162\163\x20\141\163\40\142"); $this->db->where("\142\x2e\x69\144\x3d\141\56\143\165\x73\164\x6f\155\145\162\x5f\x69\x64"); $customer_id = $this->input->post("\143\165\x73\x74\157\x6d\x65\x72\x5f\151\x64"); if (!empty($customer_id)) { $this->db->where("\141\56\143\x75\163\164\x6f\x6d\x65\162\137\151\144", $customer_id); } $sales_from_date = $this->input->post("\x73\141\154\x65\163\137\x66\x72\157\x6d\x5f\x64\x61\164\x65"); $sales_from_date = system_fromatted_date($sales_from_date); $sales_to_date = $this->input->post("\x73\141\x6c\x65\x73\x5f\164\x6f\x5f\x64\141\164\x65"); $sales_to_date = system_fromatted_date($sales_to_date); $users = $this->input->post("\x75\x73\x65\x72\137\143\x72\x65\141\164\x65\144\137\x62\x79"); if (!permissions("\x76\x69\145\167\137\x61\x6c\154\137\165\x73\145\162\163\137\x73\x61\154\145\x73\x5f\151\x6e\x76\157\151\x63\x65\x73")) { $this->db->where("\x75\160\x70\145\x72\x28\x61\x2e\x63\162\x65\x61\x74\x65\144\x5f\x62\171\x29", strtoupper($this->session->userdata("\151\156\x76\x5f\165\x73\x65\x72\x6e\141\x6d\145"))); } if ($users && !empty($users)) { $this->db->where("\x75\x70\x70\145\162\50\141\x2e\x63\x72\x65\141\x74\x65\144\137\x62\171\x29", strtoupper($users)); } if ($sales_from_date != "\x31\71\x37\60\55\60\61\x2d\x30\61") { $this->db->where("\x61\56\163\x61\x6c\x65\x73\x5f\x64\x61\x74\145\76\x3d", $sales_from_date); } if ($sales_to_date != "\61\71\x37\60\55\x30\61\x2d\60\61") { $this->db->where("\x61\56\x73\x61\154\x65\x73\137\144\x61\164\145\x3c\75", $sales_to_date); } $i = 0; foreach ($this->column_search as $item) { if ($_POST["\163\145\141\162\143\x68"]["\166\x61\x6c\165\x65"]) { if ($i === 0) { $this->db->group_start(); $this->db->like($item, $_POST["\163\145\x61\162\x63\150"]["\166\141\154\x75\x65"]); } else { $this->db->or_like($item, $_POST["\x73\x65\141\162\x63\x68"]["\x76\141\x6c\x75\x65"]); } if (count($this->column_search) - 1 == $i) { $this->db->group_end(); } } $i++; } if (isset($_POST["\x6f\162\144\x65\162"])) { $this->db->order_by($this->column_order[$_POST["\x6f\162\144\x65\162"]["\x30"]["\143\157\x6c\x75\155\x6e"]], $_POST["\x6f\x72\144\145\162"]["\x30"]["\x64\x69\162"]); } else { if (isset($this->order)) { $order = $this->order; $this->db->order_by(key($order), $order[key($order)]); } } } function get_datatables() { $this->_get_datatables_query(); if ($_POST["\154\145\156\147\x74\150"] != -1) { $this->db->limit($_POST["\x6c\145\x6e\x67\x74\x68"], $_POST["\x73\x74\141\x72\x74"]); } $query = $this->db->get(); return $query->result(); } function count_filtered() { $this->_get_datatables_query(); $query = $this->db->get(); return $query->num_rows(); } public function count_all() { $this->db->from($this->table); return $this->db->count_all_results(); } public function xss_html_filter($input) { return $this->security->xss_clean(html_escape($input)); } public function verify_save_and_update() { extract($this->xss_html_filter(array_merge($this->data, $_POST, $_GET))); $this->db->trans_begin(); $sales_date = date("\131\x2d\155\x2d\144", strtotime($sales_date)); if ($other_charges_input == '' || $other_charges_input == 0) { $other_charges_input = null; } if ($other_charges_tax_id == '' || $other_charges_tax_id == 0) { $other_charges_tax_id = null; } if ($other_charges_amt == '' || $other_charges_amt == 0) { $other_charges_amt = null; } if ($discount_to_all_input == '' || $discount_to_all_input == 0) { $discount_to_all_input = null; } if ($tot_discount_to_all_amt == '' || $tot_discount_to_all_amt == 0) { $tot_discount_to_all_amt = null; } if ($tot_round_off_amt == '' || $tot_round_off_amt == 0) { $tot_round_off_amt = null; } if ($command == "\163\141\x76\145") { $qs5 = "\163\145\x6c\x65\x63\164\40\x73\x61\154\145\x73\x5f\151\156\x69\164\x20\146\x72\157\155\40\x64\x62\x5f\x63\157\x6d\x70\141\156\x79"; $q5 = $this->db->query($qs5); $sales_init = $q5->row()->sales_init; $this->db->query("\x41\114\124\105\x52\x20\x54\x41\102\114\x45\x20\144\x62\137\x73\141\154\x65\163\x20\101\125\x54\117\137\111\x4e\103\x52\105\x4d\105\x4e\124\x20\x3d\40\61"); $q4 = $this->db->query("\x73\x65\x6c\145\143\164\x20\143\157\x61\154\x65\163\x63\145\50\x6d\x61\170\x28\151\144\x29\54\60\51\x2b\x31\x20\141\163\40\155\x61\x78\x69\x64\40\146\x72\157\155\x20\144\142\x5f\163\x61\x6c\x65\163"); $maxid = $q4->row()->maxid; $sales_code = $sales_init . str_pad($maxid, 4, "\x30", STR_PAD_LEFT); $sales_entry = array("\x73\x61\x6c\145\163\137\143\x6f\144\x65" => $sales_code, "\x72\x65\x66\x65\x72\145\156\x63\145\x5f\156\x6f" => $reference_no, "\163\141\154\x65\163\x5f\x64\141\164\x65" => $sales_date, "\163\141\154\145\163\x5f\x73\164\141\164\165\163" => $sales_status, "\143\165\x73\x74\157\155\145\x72\x5f\151\144" => $customer_id, "\157\x74\x68\x65\x72\137\x63\x68\x61\x72\x67\145\163\137\151\x6e\160\x75\164" => $other_charges_input, "\157\x74\150\145\x72\137\x63\x68\x61\x72\147\x65\163\137\x74\x61\170\x5f\151\x64" => $other_charges_tax_id, "\x6f\x74\x68\145\x72\x5f\143\150\141\162\x67\x65\x73\x5f\141\155\164" => $other_charges_amt, "\x64\151\163\143\157\x75\x6e\164\x5f\x74\157\x5f\141\x6c\x6c\137\x69\156\160\x75\x74" => $discount_to_all_input, "\x64\151\163\143\x6f\165\156\164\137\164\x6f\x5f\141\154\154\x5f\x74\x79\x70\x65" => $discount_to_all_type, "\164\x6f\x74\x5f\x64\x69\163\143\x6f\165\x6e\x74\137\164\x6f\137\x61\x6c\154\x5f\141\x6d\164" => $tot_discount_to_all_amt, "\x73\x75\142\164\x6f\164\x61\154" => $tot_subtotal_amt, "\x72\157\165\x6e\x64\x5f\157\x66\x66" => $tot_round_off_amt, "\x67\162\141\x6e\x64\137\x74\x6f\164\141\x6c" => $tot_total_amt, "\163\141\x6c\x65\163\x5f\156\157\x74\145" => $sales_note, "\143\x72\x65\x61\x74\x65\144\x5f\x64\141\164\x65" => $CUR_DATE, "\143\162\145\x61\x74\x65\x64\137\x74\151\155\x65" => $CUR_TIME, "\143\162\x65\141\x74\145\144\137\x62\171" => $CUR_USERNAME, "\163\x79\163\x74\145\x6d\x5f\x69\x70" => $SYSTEM_IP, "\x73\171\x73\x74\145\155\x5f\156\141\x6d\145" => $SYSTEM_NAME, "\163\x74\141\x74\165\x73" => 1); $q1 = $this->db->insert("\144\x62\x5f\163\x61\154\x65\x73", $sales_entry); $sales_id = $this->db->insert_id(); } else { if ($command == "\x75\x70\x64\141\x74\x65") { $sales_entry = array("\162\145\146\x65\162\145\156\143\145\137\x6e\157" => $reference_no, "\x73\x61\x6c\145\x73\x5f\144\141\164\x65" => $sales_date, "\163\x61\154\145\163\137\163\164\141\x74\x75\163" => $sales_status, "\x63\165\163\164\x6f\155\x65\162\x5f\151\144" => $customer_id, "\157\164\x68\x65\x72\137\143\150\141\162\x67\145\x73\137\151\x6e\160\165\x74" => $other_charges_input, "\157\x74\x68\x65\x72\137\x63\150\x61\x72\x67\145\163\x5f\164\x61\170\137\x69\144" => $other_charges_tax_id, "\x6f\164\150\145\x72\137\x63\150\x61\x72\147\x65\x73\x5f\141\x6d\x74" => $other_charges_amt, "\x64\151\163\143\157\165\156\164\137\x74\x6f\137\141\x6c\x6c\x5f\151\156\160\x75\x74" => $discount_to_all_input, "\x64\x69\163\x63\x6f\165\156\x74\137\164\x6f\137\x61\154\154\x5f\164\x79\x70\145" => $discount_to_all_type, "\x74\157\x74\137\x64\x69\163\143\157\x75\x6e\x74\137\x74\157\x5f\141\154\x6c\x5f\x61\155\x74" => $tot_discount_to_all_amt, "\x73\x75\142\164\157\x74\141\x6c" => $tot_subtotal_amt, "\x72\x6f\165\x6e\144\137\157\x66\x66" => $tot_round_off_amt, "\x67\162\x61\156\144\137\x74\x6f\x74\x61\154" => $tot_total_amt, "\x73\x61\154\x65\x73\x5f\x6e\157\x74\x65" => $sales_note); $q1 = $this->db->where("\x69\144", $sales_id)->update("\x64\x62\x5f\x73\141\154\x65\x73", $sales_entry); $q6 = $this->db->select("\x69\x74\145\x6d\137\x69\x64")->from("\x64\x62\x5f\163\141\x6c\x65\x73\151\x74\x65\x6d\163")->where("\x73\x61\154\145\x73\137\151\x64\x20\151\156\40\x28{$sales_id}\x29")->get(); $q11 = $this->db->query("\144\145\154\145\x74\145\40\x66\162\x6f\155\40\x64\142\x5f\163\x61\x6c\x65\x73\151\x74\x65\x6d\163\40\x77\150\x65\x72\x65\40\x73\x61\154\x65\x73\137\x69\144\75\x27{$sales_id}\47"); if (!$q11) { return "\x66\141\x69\x6c\x65\144"; } if ($q6->num_rows() > 0) { $this->load->model("\x70\x6f\x73\x5f\155\157\144\x65\154"); foreach ($q6->result() as $res6) { $q6 = $this->pos_model->update_items_quantity($res6->item_id); if (!$q6) { return "\x66\141\151\154\145\144"; } } } } } for ($i = 1; $i <= $rowcount; $i++) { if (isset($_REQUEST["\x74\x72\137\151\164\145\x6d\x5f\151\x64\137" . $i]) && !empty($_REQUEST["\x74\162\137\x69\x74\x65\155\x5f\x69\144\x5f" . $i])) { $item_id = $this->xss_html_filter(trim($_REQUEST["\x74\162\x5f\151\x74\x65\x6d\137\151\x64\x5f" . $i])); $sales_qty = $this->xss_html_filter(trim($_REQUEST["\x74\x64\137\x64\x61\x74\141\137" . $i . "\137\63"])); $price_per_unit = $this->xss_html_filter(trim($_REQUEST["\x74\144\137\144\141\x74\141\137" . $i . "\137\x34"])); $tax_id = $this->xss_html_filter(trim($_REQUEST["\164\162\x5f\164\141\x78\x5f\x69\144\137" . $i])); $tax_amt = $this->xss_html_filter(trim($_REQUEST["\x74\x64\137\144\141\x74\x61\x5f" . $i . "\x5f\61\x31"])); $unit_total_cost = $this->xss_html_filter(trim($_REQUEST["\164\144\137\x64\141\164\141\137" . $i . "\x5f\61\60"])); $total_cost = $this->xss_html_filter(trim($_REQUEST["\164\x64\x5f\x64\141\164\x61\x5f" . $i . "\x5f\x39"])); $tax_type = $this->xss_html_filter(trim($_REQUEST["\164\162\x5f\x74\141\x78\x5f\x74\x79\160\145\x5f" . $i])); $unit_tax = $this->xss_html_filter(trim($_REQUEST["\x74\x72\x5f\164\x61\x78\x5f\166\x61\154\x75\145\x5f" . $i])); $description = $this->xss_html_filter(trim($_REQUEST["\x64\145\x73\143\x72\x69\x70\x74\x69\157\x6e\x5f" . $i])); $discount_type = $this->xss_html_filter(trim($_REQUEST["\151\x74\145\155\x5f\144\x69\163\x63\x6f\165\x6e\x74\x5f\164\171\x70\x65\137" . $i])); $discount_input = $this->xss_html_filter(trim($_REQUEST["\151\x74\x65\x6d\x5f\x64\x69\x73\143\x6f\165\156\164\137\x69\156\160\165\x74\137" . $i])); $discount_amt = $this->xss_html_filter(trim($_REQUEST["\x74\144\137\x64\141\x74\141\137" . $i . "\137\x38"])); $purchase_price = $this->xss_html_filter(trim($_REQUEST["\x70\165\162\x5f\160\x72\151\143\145\x5f" . $i])); $item_details = get_item_details($item_id); $current_stock_of_item = $item_details->stock; if ($current_stock_of_item < $sales_qty) { return $item_details->item_name . "\x20\x68\141\163\x20\x6f\156\154\x79\x20" . $current_stock_of_item . "\40\x69\x6e\x20\123\x74\x6f\143\x6b\x21\x21"; die; } $discount_amt_per_unit = $discount_amt / $sales_qty; if ($tax_type == "\105\170\x63\x6c\165\163\151\x76\x65") { $single_unit_total_cost = $price_per_unit + $unit_tax * $price_per_unit / 100; } else { $single_unit_total_cost = $price_per_unit; } $single_unit_total_cost -= $discount_amt_per_unit; if ($tax_id == '' || $tax_id == 0) { $tax_id = null; } if ($tax_amt == '' || $tax_amt == 0) { $tax_amt = null; } if ($discount_input == '' || $discount_input == 0) { $discount_input = null; } if ($total_cost == '' || $total_cost == 0) { $total_cost = null; } $salesitems_entry = array("\x73\x61\154\145\163\x5f\x69\144" => $sales_id, "\x73\141\154\145\x73\x5f\163\164\141\164\x75\x73" => $sales_status, "\151\x74\145\155\x5f\x69\x64" => $item_id, "\x64\145\x73\x63\162\151\160\x74\151\157\x6e" => $description, "\x73\x61\x6c\x65\x73\x5f\x71\x74\x79" => $sales_qty, "\160\162\151\143\x65\x5f\x70\145\162\x5f\x75\156\151\x74" => $price_per_unit, "\164\x61\170\137\164\x79\x70\145" => $tax_type, "\x74\x61\x78\x5f\151\x64" => $tax_id, "\x74\141\x78\137\x61\155\164" => $tax_amt, "\x64\x69\163\x63\157\x75\x6e\x74\x5f\x69\x6e\x70\x75\x74" => $discount_input, "\144\x69\x73\x63\157\x75\156\x74\137\141\x6d\x74" => $discount_amt, "\144\x69\x73\143\157\x75\x6e\164\137\164\171\160\145" => $discount_type, "\x75\156\x69\164\137\x74\x6f\164\x61\x6c\x5f\x63\157\163\x74" => $single_unit_total_cost, "\x74\157\x74\x61\154\x5f\143\x6f\163\164" => $total_cost, "\x70\165\162\x63\x68\141\x73\145\137\x70\162\x69\143\145" => $purchase_price, "\x73\164\141\x74\165\163" => 1); $q2 = $this->db->insert("\x64\142\137\163\141\154\x65\163\151\164\x65\155\x73", $salesitems_entry); $this->load->model("\x70\157\x73\x5f\x6d\x6f\144\x65\154"); $q6 = $this->pos_model->update_items_quantity($item_id); if (!$q6) { return "\x66\x61\151\x6c\145\x64"; } } } if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $salespayments_entry = array("\163\141\154\145\163\137\x69\144" => $sales_id, "\160\x61\171\155\145\x6e\164\137\144\141\164\x65" => $sales_date, "\160\x61\x79\155\145\156\x74\137\x74\x79\160\145" => $payment_type, "\160\x61\x79\x6d\x65\x6e\164" => $amount, "\x70\141\x79\155\145\x6e\x74\137\x6e\x6f\164\145" => $payment_note, "\x63\162\x65\141\164\x65\x64\x5f\x64\141\164\145" => $CUR_DATE, "\x63\x72\x65\x61\164\x65\x64\137\164\x69\155\145" => $CUR_TIME, "\143\162\145\x61\x74\145\x64\137\142\171" => $CUR_USERNAME, "\x73\171\163\164\x65\x6d\137\151\x70" => $SYSTEM_IP, "\163\171\x73\x74\145\x6d\x5f\x6e\x61\155\145" => $SYSTEM_NAME, "\x73\x74\x61\x74\165\x73" => 1); $q3 = $this->db->insert("\144\x62\137\x73\x61\x6c\x65\163\x70\x61\171\x6d\145\x6e\164\163", $salespayments_entry); if ($q3 != 1) { return "\146\x61\x69\154\x65\x64"; } } $q10 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q10 != 1) { return "\146\141\x69\154\x65\144"; } $sms_info = ''; if (isset($send_sms) && $customer_id != 1) { if (send_sms_using_template($sales_id, 1) == true) { $sms_info = "\x53\x4d\123\40\x48\x61\x73\x20\x62\x65\145\156\x20\123\145\156\x74\41"; } else { $sms_info = "\x46\141\151\x6c\x65\144\40\164\x6f\40\x53\145\x6e\144\x20\123\x4d\x53"; } } $this->db->trans_commit(); $this->session->set_flashdata("\x73\x75\143\x63\x65\x73\x73", "\x53\x75\143\143\145\x73\163\41\x21\40\122\145\143\157\x72\x64\x20\123\141\166\x65\x64\x20\123\165\x63\x63\145\163\x73\x66\165\154\x6c\171\x21\40" . $sms_info); return "\x73\165\x63\x63\145\163\163\x3c\74\x3c\x23\43\43\76\x3e\76{$sales_id}"; } function update_sales_payment_status_by_sales_id($sales_id, $customer_id) { $q8 = $this->db->query("\x73\x65\x6c\145\143\164\40\x43\x4f\x41\114\105\123\x43\105\x28\123\125\x4d\50\x70\141\171\x6d\x65\x6e\x74\x29\x2c\60\51\x20\x61\163\x20\x70\141\171\x6d\x65\x6e\164\40\146\162\157\155\40\x64\142\137\163\x61\x6c\x65\x73\x70\x61\x79\155\145\x6e\164\x73\40\167\150\x65\162\x65\x20\163\x61\x6c\145\x73\137\x69\x64\x3d\47{$sales_id}\x27"); $sum_of_payments = $q8->row()->payment; $payble_total = $this->db->query("\x73\x65\154\145\143\x74\40\x63\x6f\x61\154\x65\x73\x63\145\x28\163\165\x6d\x28\147\x72\141\x6e\144\137\164\157\164\141\x6c\51\x2c\60\x29\40\x61\163\x20\x74\x6f\x74\141\x6c\40\146\x72\x6f\155\40\144\142\x5f\163\141\154\145\x73\40\167\x68\x65\162\145\x20\x69\144\x3d\47{$sales_id}\x27")->row()->total; $payment_status = ''; if ($payble_total == $sum_of_payments) { $payment_status = "\120\x61\x69\x64"; } else { if ($sum_of_payments != 0 && $sum_of_payments < $payble_total) { $payment_status = "\120\x61\x72\x74\x69\141\154"; } else { if ($sum_of_payments == 0) { $payment_status = "\125\156\x70\141\151\x64"; } } } $q7 = $this->db->query("\165\x70\x64\x61\x74\x65\x20\x64\142\x5f\163\x61\x6c\145\163\40\x73\145\164\40\12\11\11\11\x9\11\11\11\160\141\x79\x6d\145\x6e\164\137\163\x74\141\164\165\x73\x3d\47{$payment_status}\x27\54\12\x9\11\x9\11\11\11\x9\x70\x61\151\144\137\x61\x6d\157\x75\156\164\x3d{$sum_of_payments}\x20\12\11\11\11\x9\x9\x9\x9\x77\150\x65\x72\145\x20\151\144\x3d\x27{$sales_id}\x27"); $q12 = $this->db->query("\x75\160\x64\x61\164\145\x20\x64\142\x5f\143\x75\x73\x74\157\155\x65\x72\163\40\x73\x65\164\x20\x73\x61\x6c\145\163\x5f\144\x75\x65\x3d\x28\x73\x65\x6c\145\x63\x74\40\103\117\x41\x4c\105\123\x43\105\50\123\125\115\x28\147\x72\x61\x6e\144\x5f\164\157\164\141\154\x29\54\60\x29\x2d\x43\x4f\x41\114\105\123\103\105\50\123\125\115\x28\x70\141\151\144\x5f\141\155\x6f\165\x6e\x74\51\x2c\x30\x29\40\x66\x72\x6f\x6d\x20\144\142\137\x73\x61\154\x65\163\40\167\150\x65\162\x65\x20\x63\x75\163\164\x6f\155\x65\x72\137\x69\x64\75\47{$customer_id}\47\40\141\156\144\x20\x73\x61\x6c\x65\x73\137\163\164\x61\x74\165\163\75\47\x46\151\x6e\x61\154\47\x29\40\x77\150\145\162\145\40\151\144\75{$customer_id}"); if (!$q12) { return false; } if (!record_customer_payment($customer_id)) { return false; } return true; } function update_sales_payment_status($sales_id, $customer_id) { if (!$this->update_sales_payment_status_by_sales_id($sales_id, $customer_id)) { return false; } return true; } public function get_details($id, $data) { $query = $this->db->query("\163\x65\x6c\x65\x63\164\40\x2a\x20\146\162\157\155\x20\x64\142\137\163\141\x6c\x65\x73\40\167\150\x65\x72\145\x20\x75\x70\160\145\162\50\151\x64\51\75\165\x70\160\145\162\50\47{$id}\47\x29"); if ($query->num_rows() == 0) { show_404(); die; } else { $query = $query->row(); $data["\161\137\x69\x64"] = $query->id; $data["\x69\164\145\x6d\137\x63\157\x64\x65"] = $query->item_code; $data["\x69\164\145\x6d\x5f\x6e\141\155\145"] = $query->item_name; $data["\143\141\x74\145\x67\157\x72\171\137\x6e\x61\x6d\x65"] = $query->category_name; $data["\150\x73\156"] = $query->hsn; $data["\x75\x6e\151\x74\x5f\x6e\141\155\145"] = $query->unit_name; $data["\141\x76\141\151\154\141\142\x6c\x65\x5f\161\164\171"] = $query->available_qty; $data["\141\x6c\x65\162\164\137\x71\x74\x79"] = $query->alert_qty; $data["\163\141\x6c\x65\163\x5f\160\x72\x69\x63\x65"] = $query->sales_price; $data["\x67\163\x74\x5f\160\145\x72\x63\145\156\x74\141\147\x65"] = $query->gst_percentage; return $data; } } public function update_status($id, $status) { $query1 = "\165\160\x64\141\164\145\40\144\x62\137\x73\x61\154\x65\163\40\163\145\164\40\x73\x74\141\164\165\163\75\x27{$status}\47\40\x77\150\145\x72\145\x20\x69\144\75{$id}"; if ($this->db->simple_query($query1)) { echo "\x73\x75\143\x63\145\x73\163"; } else { echo "\x66\x61\151\154\x65\144"; } } public function delete_sales($ids) { if (demo_app()) { echo "\x44\x65\155\157\x20\x6b\150\303\264\156\147\x20\143\150\157\40\x70\150\xc3\xa9\x70\x20\x78\303\263\x61"; return; } $this->db->trans_begin(); $q11 = $this->db->select("\x63\x75\163\164\x6f\x6d\x65\162\137\151\144\x2c\x69\x64")->where("\151\x64\40\151\156\x20\50{$ids}\51")->get("\144\x62\x5f\x73\x61\154\x65\x73"); $q6 = $this->db->select("\151\164\145\155\x5f\151\144")->from("\x64\142\x5f\163\141\154\x65\x73\x69\x74\x65\x6d\x73")->where("\x73\x61\x6c\x65\x73\x5f\151\144\x20\x69\x6e\40\x28{$ids}\x29")->get(); $q12 = $this->db->select("\x2a")->where("\x73\141\x6c\145\163\137\151\x64\x20\x69\x6e\x20\x28{$ids}\51")->get("\x64\x62\137\163\x61\154\x65\163\x72\x65\164\165\x72\156"); if ($q12->num_rows() > 0) { foreach ($q12->result() as $res12) { $sales_code = $this->db->select("\163\141\154\145\163\137\143\x6f\144\145")->where("\151\x64", $res12->sales_id)->get("\144\x62\x5f\163\141\154\145\163")->row()->sales_code; echo "\74\x62\162\76\x49\x6e\x76\157\x69\143\145\40\x43\157\144\x65\72\x20" . $sales_code; } echo "\74\142\162\76\x41\154\162\145\141\144\171\40\x52\x61\x69\x73\145\144\x20\x52\145\x74\x75\x72\156\163\54\x20\x50\x6c\145\x61\x73\145\x20\x44\x65\x6c\x65\x74\x65\40\x42\145\146\157\162\145\40\x44\145\154\x65\x74\151\156\147\40\x4f\x72\x69\x67\151\x6e\x61\154\x20\111\156\x76\157\151\143\145"; die; } $q5 = $this->db->query("\144\145\x6c\145\x74\x65\40\x66\162\x6f\x6d\x20\x64\x62\137\163\x61\154\145\x73\160\141\x79\x6d\x65\156\164\163\x20\x77\x68\145\162\145\x20\163\141\x6c\145\x73\137\x69\x64\40\x69\x6e\x28{$ids}\51"); $q7 = $this->db->query("\144\x65\154\x65\x74\145\x20\146\x72\157\155\40\x64\142\x5f\163\141\x6c\x65\x73\x69\x74\145\155\163\40\x77\x68\x65\162\x65\40\x73\141\154\145\x73\137\151\144\x20\151\x6e\50{$ids}\x29"); $q3 = $this->db->query("\x64\x65\x6c\145\x74\x65\x20\x66\162\x6f\x6d\40\144\142\137\163\141\x6c\x65\163\x20\x77\150\x65\162\x65\40\x69\x64\40\151\x6e\x28{$ids}\x29"); if ($q6->num_rows() > 0) { $this->load->model("\160\x6f\x73\x5f\155\x6f\144\x65\154"); foreach ($q6->result() as $res6) { $q6 = $this->pos_model->update_items_quantity($res6->item_id); if (!$q6) { return "\x66\141\x69\154\x65\x64"; } } } foreach ($q11->result() as $res11) { $q2 = $this->update_sales_payment_status($res11->id, $res11->customer_id); if (!$q2) { return "\146\x61\x69\x6c\145\x64"; } } $this->db->trans_commit(); return "\163\x75\143\143\x65\x73\x73"; } public function search_item($q) { $json_array = array(); $query1 = "\163\145\x6c\x65\143\164\40\151\144\54\x69\x74\145\155\137\x6e\x61\x6d\145\x20\x66\162\x6f\155\x20\144\x62\137\151\164\145\155\163\40\167\150\x65\x72\145\40\x28\165\160\160\145\x72\x28\151\x74\x65\155\137\156\141\x6d\x65\x29\40\x6c\151\x6b\145\40\x75\x70\x70\145\x72\50\x27\x25{$q}\x25\x27\x29\x20\x6f\162\x20\x75\x70\160\145\x72\50\151\164\145\x6d\x5f\143\x6f\144\x65\x29\40\x6c\x69\153\x65\40\165\x70\160\145\162\x28\47\x25{$q}\x25\47\x29\x29"; $q1 = $this->db->query($query1); if ($q1->num_rows() > 0) { foreach ($q1->result() as $value) { $json_array[] = array("\x69\144" => (int) $value->id, "\164\x65\170\164" => $value->item_name); } } return json_encode($json_array); } public function find_item_details($id) { $json_array = array(); $query1 = "\163\145\x6c\x65\143\164\x20\x69\x64\x2c\x68\163\156\x2c\x61\x6c\x65\x72\164\x5f\161\164\x79\x2c\165\156\151\164\x5f\x6e\141\x6d\x65\x2c\163\141\154\x65\x73\137\160\x72\151\143\x65\x2c\x73\x61\x6c\x65\x73\x5f\x70\x72\x69\x63\x65\x2c\x67\x73\164\137\x70\145\162\x63\x65\156\x74\x61\x67\145\x2c\x61\166\x61\151\154\141\142\x6c\145\137\x71\164\x79\x20\x66\162\x6f\x6d\x20\144\x62\x5f\x69\x74\x65\155\163\40\x77\x68\x65\162\145\x20\x69\x64\75{$id}"; $q1 = $this->db->query($query1); if ($q1->num_rows() > 0) { foreach ($q1->result() as $value) { $json_array = array("\x69\144" => $value->id, "\150\x73\156" => $value->hsn, "\x61\x6c\145\x72\164\137\x71\x74\171" => $value->alert_qty, "\165\156\x69\x74\x5f\x6e\141\155\x65" => $value->unit_name, "\163\141\154\145\163\137\x70\x72\x69\143\x65" => $value->sales_price, "\x73\x61\x6c\145\163\137\160\162\x69\x63\145" => $value->sales_price, "\147\x73\164\137\x70\145\162\143\x65\x6e\x74\x61\x67\x65" => $value->gst_percentage, "\141\166\x61\151\x6c\x61\142\154\x65\137\161\x74\x79" => $value->available_qty); } } return json_encode($json_array); } public function get_items_info($rowcount, $item_id) { $q1 = $this->db->select("\52")->from("\144\x62\137\151\x74\x65\x6d\163")->where("\x69\x64\75{$item_id}")->get(); $q3 = $this->db->query("\163\x65\x6c\145\x63\164\x20\x2a\x20\x66\x72\x6f\155\x20\144\x62\x5f\x74\141\x78\40\167\150\145\x72\145\40\151\144\x3d" . $q1->row()->tax_id)->row(); $stock = $q1->row()->stock; $qty = $stock > 1 ? 1 : $stock; $info["\151\164\145\155\137\x69\144"] = $q1->row()->id; $info["\151\x74\145\x6d\137\x6e\x61\155\x65"] = $q1->row()->item_name; $info["\x64\145\x73\x63\x72\151\160\x74\151\157\156"] = ''; $info["\151\x74\x65\x6d\137\163\x61\154\145\x73\x5f\161\164\171"] = $qty; $info["\x69\164\145\155\137\141\166\x61\151\154\x61\x62\x6c\x65\x5f\161\x74\x79"] = $stock; $info["\151\164\x65\155\x5f\163\x61\154\145\x73\x5f\x70\162\151\x63\145"] = $q1->row()->sales_price; $info["\x69\x74\145\155\137\x74\141\170\x5f\156\141\155\145"] = $q3->tax_name; $info["\151\164\x65\x6d\x5f\160\162\x69\143\145"] = $q1->row()->price; $info["\x69\x74\145\x6d\x5f\164\141\170\x5f\x69\x64"] = $q3->id; $info["\x69\x74\x65\x6d\x5f\164\x61\170"] = $q3->tax; $info["\x69\x74\x65\x6d\x5f\x74\x61\170\137\164\x79\160\145"] = $q1->row()->tax_type; $info["\x69\x74\x65\x6d\x5f\144\x69\x73\x63\x6f\165\x6e\x74"] = 0; $info["\151\164\145\x6d\x5f\x64\x69\x73\143\157\165\156\x74\137\164\x79\160\145"] = $q1->row()->discount_type; $info["\151\x74\145\x6d\137\144\151\x73\x63\157\165\156\x74\x5f\151\156\160\165\x74"] = $q1->row()->discount; $info["\160\165\x72\x63\x68\x61\x73\145\x5f\x70\x72\x69\x63\145"] = $q1->row()->price; $info["\x69\164\x65\x6d\x5f\164\x61\170\x5f\141\x6d\x74"] = $q1->row()->tax_type == "\x49\x6e\143\x6c\165\163\x69\166\x65" ? calculate_inclusive($q1->row()->sales_price, $q3->tax) : calculate_exclusive($q1->row()->sales_price, $q3->tax); $this->return_row_with_data($rowcount, $info); } public function return_sales_list($sales_id) { $q1 = $this->db->select("\x2a")->from("\x64\x62\x5f\163\x61\x6c\x65\x73\x69\x74\145\155\x73")->where("\163\x61\154\x65\163\x5f\151\x64\x3d{$sales_id}")->get(); $rowcount = 1; foreach ($q1->result() as $res1) { $q2 = $this->db->query("\x73\x65\x6c\145\143\x74\40\x2a\x20\x66\x72\x6f\x6d\40\x64\142\137\151\x74\145\x6d\163\40\x77\x68\x65\x72\x65\x20\151\x64\75" . $res1->item_id); $q3 = $this->db->query("\x73\x65\x6c\145\x63\x74\40\x2a\x20\x66\162\x6f\x6d\40\144\x62\137\164\x61\170\x20\x77\150\x65\x72\x65\x20\x69\144\75" . $res1->tax_id)->row(); $info["\151\x74\145\155\137\x69\144"] = $res1->item_id; $info["\144\145\163\143\162\151\160\x74\151\157\x6e"] = $res1->description; $info["\151\164\x65\x6d\137\156\141\155\145"] = $q2->row()->item_name; $info["\x69\164\145\155\x5f\163\x61\154\145\163\137\161\x74\x79"] = $res1->sales_qty; $info["\x69\x74\x65\x6d\x5f\x61\166\x61\x69\x6c\141\142\x6c\145\137\161\164\x79"] = $q2->row()->stock + $info["\x69\x74\145\x6d\x5f\163\x61\154\145\x73\x5f\x71\164\171"]; $info["\151\x74\145\155\137\160\162\x69\143\x65"] = $q2->row()->price; $info["\x69\164\x65\x6d\137\x73\141\x6c\x65\163\137\x70\162\x69\x63\x65"] = $res1->price_per_unit; $info["\x69\x74\x65\155\x5f\x74\x61\x78\x5f\156\x61\x6d\x65"] = $q3->tax_name; $info["\x69\x74\x65\x6d\137\x74\x61\x78\x5f\151\144"] = $q3->id; $info["\151\164\145\x6d\x5f\x74\x61\x78"] = $q3->tax; $info["\151\164\x65\x6d\137\164\141\x78\x5f\164\171\x70\x65"] = $res1->tax_type; $info["\x69\x74\145\x6d\137\164\141\x78\137\141\x6d\164"] = $res1->tax_amt; $info["\x69\164\145\x6d\x5f\x64\x69\x73\143\157\165\156\164"] = $res1->discount_input; $info["\151\164\145\155\137\x64\151\163\143\157\x75\156\164\x5f\164\x79\x70\145"] = $res1->discount_type; $info["\x69\x74\145\155\x5f\x64\x69\x73\x63\x6f\x75\156\164\137\x69\156\x70\165\x74"] = $res1->discount_input; $info["\x70\165\162\x63\x68\x61\x73\x65\137\160\x72\151\x63\x65"] = $res1->purchase_price; $result = $this->return_row_with_data($rowcount++, $info); } return $result; } public function return_row_with_data($rowcount, $info) { extract($info); $item_amount = $item_sales_price * $item_sales_qty + $item_tax_amt; ?>
            <tr id="row_<?php  echo $rowcount; ?>
" data-row='<?php  echo $rowcount; ?>
'>
               <td id="td_<?php  echo $rowcount; ?>
_1">
                  <label class='form-control' style='height:auto;' data-toggle="tooltip" title='Edit ?' >
                  <a id="td_data_<?php  echo $rowcount; ?>
_1" href="javascript:void(0)" onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" title=""><?php  echo $item_name; ?>
</a> 
                  		<i onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" class="fa fa-edit pointer"></i>
                  	</label>
               </td>

               <!-- description  -->
               <!-- <td id="td_<?php  echo $rowcount; ?>
_17">
                  
                  <textarea rows="1" type="text" style="font-weight: bold; height=34px;" id="td_data_<?php  echo $rowcount; ?>
_17" name="td_data_<?php  echo $rowcount; ?>
_17" class="form-control no-padding"><?php  echo $description; ?>
</textarea>
               </td> -->

               <!-- Qty -->
               <td id="td_<?php  echo $rowcount; ?>
_3">
                  <div class="input-group ">
                     <span class="input-group-btn">
                     <button onclick="decrement_qty(<?php  echo $rowcount; ?>
)" type="button" class="btn btn-default btn-flat"><i class="fa fa-minus text-danger"></i></button></span>
                     <input typ="text" value="<?php  echo $item_sales_qty; ?>
" class="form-control no-padding text-center" onchange="item_qty_input(<?php  echo $rowcount; ?>
)" id="td_data_<?php  echo $rowcount; ?>
_3" name="td_data_<?php  echo $rowcount; ?>
_3">
                     <span class="input-group-btn">
                     <button onclick="increment_qty(<?php  echo $rowcount; ?>
)" type="button" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i></button></span>
                  </div>
               </td>
               
               <!-- Unit Cost Without Tax-->
               <td id="td_<?php  echo $rowcount; ?>
_10"><input type="text" name="td_data_<?php  echo $rowcount; ?>
_10" id="td_data_<?php  echo $rowcount; ?>
_10" class="form-control text-right no-padding only_currency text-center" onkeyup="calculate_tax(<?php  echo $rowcount; ?>
)" value="<?php  echo $item_sales_price; ?>
"></td>

               <!-- Discount -->
               <td id="td_<?php  echo $rowcount; ?>
_8">
                  <input type="text" data-toggle="tooltip" title="Click to Change" onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" name="td_data_<?php  echo $rowcount; ?>
_8" id="td_data_<?php  echo $rowcount; ?>
_8" class="pointer form-control text-right no-padding only_currency text-center item_discount" value="<?php  echo $item_discount; ?>
" onkeyup="calculate_tax(<?php  echo $rowcount; ?>
)" readonly>
               </td>

               <!-- Tax Amount -->
               <td id="td_<?php  echo $rowcount; ?>
_11" class="<?php  echo tax_disable_class(); ?>
">
                  <input type="text" name="td_data_<?php  echo $rowcount; ?>
_11" id="td_data_<?php  echo $rowcount; ?>
_11" class="form-control text-right no-padding only_currency text-center" value="<?php  echo $item_tax_amt; ?>
" readonly>
               </td>

               <!-- Tax Details -->
               <td id="td_<?php  echo $rowcount; ?>
_12" class="<?php  echo tax_disable_class(); ?>
">
                  <label class='form-control ' style='width:100%;padding-left:0px;padding-right:0px;'>
                  <a id="td_data_<?php  echo $rowcount; ?>
_12" href="javascript:void(0)" data-toggle="tooltip" title='Click to Change' onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" title=""><?php  echo $item_tax_name; ?>
</a>
                  	</label>
               </td>

               <!-- Amount -->
               <td id="td_<?php  echo $rowcount; ?>
_9"><input type="text" name="td_data_<?php  echo $rowcount; ?>
_9" id="td_data_<?php  echo $rowcount; ?>
_9" class="form-control text-right no-padding only_currency text-center" style="border-color: #f39c12;" readonly value="<?php  echo $item_amount; ?>
"></td>
               
               <!-- ADD button -->
               <td id="td_<?php  echo $rowcount; ?>
_16" style="text-align: center;">
                  <a class=" fa fa-fw fa-minus-square text-red" style="cursor: pointer;font-size: 34px;" onclick="removerow(<?php  echo $rowcount; ?>
)" title="Delete ?" name="td_data_<?php  echo $rowcount; ?>
_16" id="td_data_<?php  echo $rowcount; ?>
_16"></a>
               </td>
               <input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_4" name="td_data_<?php  echo $rowcount; ?>
_4" value="<?php  echo $item_sales_price; ?>
">
               <input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_15" name="td_data_<?php  echo $rowcount; ?>
_15" value="<?php  echo $item_tax_id; ?>
">
               <input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_5" name="td_data_<?php  echo $rowcount; ?>
_5" value="<?php  echo $item_tax_amt; ?>
">
               <input type="hidden" id="tr_available_qty_<?php  echo $rowcount; ?>
_13" value="<?php  echo $item_available_qty; ?>
">
               <input type="hidden" id="tr_item_id_<?php  echo $rowcount; ?>
" name="tr_item_id_<?php  echo $rowcount; ?>
" value="<?php  echo $item_id; ?>
">
               <input type="hidden" id="tr_tax_type_<?php  echo $rowcount; ?>
" name="tr_tax_type_<?php  echo $rowcount; ?>
" value="<?php  echo $item_tax_type; ?>
">
               <input type="hidden" id="tr_tax_id_<?php  echo $rowcount; ?>
" name="tr_tax_id_<?php  echo $rowcount; ?>
" value="<?php  echo $item_tax_id; ?>
">
               <input type="hidden" id="tr_tax_value_<?php  echo $rowcount; ?>
" name="tr_tax_value_<?php  echo $rowcount; ?>
" value="<?php  echo $item_tax; ?>
">
               <input type="hidden" id="description_<?php  echo $rowcount; ?>
" name="description_<?php  echo $rowcount; ?>
" value="<?php  echo $description; ?>
">

               <input type="hidden" id="item_discount_type_<?php  echo $rowcount; ?>
" name="item_discount_type_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_type; ?>
">
               <input type="hidden" id="item_discount_input_<?php  echo $rowcount; ?>
" name="item_discount_input_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_input; ?>
">
			   <input type="hidden" id="item_discount_type_first_<?php  echo $rowcount; ?>
" name="item_discount_type_first_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_type; ?>
">
               <input type="hidden" id="item_discount_input_first_<?php  echo $rowcount; ?>
" name="item_discount_input_first_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_input; ?>
">

			 
			   <input type="hidden" id="pur_price_<?php  echo $rowcount; ?>
" name="pur_price_<?php  echo $rowcount; ?>
" value="<?php  echo $purchase_price; ?>
">
            </tr>
		<?php  } public function delete_payment($payment_id) { if (demo_app()) { echo "\104\x65\x6d\157\40\153\150\303\264\156\x67\x20\x63\150\x6f\x20\160\x68\xc3\xa9\x70\x20\170\303\263\x61"; return; } $this->db->trans_begin(); $sales_id = $this->db->query("\x73\x65\154\145\x63\x74\40\163\x61\154\145\x73\137\151\x64\x20\x66\162\x6f\x6d\x20\x64\142\x5f\163\141\154\x65\163\160\x61\171\155\x65\156\x74\163\40\x77\150\x65\x72\x65\x20\x69\x64\x3d{$payment_id}")->row()->sales_id; $customer_id = $this->db->query("\x73\x65\x6c\x65\143\164\40\x63\165\163\164\157\155\145\162\x5f\x69\x64\40\146\x72\x6f\x6d\40\x64\142\137\163\x61\x6c\x65\163\40\x77\150\x65\x72\145\x20\151\x64\x3d{$sales_id}")->row()->customer_id; $q1 = $this->db->query("\144\x65\x6c\145\x74\145\x20\146\162\x6f\155\40\x64\142\137\163\141\154\145\x73\160\141\171\155\x65\x6e\x74\x73\x20\x77\150\x65\162\x65\x20\151\x64\75\47{$payment_id}\47"); $q2 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q1 != 1 || $q2 != 1) { $this->db->trans_rollback(); return "\146\x61\x69\154\x65\144"; } else { $this->db->trans_commit(); return "\163\165\143\143\x65\x73\163"; } } public function show_pay_now_modal($sales_id) { $q1 = $this->db->query("\x73\x65\x6c\145\x63\x74\x20\52\40\x66\x72\x6f\155\40\144\x62\137\x73\x61\x6c\145\163\x20\167\150\x65\x72\x65\40\151\x64\75{$sales_id}"); $res1 = $q1->row(); $customer_id = $res1->customer_id; $q2 = $this->db->query("\163\145\154\145\143\164\x20\x2a\40\x66\162\157\155\x20\144\x62\137\x63\165\x73\164\157\x6d\x65\x72\163\40\167\150\x65\162\145\40\x69\144\75{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $sales_date = $res1->sales_date; $reference_no = $res1->reference_no; $sales_code = $res1->sales_code; $sales_note = $res1->sales_note; $grand_total = $res1->grand_total; $paid_amount = $res1->paid_amount; $due_amount = $grand_total - $paid_amount; if (!empty($customer_country)) { $customer_country = $this->db->query("\163\145\x6c\145\x63\164\40\143\157\x75\x6e\x74\162\171\40\146\162\157\155\x20\x64\142\x5f\143\x6f\x75\x6e\x74\x72\171\40\x77\x68\x65\162\145\x20\151\x64\75\47{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\x73\x65\154\145\x63\164\x20\x73\x74\141\164\x65\40\x66\x72\x6f\155\x20\x64\x62\x5f\x73\164\141\x74\x65\x73\40\167\150\145\x72\x65\x20\x69\x64\75\47{$customer_state}\x27")->row()->state; } ?>
		<div class="modal fade" id="pay_now">
		  <div class="modal-dialog ">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-4 invoice-col">
			          Customer Information
			          <address>
			            <strong><?php  echo $customer_name; ?>
</strong><br>
			            <?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\x6d\157\x62\x69\x6c\x65") . "\72\40" . $customer_mobile . "\x3c\142\162\76" : ''; ?>
			            <?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\160\150\x6f\156\145") . "\x3a\40" . $customer_phone . "\74\142\162\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_email)) ? $this->lang->line("\x65\x6d\141\x69\x6c") . "\x3a\x20" . $customer_email . "\74\142\x72\76" : ''; ?>
			            <?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\x67\163\x74\137\x6e\165\155\142\145\x72") . "\72\40" . $customer_gst_no . "\x3c\x62\162\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\x74\141\170\137\156\165\155\142\145\162") . "\x3a\x20" . $customer_tax_number . "\x3c\x62\x72\76" : ''; ?>
			            
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          Sales Information:
			          <address>
			            <b>Invoice #<?php  echo $sales_code; ?>
</b><br>
			            <b>Date :<?php  echo show_date($sales_date); ?>
</b><br>
			            <b>Grand Total :<?php  echo $grand_total; ?>
</b><br>
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          <b>Paid Amount :<span><?php  echo number_format($paid_amount, 0, "\x2e", ''); ?>
</span></b><br>
			          <b>Due Amount :<span id='due_amount_temp'><?php  echo number_format($due_amount, 0, "\x2e", ''); ?>
</span></b><br>
			         
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
			                      <input type="text" class="form-control pull-right datepicker" value="<?php  echo show_date(date("\x64\x2d\155\55\x59")); ?>
" id="payment_date" name="payment_date" readonly>
			                    </div>
		                      <span id="payment_date_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                  <label for="amount">Amount</label>
		                    <input type="text" class="form-control text-right paid_amt" id="amount" name="amount" placeholder="" value="<?php  echo $due_amount; ?>
" onkeyup="calculate_payments()">
		                      <span id="amount_msg" style="display:none" class="text-danger"></span>
		                </div>
		               </div>
		                <div class="col-md-4">
		                  <div class="">
		                    <label for="payment_type">Payment Type</label>
		                    <select class="form-control" id='payment_type' name="payment_type">
		                      <?php  $q1 = $this->db->query("\163\145\x6c\x65\x63\164\x20\52\40\x66\162\157\x6d\40\144\142\137\160\141\x79\x6d\x65\156\164\164\171\x70\145\163\40\167\x68\x65\162\145\40\x73\x74\141\164\x75\163\75\x31"); if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\74\x6f\x70\x74\151\x6f\156\x20\166\x61\154\x75\x65\75\x27" . $res1->payment_type . "\47\76" . $res1->payment_type . "\x3c\x2f\x6f\x70\x74\x69\157\x6e\x3e"; } } else { echo "\x4e\157\40\x52\145\143\157\x72\x64\163\40\x46\157\165\156\144"; } ?>
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
		        <button type="button" onclick="save_payment(<?php  echo $sales_id; ?>
)" class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i class="fa  fa-check "></i></button>
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php  } public function save_payment() { extract($this->xss_html_filter(array_merge($this->data, $_POST, $_GET))); if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $salespayments_entry = array("\x73\141\154\145\x73\137\151\144" => $sales_id, "\160\141\x79\x6d\x65\156\x74\137\144\x61\164\x65" => date("\x59\x2d\x6d\55\x64", strtotime($payment_date)), "\x70\141\x79\155\145\156\x74\x5f\x74\x79\x70\145" => $payment_type, "\160\141\171\x6d\x65\x6e\164" => $amount, "\160\141\171\x6d\145\x6e\x74\x5f\x6e\157\164\x65" => $payment_note, "\143\x72\145\x61\x74\145\x64\137\x64\141\164\x65" => $CUR_DATE, "\143\162\x65\141\x74\145\144\x5f\x74\x69\155\145" => $CUR_TIME, "\x63\162\x65\x61\x74\x65\x64\137\142\171" => $CUR_USERNAME, "\x73\171\x73\164\x65\155\x5f\151\160" => $SYSTEM_IP, "\x73\171\163\164\145\x6d\x5f\x6e\x61\x6d\x65" => $SYSTEM_NAME, "\163\164\141\x74\x75\x73" => 1); $q3 = $this->db->insert("\144\x62\137\x73\x61\154\145\x73\x70\141\171\155\145\x6e\x74\x73", $salespayments_entry); } else { return "\x50\154\x65\141\x73\145\40\x45\x6e\164\x65\162\40\x56\x61\x6c\151\x64\40\101\155\157\165\x6e\164\x21"; } $customer_id = $this->db->query("\x73\145\x6c\145\x63\164\40\x63\165\x73\x74\157\x6d\x65\x72\x5f\151\144\x20\146\x72\x6f\155\40\x64\142\x5f\163\x61\x6c\145\163\40\x77\x68\145\x72\x65\40\x69\144\x3d{$sales_id}")->row()->customer_id; $q10 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q10 != 1) { return "\146\x61\151\154\145\x64"; } return "\x73\165\x63\143\145\x73\163"; } public function view_payments_modal($sales_id) { $q1 = $this->db->query("\163\145\x6c\145\143\164\40\52\40\x66\162\x6f\155\x20\144\x62\137\x73\x61\x6c\145\x73\40\167\x68\145\x72\x65\40\x69\144\75{$sales_id}"); $res1 = $q1->row(); $customer_id = $res1->customer_id; $q2 = $this->db->query("\x73\x65\154\145\x63\x74\40\52\40\146\162\157\155\40\144\142\137\x63\x75\163\x74\x6f\x6d\145\162\x73\x20\x77\x68\x65\162\x65\x20\x69\x64\x3d{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $sales_date = $res1->sales_date; $reference_no = $res1->reference_no; $sales_code = $res1->sales_code; $sales_note = $res1->sales_note; $grand_total = $res1->grand_total; $paid_amount = $res1->paid_amount; $due_amount = $grand_total - $paid_amount; if (!empty($customer_country)) { $customer_country = $this->db->query("\163\x65\154\x65\143\164\40\143\157\165\156\164\162\x79\x20\146\162\x6f\155\40\144\x62\137\x63\157\x75\x6e\164\162\x79\40\x77\150\145\x72\145\x20\151\x64\x3d\x27{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\163\x65\x6c\x65\x63\x74\x20\x73\x74\x61\164\145\x20\146\162\x6f\155\40\144\x62\137\163\164\141\x74\x65\x73\40\167\x68\145\162\145\40\x69\144\x3d\47{$customer_state}\x27")->row()->state; } ?>
		<div class="modal fade" id="view_payments_modal">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header header-custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center">Payments</h4>
		      </div>
		      <div class="modal-body">
		        
		    <div class="row">
		      <div class="col-md-12">
		      	<div class="row invoice-info">
			        <div class="col-sm-4 invoice-col">
			          customer Information
			          <address>
			            <strong><?php  echo $customer_name; ?>
</strong><br>
			            <?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\155\x6f\x62\x69\x6c\x65") . "\x3a\x20" . $customer_mobile . "\x3c\142\x72\76" : ''; ?>
			            <?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\160\150\x6f\156\145") . "\72\40" . $customer_phone . "\x3c\x62\162\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_email)) ? $this->lang->line("\145\x6d\141\151\x6c") . "\72\40" . $customer_email . "\x3c\x62\162\x3e" : ''; ?>
			            <?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\147\x73\164\x5f\x6e\x75\155\x62\x65\x72") . "\x3a\40" . $customer_gst_no . "\74\142\x72\76" : ''; ?>
			            <?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\x74\x61\170\137\156\165\x6d\x62\x65\x72") . "\x3a\x20" . $customer_tax_number . "\x3c\142\162\x3e" : ''; ?>
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          sales Information:
			          <address>
			            <b>Invoice #<?php  echo $sales_code; ?>
</b><br>
			            <b>Date :<?php  echo show_date($sales_date); ?>
</b><br>
			            <b>Grand Total :<?php  echo $grand_total; ?>
</b><br>
			          </address>
			        </div>
			        <!-- /.col -->
			        <div class="col-sm-4 invoice-col">
			          <b>Paid Amount :<span><?php  echo number_format($paid_amount, 0, "\x2e", ''); ?>
</span></b><br>
			          <b>Due Amount :<span id='due_amount_temp'><?php  echo number_format($due_amount, 0, "\56", ''); ?>
</span></b><br>
			         
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
		      </div>
		      <div class="col-md-12">
		       
		     
		              <div class="row">
		         		<div class="col-md-12">
		                  
		                      <table class="table table-bordered">
                                  <thead>
                                  <tr class="bg-primary">
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Payment</th>
                                    <th>Payment Type</th>
                                    <th>Payment Note</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                	<?php  $q1 = $this->db->query("\163\145\154\x65\x63\164\40\52\40\x66\162\157\x6d\40\144\x62\137\x73\x61\154\145\163\160\141\x79\155\145\156\164\x73\x20\167\150\145\x72\x65\x20\x73\x61\154\145\x73\137\x69\x64\75{$sales_id}\40\141\x6e\144\x20\160\x61\171\155\x65\156\x74\76\60"); $i = 1; $str = ''; if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\74\x74\162\x3e"; echo "\x3c\x74\x64\76" . $i++ . "\74\57\x74\x64\76"; echo "\74\x74\x64\76" . show_date($res1->payment_date) . "\x3c\57\x74\x64\76"; echo "\74\x74\x64\76" . $res1->payment . "\x3c\x2f\x74\144\76"; echo "\74\x74\144\76" . $res1->payment_type . "\x3c\x2f\164\144\76"; echo "\x3c\164\144\76" . $res1->payment_note . "\x3c\x2f\x74\x64\x3e"; echo "\x3c\x74\x64\x3e" . ucfirst($res1->created_by) . "\74\57\164\144\76"; echo "\x3c\164\144\76\74\x61\x20\157\x6e\x63\154\151\x63\x6b\x3d\47\144\145\154\x65\x74\145\137\x73\141\x6c\x65\163\x5f\160\141\x79\155\145\156\x74\50" . $res1->id . "\x29\47\x20\143\154\141\163\x73\x3d\x27\160\x6f\151\156\164\145\162\x20\x62\x74\156\40\40\142\x74\156\x2d\x64\141\156\x67\145\x72\47\40\x3e\74\x69\40\143\x6c\x61\x73\163\75\47\x66\x61\40\146\x61\x2d\x74\162\141\x73\150\x27\76\74\x2f\151\x3e\74\57\x3c\x2f\164\x64\76"; echo "\x3c\57\x74\x72\x3e"; } } else { echo "\74\164\x72\x3e\74\164\x64\40\143\157\x6c\x73\x70\x61\x6e\75\x27\x37\47\x20\143\154\141\163\163\75\47\164\x65\x78\164\55\144\x61\156\147\145\162\40\x74\145\170\x74\x2d\143\145\x6e\164\145\162\x27\x3e\x4e\157\x20\x52\x65\143\157\162\x64\163\x20\x46\x6f\165\156\x64\x3c\57\x74\x64\76\74\x2f\164\162\76"; } ?>
                                </tbody>
                            </table>
		               
		               </div>
		            <div class="clearfix"></div>
		        </div>    
		       
		     
		   
		      </div><!-- col-md-9 -->
		      <!-- RIGHT HAND -->
		    </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
		        
		      </div>
		    </div>
		    <!-- /.modal-content -->
		  </div>
		  <!-- /.modal-dialog -->
		</div>
		<?php  } }