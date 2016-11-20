<?

require_once("dao.php");

class AddressModel{

	public function listByClient($id){
		$sql = "select * from adress where client_id = :client_id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":client_id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);
	}

	public function get($id)
	{
		$sql = "select * from adress where id = :id";
		$consult = DB::prepare($sql);
		$consult->bindParam(":id",$id);
		$consult->execute();
		return $consult->fetchAll(PDO::FETCH_OBJ);		
	}

	public function insert($obj){
		$data = array();
		try{
			$sql = "insert into adress (number, street, district, city, state, client_id) 
			values (:number, :street, :district, :city, :state, :client_id);";
			$insert = DB::prepare($sql);
			$insert->bindParam(":number",$obj->getNumber());
			$insert->bindParam(":street",$obj->getStreet());
			$insert->bindParam(":district",$obj->getDistrict());
			$insert->bindParam(":city",$obj->getCity());
			$insert->bindParam(":state",$obj->getState());
			$insert->bindParam(":client_id",$obj->getIdPerson());
			$insert->execute();
			$obj->setId(DB::lastInsertId());
			$data["success"] = true;
			$data["adress"] = $obj;
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
			$sql = "UPDATE adress SET number=:number, street=:street,
			district=:district,city=:city,state=:state,client_id=:client_id WHERE id = :id";
			$update = DB::prepare($sql);
			$insert->bindParam(":number",$obj->getNumber());
			$insert->bindParam(":street",$obj->getStreet());
			$insert->bindParam(":district",$obj->getDistrict());
			$insert->bindParam(":city",$obj->getCity());
			$insert->bindParam(":state",$obj->getState());
			$update->bindParam(":id",$obj->getId());
			$update->execute();
			$data["success"] = true;
			$data["adress"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;
	}

	public function delete($id){
		$data = array();
		try{
			$sql = "delete from adress WHERE id = :id";
			$delete = DB::prepare($sql);
			$delete->bindParam(":id",$id);
			$delete->execute();
			$data["success"] = true;
			$data["adress"] = $obj;
		}catch(Exception $e){
			$data["success"] = false;
			$data["error"] = $e->getMessage();
		}
		return $data;				
	}		
}