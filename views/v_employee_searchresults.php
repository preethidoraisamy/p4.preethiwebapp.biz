<!-- Employee - Search results form -->
<?php if(isset($listedJobData)): ?>
	<table border="1">
				<tr>
				<th>Job Title</th>
				<th>Employer</th>
				<th>Skills</th>
				<th>Location</th>
				<th>Posted on</th>
				<th>Status</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
        

				   
				   <tr>
				   <td><a href='/employer/details/<?=$jobs['id']?>'><?=$jobs['job_title']?></a></td>
				   <td><?=$jobs['companyName']?></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['location']?></td>
				   <td><?=Time::display($jobs['modified'])?></td>

				   <!-- When EMployee not applied  -->
				   <?php if(is_null($jobs['job_id'])): ?>
						<td><a href='/employee/apply/<?=$jobs['id']?>'>Apply</a></td>
					<!-- When EMployee already applied  -->
					<?php else: ?>
						<td><a href='/employee/remove/<?=$jobs['id']?>'>Remove</a></td>
					<?php endif; ?>
					</tr>

        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>