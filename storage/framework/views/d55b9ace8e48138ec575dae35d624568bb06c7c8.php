<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../assets/css/common.css">
    <link rel="stylesheet" href="../../assets/css/user-list.css">
    <link rel="stylesheet" href="../../assets/css/user-create.css">
  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body id="js-body" class="body menu-active">
	<div class="main-wrapper">
        <div class="inner-main-wrapper">
            <div class="col-3">
                <?php echo $__env->make('partials.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-9">
                <div class="header">
                    <?php echo $__env->make('partials.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="contact">
                <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </div> 
    </div>

	<?php echo $__env->yieldContent('search'); ?>

	<div id="js-mask" class="mask"></div>
	<script src="/js/pusher.js"></script>
	<?php echo $__env->yieldPushContent('script'); ?>

    <script type="text/javascript">
        function myFunction() {
         document.getElementById("myDropdown").classList.toggle("show");
            }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        
    }

    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\daily-event-system\resources\views/partials/layouts/master.blade.php ENDPATH**/ ?>