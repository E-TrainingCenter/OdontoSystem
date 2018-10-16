<?php 

require_once("../config/DB/Banco.php");

class Cargo{
    private $id_cargo;
    private $cargo;
    private $salario;

    public function getIdCargo(){
        return $this->id_cargo;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function setSalario($salario){
        $this->salario = $salario;
    }

    public function getSalario(){
        return $this->salario;
    }

    public function AdicionarCargo($cargo, $salario){
        $conn = Banco::connect();

        $stmt = $conn->prepare("INSERT INTO Cargo (cargo, salario) VALUES (:cargo, :salario)");
        
        $stmt->bindParam(":cargo", $cargo);
		$stmt->bindParam(":salario", $salario);
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetCargoById($id_cargo) {
		$conn = Banco::connect();

		$stmt = $conn->prepare("SELECT * FROM Cargo WHERE id_cargo = :id_cargo");

        $stmt->bindParam(":id_cargo", $id_cargo);
        
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
		return $results;

	}
}


?>