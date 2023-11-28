<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model {
	public function xss_html_filter($input){
		return $this->security->xss_clean(html_escape($input));
	}
	//UPDATE SMS API
	public function api_update(){
		extract($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));
		//print_r($this->xss_html_filter(array_merge($this->data,$_POST,$_GET)));exit();
		
		$this->db->trans_begin();
		if($hidden_rowcount>0){
		$this->db->query("delete from db_smsapi");
			for($i=1; $i<=$hidden_rowcount; $i++){
				if(isset($_POST['info_'.$i])){
					$info 	 	= $_POST['info_'.$i];
					$key 	 	= $_POST['key_'.$i];
					$key_value 	= $_POST['key_val_'.$i];
					
					$q1=$this->db->query("insert into db_smsapi(
								info,`key`,key_value)
								values(
								'$info',
								'$key',
								'$key_value')");
					if(!$q1){
						return "failed";
					}

				}//if end()
			}//for end()	
		}

		$q2=$this->db->query("update db_company set sms_status=$sms_status where id=1");
		if(!$q2){
			return "failed";
		}

			$this->session->set_flashdata('success', 'Record Successfully Saved!!');
			$this->db->trans_commit();
		    return "success";
	}
	//Send Messagr
	public function send_sms($mobile,$message){
		$sms_status=$this->db->query("select sms_status from db_company where id=1")->row()->sms_status;
		if($sms_status==1){
			$q1=$this->db->query("select * from db_smsapi");
			if($q1->num_rows()>0){
				$api=array();
				foreach($q1->result() as $res1){
					if($res1->info =='message'){
						$api = array_merge($api, [$res1->key =>  urlencode($message)]);

					}
					else if($res1->info =='mobile'){
						$api = array_merge($api, [$res1->key => $mobile]);
					}
					else{
						$api = array_merge($api, [$res1->key => $res1->key_value]);
					}
				}
				/*For Special characters need to set unicode Ex: Currency Symbols*/
				$api = array_merge($api, ['unicode' => '1']);
				
				// init the resource

				$ch = curl_init();
				$url = $api['weblink'];
				
				unset($api['weblink']);

				$data = http_build_query($api);

				$getUrl = $url."?".$data;

				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_URL, $getUrl);
				curl_setopt($ch, CURLOPT_TIMEOUT, 80);
				 
				$response = curl_exec($ch);
				//echo "<pre>";print_r($response);exit();
				
				 
				if(curl_error($ch)){
					return 'failed';
				}
				else
				{
					return 'success';
				}
				 
				curl_close($ch);
				//return $output;


			}
			else{
				return "API Not Available";
			}
		}
		else{
			return "Sorry! Can't Send.Please Enable SMS";
		}

	}

}

/* End of file Sms_model.php */
/* Location: ./application/models/Sms_model.php */