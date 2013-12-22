<!-- To add the comments -->
<form method='post' action='/employee/p_profile' enctype='multipart/form-data'>

	<section class="formalign">
		<fieldset class="txtalign">
			<legend>Edit profile</legend>

				<!-- To enter the Cv description -->
				Description (40 characters)
				<input type='text' name='description' maxlength="40"><br>

				<!-- To enter the CV data file -->
				File to upload:
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
 				<input type="file" name="data" size="40"> <br>

 				<!-- To enter the skills -->
				Skills (255 characters)
				<input type='text' name='skills' maxlength="255"><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

	

</form>