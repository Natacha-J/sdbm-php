<h1><?= @$title ?></h1>

<div class="border d-flex mx-auto col-5 p-4 align-items-end">
    <form action="<?= PATH ?>/pays/ajout" method="POST">
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Nom : </label>
            <input class="mb-1" type="text" name="nom" maxlength="40">
        </div>
        <div>
            <label class="text-light mb-1" for="code">Continent : </label>
            <select name="idContinent">
                <?php foreach ($continents as $continent) { ?>
                    <option value="<?= @$continent['ID_CONTINENT'] ?>"><?= @$continent['NOM_CONTINENT'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    <a class="btn btn-sm border-warning text-warning" href="<?= PATH ?>/pays">Retour</a>
</div>