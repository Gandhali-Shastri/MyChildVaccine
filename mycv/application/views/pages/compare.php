

<div class="row">
				<div class="column1">
							<img src="assets/images/comp1.jpg" width="100%">
							<p>Compare which vaccine may have which side effects on your child! </p>
				</div>


<div class="column2" style="height: 48%;">
					<div class="signupbox">
						<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('showcompare'); ?>
						<fieldset style="height: 100%;">
							<legend>Details</legend>
							<table>
								<tr>
									<td>
										<label>Select Child: </label> 
									</td>
									<td>
										<select name='c_id' id="c_id">
											<option>--Select--</option>
											<?php 


											foreach ($children as $child) {
												echo "<option name='c_id' value='".$child['c_id']."'> ".$child['name']."</option>";
											}
											

											?>
											
										</select>
									</td>
								</tr>	
								<tr>
									<td>
										<label>Select Vaccine: </label> 
									</td>
									<td>
										<select name='v_id' id="v_id">
										
											<!-- <?php 


										//	foreach ($vaccines as $vaccine) {
										//		echo "<option name='v_id' value='".$vaccine['v_id']."'> ".$vaccine['vaccine_name']."</option>";
									//		}
											

											?> -->
											
										</select>
									</td>
								</tr>	
							</table>
							<br/>
							<input type="submit" name="compare"/>
						</fieldset>
					</form>

					
				</div>
				</div>	
				<script type="text/javascript">
                        $( document ).ready(function() {
                             
                                //var $checkboxes = document.getElementsByClassName("gender1");
                                //console.log($checkboxes);
                                $( "#c_id" ).change(function() {
                                    var childSelected = $(this).val();
                                    console.log(childSelected);
                                    
                                  
                                            $.ajax({
                                                    type: "POST",
                                                      url:'<?php echo base_url(); ?>compares/get_vaccines',
                                                      data: {'childSelected':childSelected},
                                                      complete: function (data) {
                                                      console.log(data.responseText);
                                                      var vaccines = data.responseText;
                                                      var select = document.getElementById("v_id");
                                                      $('#v_id').empty();
                                                          var el = document.createElement("option");
                                                        el.textContent = '--Choose Vaccination--';
                                                         el.value = 0;
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