	


<?php

	/**
	* 
	*/
	class ShowHistory extends CI_Controller
	{
		
		public function index()
		{
		
		

		$data['childinfo'] = $this->historymodel->get_childinfo();
		
		$this->load->view('templates/header');
		$this->load->view('pages/showhistory',$data);
		$this->load->view('templates/footer');




		}

		
	}



	



  ?>
