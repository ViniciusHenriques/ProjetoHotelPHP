<?php
require 'conexaobanco.class.php';
  class FuncionarioDAO{
    private $conexao = null;
    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarFuncionario($fun){
      try{
        $stat = $this->conexao->prepare("insert into funcionario(idFuncionario,nome,telefone,cpf,login,senha)values(null,?,?,?,?,?)");

        $stat->bindValue(1,$fun->nome);
        $stat->bindValue(2,$fun->telefone);
        $stat->bindValue(3,$fun->cpf);
        $stat->bindValue(4,$fun->login);
        $stat->bindValue(5,$fun->senha);
        $stat->execute();
      }catch(PDOException $e){
        echo "Erro ao cadastrar! ".$e;
      }

    }
    public function buscarIdFunc($id){
      try {
        $stat = $this->conexao->query("select * from funcionario where login='$id'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'funcionario');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar !".$pe;
      }
    }//fecha método
    public function buscarFuncionario(){
      try {
        $stat = $this->conexao->query("select * from funcionario");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Funcionario');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Funcionarios!".$pe;
      }
    }//fecha método
                     //where idlivro=1
    public function filtrar($query){
      try{
        $stat=$this->conexao->query("select * from funcionario ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Funcionario');
        return $array;
      }catch(PDOException $e){
        echo "Erro ao filtrar! ".$e;
      }//fecha catch
    }//fecha filtrar

    public function deletarFuncionario($id){
      try {
        $stat = $this->conexao->prepare(
          "delete from funcionario where idFuncionario = ?");
        $stat->bindValue(1, $id);
        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao excluir funcionário! ".$e;
      }
    }//fecha deletarLivro
    public function alterarFuncionario($fun){
      try{
        $stat=$this->conexao->prepare("update funcionario set nome=?,telefone=?,cpf=?, login=?,senha=? where idFuncionario=?");
        $stat->bindValue(1,$fun->nome);
        $stat->bindValue(2,$fun->telefone);
        $stat->bindValue(3,$fun->cpf);
        $stat->bindValue(4,$fun->login);
        $stat->bindValue(5,$fun->senha);
        $stat->bindValue(6,$fun->idFuncionario);
        $stat->execute();
      }catch(PDOException $e){
        echo "erro ao alterar funcionario!".$e;
      }//fechacatch
    }//fecha
    public function verificarFuncionario($u){
      try {
          $stat = $this->conexao->query("select * from funcionario where login='$u->login' and senha='$u->senha'");
          $usuario = null;
          $usuario = $stat->fetchObject('Funcionario');
          return $usuario;
      } catch (PDOException $ex) {
          echo 'Erro ao verificar! '.$ex;
      }//fecha catch
    }
    public function gerarJSON(){
      try {
        $stat = $this->conexao->query("select * from funcionario");
        return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
      } catch (PDOException $pe) {
        echo "Erro ao gerar JSON".$pe;
      }
    }
    public function validarFuncionario($login){
      try {
        $stat = $this->conexao->query("select * from funcionario where login = '$login'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'funcionario');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar !".$pe;
      }
    }//fecha método

  }
