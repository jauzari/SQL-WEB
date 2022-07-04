<?php
    //Recoger parámetro
    $idCategoria = $_GET["IdCategoria"];
    echo "$idCategoria";
    //Credenciales
    $server = "localhost";
    $user = "web_JZR";
    $pass = "BActiva2022";
    $db = "web_JZR";    

    $conn = mysqli_connect($server, $user, $pass, $db);
    if ($conn)
    {
        $sql = "SELECT NombreCategoria,Descripcion
                FROM Categoria
                WHERE idCategoria = $idCategoria";
        
        $result = mysqli_query($conn, $sql);
        
        while ($registro = mysqli_fetch_assoc($result))
        {
            $nombreCategoria = $registro["NombreCategoria"];
            $descripcion = $registro["Descripcion"];
        }
        mysqli_close($conn);
    }


    //Incluir biblioteca de funciones
    require("includes/funciones.php");

    require("includes/header.php");

    require("includes/nav.php");
?>
        
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Editar categoría</h1>

                <form method="POST" action="guardarCategoria.php">
                    <input type="hidden" id="idCategoria" name="idCategoria" value="<?=$idCategoria ?>">
                    
                    <div class="form-group row">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoría*</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="categoria" name="categoria" maxlength="100"
                                    value="<?=$nombreCategoria ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción*</label>
                        <div class="col-sm-10">
                            <textarea required id="descripcion" name="descripcion" rows="10" class="form-control"><?=$descripcion ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>                    
                </form>
                <button  onclick="window.location.href='https://web.serprisa.net/JZR/20220626-ejercicioVerbena/categorias.php';" type="submit" class="btn btn-primary offset-2">Volver al index</button>
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