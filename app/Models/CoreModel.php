<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models enfants
// On spécifie le CoreModel en classe abstraite, car elle va contenir les méthodes qui doivent être obligatoirement déclarées dans TOUS les Models enfants

abstract class CoreModel
{
    /**
     * @var int
     */
    protected $id;


    // Avec le mot-clé abstract, on va définir un contrat que toutes les classes qui hériteront de CoreModel devront respecter
    public abstract static function findAll();
    public abstract static function find($id);
    public abstract function insert();
    public abstract function update();
    public abstract static function delete($id);
    

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
