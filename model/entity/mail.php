<?
class Mail{

	public function __construct()
	{
		# code...
	}

	public function getInstance(
    	$mail,$idPerson = null, $id = null
	)
	{
    	$this->mail = $mail;
    	$this->idPerson = $idPerson; 
    	$this->id = $id;
    	return $this;	
	}

	private $id;
	private $mail;
	private $idPerson;

	public function setId($id){$this->id = $id;}
	public function getId(){return $this->id;}	

	public function setMail($mail){$this->mail = $mail;}
	public function getMail(){return $this->mail;}

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

}