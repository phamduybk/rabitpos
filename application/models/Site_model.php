<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
    public function get_details(){
		$data=$this->data;

		//Validate This suppliers already exist or not
		$query=$this->db->query("select * from db_sitesettings order by id asc limit 1");
		$query1=$this->db->query("select * from db_company order by id asc limit 1");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			/* QUERY 1*/
			$query=$query->row();
			$data['q_id']=$query->id;
            $data['site_name']=$query->site_name;
            $data['logo']=$query->logo;
            $data['currency_id']=$query->currency_id;			
            $data['currency_placement']=$query->currency_placement;			
            $data['language_id']=$query->language_id;			
            $data['timezone']=$query->timezone;			
            $data['date_format']=$query->date_format;			
            $data['time_format']=$query->time_format;			
            $data['sales_discount']=$query->sales_discount;/* Default sales discount */
            $data['change_return']=$query->change_return;
            $data['sales_invoice_format_id']=$query->sales_invoice_format_id;
            $data['sales_invoice_footer_text']=$query->sales_invoice_footer_text;
            $data['round_off']=$query->round_off;
            $data['disable_tax']=$query->disable_tax;
            $data['show_upi_code']=$query->show_upi_code;
            $data['number_to_words']=$query->number_to_words;
            
            /* QUERY 2*/
			$query1=$query1->row();
            $data['category_init']=$query1->category_init;
            $data['item_init']=$query1->item_init;
            $data['supplier_init']=$query1->supplier_init;
            $data['purchase_init']=$query1->purchase_init;
            $data['purchase_return_init']=$query1->purchase_return_init;
            $data['customer_init']=$query1->customer_init;
            $data['sales_init']=$query1->sales_init;
            $data['sales_return_init']=$query1->sales_return_init;
            $data['expense_init']=$query1->expense_init;
            $data['sales_terms_and_conditions']=$query1->sales_terms_and_conditions;

			return $data;
		}
	}
	public function update_site(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		//echo "<pre>";print_r($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));exit();
				
		$domain_ = $_SERVER['HTTP_HOST'];

		// Tách subdomain t  domain
		$subdomain_ = explode('.', $domain_)[0];
		
		$logo='';
		if(!empty($_FILES['logo']['name'])){
			$config['upload_path']          = './uploads/' . $subdomain_ . '/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 500;
	        $config['max_width']            = 500;
	        $config['max_height']           = 500;


			if (!is_dir($config['upload_path'])) {
				// Thư mục không tồn tại, hãy tạo nó
				if (mkdir($config['upload_path'], 0755, true)) {
					//echo "Thư mục đã được tạo thành công.";
				}
			}

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('logo'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                print($error['error']);
	                exit();
	        }
	        else
	        {
	        	   $logo_name=$subdomain_.'/'.$this->upload->data('file_name');
	        		$logo=" ,logo='$logo_name' ";
	        }
		}
        
		$change_return = (isset($change_return)) ? 1 : 0;
		$show_upi_code = (isset($show_upi_code)) ? 1 : 0;
		$round_off = (isset($round_off)) ? 1 : 0;
		$disable_tax = (isset($disable_tax)) ? 1 : 0;
        $query1="update db_sitesettings set language_id='$language_id',site_name='$site_name',currency_placement='$currency_placement',
        currency_id='$currency',timezone='$timezone',date_format='$date_format',time_format='$time_format',
        sales_discount='$sales_discount',change_return=$change_return,show_upi_code=$show_upi_code, 
        round_off=$round_off,
        disable_tax=$disable_tax,
        number_to_words='$number_to_words',
        sales_invoice_format_id=$sales_invoice_format_id ,sales_invoice_footer_text='$sales_invoice_footer_text'
         $logo where id=$q_id";
        $query1= $this->db->simple_query($query1);
      
        $query2="update db_company set category_init='$category_init',item_init='$item_init',
        supplier_init='$supplier_init',
        purchase_init='$purchase_init',
        purchase_return_init='$purchase_return_init',
        customer_init='$customer_init',
        sales_init='$sales_init',
        sales_return_init='$sales_return_init',
        sales_terms_and_conditions='$sales_terms_and_conditions',
        expense_init='$expense_init' where id=1";
        $query2= $this->db->simple_query($query2);
        $this->session->unset_userdata('currency');

		if (!$query1 || $query2){
		    return "success";
		}
		else{
		    return "failed";
		}
	}
}

/* End of file Site_model.php */
