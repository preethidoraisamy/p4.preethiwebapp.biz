
<!-- Otheers post -->
<!-- when any post visible for this account -->
<?php if(count($posts) > 0):?>
<?php foreach($posts as $post): ?>


<div class ="posted">
	<strong><?=$post['first_name']?> posted on <?=Time::display($post['created'])?></strong><br>
	<?=$post['content']?><br>
</div>

<!-- Display for the logged in user post -->
<?php if($user->user_id == $post['post_user_id']): ?>
			<a href='/posts/edit/<?=$post['post_id']?>'>Edit</a>
          |
          <a href='/posts/delete/<?=$post['post_id']?>'>Delete</a>       
          <br/>

	<?php endif;?>
	

 
        <br>
	
<?php endforeach; ?>
<!-- When no post to view -->
<?php else: ?>

	<p> No posts yet </p>
<?php endif;?>

