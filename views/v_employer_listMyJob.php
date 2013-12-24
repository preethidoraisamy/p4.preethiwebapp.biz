<!-- Employer - complete job list -->
<?php if(isset($listedJobData)): ?>
	<p class="class_notify"> List all my posted jobs. Can remove the job at any time</p>
	<table border="1">
				<tr>
				<th>Job Title</th>
				<th>Skills</th>
				<th>Location</th>
				<th>Posted on</th>
				<th>Delete Job</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
       
				   <tr>
				   <td><a href='/employer/details/<?=$jobs['id']?>'><?=$jobs['job_title']?></a></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['location']?></td>
				   <td><?=Time::display($jobs['modified'])?></td>
				   <td><a href='/employer/delete/<?=$jobs['id']?>'>Delete</a></td>
					</tr>
			
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>