<?php
    $num=$_GET['var_pin'];
    // Conexión con la base de datos
    require ("../cn.php");
?>
<?php
    // Condición en caso de que se use el boton de aceptar
    if(isset($_POST['aceptar'])){
        // Redireccionamiento al ticket en formato pdf
        header("Location:Recibo.php");
    }   
    // Condición en caso de que se use el boton de salir
    if(isset($_POST['salir'])){
        // Redireccionamiento al ticket en formato pdf
        $sql="DELETE FROM ayuda";
        $consulta=mysqli_query($conexion,$sql);
        if($consulta){
            header("Location:../Menu.html");
        }
    }                  
?>  
<!-- fin php -->
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        <!-- Conexión con el archivo css para el diseño -->
        <link rel="stylesheet" type="text/css" href="../../CSS/estiloMenu.css?ts=<?=time()?>">
        <title>Recibo</title>
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
            <a href="javascript:void(0)" class="dropbtn">Alumbrado publico</a>
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
            <a href="javascript:void(0)" class="active">Tequios</a>
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
        <!-- Inicio de formato pdf -->
        <div align="center">
            <!-- Sección donde se muestra el ticket -->
            <section class="recibo">
                <!-- inicio del form para la acción php -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <br>
                    <label class="ti">Toma de agua: </label><br>
                    <?php
                        echo $num
                    ?>
                    <br><br>
                    <label class="ti">Propietario: </label><br>
                    <?php
                        // Comando para pedir el último folio de ticket generado
                        $sql="SELECT * FROM habitantes WHERE num_toma='$num'";
                        // Ejecución de consulta
                        $consulta=mysqli_query($conexion,$sql);
                        // Condición para revisar que se realice el comando
                        if ($consulta) {
                            // Se convierte la consulta en un tipo fila
                            // y se almacena en una variable
                            if($habitantes=mysqli_fetch_array($consulta)){
                                // Se imprime lo que tenga la consulta en su primera posición
                                $sql="INSERT INTO ayuda(valor) VALUES ($num)";
                                $consulta=mysqli_query($conexion,$sql);
                                if($consulta){
                                    echo $habitantes['nombre'];
                                    echo " ";
                                    echo $habitantes['apellido_p'];
                                    echo " ";
                                    echo $habitantes['apellido_m'];
                                }
                                
                                
                            }
                        }
                    ?>
                    <br><br>
                    <label class="ti">Domicilio: </label><br>
                    <?php
                        // Comando para pedir el último folio de ticket generado
                        $sql="SELECT * FROM domicilio WHERE id_domicilio='$habitantes[id_domicilio]'";
                        // Ejecución de consulta
                        $consulta=mysqli_query($conexion,$sql);
                        // Condición para revisar que se realice el comando
                        if ($consulta) {
                            // Se convierte la consulta en un tipo fila
                            // y se almacena en una variable
                            if($domicilio=mysqli_fetch_array($consulta)){
                                // Se imprime lo que tenga la consulta en su primera posición
                                echo $domicilio['colonia'];
                                echo ", ";
                                echo $domicilio['calle'];
                                echo ", No. ";
                                echo $domicilio['num_casa'];
                            }
                        }
                    ?>
                    <br><br>
                    <label class="ti">Cantidad pagada: </label><br>
                    <?php
                        // Comando para pedir el último folio de ticket generado
                        $sql="SELECT cantidad FROM tequios WHERE num_toma='$num'
                        ORDER BY num_toma DESC
                        LIMIT 1";
                        // Ejecución de consulta
                        $consulta=mysqli_query($conexion,$sql);
                        // Condición para revisar que se realice el comando
                        if ($consulta) {
                            // Se convierte la consulta en un tipo fila
                            // y se almacena en una variable
                            $pagado=mysqli_fetch_row($consulta);
                            // Se imprime lo que tenga la consulta en su primera posición
                            echo $pagado[0];
                        }
                    ?>
                    <br><br>

                    <label class="ti">Cantidad recibida: </label><br>
                    <?php
                        // Comando para pedir el último folio de ticket generado
                        $sql="SELECT pagado FROM tequios WHERE num_toma='$num'
                        ORDER BY num_toma DESC
                        LIMIT 1";
                        // Ejecución de consulta
                        $consulta=mysqli_query($conexion,$sql);
                        // Condición para revisar que se realice el comando
                        if ($consulta) {
                            // Se convierte la consulta en un tipo fila
                            // y se almacena en una variable
                            $recibida=mysqli_fetch_row($consulta);
                            // Se imprime lo que tenga la consulta en su primera posición
                            echo $recibida[0];
                        }
                    ?>
                    <br><br>

                    <label class="ti">Cambio: </label><br>
                    <?php
                        // Comando para pedir el último folio de ticket generado
                        $sql="SELECT cambio FROM tequios WHERE num_toma='$num'
                        ORDER BY num_toma DESC
                        LIMIT 1";
                        // Ejecución de consulta
                        $consulta=mysqli_query($conexion,$sql);
                        // Condición para revisar que se realice el comando
                        if ($consulta) {
                            // Se convierte la consulta en un tipo fila
                            // y se almacena en una variable
                            $cambio=mysqli_fetch_row($consulta);
                            // Se imprime lo que tenga la consulta en su primera posición
                            echo $cambio[0];
                        }
                    ?>
                    <br><br>
                    
                    <label class="ti">Fecha y Hora: </label>
                    <br>
                    <?php
                        // Metodo para especificar una zona horaria
                        date_default_timezone_set("America/Mexico_City");
                        //se alamcena en una variable la fecha del momento
                        $fecha= strftime("%y-%m-%d");
                        // Se muestra una fecha y una hora con el formato de php
                        echo date('l jS \of F Y h:i a');
                    ?><br><br>
                    <!-- Boton de tipo submit para el recibo -->
                    <input type="submit" value="Recibo" class="button" name="aceptar" formtarget="_blank">
                    <input type="submit" value="Salir" class="button" name="salir">
                </form> 
            </section>
        </div>
    </body>
</html>
