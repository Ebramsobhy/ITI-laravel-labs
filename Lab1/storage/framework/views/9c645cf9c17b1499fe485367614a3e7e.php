

<?php $__env->startSection('content'); ?>
<div class="text-center">
    <a href="<?php echo e(route('posts.create')); ?>" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table table-dark table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($post['id']); ?></th>
            <td><?php echo e($post['title']); ?></td>
            <td><?php echo e($post['post_creator']); ?></td>
            <td><?php echo e($post['created_at']); ?></td>
            <td>
                <a href="" class="btn btn-info">View</a>
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\LabOne\resources\views/posts/index.blade.php ENDPATH**/ ?>