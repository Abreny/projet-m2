<div class="modal fade" id="modal-delete-<?php echo e($etudiant->matricule); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-title-<?php echo e($etudiant->matricule); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-delete-title-<?php echo e($etudiant->matricule); ?>">Supprimer ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Voulez-vous suprimer l'étudiant <?php echo e($etudiant->nom); ?> <?php echo e($etudiant->prenom); ?>, de façon définitive?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal"> <i class="fa fa-times-circle mr-2"></i>Annuler</button>
            <a href="<?php echo e(route('delete_etudiant',['id'=>$etudiant->matricule])); ?>" class="btn btn-sm  btn-danger"><i class="fa fa-trash-o mr-2"></i>Supprimer</a>
        </div>
        </div>
    </div>
    </div>