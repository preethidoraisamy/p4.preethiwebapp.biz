<!-- Employer - job edit or add form-->
<form method='post' action='/employer/p_editdetails/<?=$post['id']?>'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				<!-- To enter the Employer name  -->
				Job Title (100 characters)
				<input type='text' name='job_title' maxlength="100" value='<?=$post['job_title']?>' required="required"><br>

				<!-- To enter the Employer Description  -->
				Zipcode (5 characters)
				<!-- <input type='text' name='description' maxlength="250"><br> -->
				<input type='text' name='location' maxlength="5" value='<?=$post['location']?>' required="required" id ="zipcode"><br>
				
				<!-- To enter the Employer Revenue  -->
				Position Duties (250 characters)
				<!-- <input type='text' name='revenue' maxlength="250"><br> -->
				<textarea name='position_duties' maxlength="250" required="required"><?=$post['position_duties']?></textarea><br>

				<!-- To enter the Employer Industry  -->
				Requirements (250 characters)
				<!-- <input type='text' name='industry' maxlength="250"><br> -->
				<textarea name='requirement' maxlength="250" required="required"><?=$post['requirement']?></textarea><br>

				<!-- To enter the Employer Address  -->
				Responsibilities (250 characters)
				<textarea name='responsibilities' maxlength="250" required="required"><?=$post['responsibilities']?></textarea><br>
				<!-- <input type='text' name='responsibilities' maxlength="250" value='<?=$post['responsibilities']?>'><br> -->

				Telecommute (20 characters)
				<input type='text' name='telecommute' maxlength="20" value='<?=$post['telecommute']?>' required="required"><br>

				Work Authorization (100 characters)
				<input type='text' name='work_authorization' maxlength="100" value='<?=$post['work_authorization']?>' required="required"><br>

				Payrate (30 characters)
				<input type='text' name='payrate' maxlength="30" value='<?=$post['payrate']?>' required="required"><br>

 				Position ID
				<input type='text' name='position_id' value='<?=$post['position_id']?>' required="required"><br>

				Tax Term (30 characters)
				<input type='text' name='tax_term' maxlength="30" value='<?=$post['tax_term']?>' required="required"><br>

				Travel Requirement (30 characters)
				<input type='text' name='travel_requirement' maxlength="30" value='<?=$post['travel_requirement']?>' required="required"><br>

				Skills Required(250 characters)
				<input type='text' name='skills' maxlength="250" value='<?=$post['skills']?>' required="required"><br>
	
				
				<input type='Submit' value='Save'>	
		
		</fieldset>
	</section>

        

</form>