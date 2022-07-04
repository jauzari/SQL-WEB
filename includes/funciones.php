<?php

    function getComboProveedores()
    {
        //Variable que contendrá el código HTML del combo de proveedores
        $html = "<select class='form-control' name='cmbProveedores' id='cmbProveedores'>
                    <option value='0'>----</option>";
                    
        //Credenciales de acceso
        $server = "localhost";// 127.0.0.1 Localhost
        $user = "web_JZR";
        $pass = "BActiva2022";
        $db = "web_JZR";

        $conn = mysqli_connect($server, $user, $pass, $db);
        if ($conn) 
        {
            $sql = "SELECT IdProveedor, NombreEmpresa
                    FROM Proveedor
                    ORDER BY NombreEmpresa ASC";
            
            $result = mysqli_query($conn, $sql);
            
            if ($result)
            {
                while($registro = mysqli_fetch_assoc($result))
                {
                    //Construir el combo
                    $html .= "<option value='" . $registro["IdProveedor"] . "'>" . $registro["NombreEmpresa"] . "</option>";
                }
                mysqli_close($conn);
                
                $html .= "</select>";
            }
        }

        return $html;
    }

    function getComboCountries()
    {
        //Variable que contendrá el código HTML del combo de country
        $html = "<select class='form-control' name='cmbCountries' id='cmbCountries'>
                    <option value='0'>----</option>";
                    
        //Credenciales de acceso
        $server = "localhost";// 127.0.0.1 Localhost
        $user = "web_JZR";
        $pass = "BActiva2022";
        $db = "web_JZR";

        $conn = mysqli_connect($server, $user, $pass, $db);
        if ($conn) 
        {
            $sql = "SELECT IdCountry, name
                    FROM Country
                    ORDER BY name ASC";
            
            $result = mysqli_query($conn, $sql);
            
            if ($result)
            {
                while($registro = mysqli_fetch_assoc($result))
                {
                    //Construir el combo
                    $html .= "<option value='" . $registro["IdCountry"] . "'>" . $registro["name"] . "</option>";
                }
                mysqli_close($conn);
                
                $html .= "</select>";
            }
        }

        return $html;
    }

    function getComboProductos()
    {
        //Variable que contendrá el código HTML del combo de country
        $html = "<select class='form-control' name='cmbProductos' id='cmbProductos'>
                    <option value='0'>----</option>";
                    
        //Credenciales de acceso
        $server = "localhost";// 127.0.0.1 Localhost
        $user = "web_JZR";
        $pass = "BActiva2022";
        $db = "web_JZR";

        $conn = mysqli_connect($server, $user, $pass, $db);
        if ($conn) 
        {
            $sql = "SELECT IdProducto, NombreProducto
                    FROM Producto
                    ORDER BY NombreProducto ASC";
            
            $result = mysqli_query($conn, $sql);
            
            if ($result)
            {
                while($registro = mysqli_fetch_assoc($result))
                {
                    //Construir el combo
                    $html .= "<option value='" . $registro["IdProducto"] . "'>" . $registro["NombreProducto"] . "</option>";
                }
                mysqli_close($conn);
                
                $html .= "</select>";
            }
        }

        return $html;
    }


?>