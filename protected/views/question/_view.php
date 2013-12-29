<?php
/* @var $this QuestionController */
/* @var $data Question */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<h2><?php $status=''; if ($data->resolved == 1) $status="[Solved]"; ?>
	<?php echo CHtml::link($status.CHtml::encode($data->title),array('question/view', 'id'=>$data->id)); ?></h2>
	<!-- <br /> -->

	<p><?php echo CHtml::encode($data->content); ?></p>
	<!-- <br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resolved')); ?>:</b>
	<?php echo CHtml::encode($data->resolved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode(date('F j, Y \a\t h:i a',$data->create_time)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	
	

	<?php
		$user = User::model()->findByPk($data->author_id);
		if(is_null($user)){
			
			echo CHtml::encode("A deleted user");
		}
		else{
			echo CHtml::link(User::model()->findByPk($data->author_id)->username,
			Yii::app()->controller->createUrl("user/view",array("id"=>$data->author_id,
				)));
		}
	?>
	<br/>

	

</div>