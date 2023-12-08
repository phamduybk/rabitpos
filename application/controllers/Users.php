<?php
/**
 * Author: Askarali
 * Date: 06-11-2018
 */
class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();

		$this->load->model('state_model', 'state');
	}
	public function index()
	{
		$this->permission_check('users_add');
		$data = $this->data; //My_Controller constructor data accessed here
		$data['page_title'] = $this->lang->line('create_users');
		$this->load->view('users', $data);
	}
	public function save_or_update()
	{
		//print_r($_POST);exit();
		$data = $this->data; //My_Controller constructor data accessed here

		$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		//echo $this->input->post('command');exit();
		if ($this->input->post('command') == 'save') {
			$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('new_user', 'Username', 'required|trim|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
		}

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('users_model');
			//$username=$this->input->post('new_user');
			//$mobile=$this->input->post('mobile');
			//$email=$this->input->post('email');
			//$role_id=$this->input->post('role_id');
			//$data['username']=$username;
			//$data['mobile']=$mobile;
			//$data['email']=$email;
			//$data['role_id']=$role_id;
			if ($this->input->post('command') != 'update') {
				//$password=md5($this->input->post('pass'));//Encrypted in MD5
				//$data['password']=$password;
				$result = $this->users_model->verify_and_save();
			} else {
				$q_id = $this->input->post('q_id');
				$data['q_id'] = $q_id;
				$result = $this->users_model->verify_and_update($data);
			}

			echo $result;
		} else {
			echo validation_errors();
			//echo  "Username & Password must have 5 to 15 Characters!";
		}

	}
	public function view()
	{
		$this->permission_check('users_view');
		$data = $this->data; //My_Controller constructor data accessed here
		$data['page_title'] = $this->lang->line('users_list');
		$this->load->view('users-view', $data);
	}
	public function status_update()
	{
		$this->permission_check_with_msg('users_edit');
		$userid = $this->input->post('id');
		$status = $this->input->post('status');

		$this->load->model('users_model');
		$result = $this->users_model->status_update($userid, $status);
		return $result;

	}
	public function password_reset()
	{
		$data = $this->data; //My_Controller constructor data accessed here
		$data['page_title'] = $this->lang->line('change_password');
		$this->load->view('change-pass', $data);
	}
	public function password_update()
	{
		if ($this->session->userdata('inv_username') == 'admin' && demo_app()) {
			echo "Restricted Admin Password Change";
			exit();
		}
		$data = $this->data; //My_Controller constructor data accessed here
		$currentpass = $this->input->post('currentpass');
		$newpass = $this->input->post('newpass');

		$this->load->model('users_model');
		$result = $this->users_model->password_update(md5($currentpass), md5($newpass), $data);
		echo $result;

	}
	public function dbbackup()
	{
		$this->permission_check_with_msg('site_edit');
		if (demo_app()) {
			echo "Restricted in Demo";
			exit();
		}

		if (!isBakup()) {
			echo "Chức năng chỉ hỗ trợ bản thương mại";
			exit();
		}

		$subdomain_ = getPathFolder();

		// Load the DB utility clas

		$file_name = $config['database'];

		$this->load->dbutil();
		$prefs = array(
			'newline' => "\n",
			'format' => 'zip',
			'filename' => $file_name,
			'foreign_key_checks' => FALSE,
		);


		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');

		// Tách subdomain t  domain $subdomain_ = getPathFolder();

		$path_file_ = $subdomain_;

		write_file('dbbackup/' . $path_file_ . '_db' . date('_d-m-Y-h-m-s') . '.gz', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($path_file_ . '_db' . date('_d-m-Y-h-m-s') . '.gz', $backup);

	}


	public function imagesbackup()
	{
		$this->permission_check_with_msg('site_edit');
		if (demo_app()) {
			echo "Restricted in Demo";
			exit();
		}

		if (!isBakup()) {
			echo "Chức năng chỉ hỗ trợ bản thương mại";
			exit();
		}
		
		$subdomain_ = getPathFolder();

		$sourceFolder = 'uploads/' . $subdomain_;


		if (!is_dir($sourceFolder)) {
			if (mkdir($sourceFolder, 0755, true)) {
			}
		}


		// Tên tệp ZIP đầu ra
		$zipFileName = 'uploads/' . $subdomain_ . '_data' . date('_d-m-Y-h-m-s') . '.zip';

		// Tạo một đối tượng ZipArchive
		$zip = new ZipArchive();
		if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
			// Hàm đệ quy để thêm các tệp và thư mục vào ZIP
			function addFolderToZip($folder, $zip, $exclusiveLength)
			{
				$folderHandle = opendir($folder);
				while (false !== ($file = readdir($folderHandle))) {
					if ($file != '.' && $file != '..') {
						$filePath = $folder . '/' . $file;
						$localPath = substr($filePath, $exclusiveLength);
						if (is_file($filePath)) {
							$zip->addFile($filePath, $localPath);
						} elseif (is_dir($filePath)) {
							$zip->addEmptyDir($localPath);
							addFolderToZip($filePath, $zip, $exclusiveLength);
						}
					}
				}
				closedir($folderHandle);
			}

			// Thêm thư mục vào ZIP
			addFolderToZip($sourceFolder, $zip, strlen($sourceFolder) + 1);

			// Đóng ZIP
			$zip->close();
		}

		// Kiểm tra xem tệp ZIP đã được tạo thành công hay không
		if (file_exists($zipFileName)) {
			// Thiết lập tiêu đề và kiểu MIME cho phản hồi HTTP
			header('Content-Description: File Transfer');
			header('Content-Type: application/zip');
			header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
			header('Content-Length: ' . filesize($zipFileName));

			// Đọc và gửi nội dung tệp ZIP cho trình duyệt
			readfile($zipFileName);

			// Xóa tệp ZIP sau khi gửi
			unlink($zipFileName);
		} else {
			echo 'Có lỗi trong quá trình nén thư mục.';
		}

	}

	public function edit($id)
	{
		$this->permission_check('users_edit');
		$this->load->model('users_model');
		$data = $this->users_model->get_details($id);
		//print_r($data);exit();
		$data['page_title'] = $this->lang->line('edit_user');
		$this->load->view('users', $data);
	}
	public function delete_user()
	{
		$this->permission_check_with_msg('users_delete');
		$this->load->model('users_model');
		$id = $this->input->post('q_id');
		$result = $this->users_model->delete_user($id);
		return $result;
	}
}