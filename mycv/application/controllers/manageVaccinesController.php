<?php

	class manageVaccinesController extends CI_Controller{

		public function index()
		{

			$this->load->model("manageVaccineModel");
     		$data['vaccines'] = $this->manageVaccineModel->getData1();
     		$data['pharms'] = $this->manageVaccineModel->getData2();
     		$data['msg']='true';
     		
			$this->load->view('templates/admin_header');
			$this->load->view('pages/manageVaccine',$data);
			$this->load->view('templates/footer');

		}

			
		

}
?>