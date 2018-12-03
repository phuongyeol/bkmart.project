<?php 
	/**
	* 
	*/
	include_once 'models/Model.php';
	include_once 'models/Product.php';
	
	class Category extends Model
	{	
		public $table = 'categories';

		function product_list($category_id)
		{
			$data = array();

			// $sql = "SELECT * FROM products WHERE category_id='".$category_id."'";

			$query = "SELECT  P.id, P.name, P.img, P.price, P.quantity, P.created_at, P.updated_at,  P.category_id, C.description, C.name category FROM products P, categories C WHERE P.category_id = C.id and P.category_id='".$category_id."'";

			$result = $this->conn->query($query);
			
			while($row = $result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

	}
	
 ?>