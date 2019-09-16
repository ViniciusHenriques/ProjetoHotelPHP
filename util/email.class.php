<?php
class Email{

	private $para;
	private $assunto;
	private $mensagem;

	public function __construct($mensagem){
		$this->para = "vinicius9194@gmail.com";
		$this->assunto = "Contato via site";
		$this->mensagem = $mensagem;
	}

	/* Método que envia o email através da função mail() */
	public function enviarEmail(){

  	$cabecalho = 'From: vinicius9194@gmail.com' . "\r\n" .
                 'Reply-To: vinicius9194@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

		mail($this->para, $this->assunto, $this->mensagem, $cabecalho);
	}//fecha método enviarEmail
}//fecha class Email
?>
