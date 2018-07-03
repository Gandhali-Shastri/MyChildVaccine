<?php 
	
	class user_controller extends CI_Controller {

		public function user_set(){


			if($this->input->post('submit') == 'update') {
				$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[2]|max_length[50]',
				array(
					'required'      => 'You have not provided a proper %s.',
					'min_length'	=>	'Name too short.',
					'max_length'	=>	'Name must have less than 50 characters'));

			$this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[2]|max_length[50]',
				array(
					'required'      => 'You have not provided a proper %s.',
					'min_length'	=>	'Name too short.',
					'max_length'	=>	'Name must have less than 50 characters'));

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
				array(
					'required' 		=> 'You must provide an %s.',
					'valid_email'	=>	'Enter a valid Email address'));

			$this->form_validation->set_rules('gender', 'gender', 'required',
				array(
					'required' 		=> 'You must provide a %s.'
					));
			$this->form_validation->set_rules('password1', 'Password','required|min_length[2]|max_length[50]',
			array(
				'required' 		=> 'You must provide a %s.'));

			$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|matches[password1]',
			array(
				'required'		=>	'You must provide %s',
				'matches'		=>	'Password does not match. Please re-enter!'));


				
				if($this->form_validation->run() === FALSE)
			{
				$data['users'] = $this->user_model->get_user();

				$this->load->view('templates/header');
				$this->load->view('pages/updateAccount',$data);
				$this->load->view('templates/footer');
			} 
			else
			{
				$data['users'] = $this->user_model->update_user();

				$this->load->view('templates/header');
				$this->load->view('pages/updateAccount',$data);
				$this->load->view('templates/footer');

			}

		} else {
			$data['users'] = $this->user_model->delete_user();
			$this->load->view('templates/header');
				$this->load->view('pages/updateAccount',$data);
				$this->load->view('templates/footer');

		}
		
	}

	public function displayInfo() {

			$data['users'] = $this->user_model->get_user();

			$this->load->view('templates/header');
			$this->load->view('pages/updateAccount',$data);
			$this->load->view('templates/footer');
	}
}