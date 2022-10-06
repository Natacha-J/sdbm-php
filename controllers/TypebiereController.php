<?php

class TypeBiere extends Controller
{
    public function index()
    {
        //récupération de tous les types de bière
        $this->loadModel('Typebieres');
        $typebieres = $this->Typebieres->getAll();

        //titre de la page
        $title = "Type de Biere";

        //gestion visuelle du menu
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btntypebiere').addClass('btn-secondary');
        })";

        $this->render('index', compact('scriptJS', 'title', 'typebieres'));
    }

    /**
     * affiche les détails d'un seul type en lecture seule
     *
     * @return void
     */
    public function voir(int $id)
    {
        //chargement du modèle et recherche du type spécifique
        $this->loadModel('Typebieres');
        $this->Typebieres->id = $id;
        $typebiere = $this->Typebieres->getOne();

        //titre de la page
        $title = "Détail du type n°$id";

        $this->render('voir', compact('title', 'typebiere'));
    }

    /**
     * affiche la page pour modifier un type
     * 
     * @param integer $id
     * @return void
     */
    public function modifier(int $id)
    {
        //chargement du modèle et recherche des données du type à modifier
        $this->loadModel('Typebieres');
        $this->Typebieres->id = $id;
        $typebiere = $this->Typebieres->getOne();

        //titre de la page
        $title = "Modifier un type";

        $this->render('modifier', compact('title', 'typebiere'));
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
        $this->loadModel('Typebieres');
        $this->Typebieres->update($id, $nom);

        //création du message de validation + url de redirection
        $messageValidation = 'La modification a bien été enregistrée.';
        $redirection = "typebiere";

        $this->render('modifier', compact('messageValidation', 'redirection'));
    }

    /**
     * affiche la page pour supprimer un type
     *
     * @param integer $id
     * @return void
     */
    public function supprimer(int $id)
    {
        //chargement du modèle et recherche du type spécifique
        $this->loadModel('Typebieres');
        $this->Typebieres->id = $id;
        $typebiere = $this->Typebieres->getOne();

        //titre de la page
        $title = "Suppression du type n°$id";

        $this->render('supprimer', compact('title', 'typebiere'));
    }

    /**
     * enregistrement de la suppression
     *
     * @param integer $id
     * @return void
     */
    public function suppression(int $id)
    {
        $redirection = "typebiere";

        try {
            //chargement du modèle + déclenchement de la procédure de suppression
            $this->loadModel('Typebieres');
            $this->Typebieres->delete($id, 'type');
            $messageValidation = 'La suppression a bien été réalisée.';
            
            $this->render('supprimer', compact('messageValidation', 'redirection'));
        } catch (Exception $e) {
            $messageErreur = "Vous ne pouvez supprimer le type de bière n° $id tant qu'un article y est rattaché.";

            $this->render('supprimer', compact('messageErreur', 'redirection'));
        }
    }

    /**
     * affichage de la page pour ajouter un type
     *
     * @return void
     */
    public function ajouter()
    {
        $title = "Ajouter un nouveau type de bière";
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
        $this->loadModel('Typebieres');
        $this->Typebieres->create($nom);

        //création du message de validation + url de redirection
        $messageValidation = 'Le nouveau type de bière a bien été ajouté.';
        $redirection = "typebiere";

        $this->render('ajouter', compact('messageValidation', 'redirection'));
    }

}
