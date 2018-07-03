
<div class="row">
				<div class="column1">
				<center><img src="assets/images/hist1.png" width="80%">
							<p>Check given vaccines for your child!</p>
				</div>

<div class="column2" style="height: 48%;">
				
					<div class="signupbox">
						<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('showhistory'); ?>
						<fieldset style="height: 100%;">
							<legend>Details</legend>
							<table>
								<tr>
									<td>
										<label>Child: </label> 
									</td>
									<td>
										<select name='c_id'>
										
											<?php 

											foreach ($children as $child) {
												echo "<option name='c_id' value='".$child['c_id']."'> ".$child['name']."</option>";
											}
											

											?>
											
										</select>
									</td>
								</tr>	
							</table>
							<br/>
							<input type="submit" name="history"/>
						</fieldset>
					</form>

				
</div>
				</div>		
