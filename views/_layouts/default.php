<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= PATH ?>/css/style.css">
    <title><?= @$title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 bg-dark rounded-pill">
                        <li class="nav-item">
                            <a href="<?= PATH ?>/accueil" id="btnAccueil" class="btn rounded-circle m-2">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/article" id="btnArticle" class="btn rounded-circle m-2">Article</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/continent" id="btnContinent" class="btn rounded-circle m-2">Continent</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/couleur" id="btnCouleur" class="btn rounded-circle m-2">Couleur</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/fabricant" id="btnFabricant" class="btn rounded-circle m-2">Fabricant</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/marque" id="btnMarque" class="btn rounded-circle m-2">Marque</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/pays" id="btnPays" class="btn rounded-circle m-2">Pays</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= PATH ?>/typebiere" id="btnTypeBiere" class="btn rounded-circle m-2">Type</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mb-5">
        <?php if (isset($messageValidation)) { ?>
            <div class="alert alert-success w-25 text-center mx-auto mt-5" role="alert"><?= @$messageValidation ?></div>
        <?php
            header('Refresh:2; ' . PATH . '/' . $redirection);
        } else if (isset($messageErreur)) { ?>
            <div class="alert alert-danger w-50 text-center mx-auto mt-5" role="alert"><?= @$messageErreur ?></div>
            <div class="text-center mx-auto">
                <a class="btn btn-sm border-warning text-warning text-center" href="<?= PATH ?>/<?= $redirection ?>">Retour</a>
            </div>
        <?php
        } else { ?>
            <?= $content ?>
        <?php } ?>
    </div>

    <footer class="bg-secondary fixed-bottom text-center">
        <span>&copy; 2021 - Tous droits réservés</span>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        <?= @$scriptJS ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>