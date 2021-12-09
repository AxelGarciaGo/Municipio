<?php
if (isset($_POST['aceptar'])){
    $id;
    $nombre=$_REQUEST['name'];
    $apellidoP=$_REQUEST['apellidoPa'];
    $apellidoM=$_REQUEST['apellidoMa'];
    $domicilio=$_REQUEST['idDomicilio'];
    $correo=$_REQUEST['email'];
    require ("../cn.php");
    $ayuda="SELECT * FROM ayuda";
    $resul=mysqli_query($conexion,$ayuda);
    if($resul){
        $valor=mysqli_fetch_row($resul);
        $id=$valor[0];
    }
    if($nombre!=''){
        $sql="UPDATE habitantes SET nombre='$nombre' WHERE num_toma='$id'";
        mysqli_query($conexion,$sql);
    }

    if($apellidoP!=''){
        $sql="UPDATE habitantes SET apellido_p='$apellidoP' WHERE num_toma='$id'";
        mysqli_query($conexion,$sql);
    }

    if($apellidoM!=''){
        $sql="UPDATE habitantes SET apellido_m='$apellidoM' WHERE num_toma='$id'";
        mysqli_query($conexion,$sql);
    }
  
    if($domicilio!=''){
        $sql="UPDATE habitantes SET id_domicilio='$domicilio' WHERE num_toma='$id'";
        mysqli_query($conexion,$sql);
    }
  
    if($correo!=''){
        $sql="UPDATE habitantes SET correo='$correo' WHERE num_toma='$id'";
        mysqli_query($conexion,$sql);
    }

  $sql="DELETE FROM Ayuda";
  mysqli_query($conexion,$sql);
  mysqli_close($conexion);
  header("Location: habitantesMostrar.php");
}
?>
<?php
  if (isset($_POST['cancelar'])){
    require ("../cn.php");
    $sql="DELETE FROM Ayuda";
    mysqli_query($conexion,$sql);
    header("Location: habitantesMostrar.php");
  }
?>
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
                <label >Nombre</label><br>
                <input type="text" name="name" class="input" pattern="[A-Za-z]{4,}"><br><br><br>
                <label>Apellido Paterno</label><br>
                <input type="text" name="apellidoPa" class="input"  pattern="[A-Za-z]{4,}"><br><br><br>
                <label>Apellido Materno</label><br>
                <input type="text" name="apellidoMa" class="input"  pattern="[A-Za-z]{4,}"><br><br><br>
                <label>ID Domicilio</label><br>
                <input type="text" name="idDomicilio" class="input"  pattern="[0-9]{1,}"><br><br><br>
                <label>Correo</label><br>
                <input type="text" name="email" class="input" ><br><br><br>
                <!-- Botones de la página -->
                <input type="submit" value="Aceptar" class="button" name="aceptar">
                <input type="submit" value="Cancelar" class="button" name="cancelar">  
			    <input type="reset" value="Limpiar" class="button">
            </form>
        </div>
    </body>
</html>