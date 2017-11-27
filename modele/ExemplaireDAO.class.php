<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/Exemplaire.class.php'); 

class ExemplaireDAO
{	
	public function create($l) {
            	$db = Database::getInstance();		
		try
		{ $request = "INSERT INTO exemplaire(PROPRIETAIRE,EMAIL_PROPRIETAIRE,ISBN)".
				" VALUES ('".$l->getProprietaire()."','".$l->getEmail_Proprietaire()."','".$l->getIsbn_livre()."')";
                        echo $request;
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	public static function findAll()
	{            $cnx = Database::getInstance();
		try {
                    //$liste = new Liste();

            $exemplaire = Array();
			$requete = 'SELECT * FROM exemplaire';			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$l = new Exemplaire();
				$l->loadFromRecord($row);
				array_push($exemplaire,$l);
		    }
		    $res->closeCursor();
		    $cnx = null;
			return $exemplaire;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $exemplaire;
		}	
	}	

	public static function find($id) {
             $cnx = Database::getInstance();
         try {
                        $exemplaire = new ListeLivre();			
			$requete = "SELECT * FROM exemplaire WHERE ISBN='$id'";			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$exp = new Exemplaire();
				$exp->loadFromRecordExp($row);
				$exemplaire->add($exp);
		    }
			$res->closeCursor();
		    $cnx = null;
			return $exemplaire;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $exemplaire;
		}		
            
        } 
         public function update($x) {
             $cnx = Database::getInstance();
		
              try
		{
			$request = "UPDATE exemplaire SET EMAIL_DET= '".$x->getEmail_det()."'".
				" WHERE CODE_EXP= '".$x->getCode_exp()."'";                
			return $cnx->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
        public function delete($x) 
        {
         	$cnx = Database::getInstance();
		try
		{	
                $pstmt = $cnx->prepare("delete from exemplaire where CODE_EXP=:id");
                echo 'fonction:'.$x->getCode_exp();
                $pstmt->execute(array(':id' =>$x->getCode_exp()));                      
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}        

} 
