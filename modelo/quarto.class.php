<?php
class Quarto{

  private $idQuarto;
  private $numQuarto;
  private $status;
  private $valor;
  private $andar;
  private $estado;



  public function __construct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }
  public function __set($a,$v){
    $this->$a  = $v;
  }
  public function calcularTotal(){

    $dataInicio = new DateTime("$this->dataEntrada");
    $dataFim = new DateTime("$this->dataSaida");

    $dataIntervalo = $dataInicio->diff($dataFim);
    $total =  $dataIntervalo->days * $this->valor;
    return $total;

  }
  public function __toString(){

    $total = $this->calcularTotal();
    return nl2br("
                  <p></p>");
  }
}
