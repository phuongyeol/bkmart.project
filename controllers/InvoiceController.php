<?php 
	/**
	* 
	*/
	include_once 'models/Invoice.php';
	include_once 'models/Product.php'; 
	include_once 'models/Staff.php';
	include_once 'models/Customer.php';
	include_once 'models/Invoice_detail.php';
	include_once 'vendor/tcpdf/tcpdf.php';

	class InvoiceController 
	{
		public $model;
		public $p_model;
		public $invoice_detail_model;
		public $s_model;
		public $c_model;

		function __construct()
		{
			$this->model = new Invoice();
			$this->p_model = new Product();
			$this->s_model = new Staff();
			$this->c_model = new Customer();
			$this->invoice_detail_model = new Invoice_detail();
		}

		function store()
		{
			$date = date('Y-m-d H:i:s');

			// Nạp hóa đơn vào bảng
			$data = array(
				'id' => $_SESSION['buy']['id'],
				'customer_id' => $_SESSION['buy']['customer']['id'],
				'staff_id' => $_SESSION['staff_login']['id'],
				'money' => $_SESSION['buy']['money'],
				'date' => $date,
			);

			$result = $this->model->insert($data);


			// Nạp chi tiết hóa đơn và cập nhật bảng hóa đơn

			foreach ($_SESSION['buy']['cart'] as $key => $product) {
				//store in invoice_detail
				$pro1 = array(
					'id' => $_SESSION['buy']['id'], //id hóa đơn
					'product_id' => $product['id'],
					'quantity' => $product['quantity'],
					'price' => $product['price'],
					'date' => $date,
				);

				$this->invoice_detail_model->insert($pro1);

				//cập nhật số lượng sản phẩm sau khi bán
				$pro_detail = $this->p_model->find_by_id($product['id']);
				$data = array(
					'quantity' => $pro_detail['quantity']-$product['quantity'],
				);
				$this->p_model->update($data, $product['id']);

			}
			unset($_SESSION['buy']);
			header('location: ?mod=sale&act=cart');
		}


		function list()
		{
			$data = $this->model->getAll();
			include_once 'views/admin/reports/list.php';
		}

		function filter()
		{
			// Bộc lọc hóa đơn từ date_start đến date_end
			if (isset($_POST['submit'])) {

				$date_start_input = $_POST['date_start'];
				$date_end_input = $_POST['date_end'];

				$date_start = strtotime($_POST['date_start']);
				$da = strtotime($_POST['date_end']);				
				$date_end = strtotime("+1 days",$da);
				
				$list_invoice = $this->model->getAll();

				$data = array();
				$sum = 0;
				foreach ($list_invoice as $key => $invoice) {
					$t = strtotime($invoice['date']);
					if (($t>=$date_start)&&($t<=$date_end)) {
						$data[] = $invoice;
						$sum+=$invoice['money'];
					}

				}

				include_once 'views/admin/reports/filter.php';
			}
		}

		function toPDF()
		{ 
			include_once 'views/admin/reports/revenue.php'; 
		}

		function detail()
		{
			$id = ''; //id: mã hóa đơn
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			} else {
				setcookie('detail','This invoice is not existed ',time()+3);
				header('location: ?mod=invoice&act=list');
			}
			$invoice_info = $this->model->find($id);

			$product_list = $this->invoice_detail_model->product_list($id);

			$staff_info = $this->s_model->find($invoice_info['staff_id']);

			$customer_info = $this->c_model->find($invoice_info['customer_id']);
			

			include_once 'views/admin/reports/invoice_detail.php';
			
		}
	}

	?>