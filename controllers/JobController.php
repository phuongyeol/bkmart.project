<?php 
	/**
	* 
	*/
	include_once 'models/Job.php';
	class JobController 
	{
		public $model;
		
		function __construct()
		{
			$this->model = new Job();
		}

		function list()
		{
			$data = $this->model->getAll();
			include_once 'views/admin/jobs/list.php';
		}

		function store()
		{
			$data = array(
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'created_at' => date('Y-m-d H:i:s'),
			);
			$this->model->insert($data);
			header('location: ?mod=job');
		}

		function staff_list()
		{
			$job_id = $_GET['id'];
			$job = $this->model->find($job_id);
			$data = $this->model->staff_list($job_id);
			include_once 'views/admin/jobs/staff_list.php';
		}

		function update()
		{
			if (isset($_POST['submit'])) {
				
				$data = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
					'updated_at' => date('Y-m-d H:i:s'),
				);

				if (isset($_POST['id'])) {
					$id=$_POST['id'];
					$this->model->update($data,$id);
				}				
			}
			header('location: ?mod=job');
		}

		function destroy()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$result = $this->model->delete($id);
				if ($result) {
					header('location: ?mod=job&act=list');
				} else {
					setcookie('delete','Failed',time()+3);
					header('location: ?mod=job&act=list');
				}
			}
		}
	}

 ?>