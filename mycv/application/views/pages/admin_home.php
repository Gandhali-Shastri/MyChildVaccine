<div class="row3">
		<div class="column1">
			<h1 align=center> Welcome Admin </h1>
			<image id="vaccine_image" src="<?php echo base_url();?>assets/images/admin_home1.jpg" height="350px" width="600px"/>
		</div>

		<div class="admincolumn2">
			<h2>Recent Activity</h2>
			<!-- <image id="vaccine_image" src="<?php echo base_url();?>assets/images/flu.png" height="350px" width="400px"/> -->

				<legend>Recent vaccines</legend>
						<table table class="summarytable1" border="1" cellpadding="15" >
							<thead>
								<th>Vaccine Name</th>
								<th>Lot NUmber</th>
								<th>Pharmaceutical</th>
								<th>Dosage</th>
							</thead>
							<?php
								
								foreach ($vaccine as $child) :

								echo "<tr>
										<td>".$child['vaccine_name']."</td>
										<td>".$child['lot_num']."</td>
										<td>".$child['pharm_name']."</td>
										<td>".$child['dosage']."</td>
									</tr>";
									?>
							<?php endforeach; ?>
							
						</table>
						<br>
				<legend>Recent Side-effects</legend>
						<table table class="summarytable1" border="1" cellpadding="15">
							<thead>
								<th>Side-effect Name</th>
								<th>Vaccine ID</th>
								<!-- <th>Height</th>
								<th>Weight</th> -->
							</thead>


							
							<?php
								
								foreach ($side as $child1) :

								echo "<tr>
										<td>".$child1['sideeffect_name']."</td>
										<td>".$child1['v_id']."</td>
										
									</tr>";
									?>
							<?php endforeach; ?>
							
						</table>
						<br>
		</div>
	</div>