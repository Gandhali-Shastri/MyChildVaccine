<div class="row">
				<div class="column1">
							<img src="assets/images/img1.jpg" width="100%">
							<p>
								Table Shows Vaccines given to your child and its name

							</p>
				</div>

<div class="column2" style="height: 48%;">
				

					<table style="border-style: solid; border-collapse: collapse; text-align: center; width: 100%;">
						<tr><th>#</th><th style='border-style: solid; padding: 5px;'>Vaccine Name</th><th style='border-style: solid; padding: 5px;'>Given Date</th><th>Side Effects</th></tr>
						<?php 
						$count=1;
						foreach ($childinfo as $info) {
							echo "<tr>
							<td style='border-style: solid;'>".$count."</td>
							<td style='border-style: solid;'>".$info['vaccine_name']."</td>
							<td style='border-style: solid;''>".$info['vaccine_date']."</td>
							<td style='border-style: solid;''>".$info['side_effects']."</td>
							</tr>";
							$count++;

						}
						

						?>

					</table>

				</div>		
