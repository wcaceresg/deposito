import "../css/index.css";
import "../css/bootstrap/bootstrap.min.css";
import "../css/sweetalert/sweetalert.css";
import 'bootstrap';
import "../lib/form-validation.js";
import "../lib/sweetalert.js";
/*import $ from "../lib/jquery-1.11.3.min.js";
window.jQuery = $;
window.$ = $;
*/
/*window.$ = window.jQuery = require('jquery');
require('bootstrap');
*/
var operaciones=require("./Inicio/index.js")
 
console.log(operaciones.suma(2,2));
console.log(operaciones.resta(5,2));
  var geocoder;
  var map;
  var marker;
  var infowindow;
  var markersArray = [];
  var Data_List_address=[];
  var Data_Tienda="";
  var Data_MerchantId=0;
  var url_string =window.location.href;
  var url = new URL(url_string);
  var token_wa=null;
  var number_wa=null;

   // oficial
   var itf=0;
   var factor_ift=0.001;
 


$(document).ready(function(){
 calculate_operation();
});
function sleep_chkout (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}
$('input[type=radio][name=moneymethod]').change(function() {
    calculate_operation();
});
$('#importe').on('keyup',function() {
    calculate_operation();
});
function calculate_operation(){
   var tipo_moneda=$('input[name="moneymethod"]:checked');
   var importe=$("#importe").val();
   var message='<ul>';
    if(tipo_moneda.val() ==="0"){
        message=message+`<li class="list-group-item d-flex justify-content-between">
          <span>Importe (SOLES)</span>
          <strong>S/ ${importe}</strong>
        </li>`;    
    }else{
      message=message+`<li class="list-group-item d-flex justify-content-between">
          <span>Importe (USD)</span>
          <strong>$ ${importe}</strong>
        </li>`;
      
    }
     if(importe!==''){
       itf=parseFloat(parseFloat(importe)*parseFloat(factor_ift))/100;
       //alert(itf); 
     }

      message=message+`<li class="list-group-item d-flex justify-content-between">
          <span>ITF (${factor_ift}%)</span>
          <strong>${itf.toFixed(2)}</strong>
        </li></ul>`;

      $(".Ygf454").html(message);




}
$(document).on('submit',function(event){  
   event.preventDefault();
   var validar = [];
   var formulario= [];
   var objformulario= new Array();
   var itemformulario={};
   var tipo_deposito=$("#type-deposito");
   var nro_cta=$("#nro-cta"); 
   var titular=$("#titular");
   var tipo_moneda=$('input[name="moneymethod"]:checked');
   var importe=$("#importe");
   var fecha=$("#fecha")
   

    // Enviamos
    itemformulario ["tipo_deposito"] = tipo_deposito.val();
    itemformulario ["nro_cta"] = nro_cta.val();
    itemformulario ["titular"] = titular.val();
    itemformulario ["tipo_moneda"] = tipo_moneda.val();
    itemformulario ["importe"] = importe.val();
    itemformulario ["factor_ift"]=factor_ift;
    itemformulario ["itf"]=itf.toFixed(2);
    itemformulario ["fecha"] = fecha.val();

    formulario=itemformulario;
    registrar_desposito(formulario);
    //console.log(formulario);


});
function limpiar(){
   $("#nro-cta").val("");
   $("#titular").val("");
   $("#importe").val("");
   $('input:radio[name="moneymethod"][value="0"]').attr('checked',true); 
}

function registrar_desposito(formulario){  
             var SEND_DATA =new FormData();
             var INFO=JSON.stringify(formulario);
             SEND_DATA.append('registrar_desposito',INFO);  
             console.log(formulario);       
           $.ajax({
             xhrFields: {
               withCredentials: true
              },
              beforeSend: function (xhr) {
                  $("#preloader").show();
              },
                    async : true,
                    type: "POST",
                    url:"../deposito/register",
                    data:SEND_DATA,
                    cache: false,
                    processData:false,
                    contentType:false,
             success:function(data){
                 $("#preloader").hide();
                       data = JSON.parse(data);
                       console.log(data);
                       if(data.success){
                         //limpiar();
                         //swal("", data.message , "success");
                             swal({
                                    title: data.message,
                                    text: "",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                  },
                                  function(){
                                    location.reload();
                                });

                       }else{
                         swal("", data.message , "error");
                       }
                       return;
         
                
                   


               }   
           });
}     


