<?php

class Continents extends Model
{

    public function __construct()
    {
        $this->table = "continent";
        $this->getConnection();
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
        $request = $this->connexion->prepare("UPDATE $this->table SET NOM_CONTINENT=:nom WHERE ID_CONTINENT=:id");
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
        $request = $this->connexion->prepare("INSERT INTO $this->table (NOM_CONTINENT) VALUES (:nom)");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $request->execute();
    }

}
