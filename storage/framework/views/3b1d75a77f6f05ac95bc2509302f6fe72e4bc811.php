<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b><?php echo e($form_title); ?></b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="<?php if(isset($matiere)): ?> <?php echo e(route($form_url,['id'=>$matiere->id])); ?> <?php else: ?> <?php echo e(route($form_url)); ?> <?php endif; ?>">
              <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="libelle_matiere">Libelle</label>
            <input type="text" name="libelle" class="form-control <?php if($errors->has('libelle')): ?>is-invalid <?php endif; ?>" id="libelle_matiere" value="<?php if(old('libelle')): ?><?php echo e(old('libelle')); ?><?php elseif(isset($matiere)): ?><?php echo e($matiere->libelle); ?><?php endif; ?> ">
            <?php if($errors->has('libelle')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('libelle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="coefficient_matiere">Coefficient</label>
            <input type="text" name="coefficient" class="form-control <?php if($errors->has('coefficient')): ?>is-invalid <?php endif; ?>" id="coefficient_matiere" value="<?php if(old('coefficient')): ?><?php echo e(old('coefficient')); ?><?php elseif(isset($matiere)): ?><?php echo e($matiere->coefficient); ?><?php endif; ?> ">
            <?php if($errors->has('coefficient')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('coefficient'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
            <?php endif; ?>
          </div>



          <div class="text-center">
            <a href="<?php echo e(route('index_matiere')); ?>" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>