<?php 
	/**
	* 
	*/
	include_once 'models/Customer.php';

	class CustomerController 
	{
		public $model;

		function __construct()
		{
			$this->model = new customer();			
		}

		function list()
		{
			$data = $this->model->getAll();
			include_once 'views/admin/customers/list.php';
		}

		function add()
		{
			include_once 'views/admin/customers/add.php';
		}

		function store()
		{
			$data = array(
				// 'code' => $_POST['code'],
				'name' => $_POST['name'],
				'address' => $_POST['address'],
				'email' => $_POST['email'],
				'mobile' => $_POST['mobile'],
				'created_at' => date('Y-m-d H:i:s'),
			);

			$result = $this->model->insert($data);

			// chuyen trang
			header('location: ?mod=customer');
		}

		function update()
		{
			if (isset($_POST['id'])) {

				$id = $_POST['id'];
				
				$data = array(
					'code' =>$_POST['code'],
					'name' => $_POST['name'],
					'address' => $_POST['address'],
					'email' => $_POST['email'],
					'mobile' => $_POST['mobile'],			
					'updated_at' => date('Y-m-d H:i:s'),
				);
				
				$result = $this->model->update($data, $id);
				
				if ($result) {
					setcookie('update','Success',time()+3);
				} else {
					setcookie('update','Failed',time()+3);
				}
			}
			
			header('Location: ?mod=customer');
		}

		function destroy()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->model->delete($id);
				if ($result) {
					header('location: ?mod=customer&act=list');
				} else {
					setcookie('delete','Failed',time()+3);
					header('location: ?mod=customer&act=list');
				}
			}
		}
	}

	?>