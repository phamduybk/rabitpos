<?php
 defined("\x42\101\123\105\x50\101\124\x48") or die("\116\x6f\40\144\151\162\x65\143\164\40\x73\143\x72\151\160\164\40\x61\x63\143\x65\163\x73\40\x61\154\154\157\x77\145\x64"); class Sales_model extends CI_Model { var $table = "\144\x62\x5f\163\141\x6c\145\x73\40\141\x73\x20\x61"; var $column_order = array("\141\x2e\162\145\164\x75\x72\x6e\137\x62\151\164", "\x61\x2e\x69\x64", "\x61\56\163\x61\x6c\145\x73\137\144\141\x74\145", "\141\56\163\141\154\145\163\137\x63\157\144\145", "\141\x2e\x72\x65\x66\145\x72\x65\156\x63\145\137\x6e\x6f", "\x61\x2e\x67\x72\x61\x6e\x64\x5f\x74\157\x74\x61\154", "\x61\x2e\160\141\x79\x6d\x65\x6e\x74\x5f\x73\164\141\164\165\x73", "\x61\x2e\143\162\145\141\164\x65\144\137\x62\171", "\x62\56\143\165\163\164\x6f\x6d\x65\162\137\156\141\155\x65", "\141\x2e\x70\141\x69\144\137\141\155\x6f\x75\156\x74", "\x61\56\163\x61\x6c\145\163\137\x73\164\141\164\165\x73", "\141\56\160\x6f\163", "\141\x2e\163\141\x6c\x65\137\x73\164\145\x70", "\141\56\x73\143\150\x65\x64\x75\154\x65\x5f\x74\x69\155\x65", "\141\56\x73\141\154\x65\163\137\x6e\157\164\x65"); var $column_search = array("\163\141\154\x65\x73\x5f\x64\x75\x65", "\141\x2e\x72\145\x74\165\162\156\x5f\142\x69\x74", "\141\x2e\151\x64", "\141\x2e\x73\x61\x6c\145\x73\x5f\144\x61\x74\x65", "\141\x2e\163\141\x6c\x65\x73\137\143\157\144\x65", "\141\x2e\x72\145\146\145\x72\145\156\x63\x65\x5f\156\x6f", "\x61\x2e\x67\x72\x61\156\144\137\164\157\164\141\154", "\x61\56\x70\141\171\155\x65\x6e\164\x5f\x73\x74\141\164\165\163", "\141\x2e\x63\x72\x65\x61\164\x65\x64\x5f\142\171", "\x62\x2e\143\165\163\x74\x6f\155\145\162\137\x6e\x61\155\x65", "\141\x2e\160\x61\x69\x64\x5f\141\155\x6f\x75\x6e\164", "\x61\56\x73\x61\x6c\x65\x73\x5f\x73\164\141\164\165\163", "\x61\56\160\x6f\x73"); var $order = array("\141\56\x69\x64" => "\x64\x65\163\x63"); public function __construct() { parent::__construct(); $CI =& get_instance(); } private function _get_datatables_query() { $this->db->select($this->column_order); $this->db->from($this->table); $this->db->select("\143\x6f\x61\x6c\x65\x73\143\145\x28\x61\56\x67\x72\x61\156\144\x5f\x74\x6f\164\141\x6c\54\x30\x29\x2d\x63\x6f\x61\154\145\163\x63\x65\x28\141\56\x70\141\151\144\137\x61\x6d\157\x75\156\x74\54\60\x29\40\x61\163\40\x73\141\154\145\163\x5f\144\x75\145"); $this->db->from("\144\142\x5f\x63\x75\163\164\157\155\145\162\163\x20\x61\x73\x20\x62"); $this->db->where("\x62\x2e\151\144\x3d\x61\56\143\165\163\164\x6f\x6d\x65\162\137\151\x64"); $customer_id = $this->input->post("\143\x75\163\164\x6f\x6d\x65\162\x5f\151\144"); if (!empty($customer_id)) { $this->db->where("\141\56\x63\165\163\x74\157\x6d\145\x72\x5f\151\144", $customer_id); } $sales_from_date = $this->input->post("\x73\141\154\x65\x73\x5f\146\x72\157\155\x5f\x64\141\164\145"); $sales_from_date = system_fromatted_date($sales_from_date); $sales_to_date = $this->input->post("\163\141\154\x65\163\x5f\x74\x6f\137\144\141\164\145"); $sales_to_date = system_fromatted_date($sales_to_date); $users = $this->input->post("\165\x73\x65\x72\137\143\x72\145\141\164\145\144\x5f\142\x79"); if (!permissions("\166\x69\x65\167\x5f\x61\154\154\x5f\165\x73\145\162\x73\137\x73\x61\154\145\x73\x5f\151\156\166\x6f\151\143\145\x73")) { $this->db->where("\x75\x70\x70\145\x72\x28\x61\x2e\143\162\x65\x61\164\x65\144\x5f\x62\171\51", strtoupper($this->session->userdata("\x69\x6e\166\137\x75\163\145\x72\x6e\x61\x6d\145"))); } if ($users && !empty($users)) { $this->db->where("\165\x70\160\x65\162\50\x61\56\143\162\145\x61\164\145\144\137\x62\171\x29", strtoupper($users)); } if ($sales_from_date != "\61\71\67\60\55\x30\x31\55\x30\x31") { $this->db->where("\141\x2e\163\x61\x6c\145\163\x5f\x64\141\x74\145\x3e\75", $sales_from_date); } if ($sales_to_date != "\x31\71\67\x30\55\60\x31\55\x30\61") { $this->db->where("\141\56\163\141\154\145\163\x5f\144\141\x74\145\x3c\x3d", $sales_to_date); } $i = 0; foreach ($this->column_search as $item) { if ($_POST["\x73\x65\141\162\143\150"]["\166\141\154\165\145"]) { if ($i === 0) { $this->db->group_start(); $this->db->like($item, $_POST["\163\x65\x61\162\x63\x68"]["\166\x61\x6c\x75\145"]); } else { $this->db->or_like($item, $_POST["\163\x65\141\162\x63\x68"]["\166\141\154\x75\x65"]); } if (count($this->column_search) - 1 == $i) { $this->db->group_end(); } } $i++; } if (isset($_POST["\157\x72\x64\145\x72"])) { $this->db->order_by($this->column_order[$_POST["\x6f\162\x64\145\162"]["\60"]["\143\x6f\x6c\x75\x6d\156"]], $_POST["\x6f\162\x64\145\x72"]["\60"]["\144\151\x72"]); } else { if (isset($this->order)) { $order = $this->order; $this->db->order_by(key($order), $order[key($order)]); } } } function get_datatables() { $this->_get_datatables_query(); if ($_POST["\x6c\145\x6e\147\164\x68"] != -1) { $this->db->limit($_POST["\x6c\145\x6e\147\164\x68"], $_POST["\x73\164\x61\x72\x74"]); } $query = $this->db->get(); return $query->result(); } function count_filtered() { $this->_get_datatables_query(); $query = $this->db->get(); return $query->num_rows(); } public function count_all() { $this->db->from($this->table); return $this->db->count_all_results(); } public function xss_html_filter($input) { return $this->security->xss_clean(html_escape($input)); } public function verify_save_and_update() { extract($this->xss_html_filter(array_merge($this->data, $_POST, $_GET))); $this->db->trans_begin(); $sales_date = date("\x59\x2d\x6d\x2d\x64", strtotime($sales_date)); $schedule_date = date("\x59\x2d\155\55\144", strtotime(str_replace("\57", "\x2d", $schedule_time))); if ($other_charges_input == '' || $other_charges_input == 0) { $other_charges_input = null; } if ($other_charges_tax_id == '' || $other_charges_tax_id == 0) { $other_charges_tax_id = null; } if ($other_charges_amt == '' || $other_charges_amt == 0) { $other_charges_amt = null; } if ($discount_to_all_input == '' || $discount_to_all_input == 0) { $discount_to_all_input = null; } if ($tot_discount_to_all_amt == '' || $tot_discount_to_all_amt == 0) { $tot_discount_to_all_amt = null; } if ($tot_round_off_amt == '' || $tot_round_off_amt == 0) { $tot_round_off_amt = null; } if ($command == "\163\141\x76\145") { $qs5 = "\x73\145\154\145\x63\x74\x20\x73\141\x6c\x65\163\x5f\x69\x6e\x69\164\40\146\162\x6f\x6d\40\144\142\x5f\x63\157\x6d\x70\x61\156\x79"; $q5 = $this->db->query($qs5); $sales_init = $q5->row()->sales_init; $this->db->query("\101\x4c\x54\x45\x52\40\x54\x41\x42\114\105\40\144\142\137\163\x61\x6c\145\x73\40\101\125\x54\x4f\x5f\x49\116\103\x52\105\115\105\116\x54\40\x3d\x20\61"); $q4 = $this->db->query("\163\145\x6c\x65\143\164\40\143\x6f\x61\x6c\x65\163\143\145\50\x6d\141\x78\50\x69\x64\x29\54\x30\x29\x2b\x31\x20\x61\x73\x20\155\x61\170\x69\x64\40\x66\162\157\x6d\x20\x64\x62\137\163\141\154\145\x73"); $maxid = $q4->row()->maxid; $sales_code = $sales_init . str_pad($maxid, 4, "\x30", STR_PAD_LEFT); $sales_entry = array("\163\141\x6c\145\163\x5f\x63\157\144\145" => $sales_code, "\x72\x65\x66\x65\162\x65\156\143\x65\137\156\x6f" => $reference_no, "\x73\141\x6c\145\163\137\144\141\x74\145" => $sales_date, "\x73\x61\x6c\145\163\x5f\163\x74\x61\164\x75\163" => $sales_status, "\143\x75\x73\x74\157\155\x65\162\137\x69\144" => $customer_id, "\157\164\x68\145\x72\x5f\143\x68\141\x72\x67\x65\x73\x5f\x69\156\x70\165\x74" => $other_charges_input, "\x6f\164\x68\145\x72\137\x63\x68\x61\162\147\145\163\x5f\x74\x61\x78\x5f\x69\x64" => $other_charges_tax_id, "\157\164\x68\145\162\x5f\x63\x68\x61\162\x67\145\x73\x5f\x61\155\164" => $other_charges_amt, "\144\x69\x73\143\157\165\156\164\137\x74\157\x5f\141\154\154\x5f\x69\x6e\160\165\164" => $discount_to_all_input, "\x64\x69\163\143\x6f\x75\156\x74\x5f\164\x6f\x5f\141\x6c\154\137\x74\171\x70\145" => $discount_to_all_type, "\x74\x6f\164\137\x64\x69\163\143\x6f\165\156\164\x5f\x74\x6f\x5f\x61\154\154\137\x61\155\x74" => $tot_discount_to_all_amt, "\163\x75\142\x74\x6f\x74\x61\154" => $tot_subtotal_amt, "\x72\x6f\x75\x6e\x64\137\x6f\x66\x66" => $tot_round_off_amt, "\x67\x72\141\156\144\x5f\164\157\164\x61\154" => $tot_total_amt, "\x73\141\154\x65\x73\137\156\x6f\x74\145" => $sales_note, "\143\162\145\141\164\x65\x64\137\x64\141\x74\145" => $CUR_DATE, "\x63\x72\145\x61\164\145\144\137\x74\151\155\x65" => $CUR_TIME, "\143\162\x65\141\164\145\x64\137\142\x79" => $CUR_USERNAME, "\163\x79\x73\x74\145\x6d\137\151\x70" => $SYSTEM_IP, "\163\x79\x73\x74\x65\155\x5f\156\141\155\x65" => $SYSTEM_NAME, "\163\x74\141\x74\165\163" => 1, "\x73\143\x68\x65\x64\165\154\145\x5f\164\x69\x6d\145" => $schedule_date); $q1 = $this->db->insert("\x64\142\x5f\x73\141\x6c\145\x73", $sales_entry); $sales_id = $this->db->insert_id(); } else { if ($command == "\x75\x70\144\x61\164\x65") { $sales_entry = array("\x72\x65\146\x65\x72\x65\156\x63\145\137\156\157" => $reference_no, "\163\x61\x6c\145\x73\137\144\141\164\145" => $sales_date, "\163\x61\x6c\x65\x73\x5f\163\x74\x61\x74\x75\163" => $sales_status, "\x63\x75\163\164\x6f\x6d\x65\162\137\151\144" => $customer_id, "\x6f\x74\150\x65\162\137\143\x68\141\x72\x67\x65\163\x5f\x69\x6e\160\165\164" => $other_charges_input, "\157\164\x68\145\x72\x5f\x63\150\x61\162\x67\x65\163\137\x74\141\x78\x5f\x69\144" => $other_charges_tax_id, "\x6f\x74\150\x65\x72\x5f\143\150\x61\x72\147\145\x73\x5f\x61\155\x74" => $other_charges_amt, "\x64\151\163\x63\157\165\156\x74\x5f\x74\x6f\137\141\154\x6c\x5f\151\156\x70\165\x74" => $discount_to_all_input, "\144\151\163\x63\157\x75\x6e\164\x5f\164\x6f\x5f\141\x6c\154\137\x74\x79\160\145" => $discount_to_all_type, "\164\x6f\x74\x5f\144\x69\x73\x63\x6f\x75\156\x74\x5f\x74\x6f\x5f\x61\x6c\154\x5f\141\x6d\x74" => $tot_discount_to_all_amt, "\163\165\142\164\157\x74\141\x6c" => $tot_subtotal_amt, "\162\x6f\165\156\x64\137\x6f\146\x66" => $tot_round_off_amt, "\x67\x72\141\x6e\144\x5f\x74\x6f\164\141\x6c" => $tot_total_amt, "\163\141\154\145\x73\137\x6e\157\x74\145" => $sales_note); $q1 = $this->db->where("\x69\144", $sales_id)->update("\x64\142\x5f\x73\x61\154\x65\163", $sales_entry); $q6 = $this->db->select("\151\x74\x65\x6d\x5f\x69\x64")->from("\x64\142\x5f\163\x61\154\145\163\151\164\145\x6d\163")->where("\x73\141\154\x65\163\x5f\x69\x64\40\x69\x6e\x20\x28{$sales_id}\51")->get(); $q11 = $this->db->query("\x64\145\x6c\x65\x74\145\40\x66\x72\x6f\x6d\40\144\x62\x5f\x73\141\x6c\145\x73\x69\164\x65\x6d\x73\40\x77\x68\x65\162\x65\x20\x73\x61\x6c\145\x73\137\x69\x64\x3d\x27{$sales_id}\x27"); if (!$q11) { return "\146\x61\151\x6c\x65\x64"; } if ($q6->num_rows() > 0) { $this->load->model("\160\157\x73\137\155\157\144\x65\x6c"); foreach ($q6->result() as $res6) { $q6 = $this->pos_model->update_items_quantity($res6->item_id); if (!$q6) { return "\146\141\151\154\x65\x64"; } } } } } for ($i = 1; $i <= $rowcount; $i++) { if (isset($_REQUEST["\164\x72\x5f\151\164\x65\x6d\137\x69\144\137" . $i]) && !empty($_REQUEST["\164\x72\137\x69\x74\145\x6d\137\151\144\137" . $i])) { $item_id = $this->xss_html_filter(trim($_REQUEST["\164\x72\x5f\x69\x74\145\155\x5f\151\144\x5f" . $i])); $sales_qty = $this->xss_html_filter(trim($_REQUEST["\164\x64\x5f\x64\141\164\x61\137" . $i . "\137\x33"])); $price_per_unit = $this->xss_html_filter(trim($_REQUEST["\x74\144\x5f\x64\141\164\141\x5f" . $i . "\x5f\64"])); $tax_id = $this->xss_html_filter(trim($_REQUEST["\x74\162\137\164\x61\x78\137\151\144\x5f" . $i])); $tax_amt = $this->xss_html_filter(trim($_REQUEST["\164\144\137\144\x61\x74\141\x5f" . $i . "\x5f\61\x31"])); $unit_total_cost = $this->xss_html_filter(trim($_REQUEST["\164\144\x5f\x64\141\x74\x61\x5f" . $i . "\137\x31\x30"])); $total_cost = $this->xss_html_filter(trim($_REQUEST["\x74\x64\x5f\144\141\x74\141\137" . $i . "\137\x39"])); $tax_type = $this->xss_html_filter(trim($_REQUEST["\164\x72\x5f\x74\x61\x78\x5f\x74\171\x70\x65\x5f" . $i])); $unit_tax = $this->xss_html_filter(trim($_REQUEST["\164\162\x5f\164\141\x78\137\166\x61\154\165\x65\x5f" . $i])); $description = $this->xss_html_filter(trim($_REQUEST["\144\145\x73\x63\162\x69\x70\x74\x69\157\156\137" . $i])); $discount_type = $this->xss_html_filter(trim($_REQUEST["\x69\164\x65\155\x5f\144\151\163\143\x6f\x75\156\164\x5f\x74\x79\x70\x65\137" . $i])); $discount_input = $this->xss_html_filter(trim($_REQUEST["\x69\164\x65\x6d\x5f\x64\151\163\143\x6f\x75\x6e\164\137\151\x6e\160\165\164\137" . $i])); $discount_amt = $this->xss_html_filter(trim($_REQUEST["\x74\144\x5f\144\141\x74\x61\137" . $i . "\x5f\70"])); $purchase_price = $this->xss_html_filter(trim($_REQUEST["\160\165\162\x5f\160\162\x69\143\145\x5f" . $i])); $sub_price = $this->xss_html_filter(trim($_REQUEST["\163\x75\x62\x5f\160\x72\x69\x63\145\x5f" . $i])); $item_details = get_item_details($item_id); $current_stock_of_item = $item_details->stock; if ($current_stock_of_item < $sales_qty) { return $item_details->item_name . "\x20\150\141\x73\40\x6f\156\154\x79\40" . $current_stock_of_item . "\x20\x69\156\40\123\164\x6f\x63\x6b\41\x21"; die; } $discount_amt_per_unit = $discount_amt / $sales_qty; if ($tax_type == "\x45\170\143\x6c\165\163\x69\x76\x65") { $single_unit_total_cost = $price_per_unit + $unit_tax * $price_per_unit / 100; } else { $single_unit_total_cost = $price_per_unit; } $single_unit_total_cost -= $discount_amt_per_unit; if ($tax_id == '' || $tax_id == 0) { $tax_id = null; } if ($tax_amt == '' || $tax_amt == 0) { $tax_amt = null; } if ($discount_input == '' || $discount_input == 0) { $discount_input = null; } if ($total_cost == '' || $total_cost == 0) { $total_cost = null; } $salesitems_entry = array("\x73\x61\154\145\x73\x5f\x69\144" => $sales_id, "\163\x61\x6c\x65\163\137\x73\x74\141\164\165\x73" => $sales_status, "\x69\164\145\155\x5f\x69\x64" => $item_id, "\x64\x65\x73\x63\x72\151\160\164\151\x6f\156" => $description, "\x73\141\154\145\x73\137\x71\164\x79" => $sales_qty, "\x70\x72\151\143\x65\137\x70\x65\162\137\x75\x6e\x69\164" => $price_per_unit, "\164\141\x78\x5f\x74\171\160\145" => $tax_type, "\x74\x61\x78\137\151\144" => $tax_id, "\x74\141\170\137\141\155\164" => $tax_amt, "\144\151\163\x63\x6f\x75\x6e\164\137\x69\156\x70\x75\x74" => $discount_input, "\x64\x69\163\x63\x6f\x75\156\164\x5f\141\x6d\164" => $discount_amt, "\144\151\x73\143\x6f\165\x6e\x74\137\x74\171\x70\x65" => $discount_type, "\165\156\x69\164\x5f\x74\157\164\141\154\137\x63\157\x73\x74" => $single_unit_total_cost, "\x74\157\164\141\154\x5f\143\x6f\x73\164" => $total_cost, "\160\165\162\143\150\x61\163\x65\x5f\x70\162\x69\x63\145" => $purchase_price, "\x73\165\x62\137\x70\x72\x69\143\145" => $sub_price, "\163\x61\154\145\137\163\164\x65\x70" => 0, "\x73\x74\141\x74\165\163" => 1); $q2 = $this->db->insert("\x64\x62\x5f\x73\141\x6c\145\163\x69\164\x65\x6d\x73", $salesitems_entry); $this->load->model("\x70\157\163\137\155\157\144\x65\x6c"); $q6 = $this->pos_model->update_items_quantity($item_id); if (!$q6) { return "\x66\x61\151\154\145\x64"; } } } if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $salespayments_entry = array("\x73\141\x6c\145\x73\137\x69\144" => $sales_id, "\160\141\171\x6d\x65\156\x74\x5f\x64\141\x74\145" => $sales_date, "\x70\141\171\155\145\x6e\x74\137\164\x79\x70\x65" => $payment_type, "\x70\141\x79\x6d\x65\156\x74" => $amount, "\x70\x61\x79\x6d\x65\x6e\x74\x5f\156\157\x74\x65" => $payment_note, "\x63\x72\145\x61\x74\145\x64\137\144\x61\164\145" => $CUR_DATE, "\143\162\x65\x61\x74\x65\x64\137\x74\x69\155\x65" => $CUR_TIME, "\143\162\x65\141\x74\145\144\x5f\x62\171" => $CUR_USERNAME, "\163\171\x73\x74\145\155\137\151\160" => $SYSTEM_IP, "\x73\x79\x73\x74\145\155\137\156\141\x6d\145" => $SYSTEM_NAME, "\x73\x74\x61\x74\165\x73" => 1); $q3 = $this->db->insert("\x64\142\137\x73\141\x6c\145\x73\x70\141\x79\x6d\145\x6e\x74\163", $salespayments_entry); if ($q3 != 1) { return "\x66\x61\x69\154\145\x64"; } } $q10 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q10 != 1) { return "\x66\x61\151\x6c\x65\x64"; } $sms_info = ''; if (isset($send_sms) && $customer_id != 1) { if (send_sms_using_template($sales_id, 1) == true) { $sms_info = "\123\x4d\123\x20\110\x61\x73\40\142\x65\145\156\40\x53\x65\156\164\x21"; } else { $sms_info = "\x46\x61\x69\x6c\145\x64\40\x74\157\40\123\145\156\x64\40\x53\x4d\x53"; } } $this->db->trans_commit(); return "\x73\x75\143\x63\145\x73\x73\74\x3c\74\x23\43\x23\76\76\76{$sales_id}"; } function update_sales_payment_status_by_sales_id($sales_id, $customer_id) { $q8 = $this->db->query("\163\x65\x6c\x65\143\164\40\103\117\x41\x4c\x45\x53\x43\x45\x28\x53\125\x4d\50\x70\141\171\155\145\156\164\51\54\60\51\x20\x61\163\x20\160\141\x79\x6d\145\156\164\x20\146\x72\x6f\155\x20\x64\142\x5f\163\x61\x6c\145\163\160\x61\x79\x6d\x65\x6e\164\163\40\167\x68\145\x72\x65\x20\163\x61\x6c\145\163\137\151\x64\x3d\x27{$sales_id}\x27"); $sum_of_payments = $q8->row()->payment; $payble_total = $this->db->query("\163\x65\154\145\x63\164\x20\143\157\141\154\145\163\x63\x65\50\x73\165\155\x28\x67\162\x61\156\144\x5f\x74\157\164\x61\154\x29\54\60\x29\40\x61\x73\40\x74\x6f\x74\x61\x6c\x20\146\x72\157\x6d\40\144\x62\137\163\141\154\145\163\40\167\x68\145\x72\x65\40\x69\x64\75\x27{$sales_id}\x27")->row()->total; $payment_status = ''; if ($payble_total == $sum_of_payments) { $payment_status = "\120\141\x69\144"; } else { if ($sum_of_payments != 0 && $sum_of_payments < $payble_total) { $payment_status = "\120\141\162\164\x69\x61\154"; } else { if ($sum_of_payments == 0) { $payment_status = "\x55\x6e\160\141\151\144"; } } } $q7 = $this->db->query("\165\x70\144\141\164\x65\x20\x64\142\x5f\163\x61\154\145\163\x20\163\145\164\x20\xa\11\11\x9\x9\11\x9\x9\160\141\171\x6d\x65\156\164\x5f\163\164\141\x74\x75\163\x3d\x27{$payment_status}\47\54\xa\x9\x9\x9\x9\x9\x9\11\x70\141\x69\144\x5f\141\155\x6f\x75\156\164\x3d{$sum_of_payments}\40\xa\11\11\11\x9\11\x9\11\167\150\x65\162\x65\40\x69\144\75\x27{$sales_id}\47"); $q12 = $this->db->query("\x75\x70\144\141\164\145\40\x64\142\x5f\143\165\163\x74\157\x6d\x65\162\x73\x20\163\145\x74\x20\163\141\154\x65\x73\137\144\x75\145\75\x28\163\x65\154\145\x63\164\40\103\117\x41\x4c\105\x53\103\x45\50\123\x55\x4d\x28\x67\x72\141\156\x64\137\164\157\x74\x61\154\x29\54\60\x29\x2d\103\117\101\114\x45\x53\x43\x45\x28\123\125\115\x28\160\x61\151\144\137\141\155\157\x75\x6e\x74\x29\54\x30\x29\40\146\162\157\155\40\x64\x62\x5f\x73\141\154\145\163\x20\167\150\x65\162\x65\40\x63\165\x73\164\x6f\155\145\x72\x5f\151\144\75\47{$customer_id}\x27\40\141\156\144\40\163\141\x6c\145\163\137\163\164\x61\x74\x75\163\75\47\x46\x69\156\x61\x6c\x27\x29\x20\167\x68\145\162\145\x20\151\144\75{$customer_id}"); if (!$q12) { return false; } if (!record_customer_payment($customer_id)) { return false; } return true; } function update_sales_payment_status($sales_id, $customer_id) { if (!$this->update_sales_payment_status_by_sales_id($sales_id, $customer_id)) { return false; } return true; } public function get_details($id, $data) { $query = $this->db->query("\163\145\x6c\x65\x63\x74\x20\x2a\40\146\162\x6f\155\x20\144\142\137\163\141\x6c\x65\x73\40\x77\150\145\x72\145\x20\x75\x70\x70\145\x72\x28\151\144\x29\x3d\x75\160\x70\x65\x72\x28\47{$id}\47\x29"); if ($query->num_rows() == 0) { show_404(); die; } else { $query = $query->row(); $data["\161\x5f\x69\x64"] = $query->id; $data["\x69\164\145\x6d\137\x63\157\x64\x65"] = $query->item_code; $data["\x69\164\145\x6d\137\156\141\x6d\145"] = $query->item_name; $data["\143\141\x74\x65\147\x6f\x72\x79\137\156\141\x6d\145"] = $query->category_name; $data["\150\x73\x6e"] = $query->hsn; $data["\165\156\151\x74\137\x6e\x61\155\145"] = $query->unit_name; $data["\141\166\x61\151\x6c\x61\x62\154\x65\x5f\161\x74\x79"] = $query->available_qty; $data["\141\154\x65\x72\x74\x5f\161\164\171"] = $query->alert_qty; $data["\163\141\154\x65\163\137\x70\x72\151\143\x65"] = $query->sales_price; $data["\147\x73\164\137\x70\x65\162\x63\x65\156\x74\x61\147\145"] = $query->gst_percentage; return $data; } } public function update_status($id, $status) { $query1 = "\x75\x70\144\x61\x74\145\40\x64\x62\137\x73\x61\x6c\x65\x73\x20\x73\145\164\x20\x73\x74\x61\x74\165\x73\x3d\x27{$status}\47\40\167\x68\145\162\x65\x20\151\x64\75{$id}"; if ($this->db->simple_query($query1)) { echo "\x73\x75\x63\x63\145\163\x73"; } else { echo "\146\141\151\154\145\144"; } } public function update_step($id, $status) { $note = date("\x48\x3a\x69\x20\144\57\x6d\57\x59"); if ($status == 1) { $note = "\304\220\303\xa3\x20\x78\x6f\x6e\147\x3a\x20" . $note . "\73"; } else { if ($status == 2) { $note = "\xc4\220\xc3\xa3\x20\x74\162\341\272\243\40\x68\xc3\240\156\x67\x3a\40" . $note . "\73"; } else { $note = "\116\150\xe1\xba\255\156\x20\x68\xc3\240\156\x67\40\154\xe1\xba\241\x69\x3a\x20" . $note . "\x3b"; } } $query1 = "\x55\x50\x44\x41\x54\105\40\x64\x62\x5f\x73\x61\x6c\145\163\x20\123\105\x54\40\x73\x61\154\145\x5f\x73\164\145\160\40\75\40\47{$status}\47\54\x20\163\141\154\145\163\x5f\x6e\157\x74\x65\x20\x3d\x20\x43\x4f\116\103\101\x54\50\111\106\116\125\114\x4c\x28\x73\x61\x6c\145\x73\x5f\156\157\164\x65\54\40\47\47\51\54\40\47{$note}\x27\x29\x20\x57\110\x45\122\105\x20\151\x64\x20\75\x20{$id}"; if ($this->db->simple_query($query1)) { echo "\163\165\x63\143\145\x73\x73"; } else { echo "\x66\141\x69\x6c\x65\144"; } } public function update_note($id, $note) { $date = date("\x48\72\x69\x20\x64\57\155\57\131"); $note = $note . "\x20\72\40" . $date . "\73"; $query1 = "\x55\120\x44\101\124\105\x20\x64\x62\137\x73\x61\154\x65\163\40\x53\105\124\40\x20\x73\x61\x6c\x65\x73\x5f\156\157\164\x65\40\75\40\x43\x4f\x4e\x43\x41\124\50\111\x46\116\x55\114\114\50\x73\x61\154\145\x73\137\x6e\x6f\164\x65\54\x20\47\47\51\x2c\40\47{$note}\x27\x29\x20\127\x48\x45\122\x45\40\151\144\40\75\x20{$id}"; if ($this->db->simple_query($query1)) { echo "\163\x75\143\143\145\x73\x73"; } else { echo "\146\141\x69\154\x65\144"; } } public function delete_sales($ids) { if (demo_app()) { echo "\104\145\155\157\40\153\x68\303\264\156\147\40\143\x68\x6f\40\160\x68\xc3\xa9\x70\40\x78\303\xb3\x61"; return; } $this->db->trans_begin(); $q11 = $this->db->select("\143\165\x73\164\157\155\x65\162\x5f\151\144\54\x69\x64")->where("\151\144\40\x69\x6e\40\50{$ids}\x29")->get("\144\x62\x5f\163\141\x6c\145\163"); $q6 = $this->db->select("\x69\x74\145\x6d\137\x69\x64")->from("\144\x62\137\163\141\x6c\145\163\151\164\x65\x6d\163")->where("\x73\141\154\x65\163\x5f\151\x64\x20\x69\156\x20\x28{$ids}\51")->get(); $q12 = $this->db->select("\x2a")->where("\163\x61\x6c\x65\x73\137\x69\x64\x20\151\156\x20\50{$ids}\x29")->get("\144\x62\x5f\163\141\x6c\145\163\x72\145\164\x75\x72\x6e"); if ($q12->num_rows() > 0) { foreach ($q12->result() as $res12) { $sales_code = $this->db->select("\163\141\154\145\x73\137\143\157\x64\x65")->where("\x69\x64", $res12->sales_id)->get("\x64\x62\137\x73\141\154\x65\163")->row()->sales_code; echo "\x3c\x62\162\x3e\111\x6e\166\157\151\x63\x65\x20\x43\x6f\x64\x65\x3a\40" . $sales_code; } echo "\x3c\142\x72\x3e\101\x6c\162\x65\x61\144\171\x20\122\141\x69\x73\x65\144\x20\122\x65\x74\x75\162\156\x73\54\40\120\x6c\145\x61\163\145\x20\104\x65\x6c\x65\164\145\x20\x42\x65\x66\157\x72\145\x20\x44\x65\154\x65\164\151\x6e\x67\x20\x4f\162\151\147\151\x6e\x61\x6c\x20\111\x6e\166\157\151\143\x65"; die; } $q5 = $this->db->query("\x64\145\x6c\x65\164\x65\40\x66\162\x6f\155\x20\x64\142\137\x73\141\x6c\x65\163\x70\141\x79\155\145\x6e\x74\x73\40\x77\x68\x65\x72\145\x20\x73\x61\x6c\x65\163\x5f\x69\x64\40\151\156\50{$ids}\51"); $q7 = $this->db->query("\144\145\154\145\164\145\40\146\162\157\x6d\x20\x64\142\137\x73\x61\154\x65\x73\151\x74\145\155\x73\40\167\x68\x65\x72\145\x20\x73\141\154\x65\x73\x5f\151\144\40\151\x6e\x28{$ids}\51"); $q3 = $this->db->query("\x64\145\x6c\145\164\145\40\x66\162\x6f\155\x20\x64\x62\x5f\x73\x61\x6c\x65\163\40\167\x68\145\162\x65\x20\x69\144\x20\151\156\50{$ids}\x29"); if ($q6->num_rows() > 0) { $this->load->model("\160\x6f\x73\137\155\x6f\144\x65\x6c"); foreach ($q6->result() as $res6) { $q6 = $this->pos_model->update_items_quantity($res6->item_id); if (!$q6) { return "\x66\141\151\x6c\145\144"; } } } foreach ($q11->result() as $res11) { $q2 = $this->update_sales_payment_status($res11->id, $res11->customer_id); if (!$q2) { return "\x66\141\151\x6c\145\x64"; } } $this->db->trans_commit(); return "\x73\x75\x63\x63\x65\x73\x73"; } public function search_item($q) { $json_array = array(); $query1 = "\x73\145\154\145\x63\164\x20\x69\x64\x2c\x69\164\145\155\x5f\156\141\x6d\x65\40\146\x72\157\x6d\x20\144\x62\x5f\x69\x74\x65\155\x73\x20\x77\x68\145\x72\x65\40\x28\x75\x70\160\x65\162\x28\x69\164\145\155\137\x6e\141\x6d\x65\51\40\154\151\x6b\145\x20\x75\160\160\x65\162\50\47\x25{$q}\x25\47\x29\x20\157\162\x20\x75\x70\160\145\162\50\151\164\145\155\137\x63\157\144\145\51\x20\154\151\153\145\x20\165\x70\160\145\162\50\x27\x25{$q}\45\x27\51\51"; $q1 = $this->db->query($query1); if ($q1->num_rows() > 0) { foreach ($q1->result() as $value) { $json_array[] = array("\x69\144" => (int) $value->id, "\x74\145\x78\x74" => $value->item_name); } } return json_encode($json_array); } public function find_item_details($id) { $json_array = array(); $query1 = "\x73\145\154\x65\x63\x74\x20\151\144\54\x68\x73\x6e\54\x61\154\145\162\164\137\161\164\171\54\x75\x6e\151\x74\137\156\141\x6d\145\54\x73\141\154\145\x73\137\x70\162\151\x63\x65\54\x73\x61\x6c\x65\163\137\160\x72\x69\x63\x65\x2c\x67\163\164\x5f\x70\x65\x72\x63\145\156\x74\x61\147\x65\x2c\x61\166\141\x69\x6c\141\142\x6c\x65\137\161\164\171\40\x66\x72\157\x6d\x20\144\142\x5f\151\x74\145\x6d\x73\x20\167\x68\x65\162\x65\40\x69\x64\75{$id}"; $q1 = $this->db->query($query1); if ($q1->num_rows() > 0) { foreach ($q1->result() as $value) { $json_array = array("\x69\x64" => $value->id, "\150\x73\x6e" => $value->hsn, "\141\x6c\145\x72\x74\x5f\x71\164\x79" => $value->alert_qty, "\x75\x6e\151\164\x5f\156\141\x6d\x65" => $value->unit_name, "\x73\141\154\145\x73\x5f\x70\x72\x69\x63\145" => $value->sales_price, "\163\141\x6c\x65\163\137\160\162\x69\143\x65" => $value->sales_price, "\x67\x73\x74\x5f\x70\145\x72\143\x65\156\164\141\x67\x65" => $value->gst_percentage, "\141\x76\x61\x69\154\141\142\154\x65\137\161\164\171" => $value->available_qty); } } return json_encode($json_array); } public function get_items_info($rowcount, $item_id) { $q1 = $this->db->select("\52")->from("\x64\142\137\151\x74\145\x6d\x73")->where("\x69\x64\x3d{$item_id}")->get(); $q3 = $this->db->query("\x73\145\154\x65\x63\164\40\52\40\146\x72\157\x6d\40\144\x62\137\164\x61\170\x20\x77\x68\x65\x72\145\40\x69\144\x3d" . $q1->row()->tax_id)->row(); $stock = $q1->row()->stock; $qty = $stock > 1 ? 1 : $stock; $info["\x69\x74\145\x6d\137\151\144"] = $q1->row()->id; $info["\x69\x74\x65\155\x5f\x6e\141\155\x65"] = $q1->row()->item_name; $info["\x64\145\x73\143\162\x69\160\164\x69\157\156"] = ''; $info["\x69\164\x65\x6d\x5f\163\141\x6c\x65\x73\137\161\164\x79"] = $qty; $info["\x69\164\145\x6d\137\x61\x76\x61\x69\154\x61\142\x6c\145\x5f\161\x74\x79"] = $stock; $info["\151\x74\145\x6d\x5f\x73\141\154\x65\x73\x5f\x70\162\151\x63\x65"] = $q1->row()->sales_price; $info["\x69\164\x65\155\137\164\141\x78\x5f\156\141\x6d\x65"] = $q3->tax_name; $info["\151\x74\x65\155\x5f\160\162\x69\x63\145"] = $q1->row()->price; $info["\151\164\x65\x6d\x5f\164\x61\170\137\151\144"] = $q3->id; $info["\x69\x74\x65\155\x5f\164\x61\170"] = $q3->tax; $info["\x69\164\145\155\x5f\164\x61\x78\x5f\164\x79\160\x65"] = $q1->row()->tax_type; $info["\151\164\x65\155\x5f\x64\x69\163\x63\157\165\x6e\164"] = 0; $info["\151\164\x65\x6d\x5f\144\151\x73\x63\157\165\156\x74\x5f\164\x79\160\145"] = $q1->row()->discount_type; $info["\151\x74\145\155\137\144\x69\x73\x63\157\x75\x6e\164\137\151\156\x70\x75\x74"] = $q1->row()->discount; $info["\160\x75\162\x63\150\x61\x73\x65\x5f\x70\x72\151\143\x65"] = $q1->row()->price; $info["\x69\164\145\155\137\164\x61\x78\137\141\x6d\x74"] = $q1->row()->tax_type == "\x49\156\x63\x6c\x75\x73\x69\x76\145" ? calculate_inclusive($q1->row()->sales_price, $q3->tax) : calculate_exclusive($q1->row()->sales_price, $q3->tax); $this->return_row_with_data($rowcount, $info); } public function return_sales_list($sales_id) { $q1 = $this->db->select("\52")->from("\x64\142\x5f\x73\141\x6c\145\163\x69\x74\x65\155\163")->where("\163\141\154\145\x73\137\151\144\x3d{$sales_id}")->get(); $rowcount = 1; foreach ($q1->result() as $res1) { $q2 = $this->db->query("\163\145\154\x65\x63\x74\40\x2a\40\146\162\157\155\x20\144\142\137\151\164\145\155\x73\x20\x77\x68\145\162\x65\40\x69\144\x3d" . $res1->item_id); $q3 = $this->db->query("\x73\145\x6c\x65\143\x74\x20\x2a\40\146\162\157\155\40\x64\142\137\x74\x61\x78\x20\167\x68\x65\x72\145\x20\x69\x64\75" . $res1->tax_id)->row(); $info["\151\164\x65\x6d\x5f\x69\x64"] = $res1->item_id; $info["\144\x65\163\143\x72\151\x70\x74\151\x6f\156"] = $res1->description; $info["\x69\164\x65\x6d\x5f\x6e\x61\155\145"] = $q2->row()->item_name; $info["\x69\x74\145\x6d\137\163\x61\x6c\145\x73\137\161\164\x79"] = $res1->sales_qty; $info["\151\164\145\x6d\x5f\141\x76\x61\151\154\141\142\154\145\137\x71\x74\171"] = $q2->row()->stock + $info["\x69\164\x65\155\x5f\163\x61\154\x65\163\x5f\x71\164\x79"]; $info["\x69\x74\x65\x6d\137\x70\x72\151\x63\145"] = $q2->row()->price; $info["\151\164\145\155\x5f\163\x61\154\145\163\x5f\x70\x72\x69\143\x65"] = $res1->price_per_unit; $info["\151\x74\x65\x6d\x5f\x74\x61\170\137\156\x61\155\145"] = $q3->tax_name; $info["\151\x74\145\155\x5f\164\x61\x78\x5f\x69\x64"] = $q3->id; $info["\151\164\x65\155\x5f\164\141\x78"] = $q3->tax; $info["\151\164\x65\155\x5f\x74\141\x78\137\x74\171\x70\x65"] = $res1->tax_type; $info["\151\x74\x65\x6d\137\164\x61\170\137\x61\155\164"] = $res1->tax_amt; $info["\151\x74\145\x6d\x5f\144\151\x73\143\157\x75\156\x74"] = $res1->discount_input; $info["\151\164\x65\155\x5f\144\151\163\x63\157\165\156\x74\x5f\164\171\x70\145"] = $res1->discount_type; $info["\x69\164\x65\x6d\137\x64\151\x73\x63\x6f\165\156\164\x5f\151\156\160\x75\164"] = $res1->discount_input; $info["\160\165\x72\143\x68\x61\163\x65\137\x70\x72\x69\x63\145"] = $res1->purchase_price; $info["\x73\x75\x62\137\160\x72\151\x63\145"] = $res1->sub_price; $result = $this->return_row_with_data($rowcount++, $info); } return $result; } public function return_row_with_data($rowcount, $info) { extract($info); $item_amount = $item_sales_price * $item_sales_qty + $item_tax_amt; ?>
		<tr id="row_<?php  echo $rowcount; ?>
" data-row='<?php  echo $rowcount; ?>
'>
			<td id="td_<?php  echo $rowcount; ?>
_1">
				<label class='form-control' style='height:auto;' data-toggle="tooltip" title='Edit ?'>
					<a id="td_data_<?php  echo $rowcount; ?>
_1" href="javascript:void(0)"
						onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" title="">
						<?php  echo $item_name; ?>
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
)" type="button" class="btn btn-default btn-flat"><i
								class="fa fa-minus text-danger"></i></button></span>
					<input typ="text" value="<?php  echo $item_sales_qty; ?>
