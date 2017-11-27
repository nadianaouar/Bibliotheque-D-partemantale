<?php
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/Cours.class.php'); 

class CoursDAO
{
    
	public static function findAll()
	{
		try {
			$cours = Array();
			$requete = 'SELECT * FROM cours';
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$c = new Cours();
				$c->loadFromRecordCours($row);
				array_push($cours,$c);
		    }
			$res->closeCursor();
		    $cnx = null;
			return $cours;
		} catch (PDOException $e) {
		  print "Error!: " . $e->getMessage() . "<br/>";
		  return $cours;
		}	
	}
        
        
        public static function find($id) {
            $cnx = Database::getInstance();
         try {
			
		
		        $pstmt =  $cnx->prepare("SELECT * FROM cours WHERE CODE_COURS=:x ");
                        $pstmt->execute(array(':x' => $id));
			
			
			$result = $pstmt->fetch(PDO::FETCH_OBJ);
		   if($result) {
				$l = new Cours();
				$l-> loadFromRecordCours($result);
				
		    }
			 $pstmt->closeCursor();
		         $cnx = null;
			return $l;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $l;
		}		
            
        } 
         public static function findCode($titre) {
            $cnx = Database::getInstance();
            $pstmt =  $cnx->prepare("SELECT * FROM cours WHERE TITRE_COURS=:x ");
                        $pstmt->execute(array(':x' => $titre));
			
			
			$result = $pstmt->fetch(PDO::FETCH_OBJ);
		         if($result) {
				$l = new Cours();
				$l-> loadFromObjectCours($result);
				return $l;
		    }
			
		$pstmt->closeCursor();
		return null;
	}
    
        
        } 
                
                

