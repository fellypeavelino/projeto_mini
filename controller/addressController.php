<?

class AddressController{

	public function __construct()
	{
		require_once('helper/helper.php');
		require_once('model/addressModel.php');
		require_once('model/entity/address.php');
	}

	public function _list($id,$address_id=null)
	{
		$addressModel = new AddressModel();
		$address = new Address();

		if($address_id != null){
			$this->update($address,$id,$address_id);
			$address = $addressModel->get($address_id)[0];
		}elseif(count($_POST) > 0){
			$address->getInstance(
				$_POST["number"],$_POST["street"]
				,$_POST["district"],$_POST["city"]
				,$_POST["state"],$id
			);
			$debug = $addressModel->insert($address);
		}

		$list = $addressModel->listByClient($id);
		require_once('view/address/list.php');
	}

	private function update($address,$id,$address_id){
		if(count($_POST) > 0){
			$address->getInstance(
				$_POST["number"],$_POST["street"]
				,$_POST["district"],$_POST["city"]
				,$_POST["state"],$id,$address_id
			);
			(new addressModel)->update($address);
		}
	}

	public function del($id,$address_id)
	{
		(new addressModel)->delete($address_id);
		header("Location:/address/_list/".$id);
	}	
}