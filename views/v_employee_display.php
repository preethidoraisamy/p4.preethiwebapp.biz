<!--View applied candidates details -->
<?php if(isset($profileData)): ?>

	<?php foreach($profileData as $profile): ?>
	<!--Verify data -->
	<?php if(!empty($profile['fullname'])): ?>
	<?php if($user->login_type == 2): ?>
		<p class="class_notify"> You can contact the Candidates with Prefered Email or through Phone</p>
	<?php endif; ?>
        <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				
				<legend>Profile</legend>	
								
				   Full Name:<?=$profile['fullname']?><br>
				   Experience:<?=$profile['experience']?><br>
				   Last Company:<?=$profile['last_company']?><br>
				   Highest Degree:<?=$profile['highest_degree']?><br>
				   Major:<?=$profile['major']?><br>
				   Zipcode:<?=$profile['zipcode']?><br>
				   Phone:<?=$profile['phone']?><br>
				   Prefered Email:<?=$profile['pemail']?><br>
		           Description:<?=$profile['description']?><br>
		           Skills:<?=$profile['skills']?><br>

		           <!-- When EMployee display  -->
		           <?php if($user->login_type == 1): ?>
						<a href='/employee/profile'>Edit</a><br>
					<!-- When EMployer display  -->
					<?php elseif($user->login_type == 2): ?>
						<a href='/employer/p_searchemployee/backToSearch'>BACK</a>					

		        <?php endif; ?>
		        </fieldset>
			</section>
        </div>
        <?php endif; ?>
        
    <?php endforeach; ?>

    

    <?php else: ?>
    <?php endif; ?>