" class="form-control no-padding text-center"
						onchange="item_qty_input(<?php  echo $rowcount; ?>
)" id="td_data_<?php  echo $rowcount; ?>
_3"
						name="td_data_<?php  echo $rowcount; ?>
_3">
					<span class="input-group-btn">
						<button onclick="increment_qty(<?php  echo $rowcount; ?>
)" type="button" class="btn btn-default btn-flat"><i
								class="fa fa-plus text-success"></i></button></span>
				</div>
			</td>

			<!-- Unit Cost Without Tax-->
			<td id="td_<?php  echo $rowcount; ?>
_10"><input type="text" name="td_data_<?php  echo $rowcount; ?>
_10"
					id="td_data_<?php  echo $rowcount; ?>
_10" class="form-control text-right no-padding only_currency text-center"
					onkeyup="calculate_tax(<?php  echo $rowcount; ?>
)" value="<?php  echo $item_sales_price; ?>
"></td>

			<!-- Discount -->
			<td id="td_<?php  echo $rowcount; ?>
_8">
				<input type="text" data-toggle="tooltip" title="Click to Change"
					onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" name="td_data_<?php  echo $rowcount; ?>
_8"
					id="td_data_<?php  echo $rowcount; ?>
_8"
					class="pointer form-control text-right no-padding only_currency text-center item_discount"
					value="<?php  echo $item_discount; ?>
