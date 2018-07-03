<?php 

	class user_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();			
		}


		public function get_user()
		{
			$userid = $this->session->user_id;

				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_id',$userid);
				$this->db->where('active','active');
				$query= $this->db->get();
				return $query->result_array();
		}

		

		public function update_user() {
				$userid = $this->session->user_id;



				$fname= $this->input->post('fname');
				$lname= $this->input->post('lname');
				$email= $this->input->post('email');
				$pwd= $this->input->post('password1');
				$gender= $this->input->post('gender');

				
				$this->db->where('user_id',$userid);

				$this->db->set('fname',$fname);
				$this->db->set('lname',$lname);
				$this->db->set('email',$email);
				$this->db->set('gender',$gender);
				$this->db->set('pwd',$pwd);


				$query= $this->db->update('users');
		}

		public function delete_user() {
				$userid = $this->session->user_id;

				
;
				$this->db->where('user_id',$userid);
				

				$this->db->set('active','inactive');
				


				$query= $this->db->update('users');
			}

	}
