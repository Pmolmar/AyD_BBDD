<?php
//  Etapa1. Crear la variable $db y asignar a la cadena de conexión
    $servername='fdb28.awardspace.net';
    $username='3655821_alu0101103181';
    $password='3JF7qNVN';
    $dbname = "3655821_alu0101103181";
    $db = mysqli_connect($servername,$username,$password,$dbname) or die('Error al conectar al servidor MySQL.');

//  Insercion
    
    $nombre = $_POST['nombre_d'];
    $sql = "DELETE FROM Usuario WHERE Nombre= $nombre";
    mysqli_query($db, $sql) or die ('Error de eliminacion');
    // echo "Nuevo dato insertado satisfactoriamente";
     
?>
<html>
    <head>
        <h1>MenDown!!!</h1>
    </head>
    <body>
        <h1>PHP y MySQL<h1>
        <?php
        //Etapa2. Búsqueda
        $query = "SELECT * FROM Usuario";
        mysqli_query($db, $query) or die('Error al buscar en la base de datos.');
        //Etapa3. Mostrar datos
        $resultado = mysqli_query($db, $query);
        $fila = mysqli_fetch_array($resultado);
        echo '<table></tr> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> <th>Altura</th> </tr>';
        while ($fila = mysqli_fetch_array($resultado)) {
            echo '<tr><td>'.$fila['Nombre'] . '</td><td>' . $fila['Apellidos'] . '</td><td>' . $fila['Edad'] . '</td><td> ' . $fila['Altura'] .'</td></tr>';
        }
        echo '</table>';
        mysqli_close($db);
        ?>

        <a href='mysql.php'>VOLVER</a>
    </body>
</html>