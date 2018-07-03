

<?php

	/**
	* 
	*/
	class ShowCompare extends CI_Controller
	{
		
		public function index()
		{
		
		
		$data['info'] = $this->comparemodel->compare();
		
	

		if($data['info']>0)
		{
		$this->load->view('templates/header');
		$this->load->view('pages/showcompare',$data);
		$this->load->view('templates/footer');

		}
		else
		{
			echo"<script type='text/javascript'>alert('No child found to show info')
			window.location.href = 'home'; 
			</script>";
		}


		}

		
	}



	



  ?>
