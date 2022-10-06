<h1><?= @$title ?></h1>

<div class="border d-flex flex-column mx-auto col-6 p-4 align-items-center">
    <div class="mb-2 d-inline-flex">
        <label class="text-light mb-1 mx-3" for="code">Code : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-25" type="text" value="<?= @$article[0]['ID_ARTICLE'] ?>" disabled>
    </div>
    <div class="mb-2 d-inline-flex">
        <label class="text-light mb-1 mx-3" for="code">Nom : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-50" type="text" value="<?= @$article[0]['NOM_ARTICLE'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Prix d'achat : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-25" value="<?= @$article[0]['PRIX_ACHAT'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Volume : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-25" value="<?= @$article[0]['VOLUME'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Titrage : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-25" value="<?= @$article[0]['TITRAGE'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Marque : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-50" type="text" value="<?= @$article[0]['NOM_MARQUE'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Couleur : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-50" type="text" value="<?= @$article[0]['NOM_COULEUR'] ?>" disabled>
    </div>
    <div class="mb-2">
        <label class="text-light mb-1 mx-3" for="code">Type : </label>
        <input class="form-control-sm text-secondary bg-dark border-0 w-50" type="text" value="<?= @$article[0]['NOM_TYPE'] ?>" disabled>
    </div>

    <a class="btn btn-sm border-warning text-warning mt-4" href="<?= PATH ?>/article">Retour</a>
</div>