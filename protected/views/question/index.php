<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Questions',
);

$this->menu=array(
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
?>

<?php if(!empty($_GET['tag'])): ?>
<h1>Questions Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php else: ?>
	<h1>Questions</h1>
<?php endif; ?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
