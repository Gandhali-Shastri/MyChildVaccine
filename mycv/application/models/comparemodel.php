

<?php 

	/**
	* 
	*/
	class comparemodel extends CI_Model
	{
		
		public function __construct()
		{
			
				$this->load->database();

			
		}


		public function get_vaccine($cid)
		{
			

					
					$where='t1.c_id='.$cid;
					$query=$this->db->select('t1.v_id,t2.vaccine_name,t1.side_effects')
				     ->from('given as t1')
				      ->where($where)
				     ->join('vaccine as t2', 't1.v_id = t2.v_id', 'LEFT')			     
				   	
				     ->get();
				    
				      return $query->result_array();

				 
				
		}


		
		public function compare()
		{

			$vid=$this->input->post('v_id');



			$where='t1.v_id='.$vid.' and t1.side_effects!=""';
			$query=$this->db->select('t2.vaccine_name,t1.side_effects')
				     ->from('given as t1')
				     ->join('vaccine as t2', 't1.v_id = t2.v_id', 'LEFT')			     
				   	 ->where($where)
				     ->get();

				  
				    
			 return $query->result_array();



		}


		

	}




 ?>
