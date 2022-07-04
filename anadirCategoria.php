<?php

    //Incluir biblioteca de funciones
    require("includes/funciones.php");

    require("includes/header.php");

    require("includes/nav.php");
    

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>categoría</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, 
            maximum-scale=2, user-scalable=yes, shrink-to-fit=no">

        <!-- Referenciar archivos de CSS de bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <header></header>
        <nav></nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 style="font-size:1.20em;">Alta de categoría</h1>
                        
                        <form method="POST" action="anadirCategoria2.php">
                            
                            <div class="form-group row">
                                <label for="idCategoria" class="col-sm-2 col-form-label">Categoría*</label>
                                <div class="col-sm-10">
                                    <select required class="form-control" id="idCategoria" name="idCategoria">
                                        <option value="0">---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="NombreCategoria" class="col-sm-2 col-form-label">Nombre Categoria*</label>
                                <div class="col-sm-10">
                                    <input  required type="text" maxlength="40" class="form-control" id="NombreCategoria" name="NombreCategoria">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Descripcion" class="col-sm-2 col-form-label">Descripcion*</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" id="Descripcion" name="Descripcion">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Guardar nueva categoria</button>
                                </div>
                            </div>                            

                        </form>
                        <button  onclick="window.location.href='https://web.serprisa.net/JZR/20220626-EejercicioVerbena/categorias.php';" type="submit" class="btn btn-primary offset-2">Volver al index</button>
                        <p><?php echo $result; ?></p>
                         
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
        <script src="scripts/script.js"></script>
    </body>
</html>

<?php
    require("includes/footer.php");
?>