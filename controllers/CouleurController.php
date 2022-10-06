<?php

class Couleur extends Controller
{
    public function index()
    {
        //récupération de toutes les couleurs
        $this->loadModel('Couleurs');
        $couleurs = $this->Couleurs->getAll();

        //titre de la page
        $title = "Couleur";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnCouleur').addClass('btn-secondary');
        })";

        $this->render('index', compact('scriptJS', 'title', 'couleurs'));
    }

    /**
     * affiche les détails d'une seule couleur en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche de la couleur spécifique
        $this->loadModel('Couleurs');
        $this->Couleurs->id = $id;
        $couleur = $this->Couleurs->getOne();

        //titre de la page
        $title = "Détail de la couleur n°$id";

        $this->render('voir', compact('title', 'couleur'));
    }

    /**
     * affiche la page pour modifier une couleur
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données de la couleur à modifier
        $this->loadModel('Couleurs');
        $this->Couleurs->id = $id;
        $couleur = $this->Couleurs->getOne();

        //titre de la page
        $title = "Modifier la couleur n° $id";

        $this->render('modifier', compact('title', 'couleur'));
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
        $this->loadModel('Couleurs');
        $this->Couleurs->update($id, $nom);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "couleur";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer une couleur
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche de la couleur spécifique
        $this->loadModel('Couleurs');
        $this->Couleurs->id = $id;
        $couleur = $this->Couleurs->getOne();

        //titre de la page
        $title = "Suppression de la couleur n°$id";

        $this->render('supprimer', compact('title', 'couleur'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {       
        $redirection = "couleur";
             
        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Couleurs');
            $this->Couleurs->delete($id);
            $messageValidation = 'La suppression a bien été réalisée.';
            
            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e ) {
            $messageErreur = "Vous ne pouvez supprimer la couleur n° $id tant qu'un article y est rattaché.";

            $this->render('supprimer', compact('messageErreur'));
        }
    }

    /**
     * affichage de la page pour ajouter une couleur
     *
     * @return void
     */
    public function ajouter()
    {
        $title = "Ajouter une nouvelle couleur";
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
        $this->loadModel('Couleurs');
        $this->Couleurs->create($nom);

        //création du message de validation + url de redirection
        $messageValidation = 'La nouvelle couleur a bien été ajoutée.';
        $redirection = "couleur";

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }
}
