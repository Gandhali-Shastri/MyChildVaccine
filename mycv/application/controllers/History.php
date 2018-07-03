
<?php

	/**
	* 
	*/
	class History extends CI_Controller
	{
		
		public function index()
		{
		
		
			$data['children'] = $this->historymodel->get_child();
			
			if(!($data['children']==NULL))
			{
			$this->load->view('templates/header');
			$this->load->view('pages/history',$data);
			$this->load->view('templates/footer');
			}
			else
			{	//changes ahet
				echo"<script type='text/javascript'>alert('No child found to show info')
				window.location.href = 'home'; 
				</script>";
			}



		}

		
	}
