<h1><?= @$title ?></h1>

<div class="border d-flex mx-auto col-5 p-4 align-items-end">

    <form action="<?= PATH ?>/marque/ajout" method="POST">
        <div>
            <label class="text-light mb-1" for="code">Nom : </label>
            <input class="mb-1" type="text" name="nom" maxlength="40" required>
        </div>

        <div>
            <label class="text-light mb-1" for="code">Pays : </label>
            <select name="idPays">
                <?php foreach ($lesPays as $pays) { ?>
                    <option value="<?= @$pays['ID_PAYS'] ?>">
                        <?= @$pays['NOM_PAYS'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label class="text-light mb-1" for="code">Fabricant : </label>
            <select name="idFabricant">
                <?php foreach ($fabricants as $fabricant) { ?>
                    <option value="<?= @$fabricant['ID_FABRICANT'] ?>">
                        <?= @$fabricant['NOM_FABRICANT'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    
    <a class="btn btn-sm border-warning text-warning" href="<?= PATH ?>/marque">Retour</a>
</div>