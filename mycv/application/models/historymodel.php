	

<?php 

	/**
	* 
	*/
	class HistoryModel extends CI_Model
	{
		
		public function __construct()
		{
			
				$this->load->database();

			
		}


		public function get_child()
		{
			

					$userid=$this->session->user_id;

					$where="user_id=".$userid." AND active='active'";
					$query = $this->db->select('*')
				     ->from('children')	     
				     ->where($where)
				     ->get();
				    
				      return $query->result_array();

				 
				
		}

		public function get_childinfo()
		{

			$cid=$this->input->post('c_id');


			$where='t1.c_id='.$cid;
			$query=$this->db->select(' t1.side_effects, t2.vaccine_name,t1.vaccine_date')
				     ->from('given as t1')
				     ->where($where)
				     ->join('vaccine as t2', 't1.v_id = t2.v_id', 'LEFT')				     
				    
				     ->get();
				    
			 return $query->result_array();



		}


		

	}




 ?>
