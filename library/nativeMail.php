<?
require_once("PHPMailer/PHPMailerAutoload.php");
class NativeMail{

	public function send($post)
	{
		try{
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = 'ssl://smtp.gmail.com:465';
			$mail->SMTPDebug = true;
			$mail->SMTPSecure = "tls";
			$mail->SMTPAuth   = true;
			$mail->Username = 'pedrofelipeavelino@gmail.com';
			$mail->Password = 'batman32';

	     	$mail->SetFrom($post['from'], $post['name']); //Seu e-mail
	     	$mail->AddReplyTo($post['from'], $post['name']); //Seu e-mail
	     	$mail->Subject = $post['title'];//Assunto do e-mail  descrition	
	     	$mail->AddAddress($post['to'], '');	
	     	$mail->MsgHTML($post['descrition']); 

	     	$retorno = $mail->Send();
		    if($retorno){
		    	//echo "Mensagem enviada com sucesso</p>\n";
		    }else{
		        echo "não mandou";
		    }

	    }catch (phpmailerException $e) {
      		echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
		}
	}


}