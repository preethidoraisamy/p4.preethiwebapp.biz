<!-- To add the comments -->
<form method='post' action='/employee/p_profile'>

	<section class="formalign">
		<fieldset class="txtalign">
			<legend>Edit profile</legend>

				Full Name(40 characters)
				<input type='text' name='fullname' maxlength="40" required="required"><br>

				Experience(2 characters)
				<input type='text' name='experience' maxlength="2" id = "experience" required="required"><br>

				Last company(40 characters)
				<input type='text' name='last_company' maxlength="40" required="required"><br>

				Highest Degree(10 characters)
				<input type='text' name='highest_degree' maxlength="10" required="required"><br>

				Major(20 characters)
				<input type='text' name='major' maxlength="20" required="required"><br>

				Zipcode(5 characters)
				<input type='text' name='zipcode' maxlength="5" id ="zipcode" required="required"><br>

				<!-- To enter the Cv description -->
				Description - About yourself(100 characters)
				<input type='text' name='description' maxlength="40" required="required"><br>

 				<!-- To enter the skills -->
				Skills (255 characters)
				<input type='text' name='skills' maxlength="255" required="required"><br>

				Phone # (10 characters)
				<input type='text' name='phone' maxlength="10" id = "phoneno" required="required"><br>

				Prefered Email(50 charaters)
				<input type='text' name='pemail' maxlength="10" required="required"><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

	

</form>