<?php

/**
 * Author: Askarali Makanadar
 * Date: 05-11-2018
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Đường dẫn đến autoload.php của PHPMailer



class Login_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function verify_credentials($username, $password)
	{
		//Filtering XSS and html escape from user inputs 
		$username = $this->security->xss_clean(html_escape($username));
		$password = $this->security->xss_clean(html_escape($password));

		$query = $this->db->query("select a.id,a.username,a.role_id,b.role_name from db_users a, db_roles b where b.id=a.role_id and  a.username='$username' and a.password='" . md5($password) . "' and a.status=1");
		if ($query->num_rows() == 1) {

			$logdata = array(
				'inv_username' => $query->row()->username,
				'inv_userid' => $query->row()->id,
				'logged_in' => TRUE,
				'role_id' => $query->row()->role_id,
				'role_name' => trim($query->row()->role_name),
			);
			$this->session->set_userdata($logdata);
			//	$this->session->set_flashdata('success', 'Welcome ' . ucfirst($query->row()->username) . " !");
			return true;
		} else {
			return false;
		}
	}
	public function verify_email_send_otp($email)
	{
		$q1 = $this->db->query("select email,company_name from db_company where email<>''");
		if ($q1->num_rows() == 0) {
			$this->session->set_flashdata('failed', 'Failed to send OTP! Contact admin :(');
			return false;
			exit();
		}
		//Filtering XSS and html escape from user inputs 
		$email_id = $this->security->xss_clean(html_escape($email));

		$query = $this->db->query("select * from db_users where email='$email' and status=1");
		if ($query->num_rows() == 1) {
			$otp = rand(1000, 9999);


			$server_subject = "OTP Change pass | OTP: " . $otp;
			$ready_message = "Chào bạn,

Sự kiện bạn đổi pass đã được hệ thống chấp nhận,
Mã OTP của bạn là " . $otp . " .

Note: Đừng chia sẻ mã OTP này với bất kỳ ai!.
Rabit Pos xin cảm ơn";

			try {

				$query2 = $this->db->query("select * from db_smsapi where info='mobile'");
				$mail_from = $query2->row()->key;
				if (isset ($mail_from) && !empty ($mail_from)) {
				} else {
					$mail_from = 'rabitshopvn@gmail.com';
				}


				$query3 = $this->db->query("select * from db_smsapi where info='message'");
				$pass_mail_from = $query3->row()->key;
				if (isset ($pass_mail_from) && !empty ($pass_mail_from)) {
				} else {
					$pass_mail_from = 'jnrz usap quvb upxi';
				}


				$mail = new PHPMailer(true);
				// Cài đặt thông tin server
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = $mail_from; // Thay thế bằng địa chỉ email của bạn
				$mail->Password = $pass_mail_from; // Thay thế bằng mật khẩu của bạn
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = 587;

				// Cài đặt thông tin người gửi và email
				$mail->setFrom($mail_from, 'Rabit Shop'); // Thay thế bằng tên của bạn
				$mail->addAddress($email, 'Người nhận'); // Thay thế bằng địa chỉ email người nhận

				// Nội dung email
				$mail->isHTML(true);
				$mail->Subject = $server_subject;
				$mail->Body = $ready_message;
				$mail->AltBody = 'This is the plain text version for non-HTML mail clients';

				// Gửi email
				if ($mail->send()) {
					echo 'Email đã được gửi thành công!';
					$this->session->set_flashdata('success', 'OTP has been sent to your email ID!');
					$otpdata = array('email' => $email, 'otp' => $otp);
					$this->session->set_userdata($otpdata);
					//echo "Email Sent";
					return true;
				} else {
					echo 'Gửi email thất bại. Lỗi: ' . $mail->ErrorInfo;
					return false;
				}
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				return false;
			}



			/* 	$this->load->library('email');
																							  $this->email->from($q1->row()->email, $q1->row()->company_name);
																							  $this->email->to($email_id);
																							  $this->email->subject($server_subject);
																							  $this->email->message($ready_message);

																							  if($this->email->send()||true){
																								  //redirect('contact/success');
																								  $this->session->set_flashdata('success', 'OTP has been sent to your email ID!');
																								  $otpdata = array('email'  => $email,'otp'  => $otp );
																								  $this->session->set_userdata($otpdata);
																								  //echo "Email Sent";
																								  return true;
																							  }
																							  else{
																								  //echo "Failed to Send Message.Try again!";
																								  return false;
																							  } */
		} else {
			return false;
		}
	}

	public function verify_otp($otp)
	{
		//Filtering XSS and html escape from user inputs 
		$otp = $this->security->xss_clean(html_escape($otp));
		$email = $this->security->xss_clean(html_escape($email));
		if ($this->session->userdata('email') == $email) {
			redirect(base_url() . 'logout', 'refresh');
		}

		$query = $this->db->query("select * from db_users where username='$username' and password='" . md5($password) . "' and status=1");
		if ($query->num_rows() == 1) {

			$logdata = array(
				'inv_username' => $query->row()->username,
				'inv_userid' => $query->row()->id,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($logdata);
			return true;
		} else {
			return false;
		}
	}
	public function change_password($password, $email)
	{
		$query = $this->db->query("select * from db_users where email='$email' and status=1");
		if ($query->num_rows() == 1) {
			/*if($query->row()->username == 'admin'){
																									echo "Restricted Admin Password Change";exit();
																								}*/
			$password = md5($password);
			$query1 = "update db_users set password='$password' where email='$email'";
			if ($this->db->simple_query($query1)) {

				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}
}