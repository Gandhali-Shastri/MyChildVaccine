<?php

	class addVaccinesController extends CI_Controller{

		public function index()
		{

			$this->load->view('templates/admin_header');
			$this->load->view('pages/addVaccine');
			$this->load->view('templates/footer');

		}

		public function form_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules("vname","Vaccine Name","required|regex_match[/^[a-z A-Z 0-9]+$/]");
			$this->form_validation->set_rules("pharm_name","Pharamacetical Company Name","required|regex_match[/^[a-z A-Z]+$/]");
			$this->form_validation->set_rules("lot_num","Lot Number","required|numeric");
			$this->form_validation->set_rules("dosage","Dosage","required|numeric");
			$this->form_validation->set_rules("s","Sideffects","required");

			if($this->form_validation->run())
			{
				//true

			$this->load->model("addVaccineModel");
			$data=array(
				'vaccine_name'  =>$this->input->post('vname'),
				'lot_num'  =>$this->input->post('lot_num'),
				'pharm_name'  =>$this->input->post('pharm_name'),
				'dosage' => $this->input->post('dosage'),
				'active' =>'active'
				);

			$this->addVaccineModel->saveData($data);
			redirect(base_url()."addVaccinesController/inserted");
			}
			else
			{
				
				$this->index();
			}
		}

		public function inserted()
		{
			$this->index();
		}


    	
    
}




?>