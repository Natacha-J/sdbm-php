<h1><?= @$title ?></h1>

<div class="border d-flex mx-auto col-5 p-4 align-items-end">
    <form action="<?= PATH ?>/article/modification/<?= $article[0]['ID_ARTICLE']?>" method="POST">
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Code : </label>
            <input class="form-control-sm text-secondary bg-dark border-0 w-25" disabled type="text" name="code" value="<?= @$article[0]['ID_ARTICLE'] ?>">
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Nom : </label>
            <input class="form-control-sm bg-light border-warning w-50" type="text" name="nom" maxlength="60" value="<?= @$article[0]['NOM_ARTICLE'] ?>" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Prix d'achat : </label>
            <input class="form-control-sm bg-light border-warning w-25" type="number" step="0.01" name="prixAchat" value="<?= @$article[0]['PRIX_ACHAT'] ?>" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Volume : </label>
            <input class="form-control-sm bg-light border-warning w-25" type="number" step="0.01" name="volume" value="<?= @$article[0]['VOLUME'] ?>" required>
        </div>
        <div class="mb-2">
            <label class="text-light mb-1" for="code">Titrage : </label>
            <input class="form-control-sm bg-light border-warning w-25" type="number" step="0.01" name="titrage" value="<?= @$article[0]['TITRAGE'] ?>" required>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Marque : </label>
            <select name="idMarque" class="form-control-sm bg-light border-warning w-50 mb-2">
                <?php foreach ($marques as $marque) {
                    if ($article[0]['NOM_MARQUE'] == $marque['NOM_MARQUE']) { ?>
                        <option value="<?= @$marque['ID_MARQUE'] ?>" selected><?= @$marque['NOM_MARQUE'] ?></option>
                    <?php } else { ?>
                        <option value="<?= @$marque['ID_MARQUE'] ?>"><?= @$marque['NOM_MARQUE'] ?></option>
                <?php
                    }
                } ?>
            </select>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Couleur : </label>
            <select name="idCouleur" class="form-control-sm bg-light border-warning w-50 mb-2">
                <?php foreach ($couleurs as $couleur) {
                    if ($article[0]['NOM_COULEUR'] == $couleur['NOM_COULEUR']) { ?>
                        <option value="<?= @$couleur['ID_COULEUR'] ?>" selected><?= @$couleur['NOM_COULEUR'] ?></option>
                    <?php } else { ?>
                        <option value="<?= @$couleur['ID_COULEUR'] ?>"><?= @$couleur['NOM_COULEUR'] ?></option>
                <?php
                    }
                } ?>
            </select>
        </div>
        <div>
            <label class="text-light mb-1" for="code">Type : </label>
            <select name="idType" class="form-control-sm bg-light border-warning w-50 mb-2">
                <?php foreach ($types as $type) {
                    if ($article[0]['NOM_TYPE'] == $type['NOM_TYPE']) { ?>
                        <option value="<?= @$type['ID_TYPE'] ?>" selected><?= @$type['NOM_TYPE'] ?></option>
                    <?php } else { ?>
                        <option value="<?= @$type['ID_TYPE'] ?>"><?= @$type['NOM_TYPE'] ?></option>
                <?php
                    }
                } ?>
            </select>
        </div>
        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    <a class="btn btn-sm border-warning text-warning" href="<?= PATH ?>/article">Retour</a>
</div>