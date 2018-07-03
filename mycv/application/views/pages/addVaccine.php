<div class="row3">
				<div class="column1">

					<image id="vaccine_image" src="<?php echo base_url();?>assets/images/vaccine.jpg" height="250px" width="350px"/>
					<image id="add_image" src="<?php echo base_url();?>assets/images/add.png" height="250px" width="350px"/>
				</div>
				<div class="column2">
				
				<?php

                    $attributes = array('id' => 'addVaccine_form');
                    echo form_open('addVaccinesController/form_validation',$attributes);

					echo '<table class="addVaccine_table" cellpadding="25">';
						echo "<tr>";
							echo "<td>" .form_label('Vaccine Name') . "</td>";
                            $data_vname = array('name'=>'vname', 'placeholder'=>'Please Enter Vaccine Name');
                            echo "<td>" .form_input($data_vname). "</td>";
                            echo '<div class = "error">';
                            echo form_error('vname');
                        echo "</tr>";
						
						echo "<tr>";
							echo "<td>" .form_label('Pharmaceutical Company') . "</td>";
                            $data_pharmname = array('name'=>'pharm_name', 'placeholder'=>'Please Enter Pharmaceutical Company Name');
                            echo "<td>" .form_input($data_pharmname). "</td>";
                            echo '<div class = "error">';
                            echo form_error('pharm_name');
                        echo "</tr>";
								
						echo "<tr>";
							echo "<td>" .form_label('Lot Number') . "</td>";
                            $data_lotnum = array('name'=>'lot_num', 'placeholder'=>'Please Enter Lot Number');
                            echo "<td>" .form_input($data_lotnum). "</td>";
                            echo '<div class = "error">';
                            echo form_error('lot_num');
                        echo "</tr>";								

                        echo "<tr>";
							echo "<td>" .form_label('Dosage') . "</td>";
                            $data_dosage = array('name'=>'dosage', 'placeholder'=>'Please Enter Dosage');
                            echo "<td>" .form_input($data_dosage). "</td>";
                            echo '<div class = "error">';
                            echo form_error('dosage');
                        echo "</tr>";
							
						echo "<tr>";
							echo "<td>" .form_label('SideEffects') . "</td>";
                            $data_sideeffect = array('name'=>'s', 'placeholder'=>'Please Enter the SideEffects of the Vaccine');
                            echo "<td>" .form_input($data_sideeffect). "</td>";
                            echo '<div class = "error">';
                            echo form_error('s');
                        echo "</tr>";
						
						echo "<tr>";
							echo "<td></td>";
							echo"<td><input type='submit' name='submit' value='Add Vaccine'></td>";
						echo"</tr>";
						echo"</table>";
					echo form_close();
					?>
				</div>
			</div>
		