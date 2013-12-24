<!-- Employer profile display form -->
<?php if(isset($profileData)): ?>

	<?php foreach($profileData as $profile): ?>
        <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				<legend>My profile</legend>

				   <a href='/employer/profile'>Edit</a><br>

				   Name:<?=$profile['companyName']?><br>
		           Description:<?=$profile['description']?><br>
		           Revenue:<?=$profile['revenue']?><br>
		           Industry:<?=$profile['industry']?><br>
		           Address:<?=$profile['street_name']?><br>
		           <?=$profile['city']?><br>
		           <?=$profile['state']?> - <?=$profile['zipcode']?><br>
		           Total jobs posted<?=$profile['no_job_posted']?><br>
		        </fieldset>
			</section>
        </div>
        
    <?php endforeach; ?>

    <?php else: ?>
    <?php endif; ?>