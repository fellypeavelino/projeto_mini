<?
require("client.php");

class LegalPerson extends Client{

	public function __construct()
	{
		# code...
	}

	public static function getInstance(
    	$name,$login,
    	$password,$cnpj,
    	$idPerson = null, $id = null
	)
	{
    	$this->name = $name;
    	$this->login = $login;
    	$this->password = $password;
    	$this->cnpj = $cnpj;
    	$this->idPerson = $idPerson; 
    	$this->id = $id;
    	return $this;	
	}

	private $idPerson;
	private $cnpj;

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

	public function setCnpj($cnpj){$this->cnpj = $cnpj;}
	public function getCnpj(){return $this->cnpj;}

}