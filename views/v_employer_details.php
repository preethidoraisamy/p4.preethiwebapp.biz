<!-- Employer job details display -->
<form method='post' >

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				
				<b>Job Title:</b><?=$post['id']?><br> 
		          <b>Position Duties:</b><?=$post['position_duties']?><br> 
		           <b>Requirements:</b><?=$post['requirement']?><br>
		           <b>Responsibilities:</b><?=$post['responsibilities']?><br>
		           <b>Location:</b><?=$post['location']?><br>
		           <b>Telecommute:</b><?=$post['telecommute']?><br>
		           <b>Pay Rate:</b><?=$post['payrate']?><br>
		           <b>Position ID:</b><?=$post['position_id']?><br>
		           <b>Tax Term:</b><?=$post['tax_term']?><br>
		           <b>Travel Requirements:</b><?=$post['travel_requirement']?><br>
		           <b>Skills:</b><?=$post['skills']?><br>
		           <b>Work Authorization:</b><?=$post['work_authorization']?><br>
	
				<br>
				

				<!-- When EMployer display  -->
				<?php if($user->login_type == 2): ?>
					<a href='/employer/editdetails/<?=$post['id']?>'>EDIT</a>
				<!-- When EMployee display  -->
				<?php elseif($user->login_type == 1): ?>
					<a href='/employee/p_searchemployer/backToSearch'>BACK</a>
				<?php endif; ?>
				
		
		</fieldset>
	</section>    

</form>

<!-- action='/employer/p_details/<?=$post['id']?>' -->