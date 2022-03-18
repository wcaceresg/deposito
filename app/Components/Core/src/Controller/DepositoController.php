<?php 
include  __DIR__ .'/../Model/Ideposito.php';
include  __DIR__ .'/../Model/Impl/Deposito.php';
require __DIR__ . '/../../../../../config.php';
class DepositoController implements Ideposito
{
 public function register_deposito($datos){
 	 $data=new DepositoEntidad;
 	 $data->Imprimir_ticket($datos);  
 } 

}
 ?>

