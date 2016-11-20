<?
class ClientController{

	public function __construct()
	{
		require_once('helper/helper.php');
		require_once('model/clientModel.php');
	}

	public function index()
	{
		$list = (new ClientModel)->_list();
		require_once('view/client/list.php');
	}

	public function listAjax()
	{
		$list = (new ClientModel)->_list();
		require_once('view/client/list10.php');		
	}

	public function add($id="")
	{
		require_once('view/client/add.php');
	}

	public function addAjax()
	{
		unset($_POST["person"]);
		$person = null;
		if (isset($_POST["cpf"])) {
			require_once('model/entity/physicalPerson.php');
			$person = (new PhysicalPerson)->getInstance(
				$_POST["name"],$_POST["login"]
				,$_POST["password"],$_POST["cpf"]
			);
		}else{
			require_once('model/entity/legalPerson.php');
			$person = (new LegalPerson)->getInstance(
				$_POST["name"],$_POST["login"]
				,$_POST["password"],$_POST["cnpj"]
			);
		}
		(new ClientModel)->insert($person);
		//echo get_class($person);
	}

	public function view($id)
	{
		echo $id;
		require_once('view/client/view.php');
	}

	public function edit($id)
	{
		if(count($_POST) > 0){
			unset($_POST["person"]);
			$person = null;
			if (isset($_POST["cpf"])) {
				require_once('model/entity/physicalPerson.php');
				$person = (new PhysicalPerson)->getInstance(
					$_POST["name"],$_POST["login"]
					,$_POST["password"],$_POST["cpf"]
					,$_POST["person_id"],$_POST["id"]
				);
			}elseif(isset($_POST["cnpj"])){
				require_once('model/entity/legalPerson.php');
				$person = (new LegalPerson)->getInstance(
					$_POST["name"],$_POST["login"]
					,$_POST["password"],$_POST["cnpj"]
					,$_POST["person_id"],$_POST["id"]
				);
			}
			$debug = (new ClientModel)->update($person);
		}
		$cliente = new ClientModel();
		$list = $cliente->listAll();
		$obj = $cliente->get($id)[0];
		require_once('view/client/edit.php');
	}

	public function delete($id)
	{
		(new clientModel)->delete($id);
		header("Location:/client/");
	}

}