<!-- Inicio del código php -->
<?php
    // Condición que indica si se selecciona el boton de registrar
    if (isset($_POST['agregar'])){
        require ("../cn.php");
        $num=$_REQUEST['numToma'];
        // Metodo para especificar una zona horaria
        date_default_timezone_set("America/Mexico_City");
        //se alamcena en una variable la fecha del momento
        $fecha= strftime("%y-%m-%d");
        //operacion para el cambio
        $cambio=$_REQUEST['recibido']-$_REQUEST['cantidad'];
        // Comando de consulta para insercción en tipo sql
        if($cambio>=0){
            $sql="SELECT * FROM habitantes WHERE num_toma='$_REQUEST[numToma]'";
            $consulta=mysqli_query($conexion,$sql);
            if($consulta){
                if($vacio=mysqli_fetch_row($consulta)>0){
                    $sql="INSERT INTO agua(num_toma, anio, cantidad, pagado, cambio, fecha) VALUES 
                    ('$_REQUEST[numToma]','$_REQUEST[anio]','$_REQUEST[cantidad]','$_REQUEST[recibido]','$cambio','$fecha')";
                    // Validación de consulta
                    $consulta=mysqli_query($conexion,$sql);
                    // Condición para revisar si se hizo o no la consulta
                    if($consulta){
                        // Redireccionamiento de la pagina
                        header("Location:aguaRecibo.php?var_pin=".($num));
                    }else{
                        // Alerta que se envía en caso de no poder generar la consulta
                        echo '<script >alert("Registro Fallido");</script>';
                    }
                }
                else{
                    echo '<script >alert("Numero de toma no registrada");</script>';
                }
            }
            else{
                echo '<script >alert("Error en los valores ingresados");</script>';
            }
        }else{
            echo '<script >alert("Se debe agregar un valor mayor en el pago recibido");</script>';
        }
        // Cierre de la conexión
        mysqli_close($conexion);
    }
?>
<!-- Fin del código php -->
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        <!-- Conexión con el archivo css para el diseño -->
        <link rel="stylesheet" type="text/css" href="../../CSS/estiloMenu.css?ts=<?=time()?>">
        <title>Agua</title>
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
            <a href="javascript:void(0)" class="active">Agua potale</a>
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
        <!-- Inicio de la sección que contiene las etiquetas y los campos de texto -->
        <div align="center">
            <!-- Incio de la sección que permitirá la conexión con el código php -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <!-- etiquetas y campos de texto  -->
                <label >Numero de Toma</label><br>
                <input type="number" name="numToma" class="input" pattern="[0-9]{1,}" required><br><br><br>
                <label>Año</label><br>
                <input type="text" name="anio" class="input" pattern="[0-9]{4,4}" placeholder="ej: 1998"><br><br><br>
                <label>Cantidad a pagar</label><br>
                <input type="number" name="cantidad" class="input" placeholder="$" required><br><br><br>
                <label>Cantidad recibida</label><br>
                <input type="number" name="recibido" class="input" placeholder="$" required ><br><br><br>
                <!-- Botones de la página -->
                <input type="submit" value="Registrar" class="button" name="agregar"> 
                <input type="reset" value="Limpiar" class="button" >
            </form>
        </div>
    </body>
</html>