<?
require("client.php");

class LegalPerson extends Client{

	public function __construct()
	{
		# code...
	}

	public function getInstance(
    	$name,$login,
    	$password,$cnpj,
    	$idPerson = null, $id = null
	)
	{
		parent::__construct(
			$name,$login,
    		$password,$id);
    	$this->cnpj = $cnpj;
    	$this->idPerson = $idPerson; 
    	return $this;	
	}

	private $idPerson;
	private $cnpj;

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

	public function setCnpj($cnpj){$this->cnpj = $cnpj;}
	public function getCnpj(){return $this->cnpj;}

}