<h1><?= @$title ?></h1>
<div class="border d-flex mx-auto col-4 p-4 align-items-end">

    <form action="<?= PATH ?>/typebiere/ajout" method="POST">
        <div>
            <label class="text-light mb-1" for="code">Nom : </label>
            <input class="mb-1" type=" text" name="nom" maxlength="25" required>
        </div>
        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    <a class="btn btn-sm text-warning border-warning" href="<?= PATH ?>/typebiere">Retour</a>