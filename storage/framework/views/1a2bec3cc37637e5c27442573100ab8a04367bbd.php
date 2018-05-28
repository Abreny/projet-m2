<?php if($paginator->hasPages()): ?>
    <ul class="pagination">
    	<li class="page-item"><a class="page-link" href="<?php echo e($paginator->url(1)); ?>"><i class="fa fa-backward"></i></a></li>
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled"><span class="page-link"><i class="fa fa-arrow-circle-left"></i></span></li>
        <?php else: ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><i class="fa fa-arrow-circle-left"></i></a></li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="page-item disabled"><span class="page-link"><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><i class="fa fa-arrow-circle-right"></i></a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link"><i class="fa fa-arrow-circle-right"></i></span></li>
        <?php endif; ?>
        <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url($paginator->lastPage())); ?>"><i class="fa fa-forward"></i></a></li>
    </ul>
<?php endif; ?>
