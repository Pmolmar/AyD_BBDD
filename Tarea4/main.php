<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    $servername='fdb28.awardspace.net';
    $username='3655821_alu0101103181';
    $password='3JF7qNVN';
    $dbname = "3655821_alu0101103181";
    $db = mysqli_connect($servername,$username,$password,$dbname) or die('Error al conectar al servidor MySQL.');

    //creates
    if($_POST['nombre_i'] != ''){
        $sql = "INSERT INTO Usuario (Nombre,Apellidos,Edad,Altura)
        VALUES ('$_POST[nombre_i]','$_POST[apellidos_i]','$_POST[edad_i]','$_POST[altura_i]')";
        mysqli_query($db, $sql);
        $_POST = array();
    };

    //deletes
    if($_POST['nombre_d'] != ''){
        $sql = "DELETE FROM Usuario WHERE Nombre = '".$_POST['nombre_d']."'";
        mysqli_query($db, $sql);
        $_POST = array();
    };

    //updates
    if($_POST['nombre_u'] != '')
    {
        if($_POST['nombre_n'] != ''){
            $sql = "UPDATE Usuario SET Nombre = '".$_POST['nombre_n']."' WHERE Nombre = '".$_POST['nombre_u']."'";
            mysqli_query($db, $sql);
        }; 

        if($_POST['apellidos_n'] != ''){
            $sql = "UPDATE Usuario SET Apellidos = '".$_POST['apellidos_n']."' WHERE Nombre = '".$_POST['nombre_u']."'";
            mysqli_query($db, $sql);
        }; 

        if($_POST['edad_n'] != ''){
            $sql = "UPDATE Usuario SET Edad = '".$_POST['edad_n']."' WHERE Nombre = '".$_POST['nombre_u']."'";
            mysqli_query($db, $sql);
        }; 

        if($_POST['altura_n'] != ''){
            $sql = "UPDATE Usuario SET Altura = '".$_POST['altura_n']."' WHERE Nombre = '".$_POST['nombre_u']."'";
            mysqli_query($db, $sql);
        }; 
        $_POST = array();
    }

    //Búsqueda
    $query = "SELECT * FROM Usuario";
    mysqli_query($db, $query) or die('Error al buscar en la base de datos.');
    $resultado = mysqli_query($db, $query);

    //Mostrar datos
    $fila = mysqli_fetch_array($resultado);
    echo '<table></tr> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> <th>Altura</th> </tr>';
    while ($fila = mysqli_fetch_array($resultado)) {
        echo '<tr><td>'.$fila['Nombre'] . '</td><td>' . $fila['Apellidos'] . '</td><td>' . $fila['Edad'] . '</td><td> ' . $fila['Altura'] .'</td></tr>';
    }
    echo '</table>';
    mysqli_close($db);
?>

<html>
    <head>   
        <h1>PHP y MySQL<h1> 
    </head>
    <body>

    <table>
        <tr>
            <th>Insertar</th>
            <th>Eliminar</th>
            <th>Updatear</th>
        </tr>
        <tr>
            <!-- Formulario par inserciones -->
            <th>
            <form action="<?php $_PHP_SELF ?>" method="post">
                <p>
                    <input type="text" name="nombre_i" id="nombre_i" placeholder="Nombre">
                </p>
                <p>
                    <input type="text" name="apellidos_i" id="apellidos_i" placeholder="Apellidos">
                </p>
                <p>
                    <input type="number" name="edad_i" id="edad_i" placeholder="Edad">
                </p>
                <p>
                    <input type="number" name="altura_i" id="altura_i" placeholder="Altura">
                </p>
                <input type="submit" value="Insertar entrada">
            </form>
            </th>
            <th>
            <form action="<?php $_PHP_SELF ?>" method="post">
                <p>
                    <input type="text" name="nombre_d" id="nombre_d" placeholder="Nombre">
                </p>
                <input type="submit" value="Eliminar entrada">
            </form>
            </th>  
            <th>
            <form action="<?php $_PHP_SELF ?>" method="post">
                <p>
                    <input type="text" name="nombre_u" id="nombre_u" placeholder="Nombre">
                </p>
                <p>
                    <input type="text" name="nombre_n" id="nombre_n" placeholder="NombreNew">
                </p>
                <p>
                    <input type="text" name="apellidos_n" id="apellidos_n"  placeholder="ApellidosNew">
                </p>
                <p>
                    <input type="number" name="edad_n" id="edad_n" placeholder="EdadNew">
                </p>
                <p>
                    <input type="number" name="altura_n" id="altura_n" placeholder="AlturaNew">
                </p>
                <input type="submit" value="Updatear entrada">
            </form>
            </th>
        </tr>
    </table>   
    </body>
</html>