" onkeyup="calculate_tax(<?php  echo $rowcount; ?>
)" readonly>
			</td>

			<!-- Tax Amount -->
			<td id="td_<?php  echo $rowcount; ?>
_11" class="<?php  echo tax_disable_class(); ?>
">
				<input type="text" name="td_data_<?php  echo $rowcount; ?>
_11" id="td_data_<?php  echo $rowcount; ?>
_11"
					class="form-control text-right no-padding only_currency text-center" value="<?php  echo $item_tax_amt; ?>
" readonly>
			</td>

			<!-- Tax Details -->
			<td id="td_<?php  echo $rowcount; ?>
_12" class="<?php  echo tax_disable_class(); ?>
">
				<label class='form-control ' style='width:100%;padding-left:0px;padding-right:0px;'>
					<a id="td_data_<?php  echo $rowcount; ?>
_12" href="javascript:void(0)" data-toggle="tooltip" title='Click to Change'
						onclick="show_sales_item_modal(<?php  echo $rowcount; ?>
)" title="">
						<?php  echo $item_tax_name; ?>
					</a>
				</label>
			</td>

			<!-- Amount -->
			<td id="td_<?php  echo $rowcount; ?>
_9"><input type="text" name="td_data_<?php  echo $rowcount; ?>
_9"
					id="td_data_<?php  echo $rowcount; ?>
