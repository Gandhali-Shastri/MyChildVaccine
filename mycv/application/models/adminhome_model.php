<?php

class adminhome_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}

		public function recent_act(){


					$this->db->select('*');
					$this->db->from('vaccine');
					$this->db->order_by('v_id','desc');
					$this->db->limit('3');

					$query= $this->db->get();
					return $query->result_array();
				}

		public function recent_act1(){
 

					$this->db->select('*');
					$this->db->from('sideeffects');
					$this->db->order_by('s_id','desc');
					$this->db->limit('3 ');

					$query1= $this->db->get();
					return $query1->result_array();
				}
	}