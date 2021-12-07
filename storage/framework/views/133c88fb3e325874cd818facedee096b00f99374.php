
<?php $__env->startSection('content'); ?>

<div class="table-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="search-user">
                 
                    <form class="page-content-top2__form">
                        <input class="page-content-top2__input js-keywordsearch serach_input" name="keyword" data-url="" type="text">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <i class="fas fa-search"></i>
                    </form>


                </div>
                <div class="create-user">
                    <a href="#" style="float:right; margin-right:10px;"><i class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                <div class="card-header"><h1><span>User</span><span> List</span></h1></div>
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->password); ?></td>

                                    <td>
                                        <span class="edit-btn"><i class="fas fa-user-edit"></i></span>
                                        <span class="view-btn"><i class="fas fa-info-circle"></i></span>
                                        <span class="del-btn"><i class="fas fa-user-minus"></i></span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('partials.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\daily-event-system\resources\views/user/index.blade.php ENDPATH**/ ?>