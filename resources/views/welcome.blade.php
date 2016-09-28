<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Datos Encuesta</h3>
            </div>
        </div>    
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail2" placeholder="Buscar...">
                  </div>
                  <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    
    @if(!empty($data))
    <?php $iduser = 0; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Datos Vehiculos</h3>
            </div>
        </div>    
    </div>    
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td>Particular</td>
                        <td>Bicicleta</td>
                        <td>Motocicleta</td>
                        <td>Taxi</td>
                        <td>Publico</td>
                        <td>Repartidor</td>
                        <td>Calle Relevamiento</td>
                        <td>Calle A</td>
                        <td>Calle B</td>
                        <td>Temperatura</td>
                        <td>Condiciones</td>
                        <td>Hora</td>
                        <td>Fecha</td>
                    </tr>
                    @foreach($data[0] as $dt)
                    <?php $iduser = $dt->nombre_encuestador; ?>
                    <tr>
                        <td>{{ $dt->nombre_encuestador }}</td>
                        <td>{{ $dt->particular }}</td>
                        <td>{{ $dt->bicicleta }}</td>
                        <td>{{ $dt->motocicleta }}</td>
                        <td>{{ $dt->taxi }}</td>
                        <td>{{ $dt->publico }}</td>
                        <td>{{ $dt->repartidor }}</td>
                        <td>{{ $dt->calle_relevamiento }}</td>
                        <td>{{ $dt->calle_lateral_a }}</td>
                        <td>{{ $dt->calle_lateral_b }}</td>
                        <td>{{ $dt->temperatura }}</td>
                        <td>{{ $dt->condiciones }}</td>
                        <td>{{ $dt->hora_inicio.' - '.$dt->hora_fin }}</td>
                        <td>{{ $dt->fecha }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-right">
                <a href="excel/{{ $iduser }}/1" class="btn btn-success">Descargar</a>
            </div>
        </div>
    </div>

    <br><br>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Datos Personas</h3>
            </div>
        </div>    
    </div>    



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td>Hombre</td>
                        <td>Ninia</td>
                        <td>Mujer</td>
                        <td>Anciano</td>
                        <td>Calle Relevamiento</td>
                        <td>Calle A</td>
                        <td>Calle B</td>
                        <td>Temperatura</td>
                        <td>Condiciones</td>
                        <td>Hora</td>
                        <td>Fecha</td>
                    </tr>
                    @foreach($data[1] as $dt)
                    <?php $iduser = $dt->nombre_encuestador; ?>
                    <tr>
                        <td>{{ $dt->nombre_encuestador }}</td>
                        <td>{{ $dt->hombre }}</td>
                        <td>{{ $dt->ninia }}</td>
                        <td>{{ $dt->mujer }}</td>
                        <td>{{ $dt->anciano }}</td>
                        <td>{{ $dt->calle_relevamiento }}</td>
                        <td>{{ $dt->calle_lateral_a }}</td>
                        <td>{{ $dt->calle_lateral_b }}</td>
                        <td>{{ $dt->temperatura }}</td>
                        <td>{{ $dt->condiciones }}</td>
                        <td>{{ $dt->hora_inicio.' - '.$dt->hora_fin }}</td>
                        <td>{{ $dt->fecha }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-right">
                <a href="excel/{{ $iduser }}/2" class="btn btn-success">Descargar</a>
            </div>
        </div>
    </div>
    <br><br><br><br>

    @endif
        
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