_9" class="form-control text-right no-padding only_currency text-center"
					style="border-color: #f39c12;" readonly value="<?php  echo $item_amount; ?>
"></td>

			<!-- ADD button -->
			<td id="td_<?php  echo $rowcount; ?>
_16" style="text-align: center;">
				<a class=" fa fa-fw fa-minus-square text-red" style="cursor: pointer;font-size: 34px;"
					onclick="removerow(<?php  echo $rowcount; ?>
)" title="Delete ?" name="td_data_<?php  echo $rowcount; ?>
_16"
					id="td_data_<?php  echo $rowcount; ?>
_16"></a>
			</td>
			<input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_4" name="td_data_<?php  echo $rowcount; ?>
_4"
				value="<?php  echo $item_sales_price; ?>
">
			<input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_15" name="td_data_<?php  echo $rowcount; ?>
_15"
				value="<?php  echo $item_tax_id; ?>
">
			<input type="hidden" id="td_data_<?php  echo $rowcount; ?>
_5" name="td_data_<?php  echo $rowcount; ?>
_5"
				value="<?php  echo $item_tax_amt; ?>
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
"
				value="<?php  echo $item_tax_type; ?>
">
			<input type="hidden" id="tr_tax_id_<?php  echo $rowcount; ?>
" name="tr_tax_id_<?php  echo $rowcount; ?>
"
				value="<?php  echo $item_tax_id; ?>
