<?php 

	/**
	* 
	*/
	class Product extends Model
	{
		
		public $table = 'products';

		function getAll()
		{
			$query = "SELECT  P.id, P.name, P.img, P.price, P.quantity, P.created_at, P.updated_at,  P.category_id, C.description, C.name category FROM products P, categories C WHERE P.category_id = C.id;";
			
			$result =  $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[]=$row;
			}			

			return $data;
		}

		function find_by_id($id)
		{
			$query = "SELECT  P.id, P.name, P.img, P.price, P.quantity, P.created_at, P.updated_at,  P.category_id, C.description, C.name category FROM products P, categories C WHERE P.category_id = C.id and P.id = ".$id;
			
			$result =  $this->conn->query($query);

			return $result->fetch_assoc();
		}

		function search_inventory()
		{
			$query = "SELECT  P.id, P.name, P.img, P.price, P.quantity, P.created_at, P.updated_at,  P.category_id, C.description, C.name category FROM products P, categories C WHERE P.category_id = C.id and P.quantity >100";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}

		function search_goods_sold()
		{
			$query = "SELECT  P.id, P.name, P.img, P.price, P.quantity, P.created_at, P.updated_at,  P.category_id, C.description, C.name category FROM products P, categories C WHERE P.category_id = C.id and P.quantity <10";

			$result = $this->conn->query($query);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}
	}
 ?>