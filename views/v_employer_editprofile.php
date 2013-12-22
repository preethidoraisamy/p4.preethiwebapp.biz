<!-- Edit form -->
<form method='post' action='/employer/p_profile'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				<!-- To enter the Employer name  -->
				Name (100 characters)
				<input type='text' name='companyName' maxlength="100" value='<?=$post['companyName']?>'><br>

				<!-- To enter the Employer Description  -->
				Description (250 characters)
				<!-- <input type='text' name='description' maxlength="250"><br> -->
				<textarea name='description' maxlength="250"><?=$post['zipcode']?></textarea><br>


				<!-- To enter the Employer Revenue  -->
				Revenue (250 characters)
				<!-- <input type='text' name='revenue' maxlength="250"><br> -->
				<textarea name='revenue' maxlength="250"><?=$post['revenue']?></textarea><br>

				<!-- To enter the Employer Industry  -->
				Industry (250 characters)
				<!-- <input type='text' name='industry' maxlength="250"><br> -->
				<textarea name='industry' maxlength="250" ><?=$post['industry']?></textarea><br>

				<!-- To enter the Employer Address  -->
				Street Name and Building # (60 characters)
				<input type='text' name='street_name' maxlength="60" value='<?=$post['street_name']?>'><br>

				City (20 characters)
				<input type='text' name='city' maxlength="20" value='<?=$post['city']?>'><br>

				State (2 characters)
				<input type='text' name='state' maxlength="2" value='<?=$post['state']?>'><br>

 				Zipcode(6 characters)
				<input type='text' name='zipcode' maxlength="6" value='<?=$post['zipcode']?>'><br>
	
				<br><input type='Submit' value='Save Profile'>
		
		</fieldset>
	</section>

        

</form>