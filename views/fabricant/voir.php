<h1><?= @$title ?></h1>
<div class="border d-flex flex-column mx-auto col-4 p-4 align-items-center">
    <div class="d-inline-flex">
        <span class="text-light">Code : </span>
        <p class="rounded bg-dark px-3 mx-3"><?= $fabricant[0]["ID_FABRICANT"] ?></p>
    </div>
    <div class="d-inline-flex">
        <span class="text-light">Nom : </span>
        <p class="rounded bg-dark px-3 mx-3"><?= $fabricant[0]['NOM_FABRICANT'] ?></p>
    </div>

    <a class="btn btn-sm border-warning text-warning mt-4 col-6" href="<?= PATH ?>/fabricant">Retour</a>