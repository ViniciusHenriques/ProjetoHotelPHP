<?php
require 'conexaobanco.class.php';


  class ReservaDAO{
    private $conexao = null;


    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarReserva($res){
        try{
          date_default_timezone_set('America/Sao_Paulo');
          $date = date('Y-m-d');


          $stat = $this->conexao->prepare("insert into reserva(idReserva,dataEntrada,dataSaida,idQuarto,idHospede,idFuncionario)values(null,?,?,?,?,?);
          update quarto set idHospede=?,idFuncionario=? where idQuarto=?;
          update hospede set numRes=numRes+1 where idHospede=?;
          update funcionario set numRes=numRes+1 where idFuncionario=?;
        ");

          $stat->bindValue(1,$res->dataEntrada);
          $stat->bindValue(2,$res->dataSaida);
          $stat->bindValue(3,$res->quarto);
          $stat->bindValue(4,$res->hospede);
          $stat->bindValue(5,$res->funcionario);

          if ($date >= $dataEntrada && $data<=$dataSaida) {

            $stat->bindValue(6,$res->hospede);
            $stat->bindValue(7,$res->funcionario);
            $stat->bindValue(8,$res->quarto);
            $stat->bindValue(9,$res->hospede);
            $stat->bindValue(10,$res->funcionario);
          
          }
          
          $stat->execute();

        }catch(PDOException $e){
          echo "Erro ao cadastrar! ".$e;
        }

    }
    public function UpdateReserva($res){
        try{
          $stat = $this->conexao->prepare("update quarto set idReserva=? where idQuarto=?;
          ");
          $stat->bindValue(1,$res->idReserva);
          $stat->bindValue(2,$res->quarto);

          $stat->execute();
        }catch(PDOException $e){
          echo "Erro ao cadastrar! ".$e;
        }

    }
    public function buscarIdReserva($res){
      try {

        $stat = $this->conexao->query("select * from reserva where idQuarto='$res->quarto'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'reserva');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Reserva!".$pe;
      }
    }//fecha método

    public function buscarReserva(){
      try {

        $stat = $this->conexao->query("select * from reserva ");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'reserva');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Reserva!".$pe;
      }
    }//fecha método
    public function consultaReserva($login){
      try {
        $stat = $this->conexao->query("select * from reserva where idHospede='$login'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'reserva');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar !".$pe;
      }
    }//fecha método


                     //where idlivro=1
    public function filtrar($query){
      try{
        $stat=$this->conexao->query("select * from reserva ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'reserva');
        return $array;
      }catch(PDOException $e){
        echo "Erro ao filtrar! ".$e;
      }//fecha catch
    }//fecha filtrar

    public function deletarReserva($id,$idQ,$idH,$idF){
      try {
        $stat = $this->conexao->prepare(
          "delete from reserva where idReserva = ?;
          update quarto set idHospede=?,idFuncionario=?,idReserva=? where idQuarto = ?;
          update hospede set numRes=numRes-1 where idHospede=?;
          update funcionario set numRes=numRes-1 where idFuncionario=?;
          ");
        $stat->bindValue(1, $id);
        $stat->bindValue(2,0);
        $stat->bindValue(3,0);
        $stat->bindValue(4,0);
        $stat->bindValue(5,$idQ);
        $stat->bindValue(6,$idH);
        $stat->bindValue(7,$idF);


        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao excluir reserva! ".$e;
      }
    }//fecha deletarLivro
    public function alterarReserva($res){
      try{
        $stat=$this->conexao->prepare("update reserva set dataEntrada=?,dataSaida=?,idQuarto=? where idReserva=?");

        $stat->bindValue(1,$res->dataEntrada);
        $stat->bindValue(2,$res->dataSaida);
        $stat->bindValue(3,$res->quarto);
        $stat->bindValue(4,$res->idReserva);
        $stat->execute();
      }catch(PDOException $e){
        echo "erro ao alterar hospede!".$e;
      }//fechacatch
    }//fecha alterarLivro

    public function gerarJSON(){
      try {
        $stat = $this->conexao->query("select * from reserva");
        return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
      } catch (PDOException $pe) {
        echo "Erro ao gerar JSON".$pe;
      }
    }


      public function buscarFuncionario(){
        try {

          $stat = $this->conexao->query("select * from funcionario");
          $array = $stat->fetchAll(PDO::FETCH_CLASS,'funcionario');

          return $array;
        }catch(PDOException $pe){
          echo "erro ao buscar Funcionarios!".$pe;
        }
      }
      public function buscarQuarto(){
        try {
          $stat = $this->conexao->query("select * from quarto");
          $array = $stat->fetchAll(PDO::FETCH_CLASS, 'quarto');
          return $array;//NÃO ESQUECER
        }catch(PDOException $pe){
          echo "erro ao buscar Quartos!".$pe;
        }
      }//fecha método


      public function buscarHospede($id){
        try {
          $stat = $this->conexao->query("select * from hospede where login='$id'");
          $array = $stat->fetchAll(PDO::FETCH_CLASS, 'hospede');
          return $array;//NÃO ESQUECER
        }catch(PDOException $pe){
          echo "erro ao buscar Hospedes!".$pe;
        }
      }//fecha método

      public function buscarIdFunc($id){
        try {
          $stat = $this->conexao->query("select * from funcionario where login='$id'");
          $array = $stat->fetchAll(PDO::FETCH_CLASS, 'funcionario');
          return $array;//NÃO ESQUECER
        }catch(PDOException $pe){
          echo "erro ao buscar !".$pe;
        }
      }//fecha método


    }
