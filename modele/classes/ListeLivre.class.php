<?php
require_once('./modele/classes/Navigable.interface.php');

class ListeLivre implements Navigable {
	private $livres;
	private $current = -1;

	public function __construct()	//Constructeur
	{
		$this->livres = array();
	}	
	
	public function add($livre)
	{
			array_push($this->livres,$livre);
	}
	
	public function previous()
	{
		if ($this->current>0)
		{
			$this->current--;
			return true;
		}
		return false;
	}
	public function next()
	{
		if ($this->current<count($this->livres)) 
		{
			$this->current++;
			return true;
		}
		return false;
	}
        
	public function printCurrent()
	{
			if (isset($this->livres[$this->current]))
				echo $this->livres[$this->current];
	}
	public function getCurrent()
	{
		if (isset($this->livres[$this->current]))
			return $this->livres[$this->current];
		return null;	
	}	
	public function size()
	{
		return count($this->livres);
	}
}
?>