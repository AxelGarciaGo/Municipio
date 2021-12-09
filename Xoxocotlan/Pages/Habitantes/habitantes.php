<!-- Inicio del código php -->
<?php
    // Condición que indica si se selecciona el boton de registrar
    if (isset($_POST['agregar'])){
        require ("../cn.php");
        // Comando de consulta para insercción en tipo sql
        $sql="SELECT * FROM domicilio WHERE id_domicilio='$_REQUEST[idDomicilio]'";
        $consulta=mysqli_query($conexion,$sql);
        if($vacio=mysqli_fetch_row($consulta)>0){
            $sql="INSERT INTO habitantes(nombre, apellido_p, apellido_m, id_domicilio, correo) VALUES 
            ('$_REQUEST[nombre]','$_REQUEST[apellidoP]','$_REQUEST[apellidoM]','$_REQUEST[idDomicilio]','$_REQUEST[correo]')";
            // Validación de consulta
            $consulta=mysqli_query($conexion,$sql);
            // Condición para revisar si se hizo o no la consulta
            if($consulta){
                echo '<script >alert("Habitante Registrado");</script>';
            }else {
                echo '<script >alert("Registro fallido");</script>';
            }        
        }
        else{
            echo '<script >alert("Domicilio no encontrado");</script>';
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
        <title>Domicilio</title>
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
        <a href="javascript:void(0)" class="active">Habitantes</a>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" >
                <!-- etiquetas y campos de texto  -->
                <label form="name">Nombre</label><br>
                <input type="text" name="nombre" class="input" required pattern="[A-Za-z]{4,}"><br><br><br>
                <label>Apellido Paterno</label><br>
                <input type="text" name="apellidoP" class="input" required pattern="[A-Za-z]{4,}"><br><br><br>
                <label>Apellido Materno</label><br>
                <input type="text" name="apellidoM" class="input" required pattern="[A-Za-z]{4,}"><br><br><br>
                <label>ID Domicilio</label><br>
                <input type="text" name="idDomicilio" class="input" required pattern="[0-9]{1,}"><br><br><br>
                <label>Correo</label><br>
                <input type="text" name="correo" class="input" required><br><br><br>
                <!-- Botones de la página -->
                <input type="submit" value="Registrar" class="button" name="agregar"> 
                <input type="reset" value="Limpiar" class="button" >
            </form>
        </div>
    </body>
    
</html>