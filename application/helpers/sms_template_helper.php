<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_sms_using_template'))
{
    function send_sms_using_template($data_id,$template_id){
    	/*
				SALES = TEMPLATE ID = 1
				ORDER = TEMPLATE ID = 2
	
    	*/
		$template_name='';
		if($template_id==1){
			$template_name = 'GREETING TO CUSTOMER ON SALES';
		}
		if($template_id==2){
			$template_name = 'GREETING TO CUSTOMER ON SALES RETURN';
		}

    	$CI =& get_instance();
		$q1=$CI->db->query("select * from db_smstemplates where template_name='$template_name' and status=1");
		if($q1->num_rows()>0){
			$content	=	$q1->row()->content;
			if(!empty($content)){
				switch ($template_id) {
					case 1:
						/* SALES SMS */
						$q2=$CI->db->query("SELECT a.customer_id,b.customer_name,b.mobile,a.sales_code,
												   a.sales_date,a.grand_total,a.paid_amount,b.sales_due
											FROM db_sales a,db_customers b where b.id=a.customer_id and a.id='$data_id'");
						if($q2->num_rows()>0 && $q2->row()->customer_id!=1 && !empty($q2->row()->mobile)){
							//Replace Content
							$content = str_replace("{{customer_name}}", $q2->row()->customer_name, $content);
							$content = str_replace("{{sales_id}}", $q2->row()->sales_code, $content);
							$content = str_replace("{{sales_date}}", show_date($q2->row()->sales_date), $content);
							$content = str_replace("{{sales_amount}}", $CI->currency_code(number_format($q2->row()->grand_total,0,'.','')), $content);
							$content = str_replace("{{paid_amt}}", $CI->currency_code(number_format($q2->row()->paid_amount,0,'.','')), $content);
							$content = str_replace("{{invoice_due_amt}}",$CI->currency_code(number_format($q2->row()->grand_total-$q2->row()->paid_amount,0,'.','')), $content);
							$content = str_replace("{{cust_tot_due_amt}}",$CI->currency_code(number_format($q2->row()->sales_due,0,'.','')), $content);

							/*Find Company Details*/
							$q3=$CI->db->select('*')->from('db_company')->where('id',1)->get()->row();

							/*Insert/Replace into Content*/
							$content = str_replace("{{company_name}}", $q3->company_name, $content);
							$content = str_replace("{{company_mobile}}", $q3->mobile, $content);
							$content = str_replace("{{company_address}}", $q3->address, $content);
							$content = str_replace("{{company_website}}", $q3->company_website, $content);
							$content = str_replace("{{company_email}}", $q3->email, $content);

							//echo $content;exit();
							$CI->load->model('sms_model');
							
							return $CI->sms_model->send_sms($q2->row()->mobile,$content);
						}
						else{
							return false;
						}
						
						break;
					case 2:
						/* SALES RETURN SMS */
						$q2=$CI->db->query("SELECT a.customer_id,b.customer_name,b.mobile,a.return_code,
												   a.return_date,a.grand_total,a.paid_amount,b.sales_due
											FROM db_salesreturn a,db_customers b where b.id=a.customer_id and a.id='$data_id'");
						if($q2->num_rows()>0 && $q2->row()->customer_id!=1 && !empty($q2->row()->mobile)){
							//Replace Content
							$content = str_replace("{{customer_name}}", $q2->row()->customer_name, $content);
							$content = str_replace("{{return_id}}", $q2->row()->return_code, $content);
							$content = str_replace("{{return_date}}", show_date($q2->row()->return_date), $content);
							$content = str_replace("{{return_amount}}", $CI->currency_code(number_format($q2->row()->grand_total,0,'.','')), $content);
							$content = str_replace("{{paid_amt}}", $CI->currency_code(number_format($q2->row()->paid_amount,0,'.','')), $content);
							$content = str_replace("{{invoice_due_amt}}",$CI->currency_code(number_format($q2->row()->grand_total-$q2->row()->paid_amount,0,'.','')), $content);
							$content = str_replace("{{cust_tot_due_amt}}",$CI->currency_code(number_format($q2->row()->sales_due,0,'.','')), $content);

							/*Find Company Details*/
							$q3=$CI->db->select('*')->from('db_company')->where('id',1)->get()->row();

							/*Insert/Replace into Content*/
							$content = str_replace("{{company_name}}", $q3->company_name, $content);
							$content = str_replace("{{company_mobile}}", $q3->mobile, $content);
							$content = str_replace("{{company_address}}", $q3->address, $content);
							$content = str_replace("{{company_website}}", $q3->company_website, $content);
							$content = str_replace("{{company_email}}", $q3->email, $content);

							//echo $content;exit();
							$CI->load->model('sms_model');
							return $CI->sms_model->send_sms($q2->row()->mobile,$content);
						}
						else{
							return false;
						}
						
						break;
					
					default:
						return true;
						# code...
						break;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}

if ( ! function_exists('is_sms_enabled'))
{
    function is_sms_enabled(){
    	$CI =& get_instance();
    	$sms_status=$CI->db->select('sms_status')->get('db_company')->row()->sms_status;
    	return ($sms_status) ? true : false;
	}
}
