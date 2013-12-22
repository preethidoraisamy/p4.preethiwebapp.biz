<!-- Edit form -->
<form method='post' action='/employer/p_searchemployee'>

	<section class="formalign">
		<fieldset class="txtalign">

			<!-- Edit with details -->
			<legend>Search Candidates</legend>

				

				Skills Required(250 characters)
				<input type='text' name='skills' maxlength="250" ><br>
	
				
				<input type='Submit' value='Search'>
				<a href='/employer/searchresults'>Edit</a><br>	
		
		</fieldset>
	</section>

	<?=$post['skills']?>   

	<?php if(isset($post)): ?>
	<table border="1">
				<tr>
				<th>Skills</th>
				</tr>

				<?php foreach($post as $jobs): ?>
				   
				   <tr>
				   <td><?=$jobs['skills']?></td>
					</tr>

	
     <?php endforeach; ?>
    </table>

    <?php else: ?>
    
    <?php endif; ?>     

</form>