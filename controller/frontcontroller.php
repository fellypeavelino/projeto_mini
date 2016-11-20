<?

class Frontcontroller{

	public function __construct()
	{
		$url = $_SERVER['SERVER_NAME']. $_SERVER ['REQUEST_URI'];
		$param = explode ('/',$url);
		$pathController  = $this->pathInstace($param[1]);
		$controller = $this->newInstace($param[1]);
		
		if(file_exists(dirname(__FILE__)."/".$pathController.".php")){
			require_once "{$pathController}.php";	
		}else{
			require_once "404/index.php";	
		}
		$class = new $controller();
		$action = (!empty($param[2]) ? $param[2] : "index");
		$call = call_user_func_array(array($class, $action), $this->param($param));
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

	private function param($param)
	{
		if(isset($param[3])){
			unset($param[0]);
			unset($param[1]);
			unset($param[2]);
			return $param;
		}
		return [];
	}

}