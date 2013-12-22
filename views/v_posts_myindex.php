<!-- Otheers post -->
<!-- if I have any post -->
<?php if(count($posts) > 0):?>
<?php foreach($posts as $post): ?>

<div class ="posted">
	<strong>Posted on <?=Time::display($post['created'])?></strong><br>
	<?=$post['content']?><br><br>
</div>
			<a href='/posts/edit/<?=$post['post_id']?>'>Edit</a>
          |
          <a href='/posts/delete/<?=$post['post_id']?>'>Delete</a>       
      
        <br>
	
<?php endforeach; ?>


<!-- when nothing to view -->
<?php else: ?>

<a>You have not posted anything on your wall!</a>
<?php endif;?>
