<?php $__env->startSection('content'); ?>

<h2>Contact Us <strong></strong></h2>

<?php if(count($persions)): ?>
<ul>
<?php $__currentLoopData = $persions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li>Name: <?php echo e($persion); ?></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php endif; ?>

<?php $__env->stopSection(); ?>






<?php $__env->startSection('footer'); ?>
<script>
//alert('Hi');
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\laraveld.in\resources\views/pages/contact.blade.php ENDPATH**/ ?>