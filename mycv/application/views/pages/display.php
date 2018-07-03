<div class="row3">

		  		
				<div class="displaycolumn">
                <?php

                echo validation_errors();
                error_reporting(0);
                //if (isset($_POST['search'])) {
                	# code...

                
			
							echo'<form method="post" action="decide" align="center">';
							
								
										echo  '<table align="center" class="manage_table" cellpadding="20">';

								foreach ($result as $a) {
									# code...
									echo "<tr>";
									echo "<td>Vaccine Name</td>";
									echo "<td><input type='text' name='vname1' value='". $a ->vaccine_name."'></td>";
									echo "</tr><tr>";
									echo "<td> Pharmaceutical Company Name </td>";
									echo "<td><input type='text' name='pname1' value='". $a ->pharm_name."'></td>";
									echo "</tr><tr>";
									echo "<td> Lot Number</td>";
									echo "<td><input type='numeric' name='lotnum1' value='".$a ->lot_num."'></td>";
									echo "</tr><tr>";
									echo "<td> Dosage </td>";
									echo "<td><input type='numeric' name='dosage1' value='".$a ->dosage."'</td>";
									echo "</tr>";
									echo '<tr>
									<td>SideEffects</td>
									<td><textarea name="side1" rows="5" cols="25">'.$a ->sideeffect_name.'</textarea></td>
									</tr>';
									break;
							
								}



							?>			

							 <tr>
                            <td>
                                
                                <input type="submit" name="decide" value="Update">
                                 
                               
                            </td>
                            <td>
                                
                                <input type="submit" name="decide" value="Delete" >
                                 
                             
                            </td>
                        </tr>

							</table>
							</form>
							
							   

			

			</div>
	</div>