<h1><?= @$title ?></h1>

<div class="border d-flex flex-column mx-auto col-4 p-4 align-items-start">
    <form class="d-flex flex-column" action="<?= PATH ?>/continent/modification/<?= $continent[0]["ID_CONTINENT"] ?>" method="POST">
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Code : </label>
            <input class="form-control-sm text-secondary bg-dark border-0 w-25" type="text" disabled name="id" value="<?= @$continent[0]["ID_CONTINENT"] ?>">
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Nom : </label>
            <input class="form-control-sm bg-light border-warning w-50" type="text" name="nom" maxlength="25" value="<?= @$continent[0]['NOM_CONTINENT'] ?>" required>
        </div>
        <button class="btn btn-sm bg-warning col-4 mx-3" type="submit">Valider</button>
    </form>
    <a class="btn btn-sm border-warning text-warning mt-4 col-4 align-self-end" href="<?= PATH ?>/continent">Retour</a>
</div>