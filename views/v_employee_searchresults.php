<!-- Otheers post -->
<!-- if I have any post -->
<?php if(isset($listedJobData)): ?>
	<table border="1">
				<tr>
				<th>Job Title</th>
				<th>Employer</th>
				<th>Skills</th>
				<th>Location</th>
				<th>Posted on</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
        

				   
				   <tr>
				   <td><a href='/employer/details/<?=$jobs['id']?>'><?=$jobs['job_title']?></a></td>
				   <td><?=$jobs['companyName']?></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['location']?></td>
				   <td><?=Time::display($jobs['modified'])?></td>
					</tr>

        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>