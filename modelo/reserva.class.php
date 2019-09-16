<?php
class Reserva{

  private $idReserva;
  private $dataEntrada;
  private $dataSaida;
  private $hospede;
  private $quarto;
  private $funcionario;





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
