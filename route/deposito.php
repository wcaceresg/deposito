<?php 
include  __DIR__ .'/../app/Components/Core/src/Controller/DepositoController.php';
$route=$_SERVER["REQUEST_URI"];
if(strpos($route,"register"))
{
	if(isset($_POST['registrar_desposito'])){
		//deposito/register
		$val=new DepositoController();
		$val->register_deposito(@$_POST['registrar_desposito']);		
	}

}
else{
	
}


 ?>