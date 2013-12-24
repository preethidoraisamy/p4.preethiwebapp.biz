<!-- Employer profile display form -->
<?php if(isset($profileData)): ?>

	<?php foreach($profileData as $profile): ?>
        <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				<legend>My profile</legend>

				   <a href='/employer/profile'>Edit</a><br>

				   <b>Name:</b><?=$profile['companyName']?><br>
		           <b>Description:</b><?=$profile['description']?><br>
		           <b>Revenue:</b><?=$profile['revenue']?><br>
		           <b>Industry:</b><?=$profile['industry']?><br>
		           <b>Address:</b><?=$profile['street_name']?>,<?=$profile['city']?><br>, <?=$profile['state']?> - <?=$profile['zipcode']?><br>
		           <b>Total jobs posted</b><?=$profile['no_job_posted']?><br>
		        </fieldset>
			</section>
        </div>
        
    <?php endforeach; ?>

    <?php else: ?>
    <?php endif; ?>