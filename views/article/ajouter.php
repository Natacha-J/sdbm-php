<h1><?= @$title ?></h1>

<div class="border d-flex mx-auto col-5 p-4 align-items-end">
    <form action="<?= PATH ?>/article/ajout" method="POST">
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Nom : </label>
            <input class="mb-1 col-8" type="text" name="nom" maxlength="60" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Prix d'achat : </label>
            <input class="mb-1 col-3" type="number" step="0.01" name="prixAchat" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Volume : </label>
            <input class="mb-1 col-3" type="number" step="0.01" name="volume" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Titrage : </label>
            <input class="mb-1 col-3" type="number" step="0.01" name="titrage" required>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Marque : </label>
            <select name="idMarque" class="col-4 mb-2">
                <?php foreach ($marques as $marque) { ?>
                    <option value="<?= @$marque['ID_MARQUE'] ?>"><?= @$marque['NOM_MARQUE'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Couleur : </label>
            <select name="idCouleur" class="col-4 mb-2">
                <?php foreach ($couleurs as $couleur) { ?>
                    <option value="<?= @$couleur['ID_COULEUR'] ?>"><?= @$couleur['NOM_COULEUR'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Type : </label>
            <select name="idType" class="col-4 mb-2">
                <?php foreach ($types as $type) { ?>
                    <option value="<?= @$type['ID_TYPE'] ?>"><?= @$type['NOM_TYPE'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    <a class="btn btn-sm border-warning text-warning" href="<?= PATH ?>/article">Retour</a>
</div>