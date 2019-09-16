<?php
class Funcionario{
  private $idFuncionario;
  private $nome;
  private $telefone;
  private $cpf;
  private $login;
  private $senha;

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
                 Telefone: $this->telefone
                 CPF: $this->cpf
                 Login $this->login
                 Senha: $this->senha </p>");
  }

}
