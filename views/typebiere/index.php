<h1><?= @$title ?></h1>
<div class="col-6 mx-auto">
    <div class="row justify-content-end px-2">
        <a class="btn btn-sm bg-secondary text-warning text-decoration-none mb-3 col-4" href="<?= PATH ?>/typebiere/ajouter"> + Ajouter un type</a>
    </div>
    <table class="table table-bordered table-hover table-dark table-striped table-sm">
        <tr class="bg-warning text-center">
            <th>Code</th>
            <th>Nom</th>
            <th colspan="3">Actions</th>
        </tr>

        <tbody>
            <?php foreach ($typebieres as $typebiere) { ?>
                <tr>
                    <th><?= $typebiere['ID_TYPE'] ?></th>
                    <td><?= $typebiere['NOM_TYPE'] ?></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/typebiere/voir/<?= $typebiere['ID_TYPE'] ?>"><i class="far fa-eye text-success" title="voir"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/typebiere/modifier/<?= $typebiere['ID_TYPE'] ?>"><i class="fas fa-pencil-alt text-warning" title="modifier"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/typebiere/supprimer/<?= $typebiere['ID_TYPE'] ?>"><i class="fas fa-times text-danger" title="supprimer"></i></a></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>