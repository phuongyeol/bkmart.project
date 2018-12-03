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

	class ReportController
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

		function revenue()
		{	
			// Thống kê doanh thu
			$date_start_input = $_GET['date_start'];
			$date_end_input = $_GET['date_end'];

			$date_start = strtotime($_GET['date_start']);
			$da = strtotime($_GET['date_end']);				
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
			include_once 'views/admin/reports/revenue.php';
		}
	}

	?>