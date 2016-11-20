<?
require("client.php");

class PhysicalPerson extends Client{

	public function __construct()
	{

	}

	public function getInstance(
    	$name,$login,
    	$password,$cpf,
    	$idPerson = null, $id = null
	)
	{
		parent::__construct(
			$name,$login,
    		$password,$id);
    	$this->cpf = $cpf;
    	$this->idPerson = $idPerson; 
    	return $this;	
	}

	private $idPerson;
	private $cpf;

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

	public function setCpf($cpf){$this->cpf = $cpf;}
	public function getCpf(){return $this->cpf;}

}