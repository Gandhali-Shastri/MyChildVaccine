
   <?php

	class manageVaccineModel extends CI_Model
	{
		public function getData1()
  		{
        	
      		$sql = $this->db->query("SELECT vaccine_name from vaccine where active='active'");
       		$query = $sql->result();
       		return $query;
		}  

		public function getData2()
  		{
        	
      		$sql1 = $this->db->query("SELECT pharm_name from vaccine where active='active'");
       		$query1 = $sql1->result();
       		return $query1;
		}  	


		public function getData3()
  		{
        	$selectedvaccine= $_POST['Vaccine'];
        	$selectedpharm= $_POST['Pharm'];
          
      	   $sql = $this->db->query("SELECT vaccine.v_id,vaccine.vaccine_name,vaccine.lot_num,vaccine.pharm_name,vaccine.dosage,sideeffects.sideeffect_name FROM vaccine join sideeffects on vaccine.v_id=sideeffects.v_id where vaccine.vaccine_name='".$selectedvaccine."' and vaccine.pharm_name='".$selectedpharm."'");
          $query = $sql->result();
       	
       		return $query;
		}  

   
}
?>