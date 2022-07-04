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
       // echo "Conexión realizada.<br/>";
       // echo "Información sobre el servidor:" . mysqli_GET_host_info($conn); //Información de la conexión
        
    //Preparar la SQL
    $sql="SELECT IdCategoria, NombreCategoria, Descripcion
            FROM Categoria ORDER BY IdCategoria";
         

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
  
      
    require("includes/funciones.php");

    require("includes/header.php");

    require("includes/nav.php");

   
   
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Listado categorias</title>
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
                <div class="row">
                    <div class="col">
                        <h1>Listado de Categorías</h1>
                        
                        <p>
                            Total de registros: <?php echo $numRegistros; ?>
                            
                        </p>
                        <div>
                            <p style="text-align:right;">
                                <a href="index.php" class="btn btn-primary btn-sm">Ver todos los productos</a>
                                &nbsp;
                                <a href="anadirCategoria.php">
                                <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>
                                </a>
                            </p>
                            
                            
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                            <!--Mostrar las filas a partir de la BD del objeto resultSet
                            Bucle pare leer todos los registros resultantes-->
                            <!--TO_DO-->
                            <!--Obtener los resultados-->
                                <!-- Mostrar las filas a partir de la BD del objeto ResultSet
                            Bucle para leer todos los registros resultantes -->
                            <?php
                                if ($result)
                                {
                                    while ($registro = mysqli_fetch_assoc($result)) //Se salta de la posición BOF a la primera que contiene datos. Mueve el puntero hacia abajo
                                    {
                                       /* $estado = "";
                                        if($registro["Suspendido"] == "0")
                                        {
                                            $estado = "Activo";
                                        }
                                        else
                                        {
                                            $estado = "Descatalogado";
                                        }*/
                                        ?> 
                                        <tr>
                                            <td <?=$color ?>><?=$registro["IdCategoria"] ?></td>
                                            <td <?=$color ?> class="productoDestacado"><a href="index.php?idCategoria=<?=$registro["IdCategoria"] ?>"><?=$registro["NombreCategoria"] ?></a></td>
                                            <td <?=$color ?>><?=$registro["Descripcion"] ?></td>
                                            <td>
                                                
                                                <a href="editarCategoria.php?IdCategoria=<?=$registro["IdCategoria"] ?>">
                                                    <i class="fa fa-pencil-square edit" aria-hidden="true" title="Editar categoría"></i>
                                                </a>
                                                &nbsp;
                                                <a href="javascript:void(0);" onclick="borrarCategoria(<?=$registro["IdCategoria"] ?>);"
                                                    <i class="fa fa-trash-o delete" aria-hidden="true" title="Borrar categoría"></i>
                                                </a>
                                                

                                            
                                            </td>
                                            
                                        </tr>
                                        
                                        
                                        <?php
                                        
                                    }
                                    //Muy importante cerrar la conexión
                                    mysqli_close($conn);
                                } //Termina el protocolo
                            ?>
                            
                        </table>
                        <p>
                            Total de registros: <?php echo $numRegistros; ?>
                            
                        </p>
                        
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