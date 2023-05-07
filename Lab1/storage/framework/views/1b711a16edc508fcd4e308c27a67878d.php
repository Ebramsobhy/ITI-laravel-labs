<?php $__env->startSection('title'); ?>
    Amazon Website
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>


    <table class="table">
        <tr>
            <td> Name</td> <td> Price</td> <td> Description </td>
        </tr>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($product["name"]); ?></td>
                <td> <?php echo e($product["price"]); ?></td>
                <td> <?php echo e($product["description"]); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\LabOne\resources\views/amazon/products_index.blade.php ENDPATH**/ ?>