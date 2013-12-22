<!-- Otheers post -->
<!-- if I have any post -->
<?php if(isset($listedJobData)): ?>
	<table border="1">
				<tr>
				<th>Job Title</th>
				<th>Skills</th>
				<th>Location</th>
				<th>Posted on</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
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
				   <td><a href='/employer/details/<?=$jobs['id']?>'><?=$jobs['job_title']?></a></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['location']?></td>
				   <td><?=Time::display($jobs['modified'])?></td>
					</tr>
					
		           
		        <!-- </fieldset>
			</section>
        </div> -->
        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>