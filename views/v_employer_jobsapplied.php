<!-- Employer - Candidates applied form to contact them -->
<?php if(isset($listedJobData)): ?>
	<p class="class_notify">Contact the Candidates with Email OR Phone, if your requirement matches</p>
	<table border="1">
				<tr>
				<th>Join Title</th>
				<th>Candidate Fullname</th>
				<th>Candidate Skills</th>
				<th>Candidate Experience</th>
				<th>Candidate Phone</th>
				<th>Candidate Email</th>
				<th>Applied On</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
       				   
				   <tr>
				   <td><?=$jobs['job_title']?></td>
				   <td><?=$jobs['fullname']?></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['experience']?></td>
				   <td><?=$jobs['phone']?></td>
				   <td><?=$jobs['pemail']?></td>
				   <td><?=Time::display($jobs['created'])?></td>
					</tr>
					
	
        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>