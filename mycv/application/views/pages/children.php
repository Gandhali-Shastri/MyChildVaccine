				<div  class="childinfo">
					<fieldset>
							<center><img src="<?php echo base_url(); ?>assets/images/NVIC-Chart.jpg" style="width:80%; height: 25%">
					</fieldset>
					<p>
						<center>Below you can find your children summary.
					</p>
					<fieldset>
						<legend>Children Summary</legend>
						<table table class="summarytable" border="1" cellpadding="15">
							<thead>
								<th>Name</th>
								<th>Age</th>
								<th>Height</th>
								<th>Weight</th>
							</thead>
							<?php
								
								foreach ($children as $child) : ?>
								<?php

									
									$datetime1 = date_create($child['dob']);
    								$datetime2 = date_create('today');
									
									$interval = date_diff($datetime1, $datetime2);

									if($interval->format('%y') == '0') {
										if($interval->format('%m') == '0') {
											$age = $interval->format('%d Days');
										}
										else {
											$age = $interval->format('%m Month %d Days');	
										}
									}
									else {
										$age = $interval->format('%y Year %m Month %d Days');
									}
   
    								
								  	

								echo "<tr>
										<td>". $child['name']."</td>
										<td>".$age."</td>
										<td>" .$child['height']. " cm</td>
										<td>" .$child['weight']. " pounds</td>
									</tr>"
									?>
							<?php endforeach; ?>
							
						</table>
					</fieldset>
				</div>
				<p style="padding-left: 3%"><B>We can help you keep track of your child's vaccines.<Br>Follow the steps below:<br><br>1. Just add information about your child below.<br> 2. Now select your child and add the vaccine that you have recently given your child.<br>3. You can also add the side effects of the vaccine.(if any) </B></p>
				<div class= "wrap">
					
					<div class="addchild">
						<?php echo form_open('managechildren_controller/addchildren');?>
							<fieldset>
								<legend>Add Child</legend>
								<?php echo validation_errors(); ?>
								<table class="addchildtable"  align= "center" cellpadding="10px">
									<tr>
										<td align="right"><label id="name">Name:</label></td>
										<td align="left"><input type="text" id="name" name="name"></td>
									</tr>
									<tr>
										<td align="right"> Date of Birth:</td>
										<td><input type="date" name="dob"></td>
									</tr>
									<tr>
										<td align="right"><label id="height">Height:</label></td>
										<td align="left"><input type="text" id="height" name="height"></td>
									</tr>
									<tr>
										<td align="right"><label id="weight">Weight:</label></td>
										<td align="left"><input type="weight" id="weight" name="weight"></td>
									</tr>
									<tr>
										<td align="right"><label id="gender">Gender:</label></td>
										<td align="left">
											<?php echo form_label('Male', 'male') . form_radio('gender', 'M', '', 'id=male');	?>
											<?php echo form_label('Female', 'female') . form_radio('gender', 'F', '', 'id=female'); ?>
										</td>
									</tr>
									<tr>
										<td><label id=""></label></td>
										<td><button type="submit"> Add Child </button></td>
									</tr>
								</table>
							</fieldset>
						</form>
						
					</div>
					<script type="text/javascript">
						$( document ).ready(function() {
								var children = '<?php echo $childrenJson; ?>';
								//var $checkboxes = document.getElementsByClassName("gender1");
								//console.log($checkboxes);
								$( "#children" ).change(function() {
									var childSelected = $(this).val();
									console.log(childSelected);
									
									$.each(JSON.parse(children), function( index, value ) {
										var childName = value.name;
										console.log(childName);
										
										if(childSelected == childName){
								            // Extract related Craft values from JSON object
								        	var height = value.height;
								        	var weight = value.weight;
								        	var dob = value.dob;
								        	var gender = value.gender;

								        	//var craft_2_points = value.craft_2_points;
								        	// Place craft value in respective INPUT box
								    		$("#height1").val(height);
								    		$("#weight1").val(weight);
								    		$("#dob").val(dob);
								    		$("input[name='gender1']").each(function() {
								    			//alert(checkboxes);
								    			
										        if(this.value == gender) {
										        	//alert('test');
								    				this.checked = true;
									    		}
										    });

										    $.ajax({
										    		type: "POST",
											      	url:'<?php echo base_url(); ?>ManageChildren_Controller/getVaccines',
											      	data: {'childSelected':childSelected},
											      	complete: function (data) {
											          console.log(data.responseText);
											          var vaccines = data.responseText;
											          var select = document.getElementById("vaccines");
											          $('#vaccines').empty();
											          	var el = document.createElement("option");
														el.textContent = '--Choose Vaccination--';
														select.appendChild(el);
											          $.each(JSON.parse(vaccines), function( index, value ) {
											          		//console.log(select);
											          		var el = document.createElement("option");
														    el.textContent = value.vaccine_name;
														    el.value = value.v_id;
														    select.appendChild(el);
											           });
											      },
											      error: function () {
											          $('#output').html('Bummer: there was an error!');
											      }
											  });
											  return false;
								    		
								    		//alert(height);
								            //$('#craft_2_points').val(craft_2_points);
							        }

						        });
							});
							$( "#vaccines" ).change(function() {
								var vaccineSelected = $(this).val();
								console.log(vaccineSelected);
								 $.ajax({
											type: "POST",
											url:'<?php echo base_url(); ?>ManageChildren_Controller/getSideEffect',
											data: {'vaccineSelected':vaccineSelected},
											complete: function (data) {
												console.log(data.responseText);
											    var sideeffects = data.responseText;
											    //var array = sideeffects.split(",")
											    //console.log(array);
											     $('#sideeffects').empty();

											    var select = document.getElementById("sideeffects");
											     var el = document.createElement("option");
													el.textContent = 'No SideEffects';
													//e1.setAttribute('selected','1');
													select.appendChild(el);

											    $.each(JSON.parse(sideeffects), function( index, value ) {
											    	console.log(select);
											    	select.multiple=true;
											    	var array = value.sideeffect_name.split(",")
											    	for(var i = 0; i < array.length; i++) {
													   	var opt = array[i];
													    var el = document.createElement("option");
													    el.textContent = opt;
													    el.value = opt;
													    select.appendChild(el);
													}
											        
											     });
											   },
											   error: function () {
											 		$('#output').html('Bummer: there was an error!');
											    }
											});
											return false;

								});
							});
					</script>					
					<div class="update">
						
						<?php echo form_open('managechildren_controller/updateChild');?>
							<fieldset>
								<legend>Update/Remove Child</legend>
								<table class="updateform" align="center" cellpadding="10px">
									<tr>
										<td align="right"><label id="child">Child:</label></td>
										<td align="left">
											<?php $js = 'id="children"';
												echo form_dropdown('children', $names,$names['No_Select'],$js); ?>
											<!-- <select>
											  <option value="child1">Child 1</option>
											  <option value="child2">Child 2</option>
											</select>  -->
										</td>
									</tr>
									<tr>
										<td align="right"><label>Height:</label></td>
										<td align="left"><input type="text" id="height1" name="height" value=""></td>
									</tr>
									<tr>
										<td align="right"><label id="weight">Weight:</label></td>
										<td align="left"><input type="text" id="weight1" name='weight1'></td>
									</tr>
									<tr>
										<td align="right"> Date of Birth:</td>
										<td><input type="date" id="dob" name="bday1"></td>
									</tr>
									<tr>
										<td align="right"><label id="gender">Gender:</label></td>
										<td align="left">
											<input type="radio" id="gender1" name="gender1" value="M" checked> Male
											<input type="radio" id="gender1" name="gender1" value="F"> Female
											
										</td>
									</tr>
										<td align="right"><label id="Add Vaccination">Vaccine:</label></td>
										<td align="left">

											<select id='vaccines' name='vaccines'>
												<option>--Choose Vaccine--</option>
											</select> 
										</td>
									<tr>
										<td align="right"><label id="Add SideEffects">Side Effects:</label></td>
										<td align="left">
											<select id='sideeffects' name='sideeffects[]' mulitple size='10'>
												<option>--Choose Side Effects--</option>
											</select> 
										</td>
									</tr>
									<tr>
										<td><label id=""></label></td>
										<td>
											<button type="submit" name='action' value='update'> Update </button>
											<button type="submit" name='action' value='delete'> Delete </button>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
					</div>				
				</div>
				