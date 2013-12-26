<?php foreach($answers as $answer): ?>
<div class="answers" id="<?php echo $answer->id; ?>">

	
		<?php echo $answer->author_id; ?> says:
	

	<div class="time">
		<?php echo date('F j, Y \a\t h:i a',$answer->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($answer->content)); ?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>