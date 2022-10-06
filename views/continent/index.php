<h1><?= @$title ?></h1>
<div class="col-6 mx-auto">
    <div class="row justify-content-end px-2">
        <a class="btn btn-sm bg-secondary text-warning text-decoration-none mb-3 col-4" href="<?= PATH ?>/continent/ajouter"> + Ajouter un continent</a>
    </div>
    <table class="table table-bordered table-hover table-dark table-striped table-sm">
        <tr class="bg-warning text-center">
            <th>Code</th>
            <th>Nom</th>
            <th colspan="3">Actions</th>
        </tr>

        <tbody>
            <?php foreach ($continents as $continent) { ?>
                <tr>
                    <th><?= $continent['ID_CONTINENT'] ?></th>
                    <td><?= $continent['NOM_CONTINENT'] ?></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/continent/voir/<?= $continent['ID_CONTINENT'] ?>"><i class="far fa-eye text-success" title="voir en détail"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/continent/modifier/<?= $continent['ID_CONTINENT'] ?>"><i class="fas fa-pencil-alt text-warning" title="modifier"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/continent/supprimer/<?= $continent['ID_CONTINENT'] ?>"><i class="fas fa-times text-danger" title="supprimer"></i></a></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>