<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "practica2";


// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
    
// Selección del a base de datos a utilizar
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

// establecer y realizar consulta. guardamos en variable.
$consulta = "SELECT juguetes.nombre_juguetes, juguetes.precio_juguetes FROM ninos JOIN reparto ON reparto.ninos_reparto = ninos.id_ninos JOIN juguetes ON juguetes.id_juguetes = reparto.juguetes_reparto WHERE juguetes.reyes_juguetes = 1";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

$consulta1 = "SELECT juguetes.nombre_juguetes, juguetes.precio_juguetes FROM ninos JOIN reparto ON reparto.ninos_reparto = ninos.id_ninos JOIN juguetes ON juguetes.id_juguetes = reparto.juguetes_reparto WHERE juguetes.reyes_juguetes = 2";
$resultado1 = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");

$consulta2 = "SELECT juguetes.nombre_juguetes, juguetes.precio_juguetes FROM ninos JOIN reparto ON reparto.ninos_reparto = ninos.id_ninos JOIN juguetes ON juguetes.id_juguetes = reparto.juguetes_reparto WHERE juguetes.reyes_juguetes = 3";
$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$total = 0;
$total1 = 0;
$total2 = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Demo de menú desplegable</title>
  <meta charset=utf-8" />
</head>
<body>

<table width="70%" border="1px" align="center">
    <tr align="center">
    
    <td>Nombre regalo</td><td>Precio de regalo</td>
    
    </tr>

    <?php 
    while ($columna = mysqli_fetch_array( $resultado )){
        ?>
            <tr>
            <td><?php echo $columna['nombre_juguetes'] ?></td><td><?php echo $columna['precio_juguetes'] ?></td>
            <?php $total = $total + $columna['precio_juguetes'] ?>
            </tr>
            <?php   
        }

     ?>
    
    <tfoot>

<tr>
                <tr><td>TOTAL FACTURA DE GASPAR:</td><td><?php echo $total; ?></td></tr>

</tr>

</tfoot>
 
</table>
<p></p>
<p></p>

<table width="70%" border="1px" align="center">
    <tr align="center">
    
    <td>Nombre regalo</td><td>Precio de regalo</td>
    
    </tr>

    <?php 
    while ($columna = mysqli_fetch_array( $resultado1 )){
        ?>
            <tr>
            <td><?php echo $columna['nombre_juguetes'] ?></td><td><?php echo $columna['precio_juguetes'] ?></td>
            <?php $total1 = $total1 + $columna['precio_juguetes'] ?>
            </tr>
            <?php   
        }

     ?>
    
    <tfoot>

<tr>
                <tr><td>TOTAL FACTURA DE MELCHOR:</td><td><?php echo $total1; ?></td></tr>

</tr>

</tfoot>
 
</table>

<p></p>
<p></p>

<table width="70%" border="1px" align="center">
    <tr align="center">
    
    <td>Nombre regalo</td><td>Precio de regalo</td>
    
    </tr>

    <?php 
    while ($columna = mysqli_fetch_array( $resultado2 )){
        ?>
            <tr>
            <td><?php echo $columna['nombre_juguetes'] ?></td><td><?php echo $columna['precio_juguetes'] ?></td>
            <?php $total2 = $total2 + $columna['precio_juguetes'] ?>
            </tr>
            <?php   
        }

     ?>
    
    <tfoot>

<tr>
                <tr><td>TOTAL FACTURA DE BALTASAR:</td><td><?php echo $total2; ?></td></tr>

</tr>

</tfoot>
 
</table>
    
</option>

</body>

</html>
