<?php

	class deleteModel extends CI_Model
	{

		 public function delData()
    {

       
          $sv= $_POST['vname1'];
          $sp=$_POST['pname1'];
        
          $v='Influenza';
          $p='Abbott';
         $flg='inactive';

          $this->db->where('vaccine_name',$sv);
           $this->db->where('pharm_name', $sp);
          $this->db->set('active',$flg );
        
          $result=$this->db->update('vaccine');
          

          if ( ! $result)
{
     // Error
  $response = array(
          'message' => "There is nothing to update",
           'status' => false
          );

}else{

   
         if($this->db->affected_rows() == true)
        {
            $response = array(
             'message' => "User edited successfully",
            'status' => true
             );

        } else {
          $response = array(
          'message' => 'There is nothing to update' ,

           'status' => false
          );
     }


}
         
          
 return $response;        
	}
	}
?>