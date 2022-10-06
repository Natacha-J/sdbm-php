<h1><?= @$title ?></h1>

<div class="border d-flex flex-column mx-auto col-4 p-4 align-items-center">
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
    <a class="btn btn-sm border-warning text-warning mt-4 col-6" href="<?= PATH ?>/marque">Retour</a>
</div>
