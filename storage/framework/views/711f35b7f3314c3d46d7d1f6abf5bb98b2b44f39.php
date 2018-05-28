<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('title'); ?> - Projet M2</title>

    <?php $__env->startSection('css'); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('css/accueil.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>

  </head>

  <body>


    <!-- Navigation -->
    <!--header style="height: 100px">gete</header-->
    <?php echo $__env->yieldContent('nav'); ?>

    <!-- Page Content -->
    <div class="container">
			<?php echo $__env->yieldContent('content'); ?>
	  </div>
	<!-- Footer -->
    <footer class="py-5 bg-primary">
        <p class="m-0 text-center text-white">&copy; M2 2017</p>
      <!-- /.container -->
    </footer>
	<!-- Bootstrap core JavaScript -->
    <?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('bootstrap/js/jquery-3.1.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.js')); ?>"></script>

    <?php echo $__env->yieldSection(); ?>

  </body>

</html>