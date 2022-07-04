<?php
    
    //Determinar los credenciales de acceso a la BS. Almacela las credenciales de acceso
    $server = "localhost"; //127.0.0.1 IP donde estuviera el servidor de la BD
    $user = "web_JZR";
    $pass = "BActiva2022";
    $db = "web_JZR";
    
    //Establecer conexion con la BD
    //$connect es una variable especial, objeto conexión
    $conn = mysqli_connect($server, $user, $pass, $db); 
    if ($conn) 
    {
       // echo "Conexión realizada.<br />";
       // echo "Información sobre el servidor:" . mysqli_GET_host_info($conn); //Información de la conexión
        
    //Preparar la SQL
    $sql="SELECT po.NombreProducto, ca.NombreCategoria, 
		            ROUND(SUM(dp.Cantidad * dp.PrecioUnidad * (1-dp.Descuento)),2) as Importe
            FROM Categoria ca INNER JOIN Producto po ON ca.IdCategoria = po.IdCategoria
				              INNER JOIN Detalles_de_Pedido dp ON po.IdProducto = dp.IdProducto
            GROUP BY po.NombreProducto, ca.NombreCategoria
            ORDER BY 3 DESC
            LIMIT 10";
         

    //Lanzar la SQL a la BD a traves de la conexion
     $result = mysqli_query($conn, $sql);
        
        if ($result) 
        {
                $numRegistros = mysqli_num_rows($result); //Devuelve cuantas filas tiene el resultSet
                //echo "Número de registros: " . $numRegistros . "<br />";
        }
        else 
        {
                echo "Error en la ejecución de la consulta.<br />";
        }


    }
    else 
    {
        echo "Error " . mysqli_connect_errno() . ": " .  mysqli_connect_error() ."<br/>"; //Devuelve un número de error y mensaje
    } 
   
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Listado productos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, 
            maximum-scale=2, user-scalable=yes, shrink-to-fit=no">

        <!-- Referenciar archivos de CSS de bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- Biblioteca de iconos de awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    </head>
    <body>
        <header></header>
        <nav></nav>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Top 10 en ventas</h1>
                        
                        
                        <p style="text-align:right;">
                            <input type="date" id="desde" />    <input type="date" id="hasta" />
                            <a href="top10.php?....." class="btn btn-primary btn-sm">Filtrar</a>
                            
                            <a href="index.php" class="btn btn-primary btn-sm">Ver todos los productos</a>
                        </p>
                        <table class="table table-striped">
                            <tr>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Importe</th>
                            </tr>

                            <?php
                                if ($result)
                                {
                                    $labels="[";
                                    $data="[";
                                    while ($registro = mysqli_fetch_assoc($result)) //Se salta de la posición BOF a la primera que contiene datos. Mueve el puntero hacia abajo
                                    {
                                        $labels = $labels . "'". $registro["NombreProducto"] . "',";
                                        $data = $data . $registro["Importe"] . ",";
                                        
                                        ?> 
                                        <tr>
                                            <td><?=$registro["NombreProducto"] ?></td>
                                            <td><?=$registro["NombreCategoria"] ?></td>
                                            <td><?=$registro["Importe"] ?></td>
                                        </tr>

                                        <?php
                                    }
                                    //Muy importante cerrar la conexión
                                    mysqli_close($conn);
                                    
                                    $labels = $labels . "]";
                                    $data = $data . "]";
                                    
                                    //echo $labels . "<br/>";
                                    //echo $data . "<br/>";
                                    
                                } //Termina el protocolo
                            ?>
                            
                        </table>
                    </div>
                    <div class="col-md-6" style="padding-top:75px;">
                        <!-- Gráfico de barras -->
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?=$labels ?>,
                                datasets: [{
                                    label: 'Importe de ventas',
                                    data: <?=$data ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 99, 132, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 99, 132, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                indexAxis: 'y',
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        </script>                        
                        
                        
                    </div>
                </div>
            </div>
        </main>
        <aside></aside>
        <footer></footer>


        <!-- Referenciar archivos de JS de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.js" integrity="sha512-0rYcJjaqTGk43zviBim8AEjb8cjUKxwxCqo28py38JFKKBd35yPfNWmwoBLTYORC9j/COqldDc9/d1B7dhRYmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="scripts/scripts.js"></script>
    </body>
</html>