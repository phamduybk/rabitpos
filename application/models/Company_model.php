<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{

	//Get suppliers_details
	public function get_details()
	{
		$data = $this->data;

		$subdomain_ = getPathFolder();
		//Validate This suppliers already exist or not
		$query = $this->db->query("select * from db_company order by id asc limit 1");
		if ($query->num_rows() == 0) {
			show_404();
			exit;
		} else {
			$query = $query->row();
			$data['q_id'] = $query->id;
			$data['company_name'] = $query->company_name;
			$data['website'] = $query->company_website;
			$data['mobile'] = $query->mobile;
			$data['phone'] = $query->phone;
			$data['email'] = $query->email;
			$data['country'] = $query->country;
			$data['state'] = $query->state;
			$data['city'] = $query->city;
			$data['postcode'] = $query->postcode;
			$data['address'] = $query->address;
			$data['gstin'] = $query->gst_no;
			$data['vat'] = $query->vat_no;
			$data['website'] = $query->website;
			$data['pan'] = $query->pan_no;
			$data['bank_details'] = $query->bank_details;
			$data['upi_id'] = $query->upi_id;
			$data['company_logo'] = (!empty($query->company_logo)) ? $query->company_logo : base_url('theme/images/no_image2.png');
			//$data['company_logo'] = (!empty($query->company_logo)) ? base_url('uploads/' . $subdomain_ . '/company/' . $query->company_logo) : base_url('theme/images/no_image2.png');
			$data['upi_code'] = (!empty($query->upi_code)) ? base_url('uploads/' . $subdomain_ . '/company/' . $query->upi_code) : base_url('theme/images/no_image2.png');
			$data['signature'] = (!empty($query->signature)) ? $query->signature : base_url('theme/images/noimage.png');
			$data['show_signature'] = $query->show_signature;


			return $data;
		}
	}
	public function update_company()
	{

		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data, $_POST))));

		$subdomain_ = getPathFolder();

		$config['local_path'] = './uploads/' . $subdomain_ . '/';

		if (!is_dir($config['local_path'])) {
			if (mkdir($config['local_path'], 0755, true)) {
			}
		}

		$config['local_path_2'] = './uploads/' . $subdomain_ . '/company/';


		if (!is_dir($config['local_path_2'])) {
			if (mkdir($config['local_path_2'], 0755, true)) {
			}
		}

		/*Log uploader*/
		$company_logo = '';
		if (!empty($_FILES['company_logo']['name'])) {
			$config['upload_path'] = './uploads/' . $subdomain_ . '/company/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 1024;
			$config['max_width'] = 1000;
			$config['max_height'] = 1000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('company_logo')) {
				$error = array('error' => $this->upload->display_errors());
				print($error['error']);
				exit();
			} else {

				$company_logo = $subdomain_ . '/company/' . $this->upload->data('file_name');

				$company_logo = " ,company_logo='$company_logo' ";



			}
		}
		/*End*/
		/*UPI Code uploader*/
		$upi_code = '';
		if (!empty($_FILES['upi_code']['name'])) {
			$config['upload_path'] = './uploads/' . $subdomain_ . '/company/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 1024;
			$config['max_width'] = 1000;
			$config['max_height'] = 1000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('upi_code')) {
				$error = array('error' => $this->upload->display_errors());
				print($error['error']);
				exit();
			} else {
				$upi_code = $this->upload->data('file_name');
				$upi_code = " ,upi_code='$upi_code' ";
			}
		}
		/*End*/

		/*UPI Code uploader*/
		$signature = '';
		if (!empty($_FILES['signature']['name'])) {
			$config['upload_path'] = './uploads/' . $subdomain_ . '/company/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 1000;
			$config['max_width'] = 1000;
			$config['max_height'] = 1000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('signature')) {
				$error = array('error' => $this->upload->display_errors());
				return $error['error'];
				exit();
			} else {
				$signature = 'uploads/' . $subdomain_ . '/company/' . $this->upload->data('file_name');

				$signature = " ,signature='$signature' ";

			}
		}
		/*End*/


		$show_signature = (isset($show_signature)) ? 1 : 0;


		$query1 = "update db_company set show_signature='$show_signature',company_name='$company_name',mobile='$mobile',phone='$phone',email='$email',country='$country',state='$state',city='$city',postcode='$postcode',address='$address',gst_no='$gstin',vat_no='$vat',website='$website', pan_no='$pan',bank_details='$bank_details',upi_id='$upi_id' $company_logo $upi_code $signature where id=$q_id";

		if ($this->db->simple_query($query1)) {
			return "success";
		} else {
			return "failed";
		}
	}


}