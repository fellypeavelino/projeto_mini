<?
class PhoneController{

	public function __construct()
	{
		require_once('helper/helper.php');
		require_once('model/phoneModel.php');
		require_once('model/entity/phone.php');
	}

	public function _list($id,$phone_id=null)
	{
		$phoneModel = new PhoneModel();
		$phone = new Phone();

		if($phone_id != null){
			$this->update($phone,$id,$phone_id);
			$phone = $phoneModel->get($phone_id)[0];
		}elseif(count($_POST) > 0){
			$phone->getInstance(
				$_POST["number"],$id
			);
			$debug = $phoneModel->insert($phone);
		}
		$list = $phoneModel->listByClient($id);
		require_once('view/phone/list.php');
	}

	private function update($phone,$id,$phone_id){
		if(count($_POST) > 0){
			$phone->getInstance(
				$_POST["number"],$id,$phone_id
			);
			(new PhoneModel)->update($phone);
		}
	}

	public function del($id,$phone_id)
	{
		(new PhoneModel)->delete($phone_id);
		header("Location:/phone/_list/".$id);
	}

}