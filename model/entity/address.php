<?
class Address{

	public function __construct()
	{
		# code...
	}

	public function getInstance(
    	$number,$street, $district, 
    	$city, $state,
    	$idPerson = null, $id = null
	)
	{
    	$this->number = $number;
    	$this->street = $street;
    	$this->district = $district;
    	$this->city = $city;
    	$this->state = $state;
    	$this->idPerson = $idPerson; 
    	$this->id = $id;
    	return $this;	
	}

	public $id;
	public $number;
	public $idPerson;
	public $street; 
	public $district;
	public $city; 
	public $state;

	public function setId($id){$this->id = $id;}
	public function getId(){return $this->id;}	

	public function setNumber($number){$this->number = $number;}
	public function getNumber(){return $this->number;}

	public function setIdPerson($idPerson){$this->idPerson = $idPerson;}
	public function getIdPerson(){return $this->idPerson;}	

	public function setStreet($street){$this->street = $street;}
	public function getStreet(){return $this->street;}	

	public function setDistrict($district){$this->district = $district;}
	public function getDistrict(){return $this->district;}

	public function setCity($city){$this->city = $city;}
	public function getCity(){return $this->city;}	

	public function setState($state){$this->state = $state;}
	public function getState(){return $this->state;}	
}