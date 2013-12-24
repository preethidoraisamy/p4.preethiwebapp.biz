<!-- Employer job details display -->
<form method='post' >

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Edit Post</legend>

				
				Job Title:<?=$post['id']?><br> 
		          Position Duties:<?=$post['position_duties']?><br> 
		           Requirements:<?=$post['requirement']?><br>
		           Responsibilities:<?=$post['responsibilities']?><br>
		           Location:<?=$post['location']?><br>
		           Telecommute:<?=$post['telecommute']?><br>
		           Pay Rate:<?=$post['payrate']?><br>
		           Position ID:<?=$post['position_id']?><br>
		           Tax Term:<?=$post['tax_term']?><br>
		           Travel Requirements:<?=$post['travel_requirement']?><br>
		           Skills:<?=$post['skills']?><br>
		           Work Authorization:<?=$post['work_authorization']?><br>
	
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