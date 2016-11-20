<?
class Phone{

	public function __construct()
	{
		# code...
	}

	public function getInstance(
    	$number,$idPerson = null, $id = null
	)
	{
    	$this->number = $number;
    	$this->idPerson = $idPerson; 
    	$this->id = $id;
    	return $this;	
	}

	private $id;
	private $number;
	private $idPerson;

	public function setId($id){$this->id = $id;}
	public function getId(){return $this->id;}	

	public function setNumber($number){$this->number = $number;}
	public function getNumber(){return $this->number;}

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

}