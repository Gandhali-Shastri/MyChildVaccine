					
				<div class= "wrap_UpdateAccount">
					
					<div class="update_Account">
						<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('user_controller/user_set'); ?>
							<fieldset>
								<legend>Update/Delete Account</legend>
								<table class="updateAccountTable"  align= "center" cellpadding="10px">
									<tr>
										<td align="right"><label id="firstname">First name:</label></td>
										<td align="left"><input type="text" id="firstname" name="fname"></td>
										<td><button type="submit" value="delete" name="submit"> Delete Account </button></td>
									</tr>
									<tr>
										<td align="right"><label id="lastname">Last name:</label></td>
										<td align="left"><input type="text" id="lastname" name="lname"></td>
									</tr>
									<tr>
										<td align="right"><label id="email">Email:</label></td>
										<td align="left"><input type="text" id="email" name="email"></td>
									</tr>
									<tr>
										<td align="right"><label id="gender" name="gender">Gender:</label></td>
										<td align="left">
											<?php echo form_label('Male', 'male') . form_radio('gender', 'M', '', 'id=male');	?>
											<?php echo form_label('Female', 'female') . form_radio('gender', 'F', '', 'id=female'); ?>
										</td>
									</tr>
									<tr>
										<td align="right"><label id="password1">*Password:</label></td>
										<td align="left"><input type="password" id="pwd1" name="password1"></td>
									</tr>
									<tr>
										<td align="right"><label id="password2">*Re-enter Password:</label></td>
										<td align="left"><input type="password" id="pwd2" name="confpassword"></td>
									</tr>
									<tr>
										<td><label id=""></label></td>
										<td><button type="submit" value="update" name="submit"> Update </button></td>
									</tr>
								</table>
							</fieldset>
						</form>
					</div>					
									
				</div>
				