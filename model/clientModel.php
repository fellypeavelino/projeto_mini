<?

require_once("dao.php");

class ClientModel{

	public function list(){
		$sql = "select * from client order by id desc";
		$consult = DB::prepare($sql);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function get($id){
		$sql = "SELECT c.*, p.cpf, p.id as p_id, l.cnpj, l.id as l_id FROM client as c 
		left JOIN PhysicalPerson as p on p.client_id = c.id 
		LEFT JOIN LegalPerson as l on l.client_id = c.id
		where c.id = :id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function listAll(){
		$sql = "SELECT c.*, p.cpf, l.cnpj FROM client as c 
		left JOIN PhysicalPerson as p on p.client_id = c.id 
		LEFT JOIN LegalPerson as l on l.client_id = c.id
		ORDER BY c.id DESC";
		$consult = DB::prepare($sql);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function insert($obj){
		$data = array();
		try{
			$sql = "insert into client (login,password,name) 
			values (:login,md5(:password),:name);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":login",$obj->getLogin());
			$insert->bindParam(":password",$obj->getPassword());
			$insert->bindParam(":name",$obj->getName());
			$insert->execute();
			$obj->setId(DB::lastInsertId());
			switch (get_class($obj)) {
				case 'LegalPerson':
					$this->insertLegal($obj);
					break;
				case 'PhysicalPerson':
					$this->insertPhysical($obj);
					break;
			}
			$data["success"] = true;
			$data["Client"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function insertLegal($obj){
		$data = array();
		try{
			$sql = "insert into LegalPerson (cnpj,client_id) 
			values (:cnpj,:client_id);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":cnpj",$obj->getCnpj());
			$insert->bindParam(":client_id",$obj->getId());
			$insert->execute();
			$obj->setIdPerson(DB::lastInsertId());
			$data["success"] = true;
			$data["legal"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;			
	}	

	public function insertPhysical($obj){
		$data = array();
		try{
			$sql = "insert into PhysicalPerson (cpf,client_id) 
			values (:cpf,:client_id);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":cpf",$obj->getCpf());
			$insert->bindParam(":client_id",$obj->getId());
			$insert->execute();
			$obj->setIdPerson(DB::lastInsertId());
			$data["success"] = true;
			$data["legal"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;			
	}	

	public function update($obj){
		$data = array();
		try{
			$sql = "
			update client set login = :login "; 
			if($obj->getPassword() != ""){
				$sql .= ",password = md5(:password) ";
			}
			$sql .= " ,name = :name
			where id = :id;";
			$insert = DB::prepare($sql);
			$insert->bindParam(":login",$obj->getLogin());
			if($obj->getPassword() != ""){
				$insert->bindParam(":password",$obj->getPassword());
			}
			$insert->bindParam(":name",$obj->getName());
			$insert->bindParam(":id",$obj->getId());
			$insert->execute();
			switch (get_class($obj)) {
				case 'LegalPerson':
					$this->updateLegal($obj);
					break;
				case 'PhysicalPerson':
					$this->updatePhysical($obj);
					break;
			}
			$data["success"] = true;
			$data["client"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;		
	}

	public function updateLegal($obj){
		$data = array();
		try{
			$sql = "UPDATE LegalPerson SET cnpj=:cnpj WHERE id = :id";
			$update = DB::prepare($sql);
			$update->bindParam(":cnpj",$obj->getCnpj());
			$update->bindParam(":id",$obj->getIdPerson());
			$update->execute();
			$data["success"] = true;
			$data["LegalPerson"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;		
	}

	public function updatePhysical($obj)
	{
		$data = array();
		try{
			$sql = "UPDATE PhysicalPerson SET cpf=:cpf WHERE id = :id";
			$update = DB::prepare($sql);
			$update->bindParam(":cpf",$obj->getCpf());
			$update->bindParam(":id",$obj->getIdPerson());
			$update->execute();
			$data["success"] = true;
			$data["PhysicalPerson"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function delete($id)
	{
		$data = array();
		try{
			$sql = "delete from adress WHERE client_id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["adress"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		
		$data = array();
		try{
			$sql = "delete from mail WHERE client_id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["mail"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}	

		$data = array();
		try{
			$sql = "delete from phone WHERE client_id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["phone"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}	


		$data = array();
		try{
			$sql = "delete from PhysicalPerson WHERE client_id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["PhysicalPerson"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}

		$data = array();
		try{
			$sql = "delete from LegalPerson WHERE client_id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["LegalPerson"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}		

		$data = array();
		try{
			$sql = "delete from client WHERE id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["cliente"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
	}
}