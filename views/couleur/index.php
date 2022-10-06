<h1><?= @$title ?></h1>
<div class="col-6 mx-auto">
    <div class="row justify-content-end px-2">
        <a class="btn btn-sm bg-secondary text-warning text-decoration-none mb-3 col-4" href="<?= PATH ?>/couleur/ajouter"> + Ajouter une couleur</a>
    </div>
    <table class="table table-bordered table-hover table-dark table-striped table-sm">
        <tr class="bg-warning text-center">
            <th>Code</th>
            <th>Nom</th>
            <th colspan="3">Actions</th>
        </tr>

        <tbody>
            <?php foreach ($couleurs as $couleur) { ?>
                <tr>
                    <td><?= $couleur['ID_COULEUR'] ?></td>
                    <td><?= $couleur['NOM_COULEUR'] ?></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/couleur/voir/<?= $couleur['ID_COULEUR'] ?>"><i class="far fa-eye text-success" title="voir en détail"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/couleur/modifier/<?= $couleur['ID_COULEUR'] ?>"><i class="fas fa-pencil-alt text-warning" title="modifier"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/couleur/supprimer/<?= $couleur['ID_COULEUR'] ?>"><i class="fas fa-times text-danger" title="supprimer"></i></a></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>