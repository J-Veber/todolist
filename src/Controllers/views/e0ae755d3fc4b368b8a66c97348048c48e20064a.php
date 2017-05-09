<!--если нет записей-->

<?php $__env->startSection('content'); ?>
    <input class="new-todo" placeholder="What needs to be done?" autofocus>
    
        
            
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>