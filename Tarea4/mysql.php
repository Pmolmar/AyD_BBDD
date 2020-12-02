<html>
    <head>   
        <h1>PHP y MySQL<h1> 
    </head>
    <body>
        <?php
        //Etapa1. Crear la variable $db y asignar a la cadena de conexión
        $servername='fdb28.awardspace.net';
        $username='3655821_alu0101103181';
        $password='3JF7qNVN';
        $dbname = "3655821_alu0101103181";
        $db = mysqli_connect($servername,$username,$password,$dbname) or die('Error al conectar al servidor MySQL.');
        
        //Etapa2. Búsqueda
        $query = "SELECT * FROM Usuario";
        mysqli_query($db, $query) or die('Error al buscar en la base de datos.');
        $resultado = mysqli_query($db, $query);
        
        //Etapa3. Mostrar datos
        $fila = mysqli_fetch_array($resultado);
        echo '<table></tr> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> <th>Altura</th> </tr>';
        while ($fila = mysqli_fetch_array($resultado)) {
            echo '<tr><td>'.$fila['Nombre'] . '</td><td>' . $fila['Apellidos'] . '</td><td>' . $fila['Edad'] . '</td><td> ' . $fila['Altura'] .'</td></tr>';
        }
        echo '</table>';
        mysqli_close($db);
        ?>

        <!-- Formulario par inserciones -->
        <form action="insert.php" method="post">
            <p>
                <label for="nombre_i">Nombre:</label>
                <input type="text" name="nombre_i" id="nombre_i">
            </p>
            <p>
                <label for="apellidos_i">Apellidos:</label>
                <input type="text" name="apellidos_i" id="apellidos_i">
            </p>
            <p>
                <label for="edad_i">Edad:</label>
                <input type="number" name="edad_i" id="edad_i">
            </p>
            <p>
                <label for="altura_i">Altura:</label>
                <input type="number" name="altura_i" id="altura_i">
            </p>
            <input type="submit" value="Insertar entrada">
        </form>

        <form action="delete.php" method="post">
            <p>
                <label for="nombre_d">Nombre:</label>
                <input type="text" name="nombre_d" id="nombre_d">
            </p>
            <input type="submit" value="Eliminar entrada">
        </form>
    </body>
</html>
