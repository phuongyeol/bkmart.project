<?php 
	/**
	* 
	*/
	include_once 'models/Model.php';
	include_once 'models/Job.php';

	class Staff extends Model
	{
		public $table = 'staffs';

		function getAll()
		{
			$sql = "SELECT S.id, S.code, S.name, S.gender, S.avatar, S.mobile, S.email, S.address, S.created_at, S.updated_at, S.password, S.job_id, J.name job_name, J.description  FROM ".$this->table." S, jobs J WHERE J.id = S.job_id";
			
			$result = $this->conn->query($sql);
			$data = array();
			while($row = $result->fetch_assoc()){
				$data[]=$row;
			}

			return $data;							
		}

	}

 ?>