<?php foreach($answers as $answer): ?>
<div class="answers" id="<?php echo $answer->id; ?>">

	
		<b><?php echo CHtml::link(User::model()->findByPk($answer->author_id)->username,
			Yii::app()->controller->createUrl("user/view",array("id"=>$answer->author_id,
				))) ?></b> says:

		
	

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