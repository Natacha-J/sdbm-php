<h1><?= @$title ?></h1>

<div class="border d-flex flex-column mx-auto col-6 p-4 align-items-start">
    <form class="d-flex flex-column" action="<?= PATH ?>/marque/modification/<?= $marque[0]["ID_MARQUE"] ?>" method="POST">
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Code : </label>
            <input class="form-control-sm text-secondary bg-dark w-25" type="text" disabled name="id" value="<?= @$marque[0]["ID_MARQUE"] ?>">
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Nom : </label>
            <input class="form-control-sm bg-light w-50" type="text" name="nom" maxlength="40" value="<?= @$marque[0]['NOM_MARQUE'] ?>" required>
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Pays : </label>
            <select name="idPays">
                <?php foreach ($lesPays as $pays) {
                    if ($marque[0]['NOM_PAYS'] == $pays['NOM_PAYS']) { ?>
                        <option value="<?= @$pays['ID_PAYS'] ?>" selected><?= @$pays['NOM_PAYS'] ?></option>
                    <?php } else {  ?>
                        <option value="<?= @$pays['ID_PAYS'] ?>"><?= @$pays['NOM_PAYS'] ?></option>
                <?php
                    }
                } ?>
            </select>
        </div>
        <div class="d-inline-flex align-items-center mb-4">
            <label class="text-light mx-3" for="code">Fabricant : </label>
            <select name="idFabricant">
                <?php foreach ($fabricants as $fabricant) {
                    if ($marque[0]['NOM_FABRICANT'] == $fabricant['NOM_FABRICANT']) { ?>
                        <option value="<?= @$fabricant['ID_FABRICANT'] ?>" selected>
                            <?= @$fabricant['NOM_FABRICANT'] ?>
                        </option>
                    <?php } else {  ?>
                        <option value="<?= @$fabricant['ID_FABRICANT'] ?>">
                            <?= @$fabricant['NOM_FABRICANT'] ?>
                        </option>
                <?php }
                }
                ?>
            </select>
        </div>
        <button class="btn btn-sm bg-warning col-4 mx-3" type="submit">Valider</button>
    </form>
    <a class="btn btn-sm border-warning text-warning mt-4 col-4 align-self-end" href="<?= PATH ?>/marque">Retour</a>
</div>