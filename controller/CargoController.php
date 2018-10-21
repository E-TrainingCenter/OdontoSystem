<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/OdontoSystem/model/Cargo.php");

class CargoController {


	public function AdicionarCargo($novocargo, $salario) {

        $cargo = new Cargo();
        
        $cargo->AdicionarCargo($novocargo, $salario);	

    }
    
    public function GetCargo($id_cargo){
        $cargo = new Cargo();

        $resultado = $cargo->GetCargoById($id_cargo);

        return $resultado;
    }

    public function ListAll(){
        $cargo = new Cargo();

        $results = $cargo->ListAll();

        return $results;
    }

 

    
    


}



?>