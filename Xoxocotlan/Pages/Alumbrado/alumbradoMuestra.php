<!-- Inicio de código php -->
<?php
// Conexión con la base de datos
require ("../cn.php");
?>
<!-- Fin código php -->
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        <!-- Conexión con el archivo css para el diseño -->
        <link rel="stylesheet" type="text/css" href="../../CSS/estiloMenu.css?ts=<?=time()?>">
        <title>Registros</title>
    </head>
    <body>
        <!-- Inicio del listado del menú inicial -->
        <ul>
        <!-- Opción de lista -->
        <img class="imgNav" src="../../Images and icons/municipio.png">
        <li><a  href="../Menu.html">Home</a></li>
        <!-- Opción de lista que contiene un menú desplegable referente
        al agua -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Agua potale</a>
            <div class="dropdown-content">
                <!-- Menú desplegable -->
                <a href="../Agua/agua.php">Registrar pago</a>
                <a href="../Agua/aguaConsulta.php">Consultar pago</a>
                <a href="../Agua/aguaMuestra.php" >Mostrar pagos</a>
            </div>
        </li>
        <!-- Opción de lista que contiene un menú desplegable referente
        al alumbrado -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="active">Alumbrado publico</a>
            <div class="dropdown-content">
                <!-- Menú desplegable -->
                <a href="../Alumbrado/alumbrado.php">Registrar pago</a>
                <a href="../Alumbrado/alumbradoConsulta.php">Consultar pago</a>
                <a href="../Alumbrado/alumbradoMuestra.php" >Mostrar pagos</a>
            </div>
        </li>
        <!-- Opción de lista que contiene un menú desplegable referente
        a los tequios -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Tequios</a>
            <div class="dropdown-content">
                <!-- Menú desplegable -->
                <a href="../Tequios/tequios.php">Registrar pago</a>
                <a href="../Tequios/tequiosConsulta.php">Consultar pago</a>
                <a href="../Tequios/tequiosMuestra.php" >Mostrar pagos</a>
            </div>
        </li>
        <!-- Opción de lista que contiene un menú desplegable referente
        a las festividades -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Festividades</a>
            <div class="dropdown-content">
                <!-- Menú desplegable -->
                <a href="../Festividades/festividades.php">Registrar pago</a>
                <a href="../Festividades/festividadesConsulta.php">Consultar pago</a>
                <a href="../Festividades/festividadesMuestra.php" >Mostrar pagos</a>
            </div>
        </li>
        <!--  Opción del listado con menú desplegable referente a los habitantes -->
        </li>
        <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Habitantes</a>
        <div class="dropdown-content">
            <!-- Contenido del menú desplegable -->
            <a href="../Habitantes/habitantes.php" >Registrar habitante</a>
            <a href="../Habitantes/habitantesGestionar.php" >Gestionar habitantes</a>
            <a href="../Habitantes/habitantesConsulta.php">Consultar habitante</a>
            <a href="../Habitantes/habitantesMostrar.php">Mostrar habitantes</a>
        </div>
        </li>
        <!--  Opción del listado con menú desplegable referente a los domicilios -->
        <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Domicilio</a>
        <div class="dropdown-content">
            <!-- Contenido del menú desplegable -->
            <a href="../Domicilio/domicilio.php" >Registrar domicilio</a>
            <a href="../Domicilio/domicilioGestionar.php" >Gestionar domicilio</a>
            <a href="../Domicilio/domicilioConsulta.php">Consultar domicilio</a>
            <a href="../Domicilio/domicilioMostrar.php">Mostrar domicilios</a>
        </div>
        </li>
        <!--  Opción del listado con menú desplegable referente a los usuarios -->
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Usuarios</a>
            <div class="dropdown-content">
                <!-- Contenido del menú desplegable -->
                <a href="../Usuarios/usuarios.php" >Registrar Usuario</a>
                <a href="../Usuarios/usuariosGestionar.php" >Gestionar Usuarios</a>
                <a href="../Usuarios/usuariosMostrar.php">Mostrar Usuarios</a>
            </div>
        </li>
        <!-- Opción del listado referente a la salida del menú -->
        <li style="float: right;" class="dropdown"> <a href="../../Login.php" >Salir</a> </li>
        </ul><br><br><br>
        <!-- Sección que centra los elementos -->
        <div align="center">
            <!-- Inicio de tabla donde se muestran los registros -->
            <table>
                <!-- Inicio del encabezado -->
                <thead>
                    <!-- Inicio de la fila del encabezado -->
                    <tr>
                        <!-- Espacios de cada columna en la fila -->
                        <th>Numero de toma</th>
                        <th>Año</th>
                        <th>Pagado</th>
                        <th>Recibido</th>
                        <th>Cambio</th>
                        <th>Fecha</th>
                    </tr>
                    <!-- fin de la fila -->
                </thead>
                <!-- fin del encabezado -->
                <!-- Inicio del código php para la muestra -->
                <?php
                    // Comando de colsuta en sql para tomar todos los 
                    // valores de una tabla
                    $sql="SELECT * FROM alumbrado";
                    // Realización de la consulta
                    $consulta=mysqli_query($conexion,$sql);
                    if($consulta){
                        // Conversión de la colsuta a tipo array e 
                        // inicialización del ciclo while para mostrar
                        // los registros
                        while($mostrar=mysqli_fetch_array($consulta)){
                        ?>
                        <!-- fin código php más no del ciclo while -->
                        <!-- Inicio del cuerpo de la tabla -->
                        <tbody>
                            <!-- Inicio de la fila -->
                            <tr>
                                <!-- datos de cada columna en la fila -->
                                <!-- inicio, impresion de los datos y cierre del php -->
                                <td><?php echo $mostrar['num_toma'] ?></td>
                                <td><?php echo $mostrar['anio'] ?></td>
                                <td><?php echo $mostrar['cantidad'] ?></td>
                                <td><?php echo $mostrar['pagado'] ?></td>
                                <td><?php echo $mostrar['cambio'] ?></td>
                                <td><?php echo $mostrar['fecha'] ?></td>
                            </tr>
                                <!-- fin de la fila -->
                        </tbody>
                        <!-- fin del cuerpo -->
                        <!-- inicio de php -->
                        <?php
                            // fin ciclo while
                            }
                            // fin condición
                        
                    }
                        ?>
            </table>
        </div>
    </body>
</html>