<h1><?= @$title ?></h1>

<div class="col-7 mx-auto">

    <div class="row justify-content-between px-2">
        <div class="col-4">
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/marque/page/1">&lt;&lt;</a>
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/marque/page/<?= @$pagePrecedente ?>">&lt;</a>
            <span class="btn btn-secondary btn-sm disabled text-warning"><?= @$numeroPage ?></span>
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/marque/page/<?= @$pageSuivante ?>">&gt;</a>
        </div>
        <a class="btn btn-sm bg-secondary text-warning text-decoration-none mb-3 col-3" href="<?= PATH ?>/marque/ajouter">
            + Ajouter une marque
        </a>
    </div>

    <table class="table table-bordered table-hover table-dark table-striped table-sm">
        <tr class="bg-warning text-center">
            <th>Code</th>
            <th>Nom</th>
            <th>Pays</th>
            <th>Fabricant</th>
            <th colspan="3">Actions</th>
        </tr>
        <tbody>
            <?php foreach ($marques as $marque) { ?>
                <tr>
                    <td><?= $marque['ID_MARQUE'] ?></td>
                    <td><?= $marque['NOM_MARQUE'] ?></td>
                    <td><?= $marque['NOM_PAYS'] ?></td>
                    <td><?= $marque['NOM_FABRICANT'] ?></td>
                    <td class="p-0 text-center">
                        <a href="<?= PATH ?>/marque/voir/<?= $marque['ID_MARQUE'] ?>">
                            <i class="far fa-eye text-success" title="voir en détail"></i>
                        </a>
                    </td>
                    <td class="p-0 text-center">
                        <a href="<?= PATH ?>/marque/modifier/<?= $marque['ID_MARQUE'] ?>">
                            <i class="fas fa-pencil-alt text-warning" title="modifier"></i>
                        </a>
                    </td>
                    <td class="p-0 text-center">
                        <a href="<?= PATH ?>/marque/supprimer/<?= $marque['ID_MARQUE'] ?>">
                            <i class="fas fa-times text-danger" title="supprimer"></i>
                        </a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>
