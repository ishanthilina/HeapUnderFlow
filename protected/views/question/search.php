<h1>Search Questions</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	// 'id'=>'question-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'title',
		'content',
		'tags',
		'resolved',
		'score',
		/*
		'create_time',
		'update_time',
		'author_id',
		*/
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
));