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
								
				   <b>Full Name:</b><?=$profile['fullname']?><br>
				   <b>Experience:</b><?=$profile['experience']?><br>
				   <b>Last Company:</b><?=$profile['last_company']?><br>
				   <b>Highest Degree:</b><?=$profile['highest_degree']?><br>
				   <b>Major:</b><?=$profile['major']?><br>
				   <b>Zipcode:</b><?=$profile['zipcode']?><br>
				   <b>Phone:</b><?=$profile['phone']?><br>
				   <b>Prefered Email:</b><?=$profile['pemail']?><br>
		           <b>Description:</b><?=$profile['description']?><br>
		           <b>Skills:</b><?=$profile['skills']?><br>

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