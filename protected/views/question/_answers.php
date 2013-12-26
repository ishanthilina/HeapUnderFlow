<?php foreach($answers as $answer): ?>
<div class="answers" id="<?php echo $answer->id; ?>">

	
		<?php echo $answer->author_id; ?> says:
	

	<div class="time">
		<?php echo date('F j, Y \a\t h:i a',$answer->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($answer->content)); ?>
	</div>

	<div class="toolbar">
		<?php
		if ($answer->author_id == Yii::app()->user->id or Yii::app()->user->checkAccess('admin')){
			echo CHtml::link("Delete",Yii::app()->controller->createUrl("answer/delete",array("id"=>$answer->id,
				'returnUrl'=>Yii::app()->controller->createUrl("question/view",array("id"=>$question->id)))));


			// echo ;
		}
		else
			echo Yii::app()->user->id;

	?>
	</div>

</div><!-- comment -->
<?php endforeach; ?>