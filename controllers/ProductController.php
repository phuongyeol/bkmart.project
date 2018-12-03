<?php 
	/**
	* 
	*/
	include_once 'models/Product.php';
	include_once 'models/Category.php';

	class ProductController
	{
		public $model;
		public $category_model;

		function __construct()
		{
			$this->model=new Product();
			$this->category_model = new Category();
		}

		function list()
		{
			$data = $this->model->getAll();
			$category_data = $this->category_model->getAll();
			include_once 'views/admin/products/list.php';
		}

		function store() 
		{
			if (isset($_POST['submit'])) {

				$data = array(
					'name' => $_POST['name'],
					'quantity' => $_POST['quantity'],
					'price' => $_POST['price'],
					'category_id' => $_POST['category'],
					'created_at' => date('Y-m-d H:i:s'),
				);

				$link = '';
				if ($_FILES['img']['error']>0) {
					$msg = "<p class=\"text-center\">File khong hop le </p>";
				} else {
					move_uploaded_file($_FILES['img']['tmp_name'], "upload/admin/product/".$_FILES['img']['name']);
					$link = $_FILES['img']['name'];
				}

				$data['img'] = $link;

				// thuc hien goi toi model de thuc hien truy van
				$data = $this->model->insert($data);

				// chuyen trang
				header('location: ?mod=product');
			}
		}

		function update()
		{
			if (isset($_POST['submit'])) {

				if (isset($_POST['id'])) {

					$id=$_POST['id'];

					$data = array(
						'name' => $_POST['name'],
						'quantity' => $_POST['quantity'],
						'price' => $_POST['price'],
						'category_id' => $_POST['category'],
						'updated_at' => date('Y-m-d H:i:s'),
					);

					$link = '';
					if ($_FILES['image']['error']>0) {
						$msg = "<p class=\"text-center\">File khong hop le </p>";
					} else {
						move_uploaded_file($_FILES['image']['tmp_name'], "upload/admin/product/".$_FILES['image']['name']);
						$link = $_FILES['image']['name'];
					}

					if ($link=='') {
						$data['img'] = $_POST['old_img'];
					} else {
						$data['img'] = $link;
					}

					// thuc hien goi toi model de thuc hien truy van
					$result = $this->model->update($data, $id);
				}				
			}

			// chuyen trang
			header('location: ?mod=product');
		}


		function inventory()
		{
			$data = $this->model->search_inventory();
			include_once 'views/admin/products/inventory.php';
		}

		function goods_sold()
		{
			$data = $this->model->search_goods_sold();
			include_once 'views/admin/products/goods_sold.php';
		}

		function destroy()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->model->delete($id);
				if ($result) {
					header('location: ?mod=product&act=list');
				} else {
					setcookie('delete','Failed',time()+3);
					header('location: ?mod=product&act=list');
				}
			}
		}

		function error()
		{
			# code...
		}
	}

	?>