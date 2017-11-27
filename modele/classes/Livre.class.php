<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Livre
 *
 * @author nadou
 */
class Livre {
  
    private $isbn="";
    private $titre_livre="";
    private $description="";
    private $edition="";
    private $auteur="";
    private $annee="";
    private $langue="";
    private $nomimg="";
    private $mots_cles="";
   
    
 
          
    function getIsbn() {
        return $this->isbn;
    }

    function getTitre_livre() {
        return $this->titre_livre;
    }
    function getDescription() {
            return $this->description;
        }
    function getEdition() {
        return $this->edition;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getAnnee() {
        return $this->annee;
    }

    function getLangue() {
        return $this->langue;
    }

    function getNomimg() {
        return $this->nomimg;
    }

    function getMots_cles() {
        return $this->mots_cles;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setTitre_livre($titre_livre) {
        $this->titre_livre = $titre_livre;
    }

    function setEdition($edition) {
        $this->edition = $edition;
    }
     function setDescription($description) {
            $this->description = $description;
        }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    function setAnnee($annee) {
        $this->annee = $annee;
    }

    function setLangue($langue) {
        $this->langue = $langue;
    }

    function setNomimg($nomimg) {
        $this->nomimg = $nomimg;
    }

    function setMots_cles($mots_cles) {
        $this->mots_cles = $mots_cles;
    }

    public function __toString() {
        return "Livre[".$this->nomimg.$this->isbn.",".$this->titre_livre.",".$this->edition.",".$this->description."]";
    }
    public function loadFromRecord($ligne)
	{
		$this->isbn = $ligne["ISBN"];
		$this->titre_livre = $ligne["TITRE_LIVRE"];
		$this->edition = $ligne["EDITION"];
                $this->description = $ligne["DESCRIPTION"];
                $this->nomimg= $ligne["NOMIMG"];
	}
        public function loadFromObject($x) {
        $this->isbn = $x->ISBN;
        $this->titre_livre = $x->TITRE_LIVRE;
        $this->edition = $x->EDITION;
        $this->auteur = $x->AUTEUR;
        $this->annee = $x->ANNEE;
        $this->description = $x->DESCRIPTION;
        $this->langue = $x->LANGUE;
        $this->nomimg = $x->NOMIMG;
        $this->mots_cles = $x->MOTS_CLES;
      
        
        
         
    }

}
