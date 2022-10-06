<h1><?= @$title ?></h1>
<div class="border d-flex flex-column mx-auto col-4 p-4 align-items-center">
    <div class="d-inline-flex">
        <span class="text-light">Code : </span>
        <p class="rounded bg-dark px-3 mx-3"><?= $typebiere[0]["ID_TYPE"] ?></p>
    </div>
    <div class="d-inline-flex">
        <span class="text-light">Nom : </span>
        <p class="bg-dark rounded px-3 mx-3"><?= $typebiere[0]['NOM_TYPE'] ?></p>
    </div>

    <a class="btn btn-sm border-warning text-warning mt-4 col-6" href="<?= PATH ?>/typebiere">Retour</a>