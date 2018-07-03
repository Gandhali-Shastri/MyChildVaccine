<?php

	class displays extends CI_Controller{

		public function index()
		{

				$this->load->model("manageVaccineModel");

				
				$res = $this->manageVaccineModel->getData3();

    if($res){
        $data['result'] = $res;
        	$this->load->view('templates/admin_header');
        $this->load->view('pages/display', $data);
        $this->load->view('templates/footer');

        
                	

    } else {

        echo "Fail";
        
                	

    }
				

		}


	
		public function decide()
		{
			$decision=$_POST['decide'];

			if (($decision=='Update')) {
				# code...
			$this->load->library('form_validation');
			$this->form_validation->set_rules("vname1","Vaccine Name","required|regex_match[/^[a-z A-Z]+$/]");
			$this->form_validation->set_rules("pname1","Pharamacetical Company Name","required|regex_match[/^[a-z A-Z]+$/]");
			$this->form_validation->set_rules("lotnum1","Lot Number","required|numeric");
			$this->form_validation->set_rules("dosage1","Dosage","required|numeric");
			$this->form_validation->set_rules("side1","Sideffects","required");
				
			if($this->form_validation->run()===FALSE)
			{
				$this->load->model("updateModel");
				$res=$this->updateModel->updateData();
			
			
		 		$data['result'] = $res;
	
	
		 		$this->load->view('templates/admin_header');
        		$this->load->view('pages/display',$data);
        		$this->load->view('templates/footer');
      			
			}
			else
			{
				$this->load->model("updateModel");
				$res=$this->updateModel->updateData();
			
			
		 		$data['result'] = $res;
	
	
		 		$this->load->view('templates/admin_header');
        		$this->load->view('pages/display', $data);
        		$this->load->view('templates/footer');
      			echo "<script>
				alert('Updated');
				window.location.href = 'http://localhost/Team9/';
				</script>";
			}
		}
			else
			{
			$this->load->model("deleteModel");
			$res=$this->deleteModel->delData();
			
			
		 $data['result'] = $res;
	
		 	$this->load->view('templates/admin_header');
        $this->load->view('pages/display', $data);
        $this->load->view('templates/footer');
    	echo "<script>
				alert('Deleted');
				window.location.href = 'http://localhost/Team9/';
				</script>";
        
             }   	

  
			
		}

		public function x()
		{
		$this->load->library('form_validation');
			$this->form_validation->set_rules("Vaccine","Vaccine Name","required|callback_select_validate");
			$this->form_validation->set_rules("Pharm","Pharamacetical Company Name","required|callback_select_validate1");

			if($this->form_validation->run())
			{
				$this->load->model("manageVaccineModel");

				
				$res = $this->manageVaccineModel->getData3();

				if(count($res)==0)
				{
					$this->load->model("manageVaccineModel");
		     		$data['vaccines'] = $this->manageVaccineModel->getData1();
		     		$data['pharms'] = $this->manageVaccineModel->getData2();
		     		$data['msg']='false';
					$this->load->view('templates/admin_header');
					$this->load->view('pages/manageVaccine',$data);
					$this->load->view('templates/footer');
				}
 		else{
        $data['result'] = $res;
        $data['msg1']='';


        	$this->load->view('templates/admin_header');
        $this->load->view('pages/display', $data);
        $this->load->view('templates/footer');

          }
			
		}
			else
			{
				
			$this->load->model("manageVaccineModel");
     		$data['vaccines'] = $this->manageVaccineModel->getData1();
     		$data['pharms'] = $this->manageVaccineModel->getData2();
     		$data['msg']='false';
			$this->load->view('templates/admin_header');
			$this->load->view('pages/manageVaccine',$data);
			$this->load->view('templates/footer');
			}
			

		}

		function select_validate($Vaccine)
		{
	
			if($Vaccine=='none')
			{
				$this->form_validation->set_message('select_validate', 'Please Select Vaccine.');

				return false;
			} 
			else
			{
			
				return true;
			}
		}

		function select_validate1($Pharm)
		{
	
			if($Pharm=='none')
			{
				$this->form_validation->set_message('select_validate', 'Please Select Pharamaceutical Company Name.');
				return false;
			} 
			else
			{
			
				return true;
			}
		}



}
?>
