<?php $__env->startSection('content'); ?>
    <div class="w-25 m-auto text-left">
        <div class="py-5">
            <h1 class="text-xl-center">
                Create Post
            </h1>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="w-4/5 m-auto">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="w-75 m-auto pt-2">
        <form
            action="<?php echo e(route('posts.store')); ?>"
            method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="title">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control bg-transparent block w-100 my-3 text-xl-left">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Description..."
                    class="form-control bg-transparent block w-100 my-3 text-xl-left"
                    rows="10"></textarea>
                <button
                    type="submit"
                    class="btn btn-primary uppercase my-3">
                    Submit Post
                </button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\blogs\resources\views/blog/add.blade.php ENDPATH**/ ?>