<?php

class LesPays extends Model {

    public $id;

    public function __construct(){
        $this->table = 'pays';
        $this->getConnection();
        $this->globalRequest = "SELECT ID_PAYS, NOM_PAYS, NOM_CONTINENT FROM pays LEFT JOIN continent ON pays.ID_CONTINENT = continent.ID_CONTINENT";
    }

    /**
     * retourne toutes les données de la table Pays
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
     * retourne les données pour un seul enregistrement de pays
     *
     * @return void
     */
    public function getOne()
    {
        $sql = $this->globalRequest." WHERE ID_PAYS = $this->id";
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * envoi les requêtes UPDATE en base de données
     *
     * @param integer $id
     * @param string $nom
     * @return void
     */
    public function update(int $id, string $nom, int $idContinent)
    {
        $request = $this->connexion->prepare("UPDATE $this->table SET
                                            NOM_PAYS=:nom,
                                            ID_CONTINENT=:idContinent
                                            WHERE ID_PAYS=:id");
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->bindParam(':idContinent', $idContinent, PDO::PARAM_INT);
        $request->execute();
    }

    /**
     * envoi les requêtes CREATE en base de données
     *
     * @param string $nom
     * @param integer $idContinent
     * @return void
     */
    public function create(string $nom, int $idContinent)
    {
        $request = $this->connexion->prepare("INSERT INTO $this->table (NOM_PAYS, ID_CONTINENT) VALUES (:nom, :idContinent)");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->bindParam(':idContinent', $idContinent, PDO::PARAM_INT);
        $request->execute();
    }
}