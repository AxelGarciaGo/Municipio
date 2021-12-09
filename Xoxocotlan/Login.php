<!-- Código php -->
<?php
// se inicializa la condición if que verifica si es que el boton de iniciar a sido  seleccionado
	if (isset($_POST['submit'])) {
		$usuario=$_REQUEST['idUsuario'];
		$clave=$_REQUEST['clave'];
		if($usuario=='Admin' && $clave=='1'){
			//se agregan los valores de la base de datos para hacer conexión
			$servidor="localhost";
			$usuario="root";
			$contra="";
			// se guarda la conexión
			$conexion=mysqli_connect($servidor,$usuario,$contra);
			//se genera el código sql que tomará el valor según lo que indica
			$sql="CREATE DATABASE municipio";
			//se ejecuta la conexión con la base de datos y el código sql, y se almacena en una variable
			$consulta=mysqli_query($conexion,$sql); 
			if ($consulta) {
				$servidor="localhost";
				$usuario="root";
				$contra="";
				$db="municipio";
				$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
				$creardomicilio="CREATE TABLE domicilio (id_domicilio INT AUTO_INCREMENT UNIQUE PRIMARY KEY, calle VARCHAR(30),
					num_casa INT, colonia VARCHAR(30))";
				$consulta=mysqli_query($conexion,$creardomicilio);
				if($consulta){
					$servidor="localhost";
					$usuario="root";
					$contra="";
					$db="municipio";
					$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
					$crearhabitantes="CREATE TABLE habitantes (num_toma INT AUTO_INCREMENT PRIMARY KEY, 
					nombre VARCHAR(15), apellido_p VARCHAR(15), apellido_m VARCHAR(15), 
					id_domicilio INT UNIQUE, correo VARCHAR(50) UNIQUE, FOREIGN KEY(id_domicilio) REFERENCES domicilio(id_domicilio))";
					$consulta=mysqli_query($conexion,$crearhabitantes);
					if($consulta){
						$servidor="localhost";
						$usuario="root";
						$contra="";
						$db="municipio";
						$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
						$crearAgua="CREATE TABLE agua (num_toma INT, anio CHAR(4), 
						cantidad FLOAT, pagado FLOAT, cambio FLOAT, fecha DATE, 
						FOREIGN KEY(num_toma) REFERENCES habitantes(num_toma))";
						$consulta=mysqli_query($conexion,$crearAgua);
						if($consulta){
							$servidor="localhost";
							$usuario="root";
							$contra="";
							$db="municipio";
							$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
							$crearAlumbrado="CREATE TABLE alumbrado (num_toma INT, 
							anio CHAR(4), cantidad FLOAT, pagado FLOAT, cambio FLOAT, fecha DATE, 
							FOREIGN KEY(num_toma) REFERENCES habitantes(num_toma))";
							$consulta=mysqli_query($conexion,$crearAlumbrado);
							if($consulta){
								$servidor="localhost";
								$usuario="root";
								$contra="";
								$db="municipio";
								$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
								$crearTequios="CREATE TABLE tequios (num_toma INT, 
								anio CHAR(4), cantidad FLOAT, pagado FLOAT, cambio FLOAT, fecha DATE, 
								FOREIGN KEY(num_toma) REFERENCES habitantes(num_toma))";
								$consulta=mysqli_query($conexion,$crearTequios);
								if($consulta){
									$servidor="localhost";
									$usuario="root";
									$contra="";
									$db="municipio";
									$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
									$crearFestividades="CREATE TABLE festividades (num_toma INT,
									anio CHAR(4), cantidad FLOAT, tipo VARCHAR(20), pagado FLOAT, cambio FLOAT, fecha DATE, 
									FOREIGN KEY(num_toma) REFERENCES habitantes(num_toma))";
									$consulta=mysqli_query($conexion,$crearFestividades);
									if($consulta){
										$servidor="localhost";
										$usuario="root";
										$contra="";
										$db="municipio";
										$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
										$ayuda="CREATE TABLE ayuda (valor VARCHAR(15))";
										$consulta=mysqli_query($conexion,$ayuda);
										if($consulta){
											$servidor="localhost";
											$usuario="root";
											$contra="";
											$db="municipio";
											$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
											$usuarios="CREATE TABLE usuarios (nombre VARCHAR(15) NOT NULL UNIQUE, contrasena VARCHAR(32) NOT NULL)";
											$consulta=mysqli_query($conexion,$usuarios);
											if($consulta){
												header("Location: Pages/Menu.html");
											}
										}
									}
								}
							}
						}
					}
				}
				mysqli_close($conexion);
			}
			else{
				//alerta en caso de conectarse a la base de datos
				echo '<script> alert("No se puede conectar a la base o ya se uso el usaurio principal");</script>';
			}
		}
		else{
			$servidor="localhost";
			$usuario="root";
			$contra="";
			$db="municipio";
			$conexion=mysqli_connect($servidor,$usuario,$contra,$db);
			$ayuda="SELECT * FROM usuarios WHERE nombre='$_REQUEST[idUsuario]' AND contrasena=MD5('$_REQUEST[clave]')";
			$consulta=mysqli_query($conexion,$ayuda);
			if($consulta){
				$valor= mysqli_fetch_row($consulta);
            	// se compara el resultado retornado
            	// en caso de ser 0 no retorno ningún valor
            	// en caso de ser myor a 0 retorno un valor
            	if ($valor>0){
                // Alerta que se envía si se puede hacer la consulta
                header("Location: Pages/Menu.html");
				mysqli_close($conexion);
            	}
				else{
					echo '<script> alert("Usuario o contraseña erronea");</script>';
				}
			}
			else{
				//alerta en caso de conectarse a la base de datos
				echo '<script> alert("No se puede conectar a la base o ya se uso el usaurio principal");</script>';
			}
		}
	}
	
		
?>
<!-- Fin de código php -->
<!-- Código html -->
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- enlace con el archivo css -->
	<link rel="stylesheet" type="text/css" href="CSS/estilosLogin.css?ts=<?=time()?>">
	<!-- enlace para un tipo de letra -->
	<link href = "https://fonts.googleapis.com/css2? family = Architects + Daughter & display = swap" rel = "stylesheet">
	<title>Login</title>
</head>
<body class="bodyLogin">
	<!-- Sección para el centrado del login-->
	<div align="center">
		<!-- Sección para el diseño del login -->
		<section id="login"><br><br>
			<p class="pLogin"></p>
			<img src="./Images and icons/icon6.png" width="20%"; height="100px"><!-- Icono -->
			<br><br><br>
			<!-- inicio de form que permite el inicio del código php -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
				<!-- etiqueta -->
				<p class="pLogin">Ingrese su nombre de usuario:</p>
				<!-- cuadro de texto -->
				<p class="pLogin"><input type="text" name="idUsuario" placeholder="Nombre de Usuario" class="alineacion textLogin" required></p><br>
				<!-- Etiqueta -->
				<p class="pLogin">Ingrese su clave:</p>
				<!-- Cuadro de texto tipo password -->
				<p class="pLogin"><input type="password" name="clave" placeholder="Clave" class="alineacion textLogin" required></p><br><br>
				<!-- Boton para la activaciòn del php -->
				<button style="vertical-align: middle;" class="button button2" name="submit"><span>Ingresar</span></button>
			</form>
		</section>
	</div>
</body>
</html>