">
			<input type="hidden" id="tr_tax_value_<?php  echo $rowcount; ?>
" name="tr_tax_value_<?php  echo $rowcount; ?>
"
				value="<?php  echo $item_tax; ?>
">
			<input type="hidden" id="description_<?php  echo $rowcount; ?>
" name="description_<?php  echo $rowcount; ?>
"
				value="<?php  echo $description; ?>
">

			<input type="hidden" id="item_discount_type_<?php  echo $rowcount; ?>
" name="item_discount_type_<?php  echo $rowcount; ?>
"
				value="<?php  echo $item_discount_type; ?>
">
			<input type="hidden" id="item_discount_input_<?php  echo $rowcount; ?>
" name="item_discount_input_<?php  echo $rowcount; ?>
"
				value="<?php  echo $item_discount_input; ?>
">
			<input type="hidden" id="item_discount_type_first_<?php  echo $rowcount; ?>
"
				name="item_discount_type_first_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_type; ?>
">
			<input type="hidden" id="item_discount_input_first_<?php  echo $rowcount; ?>
"
				name="item_discount_input_first_<?php  echo $rowcount; ?>
" value="<?php  echo $item_discount_input; ?>
">

			<input type="hidden" id="sub_price_<?php  echo $rowcount; ?>
" name="sub_price_<?php  echo $rowcount; ?>
" value="<?php  echo $sub_price; ?>
">
			<input type="hidden" id="pur_price_<?php  echo $rowcount; ?>
