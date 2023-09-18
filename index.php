<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia FaceBol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="text-center">Registro de Asistencia</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <!-- <label for="">Id</label> -->
                                <input type="hidden" name="idp" id="idp" value="">
                                <!-- <input type="text" name="idp" id="idp" placeholder="Digite Aqui" class="form-control"> -->
                            </div>
                            <div class="form-group">
                                <label for="">Codigo</label>
                                <input type="text" name="codigo" id="codigo" placeholder="Digite Aqui" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Digite Aqui" class="form-control">
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" placeholder="cantidad" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <input type="button" value="Registrar" id="registrar" class="btn btn-success btn-block">
                            </div>
                        </form>
                    </div>
                    
                </div>
                <!-- RELOJ -->
                <div class="w-100 h-25 d-flex align-items-center">
                    <div class="w-100">
                        <h2 class="text-center"><b><span id="date"></span></b></h2>
                        <h5 class="text-center" style="font-size: 44px;"><b><span id="time"></span></b></h5>
                        <!-- <input type="hidden" id="date_time" value=""> -->
                    </div>
                </div>

            </div>

            
            

            

            <div class="col-lg-8">
                
            <table class="table table-hover table-resposive">
                    <thead class="thead-white">
                        <tr>
                            <th>
                                <h3>Lista de Asistencia</h3>
                            </th>
                            <td>
                                <button class="btn btn-success btn-sm py-1 rounded-3" type="button" id="print"><i class="fa fa-print"></i> Imprimir</button>
                            </td>
                            
                        </tr>
                    </thead>
                    
                </table>
            
            
                <div class="row">
                    
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Nombre</th> 
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    
    <?php include 'scripts.php' ?>
    <script type="text/javascript">
$(function() {

    moment.locale('es');
  var interval = setInterval(function() {
    var momentNow = moment();
    //$('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#date').html(momentNow.format('l')); 
    //$('#date').html(moment().subtract(10, 'days').calendar();); 
    $('#time').html(momentNow.format('hh:mm:ss A'));
    
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>

</html>