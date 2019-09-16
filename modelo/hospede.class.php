<?php
class Hospede{
  private $idHospede;
  private $nome;
  private $cpf;
  private $sexo;
  private $telefone;
  private $login;
  private $senha;
  private $numRes = 0;




  public function __construct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }
  public function __set($a,$v){
    $this->$a = $v;
  }
  public function __toString(){
    return nl2br("<p>Nome: $this->nome
                  CPF: $this->cpf
                  Sexo: $this->sexo
                  Telefone: $this->telefone
                  Login: $this->login
                  Senha: $this->senha</p>");
  }
}
