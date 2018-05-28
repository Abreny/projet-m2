<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b><?php echo e($form_title); ?></b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="<?php if(isset($note)): ?> <?php echo e(route($form_url,['id'=>$note->id])); ?> <?php else: ?> <?php echo e(route($form_url)); ?> <?php endif; ?>">
              <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="etudiant_note">Etudiant</label>
            <select name="matricule" class="form-control <?php if($errors->has('matricule')): ?>is-invalid <?php endif; ?>" id="etudiant_note">
                <option value="">__Etudiant__</option>
                <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($etudiant->matricule); ?>" <?php if((old('matricule') && $etudiant->matricule == old('matricule')) || (isset($note) && $note->etudiant->matricule == $etudiant->matricule)): ?> selected <?php endif; ?>><?php echo e($etudiant->nom); ?> <?php echo e($etudiant->prenom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('matricule')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('matricule'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="matiere_note">Matiere</label>
            <select name="matiere_id" class="form-control <?php if($errors->has('matiere_id')): ?>is-invalid <?php endif; ?>" id="matiere_note">
                <option value="">__Matiere__</option>
                <?php $__currentLoopData = $matieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($matiere->id); ?>" <?php if((old('matiere_id') && $matiere->id == old('matiere_id')) || (isset($note) && $note->matiere->id == $matiere->id)): ?> selected <?php endif; ?>><?php echo e($matiere->libelle); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('matiere_id')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('matiere_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="note_note">Note</label>
            <input type="text" name="note" class="form-control <?php if($errors->has('note')): ?>is-invalid <?php endif; ?>" id="note_note" value="<?php if(old('note')): ?><?php echo e(old('note')); ?><?php elseif(isset($note)): ?><?php echo e($note->note); ?><?php endif; ?> ">
            <?php if($errors->has('note')): ?>
                  <div class="invalid-feedback">
                    <?php $__currentLoopData = $errors->get('note'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
            <?php endif; ?>
          </div>

          <div class="text-center">
            <a href="<?php echo e(route('index_note')); ?>" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>