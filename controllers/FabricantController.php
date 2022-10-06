<?php

class Fabricant extends Controller
{
    public function index()
    {
        //récupération de tous les fabricants
        $this->loadModel('Fabricants');
        $fabricants = $this->Fabricants->getAll();

        //titre de la page
        $title = "Fabricant";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnFabricant').addClass('btn-secondary');
        })";

        $this->render('index', compact('scriptJS', 'title', 'fabricants'));
    }

    /**
     * affiche les détails d'un seul fabricant en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche du fabricant spécifique
        $this->loadModel('Fabricants');
        $this->Fabricants->id = $id;
        $fabricant = $this->Fabricants->getOne();

        //titre de la page
        $title = "Détail du fabricant n°$id";

        $this->render('voir', compact('title', 'fabricant'));
    }

    /**
     * affiche la page pour modifier un fabricant
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données du fabricant à modifier
        $this->loadModel('Fabricants');
        $this->Fabricants->id = $id;
        $fabricant = $this->Fabricants->getOne();

        //titre de la page
        $title = "Modifier le fabricant";

        $this->render('modifier', compact('title', 'fabricant'));
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
        $this->loadModel('Fabricants');
        $this->Fabricants->update($id, $nom);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "fabricant";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer une fabricant
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche du fabricant spécifique
        $this->loadModel('Fabricants');
        $this->Fabricants->id = $id;
        $fabricant = $this->Fabricants->getOne();

        //titre de la page
        $title = "Suppression du fabricant n°$id";

        $this->render('supprimer', compact('title', 'fabricant'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {
        $redirection = "fabricant";

        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Fabricants');
            $this->Fabricants->delete($id);
            $messageValidation = 'La suppression a bien été réalisée.';

            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e) {
            $messageErreur = "Vous ne pouvez supprimer le fabricant n° $id tant qu'une marque y est rattaché.";

            $this->render('supprimer', compact('messageErreur', 'redirection'));
        }
    }

    /**
     * affichage de la page pour ajouter un fabricant
     *
     * @return void
     */
    public function ajouter()
    {
        $title = "Ajouter un nouveau fabricant";
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
        $this->loadModel('Fabricants');
        $this->Fabricants->create($nom);

        //création du message de validation + url de redirection
        $messageValidation = 'Le nouveau fabricant a bien été ajouté.';
        $redirection = "fabricant";

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }
}
