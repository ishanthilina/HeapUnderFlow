<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
	if(Yii::app()->user->checkAccess('admin')) $this->widget('AdminMenu');  
	elseif(Yii::app()->user->checkAccess('user')) $this->widget('UserMenu'); 
	elseif (Yii::app()->user->checkAccess('teacher')) $this->widget('TeacherMenu')
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>