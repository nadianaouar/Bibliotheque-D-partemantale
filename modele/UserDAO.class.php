<?php
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/User.class.php'); 

class UserDAO
{	
	public static function find($id)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM user WHERE EMAIL = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$p = new User();

		if ($result)
		{
			$p->setEmail($result->EMAIL);
			$p->setNom($result->NOM);
                        $p->setPrenom($result->PRENOM);
                        $p->setCle($result->CLE);
                        $p->setMotdepasse($result->MOTDEPASSE);
                        $p->setTelephone($result->TELEPHONE);
                        $p->setTypeUser($result->TYPEUSER);
                        
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		return null;
	}	

 public static function createUser($user)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("INSERT INTO user (EMAIL,NOM,PRENOM,CLE,MOTDEPASSE,TELEPHONE,TYPEUSER)".
                                                  " VALUES (:e,:n,:p,:c,:mp,:t,:u)");
                $pstmt->execute(array(':e' => $user->getEmail(),
                                      ':n' => $user->getNom(),
                                      ':p' => $user->getPrenom(),
                                      ':c' => $user->getCle(),
                                      ':mp' => $user->getMotdepasse(),
                                      ':t' => $user->getTelephone(),
                                      ':u' =>$user->getTypeUser()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                $db = null;
            }
            catch (PDOException $ex){
                throw $ex;
            }
    }           
}
?>