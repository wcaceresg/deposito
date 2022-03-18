<?php
require __DIR__ . '/../../../../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class DepositoEntidad{
    private $conexion;
    private $tipo_deposito_nombre;
    private $moneda;
    public function __construct() {
    	//parent::__construct();
        //$cn=new Conection_Central();
        //$this->conexion=$cn->getConnection();
    }  
	public function Imprimir_ticket($data){
	   	$data=json_decode($data);
 	   //var_dump($data->tipo_deposito);
            try{ 
                if($data->tipo_moneda==0){
                	$this->tipo_deposito_nombre="SOLES";
                	$this->moneda="S/";
                }else{
                	$this->tipo_deposito_nombre="DOLARES";
                	$this->moneda="$";
                }  
                $connector=new WindowsPrintConnector("smb://".TICKETERA_PC_USUARIO."@".TICKETERA_PC_NOMBRE."/".TICKETERA_NOMBRE.""); 
                $printer = new Printer($connector);
                $testStr = "ELQUELEESTO";
                $printer -> setJustification(Printer::JUSTIFY_CENTER);
		        //$printer->setTextSize(2,2);
		        $printer->setEmphasis(true);                
                $printer -> text("".strtoupper($data->tipo_deposito)."\n");
                //$printer->setTextSize(1,1);
                //$printer->setEmphasis(false);
                $printer -> text("".TIENDA_NOMBRE." ".$data->fecha."\n");
                $printer -> text("\n");
                $printer -> setJustification(Printer::JUSTIFY_LEFT);
                $printer -> text("CIA: ".str_pad(strtoupper($data->nro_cta),30," ")."".str_pad("DIV:".$this->tipo_deposito_nombre."",13," ",STR_PAD_LEFT)."\n");
                $printer -> text("TIT: ".strtoupper($data->titular)."\n");
                //$printer -> text("\n");
                $printer -> text("REF: ".strtoupper($data->tipo_deposito)."\n");
                //$printer -> text("\n");
                //$printer -> text("\n");
                $printer -> text("".str_pad(wordwrap("IMPORTE" ,21, "  " ,TRUE), 27," ")."    ".$this->moneda." ".str_pad(number_format($data->importe , 2, '.', ' '),14," ",STR_PAD_LEFT)."\n");
                //$printer -> text("\n");
                //$printer -> text("\n");
                //$printer -> text("\n");
                //$printer -> text("\n");
                //$printer -> text("\n");
                $printer -> text("".str_pad(wordwrap("C/C ITF (".$data->factor_ift."%)" ,21, "  " ,TRUE), 27," ")."    ".$this->moneda." ".str_pad(number_format($data->itf , 2, '.', ' '),14," ",STR_PAD_LEFT)."\n");
                $printer -> text("\n");
                $printer -> text("\n");
                $printer -> text("CLAVE: ".PIE_PAGINA."\n");
                $printer -> text("\n");
			    $printer -> cut();
			    $printer -> close();

                $response=array("success"=>true,"message"=>"Impresión exitosa");
                echo json_encode($response);
			  } catch (Exception $e) {
			    //echo $e;
                $response=array("success"=>false,"message"=>"Error al imprimir","error"=>$e);
                 echo json_encode($response);
			  }

	}
}
?>
