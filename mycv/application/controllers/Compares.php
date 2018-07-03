	

<?php

	/**
	* 
	*/
	class Compares extends CI_Controller
	{
		
		public function index()
		{
		
		
		$data['children'] = $this->historymodel->get_child();
		
		
		$this->load->view('templates/header');
		$this->load->view('pages/compare',$data);
		$this->load->view('templates/footer');



		}
		
		public function get_vaccines()
		{
		$cid=$_POST['childSelected'];
		
		$data['vaccines'] = $this->comparemodel->get_vaccine($cid);
		print_r(json_encode($data['vaccines']));
		
		


		}

		
	}



	



  ?>
