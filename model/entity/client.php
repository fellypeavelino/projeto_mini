<?
abstract class Client{

	public function __construct(
        $name,$login,
    	$password, $id=null
	)
	{
    	$this->name = $name;
    	$this->login = $login;
    	$this->password = $password;
    	$this->id = $id;		
	}

	private $id;
	private $name;
	private $login;
	private $password;
	
	private $listPhone;
	private $listMail;
	private $listAdress;
	

	public function setId($id){$this->id = $id;}
	public function getId(){return $this->id;}

	public function setName($name){$this->name = $name;}
	public function getName(){return $this->name;}

	public function setlogin($login){$this->login = $login;}
	public function getlogin(){return $this->login;}

	public function setPassword($password){$this->password = $password;}
	public function getPassword(){return $this->password;}	

	public function setListPhone($listPhone){$this->listPhone = $listPhone;}
	public function getListPhone(){return $this->listPhone;}

	public function setListMail($listMail){$this->listMail = $listMail;}
	public function getListMail(){return $this->listMail;}	

	public function setListAdress($listAdress){$this->listAdress = $listAdress;}
	public function getListAdress(){return $this->listAdress;}	
}