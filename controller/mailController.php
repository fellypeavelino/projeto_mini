<?

class mailController{

	public function __construct()
	{
		require_once('helper/helper.php');
		require_once('model/mailModel.php');
		require_once('model/entity/mail.php');
	}

	public function _list($id,$mail_id=null)
	{
		$mailModel = new MailModel();
		$mail = new Mail();
		$email = $mail->getMail();

		if($mail_id != null){
			$this->update($mail,$id,$mail_id);
			$mail = $mailModel->get($mail_id)[0];
			$email = $mail->mail;
		}elseif(count($_POST) > 0){
			$mail->getInstance(
				$_POST["mail"],$id
			);
			$debug = $mailModel->insert($mail);
		}

		$list = $mailModel->listByClient($id);
		require_once('view/mail/list.php');
	}

	private function update($mail,$id,$mail_id){
		if(count($_POST) > 0){
			$mail->getInstance(
				$_POST["mail"],$id,$mail_id
			);
			(new mailModel)->update($mail);
		}
	}

	public function del($id,$mail_id)
	{
		(new mailModel)->delete($mail_id);
		header("Location:/mail/_list/".$id);
	}	
}