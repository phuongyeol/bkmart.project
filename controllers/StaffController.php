<?php 
	/**
	* 
	*/
	include_once 'models/Staff.php';
	include_once 'models/Job.php';

	class StaffController 
	{
		public $model;
		public $job_model;

		function __construct()
		{
			$this->model = new Staff();
			$this->job_model = new Job();
			
		}

		function list()
		{
			$data = $this->model->getAll();
			$job_data = $this->job_model->getAll();
			include_once 'views/admin/staffs/list.php';
		}

		function add()
		{
			$job_data = $this->job_model->getAll();
			include_once 'views/admin/staffs/add.php';
		}

		function store()
		{
			$data = array(
				'code' => $_POST['code'],
				'name' => $_POST['name'],
				'password' => md5($_POST['password']),
				'address' => $_POST['address'],
				'gender' => $_POST['gender'],
				'job_id' => $_POST['job'],
				'email' => $_POST['email'],
				'mobile' => $_POST['mobile'],
				'created_at' => date('Y-m-d H:i:s'),
			);

			$link = '';
			if ($_FILES['avatar']['error']>0) {
				$msg = "<p class=\"text-center\">File khong hop le </p>";
			} else {
				move_uploaded_file($_FILES['avatar']['tmp_name'], "upload/admin/staff/".$_FILES['avatar']['name']);
				$link = $_FILES['avatar']['name'];
			}

			$data['avatar'] = $link;
			// thuc hien goi toi model de thuc hien truy van

			$data = $this->model->insert($data);

			// chuyen trang
			header('location: ?mod=staff');
		}

		function update()
		{
			if (isset($_POST['id'])) {

				$id = $_POST['id'];
				
				$data = array(
					'password' => md5($_POST['password']),
					'code' =>$_POST['code'],
					'name' => $_POST['name'],
					'gender' => $_POST['gender'],
					'address' => $_POST['address'],
					'email' => $_POST['email'],
					'mobile' => $_POST['mobile'],				
					'job_id' => $_POST['job'],				
					'updated_at' => date('Y-m-d H:i:s'),
				);
				$link = '';

				if ($_FILES['avatar']['error']>0) {
					$msg = "<p class=\"text-center\">File khong hop le </p>";
				} else {
					move_uploaded_file($_FILES['avatar']['tmp_name'], "upload/admin/staff/".$_FILES['avatar']['name']);
					$link = $_FILES['avatar']['name'];
				}
				
				if ($link=='') {
					$data['avatar']=$_POST['old_avatar'];
				} else {
					$data['avatar']=$link;
				}

				$result = $this->model->update($data, $id);
				
				if ($result) {
					setcookie('update','Success',time()+3);
				} else {
					setcookie('update','Failed',time()+3);
				}
			}
			
			header('Location: ?mod=staff');
		}

		function login()
		{

			$data = array(
				'email' => $_POST['email'],
				'password' => md5($_POST['password']),
			);

			$login = $this->model->check_exist($data);

			if ($login==false) {
					// session_destroy();
				include_once 'views/login/login.php';
			} else {
				$_SESSION['login'] = true;
				$_SESSION['staff_login'] = $login;
				header('location: index.php?mod=home');
			}			
		}

		function logout()
		{
			session_destroy();
			header('location: index.php');		
		}

		function destroy()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->model->delete($id);
				if ($result) {
					header('location: ?mod=staff&act=list');
				} else {
					setcookie('delete','Failed',time()+3);
					header('location: ?mod=staff&act=list');
				}
			}
		}

	}

	?>