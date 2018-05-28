<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b><?php echo e($form_title); ?></b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="<?php if(isset($etudiant)): ?> <?php echo e(route($form_url,['id'=>$etudiant->matricule])); ?> <?php else: ?> <?php echo e(route($form_url)); ?> <?php endif; ?>">
              <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="im_etudiant">Matricule</label>
                <input type="text" 
                      name="matricule" class="form-control <?php if($errors->has('matricule')): ?>is-invalid <?php endif; ?>" 
                      id="im_etudiant" 
                      value="<?php if(old('matricule')): ?><?php echo e(old('matricule')); ?><?php elseif(isset($etudiant)): ?><?php echo e($etudiant->matricule); ?><?php endif; ?>">
                <?php if($errors->has('matricule')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('matricule'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
              </div>
          <div class="form-group">
            <label for="nom_etudiant">Nom</label>
            <input type="text" name="nom" class="form-control <?php if($errors->has('nom')): ?>is-invalid <?php endif; ?>" id="nom_etudiant" value="<?php if(old('nom')): ?><?php echo e(old('nom')); ?><?php elseif(isset($etudiant)): ?><?php echo e($etudiant->nom); ?><?php endif; ?> ">
            <?php if($errors->has('nom')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('nom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="prenom_etudiant">Prénom</label>
            <input type="text" name="prenom" class="form-control <?php if($errors->has('prenom')): ?>is-invalid <?php endif; ?>" id="prenom_etudiant" value="<?php if(old('prenom')): ?><?php echo e(old('prenom')); ?><?php elseif(isset($etudiant)): ?><?php echo e($etudiant->prenom); ?><?php endif; ?> ">
            <?php if($errors->has('prenom')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('prenom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="adresse_etudiant">Adresse</label>
            <input type="text" name="adresse" class="form-control <?php if($errors->has('adresse')): ?>is-invalid <?php endif; ?>" id="adresse_etudiant" value="<?php if(old('adresse')): ?><?php echo e(old('adresse')); ?><?php elseif(isset($etudiant)): ?><?php echo e($etudiant->adresse); ?><?php endif; ?> ">
            <?php if($errors->has('adresse')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('adresse'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
            <?php endif; ?>
          </div>



          <div class="text-center">
            <a href="<?php echo e(route('index_etudiant')); ?>" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>