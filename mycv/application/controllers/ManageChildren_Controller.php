<?php 
	
	class ManageChildren_Controller extends CI_Controller {

		public function displayInfo() {
			$data['children'] = $this->child_model->get_children();
			$children = $this->child_model->get_childrenNames();
			$names = array();
			$names['No_Select'] = '--Select--';
			foreach ($children as $child) :
				$names[$child['Name']] = $child['Name'];
			endforeach;
			
			$data['names'] = $names;

			$data['title'] = 'Manage Children';

			$data['childrenJson'] = json_encode($data['children']);
			//print_r(json_encode($data['children']));
			
			$this->load->view('templates/header',$data);
			$this->load->view('pages/children',$data);
			$this->load->view('templates/footer');
		}

		public function addChildren() {

			$data['children'] = $this->child_model->get_children();
			$children = $this->child_model->get_childrenNames();
			$names = array();
			$names['No_Select'] = '--Select--';
			foreach ($children as $child) :
				$names[$child['Name']] = $child['Name'];
			endforeach;
			
			$data['names'] = $names;

			$data['title'] = 'Manage Children';

			$data['childrenJson'] = json_encode($data['children']);

			$data['title'] = 'Manage Children';

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('height','Height','required');
			$this->form_validation->set_rules('weight','Weight','required'); 
			$this->form_validation->set_rules('dob','Date of Birth','required|callback_isvalid_DOB');
			$this->form_validation->set_rules('gender', 'gender', 'required',
				array(
					'required' 		=> 'You must provide a %s.'
					));
			
			if(!$this->form_validation->run()){

				$this->load->view('templates/header',$data);
				$this->load->view('pages/children',$data);
				$this->load->view('templates/footer');
			} else {
				$this->child_model->insert_child();
				redirect('managechildren_controller\displayInfo');
			}
		}

		public function isvalid_DOB($str) {
			$datetime1 = strtotime($str);
    		$datetime2 = strtotime('today');
			if($datetime1 < $datetime2) {
				return TRUE;
			} else {
				$this->form_validation->set_message('isvalid_DOB', 'The {field} should not be greater than today');
                return FALSE;
			}
		}

		public function updateChild(){
			
			$action = $this->input->post('action');

			if($action === 'update') {

				$string = '';
				if($this->input->post('vaccines') != '--Choose Vaccination--' ) {


						$sideeffects= $this->input->post('sideeffects');
						echo "<script>alert(".$sideeffects.");</script>";
						$length = count($sideeffects);
						
						for ($i = 0; $i < $length; $i++) :
							if($i===0){
								$string = $sideeffects[$i];
							}
							else {
								$string = $string.', '.$sideeffects[$i];
							}
							
						endfor;
				}

				
				print_r($string);
				//$v_id = $_POST['vaccineSelected'];
				$data['update'] = $this->child_model->update_child($string);
				redirect('managechildren_controller\displayInfo');
			}
			else if($action === 'delete') {
				$res=$this->child_model->delete_child();
				redirect('managechildren_controller\displayInfo');
			}

			
			
		}

		public function getVaccines(){
			$name = $_POST['childSelected'];
			$data['vaccines'] = $this->child_model->get_vaccines($name);
			//echo $data['vaccines'];
			print_r(json_encode($data['vaccines']));
		}

		public function getSideEffect(){
			$v_id = $_POST['vaccineSelected'];
			$data['sideeffects'] = $this->child_model->get_sideeffects($v_id);
			print_r(json_encode($data['sideeffects']));
		}


	}