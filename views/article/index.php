<h1><?= @$title ?></h1>
<div class="col-9 mx-auto">
    <div class="row justify-content-between px-2">
        <div class="col-3">
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/article/page/1">&lt;&lt;</a>
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/article/page/<?= @$pagePrecedente ?>">&lt;</a>
            <span class="btn btn-secondary btn-sm disabled text-warning"><?= @$numeroPage ?></span>
            <a class="btn btn-secondary btn-sm" href="<?= PATH ?>/article/page/<?= @$pageSuivante ?>">&gt;</a>
        </div>
        <a class="btn btn-sm bg-secondary text-warning text-decoration-none mb-3 col-3" href="<?= PATH ?>/article/ajouter"> + Ajouter un article</a>
    </div>
    <table class="table table-bordered table-hover table-dark table-striped table-sm">
        <thead class="text-center align-middle">
            <th>Code</th>
            <th>Nom</th>
            <th>Prix d'achat</th>
            <th>Volume</th>
            <th>Titrage</th>
            <th>Marque</th>
            <th>Couleur</th>
            <th>Type</th>
            <th colspan="3">Actions</th>
        </thead>

        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <td><?= $article['ID_ARTICLE'] ?></td>
                    <td><?= $article['NOM_ARTICLE'] ?></td>
                    <td><?= $article['PRIX_ACHAT'] ?></td>
                    <td><?= $article['VOLUME'] ?></td>
                    <td><?= $article['TITRAGE'] ?></td>
                    <td><?= $article['NOM_MARQUE'] ?></td>
                    <td><?= $article['NOM_COULEUR'] ?></td>
                    <td><?= $article['NOM_TYPE'] ?></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/article/voir/<?= $article['ID_ARTICLE'] ?>"><i class="far fa-eye text-success" title="voir en détail"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/article/modifier/<?= $article['ID_ARTICLE'] ?>"><i class="fas fa-pencil-alt text-warning" title="modifier"></i></a></td>
                    <td class="p-0 text-center"><a href="<?= PATH ?>/article/supprimer/<?= $article['ID_ARTICLE'] ?>"><i class="fas fa-times text-danger" title="supprimer"></i></a></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>