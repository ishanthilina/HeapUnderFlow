<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>

<?php
	if(Yii::app()->user->checkAccess('admin')){
		$this->renderPartial('_form', array('model'=>$model)); 
	}else{
		$this->renderPartial('_formNew', array('model'=>$model)); 
	}
 
 ?>