<?php
    //Leer la información que recibimos del formulario
    $idCategoria = $_POST["idCategoria"];   //hidden
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];

    echo "$idCategoria";
    
    //Empieza el protocolo de guardar en base de datos
    //Credenciales de acceso
    $server = "localhost";// 127.0.0.1 Localhost
    $user = "web_JZR";
    $pass = "BActiva2022";
    $db = "web_JZR";
    
    //Crear la conexión a la BD
    $conn = mysqli_connect($server, $user, $pass, $db);
    if ($conn) 
    {
        //Preparar la SQL de actualización
        
        $sql = "UPDATE Categoria
		        SET NombreCategoria = '$categoria', Descripcion = '$descripcion' 
		        WHERE IdCategoria = $idCategoria";
    
        //Lanzar la SQL de actualización
        $regs = mysqli_query($conn, $sql);
        
        //Cerrar la conexión
        mysqli_close($conn);
    }
    
    //Enviar un mail al usuario paa confirmarle que se recibió la consulta y que se procesará
    //TO_DO

    require("includes/header.php");

    require("includes/nav.php");
?>
        
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Editar Categoría</h1>

                <p>La categoría se ha actualizado correctamente.</p>
                
                <button  onclick="window.location.href='https://web.serprisa.net/JZR/20220626-ejercicioVerbena/categorias.php';" type="submit" class="btn btn-primary">Volver al index</button>
                
            </div>
            <div class="col-md-6">
                .....
                .....
            </div>
        </div>
    </div>
</main>
<aside></aside>


<?php
    require("includes/footer.php");
?>