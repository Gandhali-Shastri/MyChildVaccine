<?php
	
		class Child_Model extends CI_Model {
			public function _construct(){
				$this->load->database();
			}

			public function get_children() {

				$userid = $this->session->user_id;

				$this->db->select('*');
				$this->db->from('children');
				$this->db->where('user_id',$userid);
				$this->db->where('active','active');
				$query= $this->db->get();
				return $query->result_array();
			}

			public function get_childrenNames() {

				$userid = $this->session->user_id;

				$this->db->select('Name');
				$this->db->from('children');
				$this->db->where('user_id',$userid);
				$this->db->where('active','active');
				$query= $this->db->get();
				return $query->result_array();
			}

			public function update_child($sideeffects) {

				$userid = $this->session->user_id;

				$name= $this->input->post('children');
				$height= $this->input->post('height');
				$weight= $this->input->post('weight1');
				$dob= $this->input->post('bday1');
				$gender= $this->input->post('gender1');
				$vaccine= $this->input->post('vaccines');

				
				$this->db->where('user_id',$userid);
				$this->db->where('Name',$name);

				$this->db->set('height',$height);
				$this->db->set('weight',$weight);
				$this->db->set('dob',$dob);
				$this->db->set('gender',$gender);


				$query= $this->db->update('children');
				if($sideeffects != '') {
					$this->db->select('c_id');
					$this->db->from('children');
					$this->db->where('Name',$name);
					$this->db->where('user_id',$userid);
					$query= $this->db->get();
					$row['result'] = $query->result_array();
					$id = current($row);
					$currentId = current($id);
					$date = date_create('today');
					$fdate = $date->format('Y-m-d H:i:s');

					$data = array(
						'c_id' => current($currentId),
						'v_id' => $vaccine,
						'vaccine_date' => $fdate,
						'side_effects' => $sideeffects
					);

					$this->db->insert('given',$data);	
				}


				return $this->db->insert_id();
			}

			public function get_vaccines($name) {

				$userid = $this->session->user_id;
				$this->db->select('c_id');
				$this->db->from('children');
				$this->db->where('name',$name);
				$this->db->where('user_id',$userid);
				$query= $this->db->get();
				$row['result'] = $query->result_array();
				$id = current($row);
				$currentId = current($id);
				$this->db->select('v_id');
				$this->db->from('given');
				$this->db->where('c_id',current($currentId));
				$query= $this->db->get();
				$row['result'] = $query->result_array();
				$id = current($row);
				//$currentId = current($id);
				$vids = array();
				$ids = $id;
				foreach ($ids as $id) :

					$vids[$id['v_id']] = $id['v_id'];
				endforeach;
				//return $vids;
				$this->db->select('v_id,vaccine_name');
				$this->db->from('vaccine');
				if(!empty($vids))
					$this->db->where_not_in('v_id',$vids);

				//$this->db->where('v_id !=',current($currentId));
				$query= $this->db->get();
				// $query = $this->db->query("Select vaccine_name from vaccine where v_id != (select v_id from given g where g.c_id = (select c_id from children where Name = 'Ashwini' and user_id=1))");
				//$query= $this->db->get();
				return $query->result_array();
			}

			public function get_sideeffects($v_id) {

				$userid = $this->session->user_id;
				//$v_id = $this->input->post('vaccines');
				$this->db->select('s_id,sideeffect_name');
				$this->db->from('sideeffects');
				$this->db->where('v_id',$v_id);
				$query= $this->db->get();
				return $query->result_array();
			}

			public function delete_child() {

				$userid = $this->session->user_id;

				$name= $this->input->post('children');
				//$v_id = $this->input->post('vaccines');
				$this->db->where('user_id',$userid);
				$this->db->where('Name',$name);

				$this->db->set('active','inactive');
				


				$query= $this->db->update('children');
			}

			public function insert_child(){
	
				$data = array(
					'name' => ucfirst($this->input->post('name')),
					'height' => $this->input->post('height'),
					'weight' => $this->input->post('weight'),
					'gender' => $this->input->post('gender'),
					'dob' => $this->input->post('dob'),
					'user_id' => $this->session->user_id
					);

		 		$this->db->insert('children', $data);
			}

		}
