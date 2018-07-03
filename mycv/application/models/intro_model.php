<?php

class intro_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}

	public function newuser(){
	
		$data = array(
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'gender' => $this->input->post('gender'),
					'email' => $this->input->post('emailid'),
					'pwd' => $this->input->post('password1')
					);

		 $this->db->insert('users', $data);
	}

	public function login(){

	
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        		
        $this->db->where('email', $username);
        $this->db->where('pwd', $password);
        $this->db->where('usertype', 'Admin');
      
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1)
        {
            $row = $query->row();
            
                $data = array(
                        'user_id' => $row->user_id,
                        'usertype' => $row->usertype,
                        'validated' => true
                        );

                $this->session->set_userdata($data);
            
            redirect('adminhome_controller/displayInfo');
            // $this->load->view('templates/admin_header');
            // $this->load->view('pages/admin_home');
            // $this->load->view('templates/footer');
        }
        else
        { 
            $this->db->where('email', $username);
            $this->db->where('pwd', $password);
            $this->db->where('active', 'active');
            $query = $this->db->get('users');
            
            if($query->num_rows() == 1)
            {
                $row = $query->row();

                $data = array(
                        'user_id' => $row->user_id,
                        'usertype' => $row->usertype,
                        'validated' => true
                        );

                $this->session->set_userdata($data);
                $this->load->view('templates/header');
                $this->load->view('pages/home');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['msg'] = '<td align="center"><font color=red>Invalid username and/or password.</font><br /></td></tr>';
                $this->load->view('templates/intro_header');
                $this->load->view('pages/intro', $data);
                $this->load->view('templates/footer', $data);  

            }
        }
    }
}