<div class="row3">
		  		<div class="admincolumn1">
		  			<?php

		  			$att1= array ('class' => 'col1_fieldset');
		  			echo form_open('displays/x',$att1);
                  //  $att= array ('class' => 'col1_fieldset');
                    echo form_fieldset('Search Vaccine');
      					echo '<table class="search_table" cellpadding="10">';
		  					echo"<tr>";

		  					    echo "<td> <select name='Vaccine'>";
		  					    echo '<option selected="selected" value="none">------------Select Vaccine Name------------</option>';
		  					    foreach($vaccines as $rec)
								{	
									echo '<option value="'.$rec ->vaccine_name.'">'.$rec ->vaccine_name. '</option>';
									
								}
		  					     echo form_error('Vaccine');

                           	 echo "</select></td></tr>";

                           	 echo"<tr>";

		  					    echo "<td> <select name='Pharm' >";
		  					    echo '<option selected="selected" value="none">------------Select Pharmaceutical Name------------</option>';
		  					    foreach($pharms as $r)
								{	
									echo "<option name='Pharm' value='".$r ->pharm_name."'>".$r ->pharm_name."</option>";
									
								}
		  					  
								   echo form_error('Pharm');
                           	 echo "</select></td></tr>";
                        	

                         	  	  		
		  					  
		  					echo "<tr>";
		  					   	echo '<td><input type="submit" name="search" ></td>';
		  					echo "</tr>";
		  				echo "</table>";

		  			echo form_fieldset_close();
                    echo form_close();

                    if($msg=='false')
                    {
                    	echo "<p class='perror'>Please select the appropriate combination of vaccine and pharmaceutical company name</p>";
                    }
                    else
                    {
                    	
                    }

                ?>
                </div>
                