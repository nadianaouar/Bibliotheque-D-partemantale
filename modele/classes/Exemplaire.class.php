<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Exemplaire {
  
    private $code_exp;
    private $proprietaire;
    private $email_Proprietaire;
    private $detenteur;
    private $email_det;
    private $isbn_livre;
   
    function getCode_exp() {
        return $this->code_exp;
    }
    function getProprietaire() {
        return $this->proprietaire;
    }
     function getEmail_Proprietaire() {
        return $this->email_Proprietaire;
    }

    function getDetenteur() {
        return $this->detenteur;
    }

    function getEmail_det() {
        return $this->email_det;
    }

    function getIsbn_livre() {
        return $this->isbn_livre;
    }

    function setCode_exp($code_exp) {
        $this->code_exp = $code_exp;
    }

    function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }

    function setEmail_Proprietaire($email_Proprietaire) {
        $this->email_Proprietaire = $email_Proprietaire;
    }
    function setDetenteur($detenteur) {
        $this->detenteur = $detenteur;
    }

    function setEmail_det($email_det) {
        $this->email_det = $email_det;
    }

    function setIsbn_livre($isbn_livre) {
        $this->isbn_livre = $isbn_livre;
    }

public function loadFromRecordExp($ligne)
	{
		$this->code_exp = $ligne["CODE_EXP"];
		$this->proprietaire = $ligne["PROPRIETAIRE"];
                $this->email_Proprietaire= $ligne["EMAIL_PROPRIETAIRE"];
		$this->detenteur = $ligne["DETENTEUR"];
                $this->email_det = $ligne["EMAIL_DET"];
                $this->isbn_livre= $ligne["ISBN"];
	}
 
}