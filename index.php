<?php 
	include_once 'controllers/StaffController.php';
	include_once 'controllers/CustomerController.php';
	include_once 'controllers/ProductController.php';
	include_once 'controllers/CategoryController.php';
	include_once 'controllers/JobController.php';
	include_once 'controllers/SaleController.php';
	include_once 'controllers/InvoiceController.php';
	include_once 'controllers/ReportController.php';

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	session_start();
	// session_destroy();
	 
	if (isset($_GET['mod'])) {

		$mod = $_GET['mod'];

		if (isset($_GET['act'])) {
			$act = $_GET['act'];
		} else {
			$act='list';
		}

		switch ($mod) {
			case 'staff':
				$controller = new StaffController();
				switch ($act) {
					case 'list':			
						$controller->list();
					break;
					case 'add':			
						$controller->add();
					break;
					case 'store':			
						$controller->store();
					break;
					case 'update':			
						$controller->update();
					break;
					case 'login':			
						$controller->login();
					break;
					case 'logout':			
						$controller->logout();
					break;
					case 'del':			
						$controller->destroy();
					break;

					default:
						$controller->error();
					break;
				}
				break;

			case 'job':
				$controller = new JobController();
				switch ($act) {
					case 'list':			
						$controller->list();
					break;
					case 'store':			
						$controller->store();
					break;
					case 'update':			
						$controller->update();
					break;
					case 'staff_list':			
						$controller->staff_list();
					break;
					case 'del':			
						$controller->destroy();
					break;

					default:
						$controller->error();
					break;
				}
				break;

			case 'customer':
				$controller = new CustomerController();
				switch ($act) {
					case 'list':			
						$controller->list();
					break;
					case 'add':			
						$controller->add();
					break;
					case 'store':			
						$controller->store();
					break;
					case 'update':			
						$controller->update();
					break;
					case 'del':			
						$controller->destroy();
					break;


					default:
						$controller->error();
					break;
				}
				break;

			case 'category':
				$controller = new CategoryController();
				switch ($act) {
					case 'list':			
						$controller->list();
					break;
					case 'store':			
						$controller->store();
					break;
					case 'update':			
						$controller->update();
					break;
					case 'product_list':			
						$controller->product_list();
					break;
					case 'del':			
						$controller->destroy();
					break;

					default:
						$controller->list();
					break;
				}
				break;

			case 'product':
				$controller = new ProductController();
				switch ($act) {
					case 'list':			
						$controller->list();
					break;
					case 'store':			
						$controller->store();
					break;
					case 'update':			
						$controller->update();
					break;
					case 'inventory':			//hàng tồn
						$controller->inventory();
					break;
					case 'goods_sold':			
						$controller->goods_sold();
					break;
					case 'del':			
						$controller->destroy();
					break;

					default:
						$controller->error();
					break;
				}
				break;

			case 'sale':
				$controller = new SaleController();
				switch ($act) {
					
					case 'cart': //hien thi gio hang
						$controller->cart();
					break;
					case 'list': //display product list to buy
						$controller->list();
						break;
					case 'subcart':
						$controller->subcart();
						break;
					case 'add2cart':
						$controller->add2cart();
						break;
					case 'order':
						$controller->order();
						break;
					case 'invoice':
						$controller->invoice();
						break;
					case 'add_customer':
						$controller->add_customer();
						break;
					case 'store_customer':
						$controller->store_customer();
						break;
					default:
						$controller->error();
					break;
				}
				break;

			case 'invoice':
				$controller = new InvoiceController();
				switch ($act) {
					case 'list':
						$controller->list();
						break;
					case 'store':
						$controller->store();
						break;
					case 'filter':
						$controller->filter();
						break;
					case 'toPDF':
						$controller->toPDF();
						break;
					case 'detail':
						$controller->detail();
						break;
					
					default:
						# code...
						break;
				}
				break;
			case 'report':
				$controller = new ReportController();
				switch ($act) {
					case 'revenue':
						$controller->revenue();
						break;
					
					
					default:
						# code...
						break;
				}
				break;

			case 'home':
				include 'views/admin/home/home.php';
			break;

			default:
				echo "404";
			break;
		}
	} else if(isset($_SESSION['login'])&&$_SESSION['login']==true) {
		include_once 'views/admin/home/home.php';
	} else {
		include_once 'views/login/login.php';
	}
 ?>