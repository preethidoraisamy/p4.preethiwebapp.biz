<!-- Employer profile edit form -->
<form method='post' action='/employer/p_postJob'>

	<section class="formalign">
		<fieldset class="txtalign">
			<legend>Add job</legend>

				<!-- To enter the Employer name  -->
				Job Title (100 characters)
				<input type='text' name='job_title' maxlength="100"><br>

				<!-- To enter the Employer Description  -->
				Location (10 characters)
				<!-- <input type='text' name='description' maxlength="250"><br> -->
				<input type='text' name='location' maxlength="100"><br>
				
				<!-- To enter the Employer Revenue  -->
				Position Duties (250 characters)
				<!-- <input type='text' name='revenue' maxlength="250"><br> -->
				<textarea name='position_duties' maxlength="250"></textarea><br>

				<!-- To enter the Employer Industry  -->
				Requirements (250 characters)
				<!-- <input type='text' name='industry' maxlength="250"><br> -->
				<textarea name='requirement' maxlength="250"></textarea><br>

				<!-- To enter the Employer Address  -->
				Responsibilities (250 characters)
				<input type='text' name='responsibilities' maxlength="250"><br>

				Telecommute (20 characters)
				<input type='text' name='telecommute' maxlength="20"><br>

				Work Authorization (100 characters)
				<input type='text' name='work_authorization' maxlength="100"><br>

				Payrate (30 characters)
				<input type='text' name='payrate' maxlength="30"><br>

 				Position ID
				<input type='text' name='position_id' ><br>

				Tax Term (30 characters)
				<input type='text' name='tax_term' maxlength="30"><br>

				Travel Requirement (30 characters)
				<input type='text' name='travel_requirement' maxlength="30"><br>

				Skills Required(250 characters)
				<input type='text' name='skills' maxlength="250"><br>
	
				<br><input type='Submit' value='Add new post'>
		
		</fieldset>
	</section>

	

</form>