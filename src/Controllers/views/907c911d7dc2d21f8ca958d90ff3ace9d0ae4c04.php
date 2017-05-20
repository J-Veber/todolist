<!--если нет записей-->

<?php $__env->startSection('content'); ?>
    <h1>todos <input class="button" id="close_session" name="close_session" type= "submit" value="Exit"></h1>
    <input class="new-todo" placeholder="What needs to be done?" autofocus>
    
        
            
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>