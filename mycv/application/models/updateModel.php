<?php
	
	class updateModel extends CI_Model
	{
		 public function updateData()
    {
    	$vname1=$_POST['vname1'];
    	$pname1=$_POST['pname1'];
    	$lotnum1=$_POST['lotnum1'];
    	$dosage1=$_POST['dosage1'];
    	$se=$_POST['side1'];
       
         
                 
   		
          $this->db->where('vaccine_name',$vname1);
           $this->db->where('pharm_name', $pname1);

        
        $this->db->set('vaccine_name', $vname1);
		$this->db->set('lot_num', $lotnum1);
		$this->db->set('pharm_name', $pname1);
		$this->db->set('dosage',$dosage1);

		$this->db->update('vaccine');

		   	$sql = $this->db->query("SELECT v_id FROM vaccine where  vaccine.vaccine_name='".$vname1."' and vaccine.pharm_name='".$pname1."'");
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
       			
          
          $this->db->where('v_id',$v_id);
            $this->db->set('sideeffect_name', $se);

		$result=$this->db->update('sideeffects');


          if ( ! $result)
{
     // Error
  $response = array(
          'message' => "There is nothing to update",
           'status' => false
          );

}else{

     // Function ran ok - do whatever
         if($this->db->affected_rows() == true)
        {
            $response = array(
             'message' => "User edited successfully",
            'status' => true
             );

        } else {
          $response = array(
          'message' => 'There is nothing to update'.$vname1.'suref',

           'status' => false
          );
     }


}
         
          
 return $response;        
	}



	}

?>