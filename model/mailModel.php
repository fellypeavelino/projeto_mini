<?

require_once("dao.php");

class mailModel{

	public function listByClient($id){
		$sql = "select * from mail where client_id = :client_id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":client_id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function get($id)
	{
		$sql = "select * from mail where id = :id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);		
	}

	public function insert($obj){
		$data = array();
		try{
			$sql = "insert into mail (mail,client_id) 
			values (:mail,:client_id);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":mail",$obj->getMail());
			$insert->bindParam(":client_id",$obj->getIdPerson());
			$insert->execute();
			$obj->setId(DB::lastInsertId());
			$data["success"] = true;
			$data["mail"] = $obj;
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
			$sql = "UPDATE mail SET mail=:mail WHERE id = :id";
			$update = DB::prepare($sql);
			$update->bindParam(":mail",$obj->getMail());
			$update->bindParam(":id",$obj->getId());
			$update->execute();
			$data["success"] = true;
			$data["mail"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function delete($id){
		$data = array();
		try{
			$sql = "delete from mail WHERE id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["mail"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;				
	}	

}