<?php

class TypeBieres extends Model{

    public function __construct()
    {
        $this->table = 'typebiere';
        $this->getConnection();
    }
    

    /**
     * Retourne les données pour un seul enregistrement
     */
    public function getOne()
    {
        $sql = "SELECT * FROM $this->table WHERE id_type = $this->id";

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
    public function update(int $id, string $nom)
    {
        $request = $this->connexion->prepare("UPDATE $this->table SET NOM_TYPE=:nom WHERE ID_TYPE=:id");
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->execute();
    }

    /**
     * envoi les requêtes CREATE en base de données
     *
     * @param string $nom
     * @return void
     */
    public function create(string $nom)
    {
        $request = $this->connexion->prepare("INSERT INTO $this->table (NOM_TYPE) VALUES (:nom)");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->execute();
    }

    /**
     * fonction qui supprime une donnée
     */
    public function delete(int $id)
    {
        $request = $this->connexion->prepare("DELETE FROM $this->table WHERE id_type = :id");
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->execute();
    }

}