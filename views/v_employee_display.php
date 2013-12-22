<!-- Otheers post -->
<!-- if I have any post -->
<?php if(isset($profileData)): ?>

	<?php foreach($profileData as $profile): ?>
        <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				<legend>My profile</legend>

				   <a href='/employee/profile'>Edit</a><br>

		           Description:<?=$profile['description']?><br>
		           Skills:<?=$profile['skills']?><br>
		        </fieldset>
			</section>
        </div>
        
    <?php endforeach; ?>
    <?php endif; ?>