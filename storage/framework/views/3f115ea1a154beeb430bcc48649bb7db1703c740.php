<?php $__env->startSection('content'); ?>
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <a class="pl-5" href="/">&lt;-Back to Home Page</a>
            <h1 class="text-center">
                <?php echo e($post->title); ?>

            </h1>
        </div>
    </div>

    <div class="w-4/5 pl-5 pt-20">
    <span style="color: #6c757d">
        Created by <?php echo e(auth()->user()->name); ?> on <?php echo e(date('jS M Y', strtotime($post->updated_at))); ?>

    </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 py-2 leading-8 font-light">
            <?php echo e($post->description); ?>

        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\blogs\resources\views/blog/show.blade.php ENDPATH**/ ?>