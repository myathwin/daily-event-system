
<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="reg-card-body"> 
                <div class="left-form">
                    <div class="title">
                         <h2>Staff Register</h2>
                    </div>
                    
                        <?php if(isset($user['id'])): ?>
                        <?php echo Form::open(['url' => route('user.update', $user['id']), 'method' => 'put' , 'id' => 'adminForm','class' => 'm-box_form js-form']); ?>   
                            <?php echo method_field('PUT'); ?>
                            <?php else: ?>
                         <form class="m-box_form js-form" id='adminForm'enctype="multipart/form-data" method='POST' action="<?php echo e(route('user.store')); ?>">
                             <?php echo csrf_field(); ?>
                             <?php endif; ?>  
                            <div class="nv-label">
                                <label>User Name</label>
                                <input type="text" id="user_name" name="name">
                            </div>
                            <div class="nv-label">
                                <label>Email</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="nv-label">
                                <label>Password</label>
                                <input type="password" id="email" name="password">
                            </div>
                            <div class="nv-label">
                                <label>Deparment</label>
                                <select name="deparment" id="position">
                                    <option value="IT">IT</option>
                                    <option value="CARD">CARD</option>
                                </select>
                            </div>
                            <div class="nv-label">
                                <label>Choose position</label>
                                <select name="position" id="position">
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-submit">REGISTER</button>
                                <button type="cancel" class="btn btn-cancel">CANCEL</button>
                            </div>
                        </form>               
                 </div>
                
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\daily-event-system\resources\views/user/create.blade.php ENDPATH**/ ?>