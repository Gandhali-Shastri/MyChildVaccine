
<div class="row">
				<div class="column1">
					<img src="assets/images/img1.jpg" width="100%">
							<p>Table shows which vaccine may have which side effects on your child! </p>
				</div>


<div class="column2" style="height: 48%; bac">
				

					<table style="border-style: solid; border-collapse: collapse; text-align: center;  width: 100%; ">
						<tr><th>#</th><th style='border-style: solid; padding: 5px;'>Vaccine Name</th><th style='border-style: solid; padding: 5px;'>Side Effects on other kids</th></tr>
						<?php 
						$count=1;
						foreach ($info as $infos) {

							echo "
							<tr>
							<td style='border-style: solid;'>".$count."</td>
							<td style='border-style: solid;'>".$infos['vaccine_name']."</td>
							<td style='border-style: solid;''>".$infos['side_effects']."</td>
							</tr>";
							$count++;

						}
						

						?>

					</table>

				</div>		
