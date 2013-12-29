<?php foreach($answers as $answer): ?>
<div class="answers" id="<?php echo $answer->id; ?>">

	
		<b><?php echo CHtml::link(User::model()->findByPk($answer->author_id)->username,
			Yii::app()->controller->createUrl("user/view",array("id"=>$answer->author_id,
				))) ?></b> says:

		
<?php
		$user = User::model()->findByPk($answer->author_id);
$userLink="";
		if(is_null($user)){
			
			$userLink= CHtml::encode("A deleted user");
		}
		else{
			$userLink= CHtml::link(User::model()->findByPk($answer->author_id)->username,
			Yii::app()->controller->createUrl("user/view",array("id"=>$answer->author_id,
				)));
		}
		

				?>
	

	<!-- <div class="time">
		<?php echo date('F j, Y \a\t h:i a',$answer->create_time); ?>
	</div> -->

	<div class="content">
		<div style="width: auto;word-break: break-all" > <?php echo nl2br(CHtml::encode($answer->content)); ?>
		</div>
	</div>

	<!-- <div class="content">
		<b>Score</b> : <?php echo nl2br(CHtml::encode($answer->score)); ?>
	</div> -->

	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$answer,
	'attributes'=>array(
		// 'id',
		// 'title',
		// 'content',
		// 'tags',
		// 'resolved',
		'score',
		// array('label'=>'Resolved',
  //           'type'=>'raw',
  //           'value'=>($answer->resolved==1?"yes":"no")),
		array('label'=>'Author',
            'type'=>'raw',
            'value'=>($userLink)),
		// 'create_time',
		// 'update_time',
		// 'author_id',
	),
)); ?>

	<div class="toolbar">
		<?php
		if ($answer->author_id == Yii::app()->user->id or Yii::app()->user->checkAccess('admin')){
			// echo CHtml::link("Delete",Yii::app()->controller->createUrl("answer/delete",array("id"=>$answer->id,
			// 	'returnUrl'=>Yii::app()->controller->createUrl("question/view",array("id"=>$question->id)))));

			echo TbHtml::buttonGroup(array(
			array('label' => 'Delete','url'=>Yii::app()->controller->createUrl("answer/delete",array("id"=>$answer->id))),
			// array('label' => 'Vote Up','url'=>Yii::app()->controller->createUrl("update",array("id"=>$answer->id))),
			// array('label' => 'Vote Down','url'=>Yii::app()->controller->createUrl("delete",array("id"=>$answer->id))),
			));


			// echo ;
		}
		else
			echo TbHtml::buttonGroup(array(
			// array('label' => 'Update','url'=>Yii::app()->controller->createUrl("update",array("id"=>$answer->id))),
			array('label' => 'Vote Up','url'=>Yii::app()->controller->createUrl("answer/voteup",array("id"=>$answer->id))),
			array('label' => 'Vote Down','url'=>Yii::app()->controller->createUrl("answer/votedown",array("id"=>$answer->id))),
			));

	?>
	</div>
<hr>
	

</div><!-- comment -->
<?php endforeach; ?>