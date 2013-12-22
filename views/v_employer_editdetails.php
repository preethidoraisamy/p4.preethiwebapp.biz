<!-- Edit form -->
<form method='post' action='/employer/p_editdetails/<?=$post['id']?>'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				<!-- To enter the Employer name  -->
				Job Title (100 characters)
				<input type='text' name='job_title' maxlength="100" value='<?=$post['job_title']?>'><br>

				<!-- To enter the Employer Description  -->
				Location (10 characters)
				<!-- <input type='text' name='description' maxlength="250"><br> -->
				<input type='text' name='location' maxlength="100" value='<?=$post['location']?>'><br>
				
				<!-- To enter the Employer Revenue  -->
				Position Duties (250 characters)
				<!-- <input type='text' name='revenue' maxlength="250"><br> -->
				<textarea name='position_duties' maxlength="250"><?=$post['position_duties']?></textarea><br>

				<!-- To enter the Employer Industry  -->
				Requirements (250 characters)
				<!-- <input type='text' name='industry' maxlength="250"><br> -->
				<textarea name='requirement' maxlength="250"><?=$post['requirement']?></textarea><br>

				<!-- To enter the Employer Address  -->
				Responsibilities (250 characters)
				<textarea name='responsibilities' maxlength="250"><?=$post['responsibilities']?></textarea><br>
				<!-- <input type='text' name='responsibilities' maxlength="250" value='<?=$post['responsibilities']?>'><br> -->

				Telecommute (20 characters)
				<input type='text' name='telecommute' maxlength="20" value='<?=$post['telecommute']?>'><br>

				Work Authorization (100 characters)
				<input type='text' name='work_authorization' maxlength="100" value='<?=$post['work_authorization']?>'><br>

				Payrate (30 characters)
				<input type='text' name='payrate' maxlength="30" value='<?=$post['payrate']?>'><br>

 				Position ID
				<input type='text' name='position_id' value='<?=$post['position_id']?>'><br>

				Tax Term (30 characters)
				<input type='text' name='tax_term' maxlength="30" value='<?=$post['tax_term']?>'><br>

				Travel Requirement (30 characters)
				<input type='text' name='travel_requirement' maxlength="30" value='<?=$post['travel_requirement']?>'><br>

				Skills Required(250 characters)
				<input type='text' name='skills' maxlength="250" value='<?=$post['skills']?>'><br>
	
				
				<input type='Submit' value='Save'>	
		
		</fieldset>
	</section>

        

</form>