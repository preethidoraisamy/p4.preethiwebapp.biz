<!-- Otheers post -->
<!-- if I have any post -->
<?php if(isset($post)): ?>
	<table border="1">
				<tr>
				<th>Skills</th>
				</tr>

	<?php foreach($post as $jobs): ?>
        <!-- <div class='profileData'>
        	<section class="formalign">
				<fieldset class="txtalign">
				<legend>Posted Jobs</legend> -->

				
				
				<!-- <tr>
				<td>row 1, cell 1</td>
				<td>row 1, cell 2</td>
				</tr>
				<tr>
				<td>row 2, cell 1</td>
				<td>row 2, cell 2</td>
				</tr> -->
			
	

				   <!-- <a href='/employer/profile'>Edit</a><br> -->

				   
				   <tr>
				   <td><?=$jobs['skills']?></td>
					</tr>
					
		           
		        <!-- </fieldset>
			</section>
        </div> -->
        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>