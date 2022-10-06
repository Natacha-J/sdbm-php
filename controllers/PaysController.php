<?php

class Pays extends Controller
{
    /**
     * affiche la page principale : tableau récapitulatif des pays
     *
     * @return void
     */
    public function index()
    {
        //récupération de tous les pays
        $this->loadModel('Lespays');
        $lesPays = $this->Lespays->getAll();

        //titre de la page
        $title = "Pays";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnPays').addClass('btn-secondary');
        })";

        $this->render('index', compact('scriptJS', 'title', 'lesPays'));
    }

    /**
     * affiche les détails d'un seul continent en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche du continent spécifique
        $this->loadModel('Lespays');
        $this->Lespays->id = $id;
        $pays = $this->Lespays->getOne();

        //titre de la page
        $title = "Détail du pays n°$id";

        $this->render('voir', compact('title', 'pays'));
    }


    /**
     * affichage de la page pour ajouter un pays
     *
     * @return void
     */
    public function ajouter()
    {
        //chargement des continents pour le combo
        $this->loadModel('Continents');
        $continents = $this->Continents->getAll('asc');

        //titre de la page
        $title = "Ajout d'un nouveau pays";

        $this->render('ajouter', compact('title','continents'));
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
        $idContinent = $_POST['idContinent'];

        //chargement du modèle + déclenchement de la procédure d'ajout
        $this->loadModel('Lespays');
        $this->Lespays->create($nom, $idContinent);

        //création du message de validation + url de redirection
        $messageValidation = 'Le nouveau pays a bien été ajouté.';
        $redirection = "pays";

        $this->render('ajouter', compact('messageValidation', 'redirection'));

    }

    /**
     * affiche la page pour modifier un pays
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données du pays à modifier
        $this->loadModel('Lespays');
        $this->Lespays->id = $id;
        $pays = $this->Lespays->getOne();

        //chargement du modèle Continent pour l'affichage du combo
        $this->loadModel('Continents');
        $continents = $this->Continents->getAll('asc');

        //titre de la page
        $title = "Modifier le pays n° $id";

        $this->render('modifier', compact('title', 'pays', 'continents'));
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
        $idContinent = $_POST['idContinent'];

        //chargement du modèle + déclenchement de la procédure de modification
        $this->loadModel('Lespays');
        $this->Lespays->update($id, $nom, $idContinent);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "pays";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer un pays
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche du pays spécifique
        $this->loadModel('Lespays');
        $this->Lespays->id = $id;
        $pays = $this->Lespays->getOne();

        //titre de la page
        $title = "Suppression du pays n°$id";

        $this->render('supprimer', compact('title', 'pays'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {
        $redirection = "pays";
        
        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Lespays');
            $this->Lespays->delete($id);
            $messageValidation = 'La suppression a bien été réalisée.';
            
            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e) {
            $messageErreur = "Vous ne pouvez supprimer le pays n° $id tant qu'une marque y est rattaché.";

            $this->render('supprimer', compact('messageErreur', 'redirection'));
        }

    }

}
