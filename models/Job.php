<?php 
	/**
	* 
	*/
	include_once 'models/Model.php';
	include_once 'models/Staff.php';
	
	class Job extends Model
	{	
		public $table = 'jobs';

		function staff_list($job_id)
		{
			$data = array();

			$sql = "SELECT * FROM staffs WHERE job_id='".$job_id."'";

			$result = $this->conn->query($sql);
			
			while($row = $result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
	}
	
 ?>