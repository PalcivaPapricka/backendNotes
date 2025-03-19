<div>

<ul>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($book['id']); ?>. <strong><?php echo e($book['title']); ?></strong> - <?php echo e($book['autor']); ?></li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>



</div>
<?php /**PATH D:\xampp\htdocs\myproject\resources\views/books.blade.php ENDPATH**/ ?>