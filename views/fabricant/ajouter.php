<h1><?= @$title ?></h1>
<div class="border d-flex mx-auto col-4 p-4 align-items-end">

    <form action="<?= PATH ?>/fabricant/ajout" method="POST">
        <label class="text-light" for="code">Nom : </label>
        <input type="text" name="nom" maxlength="40">
        <button class="btn btn-sm bg-warning mt-4" type="submit">Ajouter</button>
    </form>
    <a class="btn btn-sm border-warning text-warning" href="<?= PATH ?>/fabricant">Retour</a>
</div>