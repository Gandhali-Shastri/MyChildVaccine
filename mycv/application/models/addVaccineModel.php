
  	<?php

	class addVaccineModel extends CI_Model
	{
			public function saveData($x)
			{
				$sideeffect=$_POST['s'];
				$this->db->insert('vaccine', $x);
				$sql = $this->db->query('SELECT v_id FROM vaccine order by v_id DESC LIMIT 1');
       			$query = $sql->result();
       			$i=1;

				foreach ($query as $rec)
				 {
					# code...
					 if($i == 1)
					 {
                
               		 	$v_id = $rec->v_id;
                        break;

           			 }//end of if

				}

				$data = array(
                    'sideeffect_name'=> $sideeffect,
                    'v_id' => $v_id,
                    'active' => 'active'
                  );
				$this->db->insert('sideeffects',$data);
				return $query;
			}
	}
?>