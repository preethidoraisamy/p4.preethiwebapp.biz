<!-- Otheers post -->
<!-- if I have any post -->
<?php if(isset($listedJobData)): ?>
	<table border="1">
				<tr>
				<th>Candidate Name</th>
				<th>Skills</th>
				<th>Location</th>
				<th>Last update</th>
				</tr>

	<?php foreach($listedJobData as $jobs): ?>
       				   
				   <tr>
				   <td><a href='/employer/candidatedetails/<?=$jobs['id']?>'><?=$jobs['fullname']?></a></td>
				   <td><?=$jobs['skills']?></td>
				   <td><?=$jobs['zipcode']?></td>
				   <td><?=Time::display($jobs['modified'])?></td>
					</tr>
					
	
        
    <?php endforeach; ?>
    </table>

    <?php else: ?>
    <?php endif; ?>