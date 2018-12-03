<?php 
	/**
	* 
	*/
	// include_once 'models/Sale.php';
	include_once 'models/Product.php';
	include_once 'models/Customer.php';
	require 'vendor/autoload.php';

	class SaleController
	{
		
		public $p_model; //product_model
		public $c_model; //customer_model

		function __construct()
		{
			$this->p_model = new Product();
			$this->c_model = new Customer(); 
		}

		function list()
		{
			$data = $this->p_model->getAll();
			include_once 'views/admin/sale/list.php';
		}

		function cart()
		{
			$data = $_SESSION['buy']['cart'];
			include_once 'views/admin/sale/cart.php';
		}

		function add2cart()
		{
			// Thêm sản phẩm vào giỏ hàng
			if (!isset($_SESSION['buy'])||$_SESSION['buy']['id']=='') {
				$_SESSION['buy']['cart']=array();
				$_SESSION['buy']['id'] = date("YmdHis");
				$_SESSION['buy']['sum'] = 0;
			}
			if ($_GET['id']) {
				$id = $_GET['id'];
				if (isset($_SESSION['buy']['cart'][$id])) {
					$_SESSION['buy']['cart'][$id]['quantity']+=1;
					$_SESSION['buy']['sum']+=$_SESSION['buy']['cart'][$id]['price'];
				}else{
					$product = $this->p_model->find_by_id($id);
					$product['quantity']=1;
					$_SESSION['buy']['cart'][$id]=$product;
					$_SESSION['buy']['sum']+=$_SESSION['buy']['cart'][$id]['price'];
				}					
			} 
			
			header('location: ?mod=sale&act=cart');			
		}

		
		function subcart()
		{
			// Giảm số lượng sản phẩm trong giỏ hàng
			if (!isset($_SESSION['buy'])||$_SESSION['buy']['id']=='') {
				$_SESSION['buy']['cart']=array();
				$_SESSION['buy']['id'] = date("YmdHis");
			}
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				if (isset($_SESSION['buy']['cart'][$id])&&($_SESSION['buy']['cart'][$id]['quantity']!=1)) {
					$_SESSION['buy']['cart'][$id]['quantity']-=1;
					$_SESSION['buy']['sum']-=$_SESSION['buy']['cart'][$id]['price'];
				}else{
					$_SESSION['buy']['sum']-=$_SESSION['buy']['cart'][$id]['price'];
					unset($_SESSION['buy']['cart'][$id]);
					if (count($_SESSION['buy']['cart'])==0) {
						unset($_SESSION['buy']);
					}
				}
				
			} 
			
			header('location: ?mod=sale&act=cart');			
		}

		function order()
		{
			// Thanh Toán
			if (isset($_POST['submit'])) {
				$data = array(
					'email' => $_POST['email'],
				);
				$customer = $this->c_model->check_exist($data);
				if (count($customer)>0) {
					$_SESSION['buy']['customer']=$customer;
					header('location: ?mod=sale&act=invoice');
				} else {
					setcookie('order','Khach hang chua ton tai trong he thong!', time()+3);
					header('location: ?mod=sale&act=add_customer');
				}
			} else {
				header('location: ?mod=sale&act=cart');
			}
			
		}

		function add_customer()
		{
			// THêm mới khách hàng
			include_once 'views/admin/sale/add_customer.php';
		}

		function store_customer()
		{
			// Nạp khách hàng mới thêm vào CSDL 
			$data = array(
				'code' => $_POST['code'],
			);	

			$customer = $this->c_model->check_exist($data);

			if (count($customer)>0) {
				header('location: ?mod=sale&act=add_customer');
			}
					
			$data = array(
				'code' => $_POST['code'],
				'name' => $_POST['name'],
				'address' => $_POST['address'],
				'email' => $_POST['email'],
				'mobile' => $_POST['mobile'],
				'created_at' => date('Y-m-d H:i:s'),
			);

			$result = $this->c_model->insert($data);

			if ($result) {
				$data = $this->c_model->check_exist($data);
				$_SESSION['buy']['customer']= $data;
				header('location: ?mod=sale&act=invoice');
			} else {
				setcookie('add_customer','Failed', time()+3);
				header('location: ?mod=sale&act=add_customer');
			}			
		}

		function invoice()
		{
			$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
			$_SESSION['buy']['invoice_barcode_id']=$Bar->getBarcode($_SESSION['buy']['id'], $Bar::TYPE_CODE_128);
			$data = $_SESSION['buy']['cart'];
			$_SESSION['buy']['date'] = date("Y-m-d H:i:s");
			include_once 'views/admin/sale/invoice.php';
		}
	}

	?>