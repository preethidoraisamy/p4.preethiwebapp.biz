
<!-- Sign up form -->
<form method='POST' action='/users/p_signup'>
	<section class="formalign">
		<fieldset class="txtalign">
			<!-- Sign Up form -->
			<legend>Sign up</legend>

				First Name <input type='text' name='first_name' required="required" id ="first_name"><br>
				Last Name <input type='text' name='last_name' required="required"><br>
				Email <input type='text' name='email' required="required"><br>
				Password <input type='password' name='password' id = 'signup-pwd' required="required"><br>
				Confirm Password <input type='password' id = 'signup-conpwd' required="required"><br>
				Log in type<select name='login_type'>
								<option value='employee'>Employee</option>
								<option value='employer'>Employer</option>
							</select><br>
				
				<input type='submit' id='signup-btn' value='Sign Up'>
		
		</fieldset>
	</section>
</form>



