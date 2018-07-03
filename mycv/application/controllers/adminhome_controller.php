<?php 
	
	class adminhome_controller extends CI_Controller {

		public function displayInfo() {
			$usertype = $this->session->usertype;

			if($usertype!='Admin')
			{
				show_404();
			}
			
			$data['vaccine'] = $this->adminhome_model->recent_act();
			
			$data['side'] = $this->adminhome_model->recent_act1();
			
			// print_r($data1	['side']);

			$this->load->view('templates/admin_header');
			$this->load->view('pages/admin_home',$data);
			$this->load->view('templates/footer');
		}
	}