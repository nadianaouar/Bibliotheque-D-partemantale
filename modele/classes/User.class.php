<?php

class User {

    private $nom;
    private $prenom;
    private $email;
    private $cle;
    private $motdepasse;
    private $telephone;
    private $typeUser;

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getCle() {
        return $this->cle;
    }

    function getMotdepasse() {
        return $this->motdepasse;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCle($cle) {
        $this->cle = $cle;
    }

    function setMotdepasse($password) {
        $this->motdepasse = $password;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function getTypeUser() {
        return $this->typeUser;
    }

    function setTypeUser($typeUser) {
        $this->typeUser = $typeUser;
    }

}
?>