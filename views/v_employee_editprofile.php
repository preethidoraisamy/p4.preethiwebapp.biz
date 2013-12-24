<!-- Employee profile edit form-->
<form method='post' action='/employee/p_profile'>

	<section class="formalign">
		<fieldset class="txtalign">

			<p class="class_notify">Employer will contact you with the given Phone # or Email. Make sure to double check</p>

			<!-- Edit with details -->
			<legend>Edit Profile</legend>

				Full Name(40 characters)
				<input type='text' name='fullname' maxlength="40" value='<?=$post['fullname']?>' required="required"><br>

				Experience(2 characters)
				<input type='text' name='experience' maxlength="2" value='<?=$post['experience']?>' id = "experience" required="required"><br>

				Last company(40 characters)
				<input type='text' name='last_company' maxlength="40" value='<?=$post['last_company']?>' required="required"><br>

				Highest Degree(10 characters)
				<input type='text' name='highest_degree' maxlength="10" value='<?=$post['highest_degree']?>' required="required"><br>

				Major(20 characters)
				<input type='text' name='major' maxlength="20" value='<?=$post['major']?>' required="required"><br>

				Zipcode(5 characters)
				<input type='text' name='zipcode' maxlength="5" value='<?=$post['zipcode']?>' required="required" id ="zipcode"><br>

				<!-- To enter the Cv description -->
				Description - About yourself(100 characters)
				<input type='text' name='description' maxlength="40" value='<?=$post['description']?>' required="required"><br>

 				<!-- To enter the skills -->
				Skills (255 characters)
				<input type='text' name='skills' maxlength="255" value='<?=$post['skills']?>' required="required"><br>

				Phone # (10 characters)
				<input type='text' name='phone' maxlength="10" value='<?=$post['phone']?>' id = "phoneno" required="required"><br>

				Prefered Email(50 charaters)
				<input type='text' name='pemail' maxlength="10" value='<?=$post['pemail']?>' required="required"><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

        

</form>