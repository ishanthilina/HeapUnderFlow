<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->title,
);



Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);


$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'Update Question', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
?>

<div style="width: auto;word-break: break-all" ><h1><?php echo nl2br($model->title); ?></h1></div> 

 <?php 

$user = User::model()->findByPk($model->author_id);
$userLink="";
		if(is_null($user)){
			
			$userLink= CHtml::encode("A deleted user");
		}
		else{
			$userLink= CHtml::link(User::model()->findByPk($model->author_id)->username,
			Yii::app()->controller->createUrl("user/view",array("id"=>$model->author_id,
				)));
		}
		

				?>


<div style="width: auto;word-break: break-all" ><?php echo nl2br($model->content); ?></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'title',
		// 'content',
		'tags',
		// 'resolved',
		'score',
		array('label'=>'Resolved',
            'type'=>'raw',
            'value'=>($model->resolved==1?"yes":"no")),
		array('label'=>'Author',
            'type'=>'raw',
            'value'=>($userLink)),
		// 'create_time',
		// 'update_time',
		// 'author_id',
	),
)); ?>


<div id="toolbar">
	<!-- <br> -->
	<?php
	if ($model->author_id == Yii::app()->user->id or Yii::app()->user->checkAccess('admin')){
			// echo CHtml::link("Delete",Yii::app()->controller->createUrl("delete",array("id"=>$model->id)));
		echo TbHtml::buttonGroup(array(
			array('label' => 'Update','url'=>Yii::app()->controller->createUrl("update",array("id"=>$model->id))),
			array('label' => 'Delete','url'=>Yii::app()->controller->createUrl("delete",array("id"=>$model->id))),
    // array('label' => 'Right'),
			));
			// echo ;
	}
	else{
		echo TbHtml::buttonGroup(array(
			array('label' => 'Vote Up','url'=>Yii::app()->controller->createUrl("voteup",array("id"=>$model->id))),
			array('label' => 'Vote Down','url'=>Yii::app()->controller->createUrl("votedown",array("id"=>$model->id))),
			));
	}

	?>
</div>

<div id="answers">
	<h3>
            <?php echo $model->answerCount . ' answer(s)'; ?>
        </h3>
        <?php $this->renderPartial('_answers',array(
            'question'=>$model,
            'answers'=>$model->answers,
        )); ?>

<?php if(Yii::app()->user->checkAccess('teacher')): ?>
 
    <h3>Your Answer:</h3>

    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

     <?php 

     $answer = Answer::model();
     $this->renderPartial('/answer/_form',array(
            'model'=>$answer,
            'questionId'=>$model->id,
        )); ?>
<?php endif; ?>

    
</div>


