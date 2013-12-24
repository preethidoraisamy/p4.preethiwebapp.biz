<!-- Employer edit profile form -->
<form method='post' action='/employer/p_profile'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Profile</legend>

				<!-- To enter the Employer name  -->
				Name (100 characters)
				<input type='text' name='companyName' maxlength="100" value='<?=$post['companyName']?>' required="required"><br>

				<!-- To enter the Employer Description  -->
				Description (250 characters)
				<!-- <input type='text' name='description' maxlength="250"><br> -->
				<textarea name='description' maxlength="250"><?=$post['zipcode']? required="required"></textarea><br>


				<!-- To enter the Employer Revenue  -->
				Revenue (250 characters)
				<!-- <input type='text' name='revenue' maxlength="250"><br> -->
				<textarea name='revenue' maxlength="250"><?=$post['revenue']? required="required"></textarea><br>

				<!-- To enter the Employer Industry  -->
				Industry (250 characters)
				<!-- <input type='text' name='industry' maxlength="250"><br> -->
				<textarea name='industry' maxlength="250" required="required"><?=$post['industry']?></textarea><br>

				<!-- To enter the Employer Address  -->
				Street Name and Building # (60 characters)
				<input type='text' name='street_name' maxlength="60" value='<?=$post['street_name']?>' required="required"><br>

				City (20 characters)
				<input type='text' name='city' maxlength="20" value='<?=$post['city']?>' required="required"><br>

				State (2 characters)
				<input type='text' name='state' maxlength="2" value='<?=$post['state']?>' required="required"><br>

 				Zipcode(5 characters)
				<input type='text' name='zipcode' maxlength="5" value='<?=$post['zipcode']?>' required="required" id ="zipcode"><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

        

</form>