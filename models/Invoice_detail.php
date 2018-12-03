<?php 
	/**
	* 
	*/
	include_once 'models/Model.php';
	include_once 'models/Invoice.php';

	class Invoice_detail extends Model
	{
		public $table = 'invoice_detail';

		function product_list($id)
		{
			$data = array();

			$sql = "SELECT  P.id, P.name, P.img, C.name category , I.quantity,  I.price FROM products P, categories C, invoice_detail I WHERE I.id = ".$id." and P.category_id = C.id and I.product_id = P.id";

			$result = $this->conn->query($sql);

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}
	}

 ?>