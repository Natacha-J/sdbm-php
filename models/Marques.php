<?php

class Marques extends Model
{

    public function __construct()
    {
        $this->table = "marque";
        $this->getConnection();
        $this->globalRequest = "SELECT ID_MARQUE, NOM_MARQUE, NOM_PAYS, NOM_FABRICANT FROM marque
                                LEFT JOIN pays ON pays.ID_PAYS = marque.ID_PAYS
                                LEFT JOIN fabricant ON fabricant.ID_FABRICANT = marque.ID_FABRICANT";
    }

    /**
     * retourne toutes les données de la table Marque
     *
     * @param string $order
     * @return void
     */
    public function getAll(string $order = "", $specialName = "", int $limit = 100, int $offset = 0)
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
        $sql = $this->globalRequest . " WHERE ID_MARQUE = $this->id";
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * envoi les requêtes UPDATE en base de données
     *
     * @param integer $id
     * @param string $nom
     * @param integer $idPays
     * @param integer $idFabricant
     * @return void
     */
    public function update(int $id, string $nom, int $idPays, int $idFabricant)
    {
        $request = $this->connexion->prepare(
        "UPDATE $this->table SET NOM_MARQUE = :nom, ID_PAYS = :idPays, ID_FABRICANT = :idFabricant 
        WHERE ID_MARQUE=:id"
        );
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->bindParam(':idPays', $idPays, PDO::PARAM_INT);
        $request->bindParam(':idFabricant', $idFabricant, PDO::PARAM_INT);
        $request->execute();
    }

    /**
     * envoi les requêtes CREATE en base de données
     *
     * @param string $nom
     * @param integer $idContinent
     * @return void
     */
    public function create(string $nom, int $idPays, int $idFabricant)
    {
        $request = $this->connexion->prepare(
        "INSERT INTO $this->table (NOM_MARQUE, ID_PAYS, ID_FABRICANT) 
        VALUES (:nom, :idPays, :idFabricant)");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->bindParam(':idPays', $idPays, PDO::PARAM_INT);
        $request->bindParam(':idFabricant', $idFabricant, PDO::PARAM_INT);
        $request->execute();
    }
}
