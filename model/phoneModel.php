<?

require_once("dao.php");

class PhoneModel{

	public function listByClient($id){
		$sql = "select * from phone where client_id = :client_id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":client_id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function get($id)
	{
		$sql = "select * from phone where id = :id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);		
	}

	public function insert($obj){
		$data = array();
		try{
			$sql = "insert into phone (phone,client_id) 
			values (:number,:client_id);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":number",$obj->getNumber());
			$insert->bindParam(":client_id",$obj->getIdPerson());
			$insert->execute();
			$obj->setId(DB::lastInsertId());
			$data["success"] = true;
			$data["phone"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function update($obj)
	{
		$data = array();
		try{
			$sql = "UPDATE phone SET phone=:phone WHERE id = :id";
			$update = DB::prepare($sql);
			$update->bindParam(":phone",$obj->getNumber());
			$update->bindParam(":id",$obj->getId());
			$update->execute();
			$data["success"] = true;
			$data["phone"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function delete($id){
		$data = array();
		try{
			$sql = "delete from phone WHERE id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["phone"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;				
	}		

}