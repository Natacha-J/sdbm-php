<?php

class Article extends Controller
{
    public function index()
    {
        $this->page();
    }

    /**
     * affichage et gestion de la pagination des articles
     *
     * @param integer $numeroPage
     * @return void
     */
    public function page(int $numeroPage = 1)
    {
        //chargement du modèle Article
        $this->loadModel('Articles');

        //titre de la page
        $title = 'Article';

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnArticle').addClass('btn-secondary');
        })";

        //gestion des numéros de pages et des articles visibles
        $offset = ($numeroPage - 1) * NBR_ITEMS;
        $pageSuivante = $numeroPage + 1;
        if ($numeroPage <= 1) {           
            $pagePrecedente = 1;
        } else {
            $pagePrecedente = $numeroPage - 1;
        }

        //récupération des articles de la page
        $articles = $this->Articles->getAll('','',NBR_ITEMS, $offset);
        $this->render('index', compact('scriptJS', 'title', 'articles', 'numeroPage', 'pageSuivante', 'pagePrecedente'));
    }

    /**
     * affiche les détails d'un seul article en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche du continent spécifique
        $this->loadModel('Articles');
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();

        //titre de la page
        $title = 'Détail de l\'article n°$id';

        $this->render('voir', compact('title', 'article'));
    }

    /**
     * affichage de la page pour ajouter un article
     *
     * @return void
     */
    public function ajouter()
    {
        //chargement des marques pour le combo
        $this->loadModel('Marques');
        $marques = $this->Marques->getAll('asc');

        //chargement des couleurs pour le combo
        $this->loadModel('Couleurs');
        $couleurs = $this->Couleurs->getAll('asc');

        //chargement des types pour le combo
        $this->loadModel('TypeBieres');
        $types = $this->TypeBieres->getAll('asc', 'type');

        //titre de la page
        $title = 'Ajout d\'un nouvel article';

        $this->render('ajouter', compact('title', 'marques', 'couleurs', 'types'));
    }

    /**
     * enregistrement de l'ajout
     *
     * @return void
     */
    public function ajout()
    {
        //récupération des données
        $nom = $_POST['nom'];
        $prixAchat = $_POST['prixAchat'];
        $volume = $_POST['volume'];
        $titrage = $_POST['titrage'];
        $idMarque = $_POST['idMarque'];
        $idCouleur = $_POST['idCouleur'];
        $idType = $_POST['idType'];

        //chargement du modèle + déclenchement de la procédure d'ajout
        $this->loadModel('Articles');
        $this->Articles->create($nom, $prixAchat, $volume, $titrage, $idMarque, $idCouleur, $idType);

        //création du message de validation + url de redirection
        $messageValidation = 'Le nouvel article a bien été ajouté.';
        $redirection = 'article/index';

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour modifier un article
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données de l'article à modifier
        $this->loadModel('Articles');
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();

        //chargement des marques pour le combo
        $this->loadModel('Marques');
        $marques = $this->Marques->getAll('asc');

        //chargement des couleurs pour le combo
        $this->loadModel('Couleurs');
        $couleurs = $this->Couleurs->getAll('asc');

        //chargement des types pour le combo
        $this->loadModel('TypeBieres');
        $types = $this->TypeBieres->getAll('asc', 'type');

        //titre de la page
        $title = 'Modifier l\'article n° $id';

        $this->render('modifier', compact('title', 'article', 'marques', 'couleurs', 'types'));
    }

    /**
     * enregistrement des modifications en base de données
     *
     * @param integer $id
     * @return void
     */
    public function modification(int $id)
    {
        //récupération des données
        $this->id = $id;
        $nom = $_POST['nom'];
        $prixAchat = $_POST['prixAchat'];
        $volume = $_POST['volume'];
        $titrage = $_POST['titrage'];
        $idMarque = $_POST['idMarque'];
        $idCouleur = $_POST['idCouleur'];
        $idType = $_POST['idType'];

        //chargement du modèle + déclenchement de la procédure de modification
        $this->loadModel('Articles');
        $this->Articles->update($id, $nom, $prixAchat, $volume, $titrage, $idMarque, $idCouleur, $idType);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = 'article';

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer un article
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche de l'article spécifique
        $this->loadModel('Articles');
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();

        //titre de la page
        $title = 'Suppression de l\'article n° '.$id;

        $this->render('supprimer', compact('title', 'article'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {
        //chargement du modèle + déclenchement de la procédure de suppression
        $this->loadModel('Articles');
        $this->Articles->delete($id);

        //création du message de validation + url de redirection
        $messageValidation = 'La suppression a bien été réalisée.';
        $redirection = 'article';

        $this->render('supprimer', compact('messageValidation', 'redirection'));
    }
}
