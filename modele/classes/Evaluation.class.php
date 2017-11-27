<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Evaluation {
  
    private $E_codecours;
    private $E_email;
    private $E_isbn;
    private $E_descEvaluation;
    private $E_Note;
    
    function getE_codecours() {
        return $this->E_codecours;
    }

    function getE_email() {
        return $this->E_email;
    }

    function getE_isbn() {
        return $this->E_isbn;
    }

    function getE_descEvaluation() {
        return $this->E_descEvaluation;
    }

    function getE_Note() {
        return $this->E_Note;
    }

    function setE_codecours($E_codecours) {
        $this->E_codecours = $E_codecours;
    }

    function setE_email($E_email) {
        $this->E_email = $E_email;
    }

    function setE_isbn($E_isbn) {
        $this->E_isbn = $E_isbn;
    }

    function setE_descEvaluation($E_descEvaluation) {
        $this->E_descEvaluation = $E_descEvaluation;
    }

    function setE_Note($E_Note) {
        $this->E_Note = $E_Note;
    }

 public function loadFromRecordEval($ligne)
	{
		$this->E_codecours = $ligne["CODE_COURS"];
		$this->E_email = $ligne["EMAIL"];
		$this->E_isbn = $ligne["ISBN"];
                $this->E_descEvaluation= $ligne["DESC_EVALUATION"];
                $this->E_Note= $ligne["NOTE"];
	}
    
    
}