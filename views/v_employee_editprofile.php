<!-- Edit form -->
<form method='post' action='/employee/p_profile'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				Full Name(40 characters)
				<input type='text' name='fullname' maxlength="40" value='<?=$post['fullname']?>'><br>

				Experience(2 characters)
				<input type='text' name='experience' maxlength="2" value='<?=$post['experience']?>' id = "experience"><br>

				Last company(40 characters)
				<input type='text' name='last_company' maxlength="40" value='<?=$post['last_company']?>'><br>

				Highest Degree(10 characters)
				<input type='text' name='highest_degree' maxlength="10" value='<?=$post['highest_degree']?>'><br>

				Major(20 characters)
				<input type='text' name='major' maxlength="20" value='<?=$post['major']?>'><br>

				Zipcode(6 characters)
				<input type='text' name='zipcode' maxlength="20" value='<?=$post['zipcode']?>'><br>

				<!-- To enter the Cv description -->
				Description - About yourself(100 characters)
				<input type='text' name='description' maxlength="40" value='<?=$post['description']?>'><br>

 				<!-- To enter the skills -->
				Skills (255 characters)
				<input type='text' name='skills' maxlength="255" value='<?=$post['skills']?>'><br>

				Phone # (10 characters)
				<input type='text' name='phone' maxlength="10" value='<?=$post['phone']?>' id = "phoneno"><br>

				Prefered Email(50 charaters)
				<input type='text' name='pemail' maxlength="10" value='<?=$post['pemail']?>'><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

        

</form>