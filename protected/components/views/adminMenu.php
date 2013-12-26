<ul>
    <li><?php echo CHtml::link('Create New Question',array('question/create')); ?></li>
    <li><?php echo CHtml::link('Manage Users',array('user/admin')); ?></li>
    <li><?php echo CHtml::link('Manage Questions',array('question/admin')); ?></li>
    <li><?php echo CHtml::link('Manage Answers',array('answer/admin')); ?></li>
    <li><?php echo CHtml::link('Search Questions',array('question/search')); ?></li>
    <li><?php echo CHtml::link('Search Answers',array('answer/search')); ?></li>    
    <li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>