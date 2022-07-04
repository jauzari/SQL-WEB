function borrarCategoria(IdCategoria)
{
    var respuesta = confirm("¿Está seguro de que quiere borrar el categoría?");
    
    if (respuesta)
    {
        //Enviar a borrarProducto.php para borrar el producto
        var a = 2;
        console.log(a);
        location.href="borrarCategoria.php?IdCategoria=" + IdCategoria;
    }
}
