<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Blogs')); ?><a class="float-right font-weight-bolder" href="<?php echo e(route('posts.create')); ?>">+</a></div>


                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row row-cols-2 shadow-sm">
                                        <div class="col-8 text-info pt-4 pb-16  block text-left">
                                            <h4 class="text-xl-left text-uppercase font-weight-bold">
                                                <?php echo e($post->title); ?>

                                            </h4>
                                            <span class="text-sm-left text-black-50"><?php echo e($post->created_at); ?></span>
                                            <h6 class="text-sm-left text-black-50"><?php echo e($post->slug); ?>...</h6>
                                        </div>
                                        <div class="col-2 text-info pt-4 pb-16  block text-left">
                                            <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="text-center  w-33 px-6 font-weight-bold text-uppercase">Read More</a>
                                            <a href="<?php echo e(route('posts.edit', $post)); ?>" class="text-center  w-33 px-6 font-weight-bold text-xl-right text-uppercase">Edit it</a>
                                            <form
                                                action="<?php echo e(route('posts.destroy', $post)); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="text-left font-weight-bold text-uppercase btn-outline-info">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-info pt-4 pb-16 w-50 text-center m-auto"><?php echo e($posts->links('pagination::bootstrap-4')); ?></div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\blogs\resources\views/blog/index.blade.php ENDPATH**/ ?>