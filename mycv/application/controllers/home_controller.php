<?php
	class home_controller extends CI_Controller{

		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			if(is_null($this->session->userdata('user_id'))){
				show_404();
		}

			$data['title'] = ucfirst($page);
			$this->session->userid;

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');

		}

		public function logout( $page = 'intro'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$data['title'] = ucfirst($page);
			session_destroy();
			$data['msg']=null;
			$this->load->view('templates/intro_header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');		
		}
	}