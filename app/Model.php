<?php

abstract class Model
{
    private $host = "localhost";
    private $dbName = "sdbm";
    private $username = "root";
    private $password = "";

    protected $connexion;

    public $table;
    public $id;

    /**
     * Etablissement d'une connexion à la base de données
     *
     * @return void
     */
    public function getConnection()
    {
        $this->connexion = null;

        try {
            $this->connexion = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbName,
                $this->username,
                $this->password
            );
            $this->connexion->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $this->$e->getMessage();
        }
    }

    /**
     * Retourne tous les données d'une table
     *
     * @return void
     */
    public function getAll(string $order = "", string $specialName = "", int $limit = 100, int $offset = 0)
    {
        //préparation de la requête de base
        $sql = "SELECT * FROM " . $this->table;

        //ajout d'un tri sur la table
        if ($order != "") {
            if ($specialName != "") {
                $sql .= " ORDER BY NOM_$specialName $order";
            } else {
                $sql .= " ORDER BY NOM_$this->table $order";
            }
        }

        //limitation des résultats
        $sql .= " LIMIT $limit OFFSET $offset";
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll();
    }

    /**
     * Retourne les données pour un seul enregistrement
     */
    public function getOne()
    {
        $sql = "SELECT * FROM $this->table WHERE id_$this->table = $this->id";
        $request = $this->connexion->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * fonction qui supprime une donnée
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id_$this->table = :id";
        $request = $this->connexion->prepare($sql);
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        $request->execute();
    }
}
