<?php
    
       //Leer el parmetro recibido
    $IdCategoria = $_GET["IdCategoria"];
    
    //Empieza el protocolo de borrar en la base de datos
    //Credenciales de acceso
    $server = "localhost";// 127.0.0.1 Localhost
    $user = "web_JZR";
    $pass = "BActiva2022";
    $db = "web_JZR";    

    //Crear la conexin a la BD
    $conn = mysqli_connect($server, $user, $pass, $db);    
    if ($conn)
    {
        $sql = "DELETE FROM Categoria
                WHERE IdCategoria = $IdCategoria";

        //Lanzar la SQL de borrado
        $regs = mysqli_query($conn, $sql);        

        //Cerrar la conexin
        mysqli_close($conn);
                
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Borrar producto</title>
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
                    
                        <h1>Borrar categoría</h1>
                        <p>La categoría ha sido borrado correctamente</p>
                        
                        <p><a href="categorias.php" class=btn-btn-primary>Volver al listado de categoría</p>
                        
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