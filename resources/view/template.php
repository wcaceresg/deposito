<?php  date_default_timezone_set('America/Lima'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="robots" content="noindex"‎>
    <meta name="googlebot" content="noindex"‎>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registra tu dirección</title>
</head>
<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/deposito.png" alt="" width="72" height="72">
    <h2>Deposito</h2>
    <p class="lead">Ejemplo</p>
  </div>

  <div class="row">
  <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Leyenda</span>    
      </h4>
      <div class="Ygf454">
      </div>
   </div>

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Datos</h4>
       <div class="row">
	        <div class="col-md-4 mb-3">
	         <input type="date" class="form-control" id="fecha" value="<?php echo date('Y-m-d') ?>" >
	        </div>
        </div>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="type-deposito">Tipo</label>
            <select class="custom-select d-block w-100" id="type-deposito" required>
              <option value="Deposito en efectivo">Deposito en efectivo</option>
              
            </select>
            <div class="invalid-feedback">
              Por favor seleccione un tipo de deposito.
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <label for="nro-cta">Cta</label>
            <input type="text" class="form-control" id="nro-cta" placeholder="0011-0857-00-0200302915" value="" required>
            <div class="invalid-feedback">
              Cta es obligatorio.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="titular">Titular</label>
            <input type="text" class="form-control" id="titular" placeholder="EMPRESA S.A.C" value="" required>
            <div class="invalid-feedback">
              El nombre del titular es obligatorio.
            </div>
          </div>
        </div>

        <h4 class="mb-3">Tipo de moneda</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="soles" name="moneymethod" type="radio" class="custom-control-input" value="0"  checked required>
            <label class="custom-control-label" for="soles">Soles</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="dolares" name="moneymethod" type="radio" class="custom-control-input" value="1"  required>
            <label class="custom-control-label" for="dolares">Dolares</label>
          </div>

        </div>
        
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="importe">Importe</label>
            <input type="text" class="form-control" id="importe" placeholder="00.00" value="" required>
            <div class="invalid-feedback">
              Importe es obligatorio.
            </div>
          </div>        	
        </div>

  




        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 TI SOLUTION S.A.C</p>
    <ul class="list-inline">

    </ul>
  </footer>
</div>


</html>