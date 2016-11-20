<?

class Frontcontroller{

	public function __construct()
	{
		$url = $_SERVER['SERVER_NAME']. $_SERVER ['REQUEST_URI'];
		$param = explode ('/',$url);
		$pathController  = $this->pathInstace($param[1]);
		$controller = $this->newInstace($param[1]);

		require_once "{$pathController}.php";
		$class = new $controller();
		$action = (!empty($param[2]) ? $param[2] : "index");

		$call = call_user_func_array(array($class, $action), array());
	}

	private function newInstace($value)
	{
		if(empty($value)){$value = "client";}
		return ucfirst($value)."Controller";
	}

	private function pathInstace($value)
	{
		if(empty($value)){$value = "client";}
		return $value."Controller";
	}	

}