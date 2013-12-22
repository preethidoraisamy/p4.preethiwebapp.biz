<!-- Otheers post -->
<!-- if I have any post -->

<form method='post' action='/employer/p_viewJob/<?=$post['id']?>'>
<?php if(isset($post)): ?>


	<?php foreach($post as $details): ?>
        <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				<legend>My profile</legend>

				<!--    <a href='/employer/profile'>Edit</a><br> -->
				    Job Title:<?=$details['id']?><br> 
		          <!-- Position Duties:<?=$details['position_duties']?><br>  -->
		          <!--  Requirements:<?=$profile['requirement']?><br>
		           Responsibilities:<?=$profile['responsibilities']?><br>
		           Location:<?=$profile['location']?><br>
		           Telecommute<?=$profile['telecommute']?><br>
		           Pay Rate<?=$profile['payrate']?><br>
		           Position ID<?=$profile['position_id']?><br>
		           Tax Term<?=$profile['tax_term']?><br>
		           Travel Requirements<?=$profile['travel_requirement']?><br>
		           Skills<?=$profile['skills']?><br>
		           Work Authorization<?=$profile['work_authorization']?><br> -->
		        </fieldset>
			</section>
        </div>
        
    <?php endforeach; ?>

    <?php else: ?>
    <?php endif; ?>
    </form>