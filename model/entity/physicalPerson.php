<?
require("client.php");

class PhysicalPerson extends Client{

	public function __construct()
	{
		# code...
	}

	public static function getInstance(
    	$name,$login,
    	$password,$cpf,
    	$idPerson = null, $id = null
	)
	{
    	$this->name = $name;
    	$this->login = $login;
    	$this->password = $password;
    	$this->cpf = $cpf;
    	$this->idPerson = $idPerson; 
    	$this->id = $id;
    	return $this;	
	}

	private $idPerson;
	private $cpf;

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

	public function setCpf($cpf){$this->cpf = $cpf;}
	public function getCpf(){return $this->cpf;}

}