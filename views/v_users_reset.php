<!-- e password Change form -->
<form method='POST' action='/users/p_reset'>

	<section class="formalign">
		<fieldset class="txtalign">
			<!-- Change password details -->
			<legend>Change Password</legend>

				Old password: <input type='password' name='oldpwd' required="required"><br>
				New password: <input type='password' name='newpwd' required="required"><br>
				Conform New password: <input type='password' name='conpwd' required="required"><br>
	
				<input type='Submit' value='Change'>		
		
		</fieldset>
	</section>

	

</form>