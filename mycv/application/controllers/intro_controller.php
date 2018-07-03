<?php

class intro_controller extends CI_Controller{

	public function userdata()
	{
		
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

		$this->form_validation->set_rules('emailid', 'Email', 'required|valid_email',
			array(
				'required' 		=> 'You must provide an %s.',
				'valid_email'	=>	'Enter a valid Email address'));

		$this->form_validation->set_rules('password1', 'Password','required|min_length[2]|max_length[50]',
			array(
				'required' 		=> 'You must provide a %s.'));

		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|matches[password1]',
			array(
				'required'		=>	'You must provide %s',
				'matches'		=>	'Password does not match. Please re-enter!'));
		$this->form_validation->set_rules('gender', 'gender', 'required',
				array(
					'required' 		=> 'You must provide a %s.'
					));

		if($this->form_validation->run() === FALSE)
		{
			$data['msg'] = null;
			$this->load->view('templates/intro_header');
			$this->load->view('pages/intro',$data);
			$this->load->view('templates/footer');
		} 
		else
		{
			$this->intro_model->newuser();

			$data['msg'] = null;
			$this->load->view('templates/intro_header');
			$this->load->view('pages/intro',$data);
			$this->load->view('templates/footer');

		}
	}

	public function validateuser()
	{
		$this->form_validation->set_rules('username', 'UserName', 'required|min_length[2]|max_length[50]',
			array(
				'required'      => 'You have not provided a proper %s.',
				'min_length'	=>	'Name too short.',
				'max_length'	=>	'Name must have less than 50 characters'));	

			$this->form_validation->set_rules('password', 'Password','required|min_length[5]|max_length[50]',
			array(
				'required' 		=> 'You must provide a %s.'));

		if($this->form_validation->run() === FALSE)
		{
			$data['msg'] = null;
			$this->load->view('templates/intro_header');
			$this->load->view('pages/intro', $data);
			$this->load->view('templates/footer');
		} 
		else
		{
			$this->intro_model->login();
		}
	}
	
}