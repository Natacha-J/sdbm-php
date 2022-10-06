<h1><?= @$title ?></h1>

<div class="border d-flex flex-column mx-auto col-5 p-4 align-items-start">
    <form class="d-flex flex-column" action="<?= PATH ?>/marque/suppression/<?= $marque[0]["ID_MARQUE"] ?>" method="POST">
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Code : </label>
            <input class="form-control-sm bg-dark border-0 w-25" type="text" disabled value="<?= @$marque[0]["ID_MARQUE"] ?>">
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Nom : </label>
            <input class="form-control-sm bg-dark border-0 w-50" type="text" disabled value="<?= @$marque[0]['NOM_MARQUE'] ?>">
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Pays : </label>
            <input class="form-control-sm bg-dark border-0 w-50" type="text" disabled value="<?= @$marque[0]['NOM_PAYS'] ?>">
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Fabricant : </label>
            <input class="form-control-sm bg-dark border-0 w-50" type="text" disabled value="<?= @$marque[0]['NOM_FABRICANT'] ?>">
        </div>
        <button class="btn btn-sm mx-3 col-8 bg-warning" type="submit">Valider la suppression ?</button>
    </form>
    <a class="btn btn-sm mt-4 col-4 align-self-end text-warning border-warning" href="<?= PATH ?>/marque">Retour</a>
</div>
