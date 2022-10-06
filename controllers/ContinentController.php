<?php

class Continent extends Controller
{
    /**
     * affiche la page principale : tableau récapitulatif des continents
     *
     * @return void
     */
    public function index()
    {
        //récupération de tous les continents
        $this->loadModel('Continents');
        $continents = $this->Continents->getAll();

        //titre de la page
        $title = "Continent";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnContinent').addClass('btn-secondary');
        })";

        $this->render('index', compact('scriptJS', 'title', 'continents'));
    }

    /**
     * affiche les détails d'un seul continent en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche du continent spécifique
        $this->loadModel('Continents');
        $this->Continents->id = $id;
        $continent = $this->Continents->getOne();

        //titre de la page
        $title = "Détail du continent n°$id";

        $this->render('voir', compact('title', 'continent'));
    }

    /**
     * affiche la page pour modifier un continent
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données du continent à modifier
        $this->loadModel('Continents');
        $this->Continents->id = $id;
        $continent = $this->Continents->getOne();

        //titre de la page
        $title = "Modifier un continent";

        $this->render('modifier', compact('title', 'continent'));
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

        //chargement du modèle + déclenchement de la procédure de modification
        $this->loadModel('Continents');
        $this->Continents->update($id, $nom);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "continent";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer un continent
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche du continent spécifique
        $this->loadModel('Continents');
        $this->Continents->id = $id;
        $continent = $this->Continents->getOne();

        //titre de la page
        $title = "Suppression du continent n°$id";

        $this->render('supprimer', compact('title', 'continent'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {        
        $redirection = "continent";
        
        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Continents');
            $this->Continents->delete($id);
            $messageValidation = 'La suppression a bien été réalisée.';
            
            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e) {
            $messageErreur = "Vous ne pouvez supprimer le continent n° $id tant qu'un pays y est rattaché.";

            $this->render('supprimer', compact('messageErreur'));
        }

    }

    /**
     * affichage de la page pour ajouter un continent
     *
     * @return void
     */
    public function ajouter()
    {
        $title = "Ajouter un nouveau continent";
        $this->render('ajouter', compact('title'));
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

        //chargement du modèle + déclenchement de la procédure d'ajout
        $this->loadModel('Continents');
        $this->Continents->create($nom);

        //création du message de validation + url de redirection
        $messageValidation = "Le nouveau continent a bien été ajouté.";
        $redirection = "continent";

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }
}
