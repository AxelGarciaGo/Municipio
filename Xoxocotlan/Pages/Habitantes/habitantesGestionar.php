<!-- inicio de php -->
<?php
// verificación en caso de que se elija la opción de eliminar
 if (isset($_POST['eliminar'])){
    require ("../cn.php");
    // Comando de colsuta sql
    // Busca el empleado con el id que se ingreso
    $sql="SELECT * FROM habitantes WHERE num_toma='$_REQUEST[numToma]'";
    // Se realiza la consulta
    $consulta=mysqli_query($conexion,$sql); 
    if ($consulta) {
      // Se convierte la consulta en una fila para conocer lo que retorno
      $valor= mysqli_fetch_row($consulta);
      // se compara el resultado retornado
      // en caso de ser 0 no retorno ningún valor
      // en caso de ser myor a 0 retorno un valor
      if ($valor>0){
        // Comando de sql para la eliminación del empleado según el rfc ingresado
        $sql="DELETE FROM habitantes WHERE num_toma='$_REQUEST[numToma]'";
        // Se ejecuta el comando
        $consulta=mysqli_query($conexion,$sql);
        // Alerta en caso de ser eliminado correctamente
        echo '<script> alert("Habitante eliminado");</script>';
      }else{
        // alerta en caso de que el rfc no exista
        echo '<script> alert("ERROR: El habitante no existe");</script>';
      }
    }else{
      // alerta en caso de que este mal la conexión o el comando
      echo '<script> alert("ERROR: No se puede conectar en este momento");</script>';
    }
    // cierre de la conexión
    mysqli_close($conexion);
  }
?>
<!-- fin de php -->
<!-- inicio de php -->
<?php
// Inicio de sentencia if en caso de elegir la opción de modificar
if (isset($_POST['modificar'])) {
    require ("../cn.php");
    // Comando sql para la busqueda del empleado con el rfc ingresado
    $sql="SELECT * FROM habitantes WHERE num_toma='$_REQUEST[numToma]'";
    // Se ejecuta el comando
    $consulta=mysqli_query($conexion,$sql); 
    // Verificación de que la consulta se haya echo
    if ($consulta) {
      // Conversión de la consulta en una fila para conocer el valor
      $valor= mysqli_fetch_row($consulta);
      // se compara el resultado retornado
      // en caso de ser 0 no retorno ningún valor
      // en caso de ser myor a 0 retorno un valor
      if ($valor>0){
        // Se genera un camando para guardar el rfc en una tabla de apoyo
        $sql="INSERT INTO ayuda (valor) VALUES ('$_REQUEST[numToma]')";
        // Se ejecuta el comando
        $consulta=mysqli_query($conexion,$sql);
        header ("Location: modificarHabitante.php");
        
      }else{
        // alerta en caso de que el rfc este mal o no exista
        echo '<script> alert("ERROR: El habitante no existe");</script>';
      }
    }else{
      // alerta en caso de que este mal la conexión o el comando inicial
      echo '<script> alert("ERROR: No se puede conectar en este momento");</script>';
    }
    // cierre de la conexión
    mysqli_close($conexion);
}
?>
<!-- fin php -->
<!DOCTYPE html>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        <!-- Conexión con el archivo css para el diseño -->
        <link rel="stylesheet" type="text/css" href="../../CSS/estiloMenu.css?ts=<?=time()?>">
        <title>Gestion</title>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="registro">
                <!-- etiquetas y campos de texto  -->
                <label form="name">Numero de toma</label><br>
                <input type="text" name="numToma" class="input" required pattern="[0-9]{1,}"><br><br><br>
                
                <!-- Botones de la página -->
                <input type="submit" value="Eliminar" class="button" name="eliminar">
                <input type="submit" value="Modificar" class="button" name="modificar"> 
                 <input type="reset" value="Limpiar" class="button">
            </form>
        </div>
    </body>
    
</html>