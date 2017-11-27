<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cours {

    private $code_cours; 
    private $titre_cours; 
    
    
    function getCode_cours() {
        return $this->code_cours;
    }

    function getTitre_cours() {
        return $this->titre_cours;
    }

    function setCode_cours($code_cours) {
        $this->code_cours = $code_cours;
    }

    function setTitre_cours($titre_cours) {
        $this->titre_cours = $titre_cours;
    }

 
       public function loadFromRecordCours($ligne)
	{
		$this->code_cours = $ligne["CODE_COURS"];
		$this->titre_cours = $ligne["TITRE_COURS"];
		
	}
    
     public function loadFromObjectCours($x)
	{
    
        $this->code_cours= $x->CODE_COURS;
        $this->titre_cours= $x->TITRE_COURS;
		
        }
    
    
    
    
    
    
    
}