<body id="wrapper">
	<div class="main">
		<header></header>

		<nav>
			<div class="intro_topnav">

				<table class="titlebar" width="100%">
					<tr width="100%">
						<td ><a href ="<?php echo base_url();?>./about">About</a></td>

						<td><a href ="<?php echo base_url();?>./contactus">Contact Us</a></td>

						<?php echo form_open('intro_controller/validateuser');	?>
							<td align="right">
								<label id="username">Username:</label>
								<input type="text" id="uname" name="username">

								<label id="password">Password:</label>
								<input type="password" id="pwd" name="password">
							</td>
							<td align="right"><td><input name="login" id="login" type="submit" value="Login"></td>
							</form>
						</tr>
						<tr><td></td><td></td>
						<?php
							if(! is_null($msg)) echo $msg;?>
					</table>
				</div>
			</nav>

			<div class="row">
				<div class="column1">

					<div class="slideshow-container">

					<div class="mySlides fade">
					  <div class="numbertext">1 / 3</div>
					  <img src="<?php echo base_url(); ?>assets/images/intro1.jpg" style="width:100%">
					  <div><b>Prevent Disease, Vaccinate Early!</b>
					  	<br><br>
						Vaccines are one of the best ways to protect your child from diseases.
						Following the recommended vaccine schedule can help keep your family happy and healthy.</div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 3</div>
					  <img src="<?php echo base_url(); ?>assets/images/intro2.jpg" style="width:100%">
					  <div><b>Biggest reasons parents opt out! </b><br><br>
						Why do some parents opt out? They're more likely to have vaccine safety concerns and to "perceive fewer benefits associated with vaccines," a study found -- despite the scientific evidence and debunking of a study that suggested vaccines could trigger autism.
						Most of these parents do believe vaccines are necessary to protect the health of their children. But many also believe their children could suffer from the vaccines themselves. </div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 3</div>
					  <img src="<?php echo base_url(); ?>assets/images/intro3.png" style="width:100%">
					  <div class="text">SignUp and protect your child now!!</div>
					</div>

					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>

					</div>
					<br>

					<div style="text-align:center">
					  <span class="dot" onclick="currentSlide(1)"></span> 
					  <span class="dot" onclick="currentSlide(2)"></span> 
					  <span class="dot" onclick="currentSlide(3)"></span> 
					</div>

					<script>
					var slideIndex = 1;
					showSlides(slideIndex);

					function plusSlides(n) {
					  showSlides(slideIndex += n);
					}

					function currentSlide(n) {
					  showSlides(slideIndex = n);
					}

					function showSlides(n) {
					  var i;
					  var slides = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("dot");
					  if (n > slides.length) {slideIndex = 1}    
					  if (n < 1) {slideIndex = slides.length}
					  for (i = 0; i < slides.length; i++) {
					      slides[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
					      dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " active";
					}
					</script>


					<h2>Vaccines for Infants</h2>
					<p>
						Vaccines help protect infants, children, and teens from serious diseases.
						Getting childhood vaccines means your child can develop immunity (protection) against diseases before they come into contact with them.
						And did you know that getting your child vaccinated also protects others? Because of community immunity, vaccines help keep your child's younger siblings, older family members, and friends from getting sick, too.
					</p>
					<h2>What is a vaccine?</h2>
					<p>
						When germs enter the body, the immune system recognizes them as foreign substances (antigens). The immune system produces the right antibodies to fight the antigens.

						Vaccines contain weakened versions of a virus or versions that look like a virus (called antigens). This means the antigens cannot produce the signs or symptoms of the disease, but they do stimulate the immune system to create antibodies. These antibodies help protect you if you are exposed to the virus in the future.

						Vaccines not only help keep your child healthy, they help all children by stamping out serious childhood diseases.
					</p>
					<h2>Are vaccines safe?</h2>
					<p>
						Vaccines are generally safe. The protection provided by vaccines far outweighs the very small risk of serious problems. Vaccines have made many serious childhood diseases rare today. Talk to your family doctor if you have any questions.
					</p>
					<h2>Do vaccines have side effects?</h2>
					<p>
						Some vaccines may cause mild, temporary side effects, such as fever, soreness, or a lump under the skin where the shot was given. Your family doctor will talk to you about possible side effects with certain vaccines.
					</p>
				</div>

				<div class="column2">
					<div class="signupbox">
						<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('intro_controller/userdata'); ?>
							<fieldset>
								<legend>SignUp</legend>
								<table class="signup" cellpadding="10px">
									<tr>
										<td align="right"><label id="firstname">*First name:</label></td>
										<td align="left"><input type="text" id="firstname" name="fname"></td>
									</tr>
									<tr>
										<td align="right"><label id="lastname">*Last name:</label></td>
										<td align="left"><input type="text" id="lastname" name="lname"></td>
									</tr>
									<!-- <tr>
										<td align="right"><label id="uname">*User name:</label></td>
										<td align="left"><input type="text" id="uname" name="uname"></td>
									</tr> -->
									<tr>
										<td align="right"><label id="emailid">*E-mail ID:</label></td>
										<td align="left"><input type="text" id="email" name="emailid"></td>
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
										<td align="right"><label id="gender">Gender:</label></td>
										<td align="left">
											<?php echo form_label('Male', 'male') . form_radio('gender', 'M', '', 'id=male',TRUE);	?>
											<?php echo form_label('Female', 'female') . form_radio('gender', 'F', '', 'id=female'); ?>
										</td>
									</tr>

									<tr><td><label id=""></label></td>
										<td><input name="SignUp" id="SignUp" type="submit" value="SignUp"></td></tr>
									</table>
								</fieldset>
							</form>
						</div>
						<br>
						<img src="<?php echo base_url(); ?>assets/images/Flu-Shot.jpg" width="80%" height="50%">

						<h3>A few helpful terms</h3>

						As you learn about vaccines and how they protect you, it may be helpful to understand the difference between vaccines, vaccinations, and immunizations.
						<br><p><b>Vaccine</b>

						A vaccine is made from very small amounts of weak or dead germs that can cause diseases — for example, viruses, bacteria, or toxins. It prepares your body to fight the disease faster and more effectively so you won’t get sick.

						Example: Children younger than age 13 need 2 doses of the chickenpox vaccine.</p>
						<p><b>Vaccination</b>

						Vaccination is the act of getting a vaccine, usually as a shot.

						Example: Schedule your tetanus vaccination today.</p>
						<p><b>Immunization</b>

						Immunization is the process of becoming immune to (protected against) a disease.

						Example: Because of continued and widespread immunization in the United States, it’s rare for Americans to get polio.

						Immunization can also mean the process of getting vaccinated. For example, your “immunization schedule,” is the timing of your shots.</p>
					</div>
				</div>