" name="pur_price_<?php  echo $rowcount; ?>
"
				value="<?php  echo $purchase_price; ?>
">
		</tr>
		<?php  } public function delete_payment($payment_id) { if (demo_app()) { echo "\x44\145\155\x6f\40\x6b\150\303\xb4\156\x67\x20\143\150\157\x20\160\x68\303\251\x70\x20\x78\xc3\263\x61"; return; } $this->db->trans_begin(); $sales_id = $this->db->query("\x73\145\x6c\x65\143\x74\x20\163\141\154\x65\163\137\151\144\x20\146\x72\x6f\x6d\x20\144\x62\x5f\163\141\154\145\163\160\x61\x79\155\x65\x6e\164\163\x20\167\150\x65\162\x65\40\x69\144\75{$payment_id}")->row()->sales_id; $customer_id = $this->db->query("\163\x65\154\x65\143\x74\40\143\x75\x73\x74\157\155\x65\x72\x5f\151\144\x20\x66\x72\x6f\155\x20\x64\x62\x5f\163\141\x6c\x65\163\x20\x77\x68\x65\x72\145\40\x69\144\75{$sales_id}")->row()->customer_id; $q1 = $this->db->query("\144\145\x6c\x65\164\x65\x20\146\162\157\155\x20\x64\142\137\163\141\x6c\x65\163\160\x61\x79\155\145\x6e\x74\x73\x20\x77\x68\x65\162\145\x20\x69\144\75\47{$payment_id}\x27"); $q2 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q1 != 1 || $q2 != 1) { $this->db->trans_rollback(); return "\x66\x61\151\154\x65\x64"; } else { $this->db->trans_commit(); return "\163\x75\x63\x63\x65\163\x73"; } } public function show_pay_now_modal($sales_id) { $q1 = $this->db->query("\x73\145\154\145\x63\164\40\52\x20\146\162\x6f\x6d\40\144\x62\x5f\x73\x61\x6c\x65\163\x20\x77\150\x65\x72\145\40\151\x64\75{$sales_id}"); $res1 = $q1->row(); $customer_id = $res1->customer_id; $q2 = $this->db->query("\x73\x65\x6c\x65\143\164\x20\x2a\x20\146\162\x6f\x6d\x20\x64\x62\137\143\x75\x73\x74\157\155\145\162\163\x20\x77\150\145\162\x65\40\151\144\75{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $sales_date = $res1->sales_date; $reference_no = $res1->reference_no; $sales_code = $res1->sales_code; $sales_note = $res1->sales_note; $grand_total = $res1->grand_total; $paid_amount = $res1->paid_amount; $due_amount = $grand_total - $paid_amount; if (!empty($customer_country)) { $customer_country = $this->db->query("\x73\145\154\x65\143\164\x20\143\157\165\156\164\x72\x79\40\146\x72\157\155\40\x64\x62\137\x63\x6f\x75\x6e\x74\x72\171\40\x77\x68\x65\162\x65\x20\151\x64\x3d\x27{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\163\x65\154\x65\143\164\40\x73\164\141\x74\145\x20\146\162\x6f\x6d\40\144\142\137\163\164\141\164\x65\x73\40\167\x68\145\x72\x65\40\x69\x64\75\47{$customer_state}\x27")->row()->state; } ?>
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
											<strong>
												<?php  echo $customer_name; ?>
											</strong><br>
											<?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\x6d\x6f\x62\151\154\x65") . "\x3a\40" . $customer_mobile . "\74\x62\x72\x3e" : ''; ?>
											<?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\x70\150\x6f\156\145") . "\x3a\x20" . $customer_phone . "\74\142\x72\x3e" : ''; ?>
											<?php  echo !empty(trim($customer_email)) ? $this->lang->line("\145\x6d\x61\151\154") . "\72\x20" . $customer_email . "\74\142\162\76" : ''; ?>
											<?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\147\163\164\137\156\165\x6d\x62\145\162") . "\72\x20" . $customer_gst_no . "\74\142\162\76" : ''; ?>
											<?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\164\141\170\137\156\x75\155\x62\145\x72") . "\x3a\x20" . $customer_tax_number . "\74\142\x72\76" : ''; ?>

										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										Sales Information:
										<address>
											<b>Invoice #
												<?php  echo $sales_code; ?>
											</b><br>
											<b>Date :
												<?php  echo show_date($sales_date); ?>
											</b><br>
											<b>Grand Total :
												<?php  echo $grand_total; ?>
											</b><br>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										<b>Paid Amount :<span>
												<?php  echo number_format($paid_amount, 0, "\56", ''); ?>
											</span></b><br>
										<b>Due Amount :<span id='due_amount_temp'>
												<?php  echo number_format($due_amount, 0, "\x2e", ''); ?>
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
																<input type="text" class="form-control pull-right datepicker"
																	value="<?php  echo show_date(date("\x64\x2d\x6d\x2d\131")); ?>
" id="payment_date"
																	name="payment_date" readonly>
															</div>
															<span id="payment_date_msg" style="display:none"
																class="text-danger"></span>
														</div>
													</div>
													<div class="col-md-4">
														<div class="">
															<label for="amount">Amount</label>
															<input type="text" class="form-control text-right paid_amt"
																id="amount" name="amount" placeholder=""
																value="<?php  echo $due_amount; ?>
" onkeyup="calculate_payments()">
															<span id="amount_msg" style="display:none"
																class="text-danger"></span>
														</div>
													</div>
													<div class="col-md-4">
														<div class="">
															<label for="payment_type">Payment Type</label>
															<select class="form-control" id='payment_type' name="payment_type">
																<?php  $q1 = $this->db->query("\163\145\x6c\145\143\164\x20\52\40\146\x72\157\155\40\144\x62\x5f\160\x61\x79\155\145\156\x74\x74\171\160\145\163\x20\x77\150\x65\x72\145\40\x73\x74\141\164\165\x73\75\x31"); if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\74\x6f\x70\x74\x69\x6f\x6e\40\x76\141\x6c\x75\145\75\x27" . $res1->payment_type . "\47\x3e" . $res1->payment_type . "\x3c\x2f\x6f\x70\164\x69\157\156\76"; } } else { echo "\116\157\x20\x52\x65\143\157\x72\x64\x73\40\x46\x6f\x75\156\x64"; } ?>
															</select>
															<span id="payment_type_msg" style="display:none"
																class="text-danger"></span>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="">
															<label for="payment_note">Payment Note</label>
															<textarea type="text" class="form-control" id="payment_note"
																name="payment_note" placeholder=""></textarea>
															<span id="payment_note_msg" style="display:none"
																class="text-danger"></span>
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
)"
							class="btn bg-green btn-lg place_order btn-lg payment_save">Save<i
								class="fa  fa-check "></i></button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<?php  } public function save_payment() { extract($this->xss_html_filter(array_merge($this->data, $_POST, $_GET))); if ($amount == '' || $amount == 0) { $amount = null; } if ($amount > 0 && !empty($payment_type)) { $salespayments_entry = array("\163\x61\x6c\145\x73\137\151\x64" => $sales_id, "\160\141\x79\155\145\156\164\137\x64\x61\x74\145" => date("\x59\55\155\55\x64", strtotime($payment_date)), "\160\141\171\155\x65\x6e\164\137\x74\171\160\145" => $payment_type, "\x70\x61\x79\155\145\156\x74" => $amount, "\x70\x61\x79\155\145\x6e\164\137\156\157\164\145" => $payment_note, "\143\x72\145\141\164\145\144\137\144\141\x74\145" => $CUR_DATE, "\143\162\145\x61\164\145\144\137\x74\151\155\145" => $CUR_TIME, "\x63\162\145\141\x74\x65\144\137\x62\171" => $CUR_USERNAME, "\163\x79\x73\x74\x65\155\137\151\160" => $SYSTEM_IP, "\163\x79\x73\x74\x65\x6d\137\156\x61\155\145" => $SYSTEM_NAME, "\x73\x74\x61\x74\x75\163" => 1); $q3 = $this->db->insert("\144\142\x5f\x73\x61\154\145\163\160\141\x79\x6d\x65\x6e\164\x73", $salespayments_entry); } else { return "\120\154\x65\x61\163\145\x20\105\156\x74\145\162\40\x56\141\x6c\x69\x64\40\101\155\x6f\165\x6e\x74\41"; } $customer_id = $this->db->query("\x73\x65\x6c\145\x63\164\x20\143\165\163\164\157\155\145\162\x5f\151\144\40\x66\162\157\155\40\x64\142\137\163\x61\154\145\163\x20\x77\150\x65\x72\145\40\x69\144\x3d{$sales_id}")->row()->customer_id; $q10 = $this->update_sales_payment_status($sales_id, $customer_id); if ($q10 != 1) { return "\146\x61\x69\154\x65\144"; } return "\x73\x75\x63\x63\145\x73\163"; } public function view_payments_modal($sales_id) { $q1 = $this->db->query("\x73\x65\x6c\x65\x63\x74\x20\x2a\x20\x66\x72\x6f\x6d\x20\x64\142\x5f\163\141\x6c\145\x73\40\x77\x68\145\162\145\x20\x69\144\x3d{$sales_id}"); $res1 = $q1->row(); $customer_id = $res1->customer_id; $q2 = $this->db->query("\x73\145\154\x65\x63\164\x20\x2a\x20\x66\x72\157\155\40\x64\x62\x5f\x63\165\163\x74\157\155\x65\162\x73\x20\167\x68\145\x72\145\x20\x69\144\x3d{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $sales_date = $res1->sales_date; $reference_no = $res1->reference_no; $sales_code = $res1->sales_code; $sales_note = $res1->sales_note; $grand_total = $res1->grand_total; $paid_amount = $res1->paid_amount; $due_amount = $grand_total - $paid_amount; if (!empty($customer_country)) { $customer_country = $this->db->query("\163\x65\154\x65\x63\x74\40\143\x6f\165\x6e\164\162\x79\40\146\x72\157\155\40\144\142\x5f\143\157\x75\156\x74\x72\x79\40\167\150\x65\162\145\x20\151\144\x3d\x27{$customer_country}\47")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\163\145\154\145\x63\164\x20\x73\164\141\x74\145\x20\146\162\157\x6d\x20\x64\142\137\x73\x74\141\164\x65\x73\40\x77\150\x65\162\x65\x20\151\144\x3d\47{$customer_state}\47")->row()->state; } ?>
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
											<strong>
												<?php  echo $customer_name; ?>
											</strong><br>
											<?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\155\x6f\142\151\154\145") . "\x3a\40" . $customer_mobile . "\74\x62\162\x3e" : ''; ?>
											<?php  echo !empty(trim($customer_phone)) ? $this->lang->line("\x70\150\x6f\156\145") . "\72\40" . $customer_phone . "\74\x62\x72\76" : ''; ?>
											<?php  echo !empty(trim($customer_email)) ? $this->lang->line("\x65\x6d\141\x69\x6c") . "\x3a\40" . $customer_email . "\74\x62\162\76" : ''; ?>
											<?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\147\163\x74\137\x6e\x75\155\x62\145\x72") . "\72\x20" . $customer_gst_no . "\x3c\142\162\76" : ''; ?>
											<?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\x74\x61\170\x5f\x6e\x75\x6d\142\145\162") . "\72\40" . $customer_tax_number . "\x3c\142\x72\x3e" : ''; ?>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										sales Information:
										<address>
											<b>Invoice #
												<?php  echo $sales_code; ?>
											</b><br>
											<b>Date :
												<?php  echo show_date($sales_date); ?>
											</b><br>
											<b>Grand Total :
												<?php  echo $grand_total; ?>
											</b><br>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										<b>Paid Amount :<span>
												<?php  echo number_format($paid_amount, 0, "\56", ''); ?>
											</span></b><br>
										<b>Due Amount :<span id='due_amount_temp'>
												<?php  echo number_format($due_amount, 0, "\x2e", ''); ?>
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
												<?php  $q1 = $this->db->query("\x73\145\x6c\145\143\164\40\52\x20\146\162\157\155\40\x64\142\137\163\141\x6c\145\x73\160\141\171\x6d\145\156\164\163\40\167\150\145\x72\x65\x20\x73\x61\154\145\163\x5f\x69\144\x3d{$sales_id}\x20\x61\156\144\x20\160\x61\x79\155\x65\x6e\x74\76\x30"); $i = 1; $str = ''; if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { echo "\74\164\162\x3e"; echo "\x3c\x74\x64\x3e" . $i++ . "\74\x2f\164\x64\76"; echo "\x3c\x74\144\x3e" . show_date($res1->payment_date) . "\x3c\57\164\x64\76"; echo "\x3c\164\144\76" . $res1->payment . "\74\57\164\x64\x3e"; echo "\x3c\x74\x64\x3e" . $res1->payment_type . "\x3c\x2f\164\144\x3e"; echo "\x3c\x74\x64\x3e" . $res1->payment_note . "\74\57\164\144\76"; echo "\74\164\144\x3e" . ucfirst($res1->created_by) . "\74\x2f\x74\x64\76"; echo "\x3c\x74\144\76\74\x61\40\x6f\156\143\154\x69\x63\153\75\x27\144\145\x6c\x65\164\145\x5f\163\x61\x6c\x65\163\137\160\x61\171\x6d\145\x6e\x74\50" . $res1->id . "\51\47\40\143\x6c\x61\163\x73\75\47\x70\x6f\151\156\164\x65\162\40\x62\x74\x6e\40\40\142\164\156\55\144\x61\x6e\x67\x65\x72\47\x20\x3e\x3c\151\40\143\x6c\141\163\x73\75\47\146\141\40\x66\x61\55\164\162\x61\163\x68\x27\76\74\57\x69\76\74\x2f\74\x2f\164\x64\76"; echo "\74\x2f\164\162\76"; } } else { echo "\74\x74\x72\x3e\x3c\x74\144\40\x63\157\x6c\x73\x70\x61\156\75\x27\67\47\40\143\x6c\141\163\x73\75\47\164\145\x78\164\55\x64\x61\x6e\147\x65\x72\x20\x74\145\170\x74\55\x63\145\156\x74\x65\x72\x27\76\116\157\x20\x52\145\143\157\162\144\163\x20\106\x6f\165\156\144\x3c\57\x74\x64\76\x3c\x2f\x74\x72\x3e"; } ?>
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
		<?php  } public function view_sales_modal($sales_id) { $q1 = $this->db->query("\163\145\154\145\143\164\x20\x2a\x20\x66\x72\157\155\40\144\142\x5f\x73\x61\154\145\163\40\x77\x68\x65\162\x65\40\151\x64\x3d{$sales_id}"); $res1 = $q1->row(); $customer_id = $res1->customer_id; $q2 = $this->db->query("\163\x65\x6c\x65\x63\164\x20\52\x20\146\162\x6f\155\x20\x64\x62\137\x63\x75\x73\x74\x6f\x6d\145\162\163\x20\x77\150\145\162\145\x20\151\144\75{$customer_id}"); $res2 = $q2->row(); $customer_name = $res2->customer_name; $customer_mobile = $res2->mobile; $customer_phone = $res2->phone; $customer_email = $res2->email; $customer_country = $res2->country_id; $customer_state = $res2->state_id; $customer_address = $res2->address; $customer_postcode = $res2->postcode; $customer_gst_no = $res2->gstin; $customer_tax_number = $res2->tax_number; $customer_opening_balance = $res2->opening_balance; $sales_date = $res1->sales_date; $reference_no = $res1->reference_no; $sales_code = $res1->sales_code; $sales_note = $res1->sales_note; $grand_total = $res1->grand_total; $paid_amount = $res1->paid_amount; $due_amount = $grand_total - $paid_amount; if (!empty($customer_country)) { $customer_country = $this->db->query("\163\145\154\145\x63\164\40\143\157\x75\x6e\x74\x72\x79\x20\x66\162\157\155\40\x64\x62\x5f\x63\157\x75\156\x74\162\x79\40\x77\x68\145\162\145\x20\x69\144\x3d\47{$customer_country}\x27")->row()->country; } if (!empty($customer_state)) { $customer_state = $this->db->query("\x73\145\x6c\145\143\x74\40\x73\164\x61\x74\145\x20\146\162\x6f\155\x20\144\142\x5f\163\164\141\x74\x65\x73\40\x77\150\145\162\x65\40\151\144\x3d\x27{$customer_state}\x27")->row()->state; } ?>
		<div class="modal fade" id="view_sales_modal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header header-custom">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Các sản phẩm</h4>
					</div>
					<div class="modal-body">

						<div class="row">


							<table align="center" width="100%" height='100%'>
								<thead>
									<tr>
										<td colspan="5" style="padding-left: 15px;">
											<b>
												<?php  echo $this->lang->line("\143\165\163\x74\x6f\x6d\145\x72\x5f\141\x64\x64\x72\145\x73\163"); ?>
											</b><br />
											<?php  echo $this->lang->line("\156\141\x6d\x65") . "\72\40" . $customer_name; ?>
<br />
											<?php  echo !empty(trim($customer_mobile)) ? $this->lang->line("\x6d\x6f\x62\151\x6c\145") . "\x3a\40" . $customer_mobile . "\x3c\142\x72\x3e" : ''; ?>
											<?php  if (!empty($customer_address)) { echo $customer_address; } ?>
											<br>
											<?php  echo !empty(trim($customer_email)) ? $this->lang->line("\145\155\x61\x69\x6c") . "\x3a\40" . $customer_email . "\74\142\162\x3e" : ''; ?>
											<?php  echo !empty(trim($customer_gst_no)) ? $this->lang->line("\x67\x73\x74\x5f\156\x75\155\142\x65\x72") . "\x3a\40" . $customer_gst_no . "\74\x62\x72\76" : ''; ?>
											<?php  echo !empty(trim($customer_tax_number)) ? $this->lang->line("\164\x61\170\137\156\165\x6d\x62\x65\x72") . "\x3a\40" . $customer_tax_number . "\x3c\x62\x72\x3e" : ''; ?>
										</td>


									</tr>


									<tr style="padding-left: 15px;">
										<th style="padding-left: 15px;"> #</th>
										<th>
											<?php  echo $this->lang->line("\x69\x74\x65\x6d\137\156\x61\155\145"); ?>
										</th>
										<th>
											<?php  echo $this->lang->line("\163\x61\154\x65\x73\137\160\x72\151\143\x65"); ?>
										</th>
										<th>
											<?php  echo $this->lang->line("\161\165\x61\156\x74\151\x74\x79"); ?>
										</th>
										<th>
											<?php  echo $this->lang->line("\164\157\164\x61\x6c\137\x61\155\157\165\x6e\164"); ?>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php  $i = 0; $tot_qty = 0; $tot_sales_price = 0; $tot_tax_amt = 0; $tot_discount_amt = 0; $tot_unit_total_cost = 0; $tot_total_cost = 0; $q2 = $this->db->query("\x53\105\114\x45\x43\x54\40\x63\56\x69\x74\145\155\x5f\156\x61\155\145\54\x20\141\56\x73\141\x6c\145\x73\137\x71\164\171\54\12\40\x20\x20\40\40\40\x20\40\40\x20\x20\40\40\x20\x20\40\40\x20\x20\40\x20\40\x20\40\x20\x20\40\40\40\x20\40\x20\40\40\x61\56\x70\x72\151\143\x65\x5f\160\x65\x72\x5f\165\156\x69\164\x2c\x20\x62\56\164\x61\170\54\x62\56\164\141\x78\x5f\156\x61\155\145\x2c\x61\56\x74\141\x78\137\x61\x6d\x74\x2c\xa\x20\x20\40\40\40\x20\40\40\40\40\x20\x20\40\x20\x20\40\x20\40\40\x20\40\x20\40\40\x20\40\40\40\x20\40\x20\40\40\40\x61\56\144\151\163\x63\x6f\x75\x6e\x74\137\151\156\160\165\x74\x2c\x61\x2e\x64\151\x73\x63\157\165\156\164\x5f\141\x6d\164\x2c\x20\141\56\165\x6e\x69\164\x5f\x74\157\x74\x61\x6c\137\143\157\x73\x74\x2c\xa\40\40\x20\40\x20\40\x20\x20\x20\x20\x20\40\40\x20\x20\40\40\40\40\x20\x20\x20\x20\40\40\40\x20\x20\x20\x20\40\x20\x20\x20\x61\56\x74\x6f\164\x61\154\137\143\157\163\x74\x20\xa\40\x20\40\x20\40\x20\40\x20\x20\40\40\x20\40\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\40\40\x20\x20\40\40\40\x20\40\x20\x20\106\x52\x4f\115\x20\xa\40\x20\40\40\x20\x20\x20\40\40\40\40\40\40\40\x20\40\40\x20\x20\x20\x20\40\40\x20\x20\x20\x20\40\40\x20\x20\40\x20\40\x64\x62\137\163\x61\x6c\145\x73\151\x74\x65\x6d\163\40\101\x53\40\141\54\144\142\137\x74\x61\170\40\x41\x53\40\x62\54\x64\x62\x5f\151\164\145\x6d\x73\40\101\123\x20\x63\40\xa\x20\40\40\40\40\x20\40\x20\40\40\40\x20\40\x20\40\40\40\40\x20\40\x20\40\40\40\x20\x20\40\40\x20\40\40\x20\40\x20\127\110\x45\122\x45\40\12\x20\x20\40\x20\40\40\x20\x20\x20\x20\x20\x20\40\x20\40\x20\x20\x20\40\40\40\x20\x20\x20\40\40\x20\40\40\x20\x20\40\40\40\143\56\x69\144\x3d\x61\x2e\x69\x74\145\x6d\137\x69\144\40\101\116\104\40\142\x2e\x69\x64\x3d\141\x2e\164\x61\x78\137\x69\x64\x20\x41\116\x44\40\x61\56\163\141\154\x65\x73\137\151\x64\x3d\x27{$sales_id}\47"); foreach ($q2->result() as $res2) { $discount = empty($res2->discount_input) || $res2->discount_input == 0 ? "\x30" : $res2->discount_input . "\x25"; $discount_amt = empty($res2->discount_amt) || $res2->discount_input == 0 ? "\x30" : $res2->discount_amt . ''; echo "\74\x74\x72\x3e"; echo "\74\x74\x64\x20\x73\x74\x79\154\145\75\x27\160\141\x64\x64\151\156\x67\x2d\154\145\x66\164\x3a\40\x31\x35\x70\170\x3b\x27\x3e" . ++$i . "\x3c\57\x74\144\76"; echo "\74\x74\144\x3e" . $res2->item_name . "\74\57\x74\144\x3e"; echo "\74\x74\144\x3e" . number_format($res2->price_per_unit, 0) . "\x3c\57\164\144\x3e"; echo "\x3c\164\x64\76" . $res2->sales_qty . "\x3c\x2f\164\x64\x3e"; echo "\x3c\164\144\x20\76" . number_format($res2->total_cost, 0) . "\x3c\x2f\x74\x64\76"; echo "\x3c\57\x74\x72\x3e"; $tot_qty += $res2->sales_qty; $tot_sales_price += $res2->price_per_unit; $tot_tax_amt += $res2->tax_amt; $tot_discount_amt += $res2->discount_amt; $tot_unit_total_cost += $res2->unit_total_cost; $tot_total_cost += $res2->total_cost; } ?>
									</tr>
								</tbody>

								<tfoot>
									<tr>
										<td colspan="1" style="text-align: center;font-weight: bold;"
											style="padding-left: 15px;">
											<?php  echo $this->lang->line("\164\x6f\x74\x61\x6c"); ?>
										</td>
										<td colspan="1" style="text-align: right;"><b>
												<?php  echo number_format($grand_total, 0); ?>
											</b></td>
									</tr>


									<tr>
										<td colspan="1" style="padding-left: 15px;">
											<?php  echo "\x3c\163\x70\x61\156\40\x63\x6c\141\x73\163\75\47\141\x6d\164\55\x69\156\55\167\157\162\x64\x27\x3e\x54\341\xbb\225\156\147\40\163\xe1\xbb\221\x20\x74\x69\xe1\273\x81\156\x3a\40\x3c\x69\x20\163\x74\x79\154\x65\x3d\x27\x66\157\156\x74\55\x77\145\151\x67\x68\x74\72\142\157\x6c\144\x3b\x27\76" . convert_number_to_words(round($grand_total)) . "\40\xc4\x91\341\xbb\x93\x6e\x67\x3c\x2f\151\76\74\x2f\x73\x70\141\x6e\76"; ?>
										</td>
									</tr>




									<?php  if (!empty($sales_invoice_footer_text)) { ?>
										<tr style="border-top: 1px solid;">
											<td colspan="10" style="text-align: center;">
												<b>
													<?php  echo $sales_invoice_footer_text; ?>
												</b>
											</td>
										</tr>
									<?php  } ?>
								</tfoot>

							</table>


							<!-- Add a new row for the input field and button -->
							<div class="col-md-12">
								<div class="form-group">
									<label for="largeTextInput">Thông tin lưu thêm:</label>
									<!-- <textarea class="form-control" id="largeTextInput" rows="4"></textarea> -->
									<?php  echo "\74\x74\145\x78\164\x61\162\145\141\40\x63\154\x61\163\x73\75\x22\146\157\162\155\x2d\x63\x6f\156\164\x72\157\x6c\x22\40\x69\x64\x3d\x22\144\145\163\x5f" . $sales_id . "\x22\x20\x72\157\x77\x73\x3d\x22\x32\x22\x3e\74\57\x74\145\x78\164\x61\x72\x65\x61\76"; ?>
								</div>
							</div>
							<div class="col-md-12">

								<?php  echo "\x3c\x62\x75\x74\164\x6f\x6e\x20\x63\154\x61\163\163\x3d\42\142\x74\156\x20\142\x74\x6e\x2d\160\162\151\155\x61\x72\x79\42\x20\x64\x61\x74\141\55\x64\151\x73\x6d\x69\x73\x73\x3d\x22\x6d\x6f\x64\x61\x6c\x22\40\x6f\156\x63\154\x69\x63\x6b\75\42\165\160\x64\141\x74\145\137\156\x6f\164\x65\x28" . $sales_id . "\51\x22\x3e\114\306\260\x75\40\x74\150\xc3\xb4\x6e\x67\40\x74\151\156\x3c\x2f\142\165\x74\x74\x6f\156\x3e"; ?>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>

				</div>
			</div>

			<script>
				// Ensure the DOM is ready
				$(document).ready(function () {
					// Function to handle the click event
					function updateNote(salesId) {
						var noteValue = $('#des_' + salesId).val();
						console.log('Note for Sales ID ' + salesId + ':' + noteValue);

						$.post("sales/update_note", { id: salesId, note: noteValue }, function (result) {
							if (result == "success") {
								toastr["success"]("Status Updated Successfully!");
								success.currentTime = 0;
								success.play();

								return false;
							}
							else if (result == "failed") {
								toastr["error"]("Failed to Update Status.Try again!");
								failed.currentTime = 0;
								failed.play();
								return false;
							}
							else {
								toastr["error"](result);
								failed.currentTime = 0;
								failed.play();
								return false;
							}
						});

					}
					$('[onclick^="update_note"]').on('click', function () {
						var salesId = $(this).attr('onclick').match(/\d+/)[0];
						updateNote(salesId);
					});
				});
			</script>

		</div>
		</div>
		</div>
		<?php  } }