<?php

class Marque extends Controller
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
        //chargement du modèle Marque
        $this->loadModel('Marques');

        //titre de la page
        $title = "Marque";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnMarque').addClass('btn-secondary');
        })";

        //gestion des numéros de pages et des marques visibles
        $offset = ($numeroPage - 1) * NBR_ITEMS;
        $pageSuivante = $numeroPage + 1;
        if ($numeroPage <= 1) {
            $pagePrecedente = 1;
        } else {
            $pagePrecedente = $numeroPage - 1;
        }

        //récupération des articles de la page
        $marques = $this->Marques->getAll("", "", NBR_ITEMS, $offset);
        $this->render('index', compact('scriptJS', 'title', 'marques', 'numeroPage', 'pageSuivante', 'pagePrecedente'));
    }


    /**
     * affiche les détails d'une seule marque en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche de la marque spécifique
        $this->loadModel('Marques');
        $this->Marques->id = $id;
        $marque = $this->Marques->getOne();

        //titre de la page
        $title = "Détail de la marque n°$id";

        $this->render('voir', compact('title', 'marque'));
    }


    /**
     * affichage de la page pour ajouter une marque
     *
     * @return void
     */
    public function ajouter()
    {
        //titre de la page
        $title = 'Ajouter une marque';

        //chargement des pays pour le combo
        $this->loadModel('Lespays');
        $lesPays = $this->Lespays->getAll('asc');

        //chargement des fabricants pour le combo
        $this->loadModel('Fabricants');
        $fabricants = $this->Fabricants->getAll('asc');

        $this->render('ajouter', compact('title', 'lesPays', 'fabricants'));
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
        $idPays = $_POST['idPays'];
        $idFabricant = $_POST['idFabricant'];

        //chargement du modèle + déclenchement de la procédure d'ajout
        $this->loadModel('Marques');
        $this->Marques->create($nom, $idPays, $idFabricant);

        //création du message de validation + url de redirection
        $messageValidation = 'La nouvelle marque a bien été ajoutée.';
        $redirection = "marque";

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour modifier une marque
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données de la marque à modifier
        $this->loadModel('Marques');
        $this->Marques->id = $id;
        $marque = $this->Marques->getOne();

        //chargement du modèle Pays pour l'affichage du combo
        $this->loadModel('Lespays');
        $lesPays = $this->Lespays->getAll('asc');

        //chargement du modèle Fabricant pour l'affichage du combo
        $this->loadModel('Fabricants');
        $fabricants = $this->Fabricants->getAll('asc');

        //titre de la page
        $title = "Modifier une marque";

        $this->render('modifier', compact('title', 'marque', 'lesPays', 'fabricants'));
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
        $nom = $_POST['nom'];
        $idPays = $_POST['idPays'];
        $idFabricant = $_POST['idFabricant'];

        //chargement du modèle + déclenchement de la procédure de modification
        $this->loadModel('Marques');
        $this->Marques->update($id, $nom, $idPays, $idFabricant);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "marque";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer une marque
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche de la marque spécifique
        $this->loadModel('Marques');
        $this->Marques->id = $id;
        $marque = $this->Marques->getOne();

        //titre de la page
        $title = "Suppression de la marque n°$id";

        $this->render('supprimer', compact('title', 'marque'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {
        $redirection = "marque";

        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Marques');
            $this->Marques->delete($id);
            $messageValidation = 'La suppression a bien été réalisée.';

            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e) {
            $messageErreur = "Vous ne pouvez supprimer la marque n° $id tant qu'un article y est rattaché.";

            $this->render('supprimer', compact('messageErreur', 'redirection'));
        }
    }
}
