<?php $__env->startSection('content'); ?>
    <div class="w-25 m-auto text-left">
        <div class="py-5">
            <h1 class="text-xl-center">
                Update Post
            </h1>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="w-4/5 m-auto">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="w-25 mb-4 text-light bg-danger rounded-lg py-4">
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="w-75 m-auto pt-2">
        <form
            action="<?php echo e(route('posts.update',$post)); ?>"
            method="POST"
            enctype="multipart/form-data">
            <div class="form-group">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <label for="title">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="<?php echo e($post->title); ?>"
                    class="form-control bg-transparent block w-100 my-3 text-xl-left">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Description..."
                    class="form-control bg-transparent block w-100 my-3 text-xl-left"
                    rows="10"><?php echo e($post->description); ?></textarea>
                <button
                    type="submit"
                    class="btn btn-primary uppercase my-3">
                    Submit Post
                </button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\blogs\resources\views/blog/edit.blade.php ENDPATH**/ ?>