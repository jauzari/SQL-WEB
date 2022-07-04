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
        $sql="SELECT po.IdProducto, po.NombreProducto, po.IdCategoria, ca.NombreCategoria, 
                 ROUND(po.PrecioUnidad,2) as Precio, po.UnidadesEnExistencia, po.UnidadesEnPedido, po.Suspendido
          FROM Producto po INNER JOIN Categoria ca ON po.idCategoria = ca.idCategoria 
          ORDER BY po.NombreProducto ASC";

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
        <title>Listado productos por fichas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, 
            maximum-scale=2, user-scalable=yes, shrink-to-fit=no">

        <!-- Referenciar archivos de CSS de bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- Biblioteca de iconos de awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <header></header>
        <nav></nav>
        <main>
            <div class="container">
                <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Listado de Productos por Fichas</h1>
                        
                        <p>
                            Total de registros: <?php echo $numRegistros; ?>
                        </p>
                        <p style="text-align:right;">
                            <a href="index.php" class="btn btn-primary btn-sm">Ver todos los productos</a>
                        </p>
                    </div>
                </div>
                <div class="row">

                    <!--Mostrar las filas a partir de la BD del objeto resultSet
                    Bucle pare leer todos los registros resultantes-->

                    <?php
                        if ($result)
                        {
                            while ($registro = mysqli_fetch_assoc($result)) //Se salta de la posición BOF a la primera que contiene datos. Mueve el puntero hacia abajo
                            {
                                $stock = intval($registro["UnidadesEnExistencia"]);
                                $icon = "";
                                if ($stock<10)
                                {
                                    $icon = "<i class='fa fa-thermometer-empty' title='nivel bajo' aria-hidden='true'></i>";
                                }
                                else if ($stock<40)
                                {
                                    $icon = "<i class='fa fa-thermometer-half' title='nivel medio' aria-hidden='true'></i>";
                                }
                                else
                                {
                                    $icon = "<i class='fa fa-thermometer-full' title='nivel alto' aria-hidden='true'></i>";
                                }
                                
                                
                                ?>
                                    <div class="col-sm-6 col-md-3 col-lg-2">
                                        <img src="img/productos/HR/<?=$registro["IdProducto"] ?>.jpg" width="100%" alt="" />
                                        <div style="border:1px solid silver;padding:3px;">
                                            <p><i><?=$registro["NombreCategoria"] ?></i></p>
                                            <h6><?=$registro["NombreProducto"] ?></h6>
                                            <p><?=$registro["CantidadPorUnidad"] ?></p>
                                            <p style="text-align:right;font-size:1.5em;"><?=$registro["Precio"] ?> €</p>
                                            <p style="text-align:right;"><?=$icon ?></p>
                                            
                                        </div>


                                    </div>
                                <?php
                            }
                            //Muy importante cerrar la conexión
                            mysqli_close($conn);
                            
                        } //Termina el protocolo
                    ?>
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