<?php
//Reference-https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
//Youtube-Tutorial-https://www.youtube.com/watch?v=C--mu07uhQw
if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
