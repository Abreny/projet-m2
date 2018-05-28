<?php $__env->startSection('title'); ?>
 Liste des notes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('nav',['active'=>'note'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if($message = Session::get('error')): ?>

    <div class="alert alert-danger">

    <p class="text-center"><?php echo $message; ?></p>

    </div>

<?php endif; ?>

<div class="row mb-2">

    <div class="col-lg-12">

        <div class="pull-left">

            <h5>
                <i class="fa fa-list-alt mr-2"></i>Liste des notes
                <div class="btn btn-sm btn-info" href="#"><span class="badge badge-light">
                    <?php if(isset($notes)): ?>
                        <?php echo e($notes->total()); ?>

                    <?php else: ?>
                        0
                    <?php endif; ?>
                </span></div>
            </h5>

        </div>
        <div class="pull-right">

            <a class="btn btn-sm btn-info" href="#"> <i class="fa fa-gear mr-2"></i> Paramètre d'affichage</a>
            <a class="btn btn-sm btn-info" href="<?php echo e(route('nouveau_note')); ?>"> <i class="fa fa-plus-circle"></i> Nouveau</a>

        </div>

    </div>

</div>

<div class="row">
    <table class="table table-bordered table-sm">

        <thead>
                <tr>

                    <th class="text-center">Matricule</th>

                    <th>Nom et Prénoms</th>

                    <th>Matière</th>

                    <th class="text-center">Note</th>

                    <th width="200px"></th>

                </tr>
        </thead>
        <tbody>
        <?php if(isset($notes)): ?>
            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($note->etudiant->matricule); ?></td>
                        <td><?php echo e($note->etudiant->nom); ?> <?php echo e($note->etudiant->prenom); ?></td>
                        <td><?php echo e($note->matiere->libelle); ?></td>
                        <td class="text-center"><?php echo e($note->note); ?></td>
                        <td>
                            <a href="<?php echo e(route('edit_note',[ 'id'=>$note->id ])); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit mr-2"></i>Editer</a>
                            <a href="#" data-toggle="modal" data-target="#modal-delete-<?php echo e($note->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o mr-2"></i>Supprimer</a>
                            <?php echo $__env->make('note.modal-delete',['note'=>$note], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </td>
                    </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <?php echo $notes->links('pagination'); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>