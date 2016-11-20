<?

class ClientController{

	public function __construct()
	{
		require_once('helper/helper.php');
	}

	public function index()
	{
		require_once('view/client/list.php');
	}

	public function add($id="")
	{
		require_once('view/client/add.php');
	}

	public function addAjax()
	{
		
	}

	public function view($id)
	{
		require_once('view/client/view.php');
	}

}