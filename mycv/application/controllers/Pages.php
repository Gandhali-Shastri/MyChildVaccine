<?php
	class Pages extends CI_Controller{
		public function view($page = 'intro'){
			
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			else
			{
				if(APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/addVaccine.php' || 
					APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/admin_home.php' || 
					APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/manageVaccine.php'
				)
				{
					$data['title'] = ucfirst($page);
					$data['msg'] = Null;
					
					$this->load->view('templates/admin_header');
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				}
				else if(APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/intro.php'||
						APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/about.php' ||
						APPPATH.'views/pages/'.$page.'.php'== APPPATH.'views/pages/contactus.php')
				{

					$data['title'] = ucfirst($page);
					$data['msg'] = Null;
					$this->load->view('templates/intro_header');
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				}
				
				else
				{
					$data['title'] = ucfirst($page);
					$data['msg'] = Null;
					
					$this->load->view('templates/header');
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				}
			}	
		}

		
	}