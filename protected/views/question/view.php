<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'Update Question', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>
<p><?php echo $model->content; ?></P>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'title',
		// 'content',
		'tags',
		'resolved',
		'score',
		'create_time',
		'update_time',
		'author_id',
	),
)); ?>

<div id="answers">
	<h3>
            <?php echo $model->answerCount . ' answer(s)'; ?>
        </h3>
        <?php $this->renderPartial('_answers',array(
            'question'=>$model,
            'answers'=>$model->answers,
        )); ?>

    
</div>


