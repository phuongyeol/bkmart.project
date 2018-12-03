<?php 
	/**
	* 
	*/
	include_once 'models/Category.php';
	class CategoryController 
	{
		public $model;
		
		function __construct()
		{
			$this->model = new Category();
		}

		function list()
		{
			$data = $this->model->getAll();
			include_once 'views/admin/categories/list.php';
		}

		function store()
		{
			$data = array(
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'created_at' => date('Y-m-d H:i:s'),
			);
			$this->model->insert($data);
			header('location: ?mod=category');
		}

		function product_list()
		{
			$category_id = $_GET['id'];
			$category = $this->model->find($category_id);
			$category_data = $this->model->getAll();
			$data = $this->model->product_list($category_id);
			include_once 'views/admin/categories/product_list.php';
		}

		function update()
		{
			if (isset($_POST['submit'])) {
				
				$data = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
					'updated_at' => date('Y-m-d H:i:s'),
				);

				if (isset($_POST['id'])) {
					$id=$_POST['id'];
					$this->model->update($data,$id);
				}				
			}
			header('location: ?mod=category');
		}

		function destroy()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->model->delete($id);
				if ($result) {
					header('location: ?mod=category&act=list');
				} else {
					setcookie('delete','Failed',time()+3);
					header('location: ?mod=category&act=list');
				}
			}
		}
	}

 ?>