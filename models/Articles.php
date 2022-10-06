<?php

class Articles extends Model
{

    public function __construct()
    {
        $this->table = "article";
        $this->getConnection();
        $this->globalRequest = "SELECT ID_ARTICLE, NOM_ARTICLE, PRIX_ACHAT, VOLUME, TITRAGE, NOM_MARQUE, NOM_COULEUR, NOM_TYPE FROM article
                                LEFT JOIN marque ON marque.ID_MARQUE = article.ID_MARQUE
                                LEFT JOIN couleur ON couleur.ID_COULEUR = article.ID_COULEUR
                                LEFT JOIN typebiere ON typebiere.ID_TYPE = article.ID_TYPE";
    }

    /**
     * retourne toutes les données de la table Article
     *
     * @param string $order
     * @return void
     */
    public function getAll(string $order = "", $specialName ="", int $limit = 100, int $offset = 0)
    {
        $sql = $this->globalRequest . " LIMIT $limit OFFSET $offset";
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * retourne les données pour un seul enregistrement d'article
     *
     * @return void
     */
    public function getOne()
    {
        $sql = $this->globalRequest . " WHERE ID_ARTICLE = ".$this->id;
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * envoi les requêtes UPDATE en base de données
     *
     * @param integer $id
     * @param string $nom
     * @param float $prixAchat
     * @param float $volume
     * @param float $titrage
     * @param integer $idMarque
     * @param integer $idCouleur
     * @param integer $idType
     * @return void
     */
    public function update(int $id, string $nom, float $prixAchat, float $volume, float $titrage, int $idMarque, int $idCouleur, int $idType)
    {
        $request = $this->connexion->prepare(
            "UPDATE $this->table SET NOM_ARTICLE = :nom, PRIX_ACHAT = :prixAchat, VOLUME = :volume, TITRAGE = :titrage,
                                    ID_MARQUE = :idMarque, ID_COULEUR = :idCouleur, ID_TYPE = :idType WHERE ID_ARTICLE = :id");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 60);
        $request->bindParam(':prixAchat', $prixAchat, PDO::PARAM_INT);
        $request->bindParam(':volume', $volume, PDO::PARAM_INT);
        $request->bindParam(':titrage', $titrage, PDO::PARAM_INT);
        $request->bindParam(':idMarque', $idMarque, PDO::PARAM_INT);
        $request->bindParam(':idCouleur', $idCouleur, PDO::PARAM_INT);
        $request->bindParam(':idType', $idType, PDO::PARAM_INT);
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->execute();
    }


    public function create(string $nom, float $prixAchat, float $volume, float $titrage, int $idMarque, int $idCouleur, int $idType)
    {
        $request = $this->connexion->prepare(
            "INSERT INTO $this->table (NOM_ARTICLE, PRIX_ACHAT, VOLUME, TITRAGE, ID_MARQUE, ID_COULEUR, ID_TYPE)
            VALUES (:nom, :prixAchat, :volume, :titrage, :idMarque, :idCouleur, :idType)");

        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 60);
        $request->bindParam(':prixAchat', $prixAchat, PDO::PARAM_INT);
        $request->bindParam(':volume', $volume, PDO::PARAM_INT);
        $request->bindParam(':titrage', $titrage, PDO::PARAM_INT);
        $request->bindParam(':idMarque', $idMarque, PDO::PARAM_INT);
        $request->bindParam(':idCouleur', $idCouleur, PDO::PARAM_INT);
        $request->bindParam(':idType', $idType, PDO::PARAM_INT);
        $request->execute();
    }
}
