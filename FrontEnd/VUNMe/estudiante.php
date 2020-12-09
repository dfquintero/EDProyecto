

<!doctype html>
<html lang="ES-CO">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<title>VUNMe - Estudiante</title>
</head>

<body>
	<!--navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo/LOGO_Withe.png" alt="Logo" style="height: 50px;">
			</a>
			<!--collapse btn-->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
				aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor02">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<h6 class="nav-link" style="color: white;" href="#inicio">username </h6>
					</li>
					<li class="nav-item" style="align-self: left;">
						<a class="btn btn-danger" href="cerrar.php">Cerrar Sesión</a>
					</li>
				</ul>
			</div>

		</div>
	</nav>
	<!--content-->
	<div class="container" style="margin-top:80px">
		<hr />
		<div class="row">
			<!--perfil-->
			<div class="col-sm-4 ">
				<center>
					<img src="img/moreicons/userblank.png" style="width: 100px; height: 100px; margin: 20px;" />
				</center>
				<hr />
				<legend>username</legend>
				<div class="form-group row">
					<label for="lblproemail" class="col-lg-3 col-form-label">Email: </label>
					<div class="col-lg-9">
						<input type="text" readonly="" class="form-control-plaintext" id="lblpromail"
							value="email@unal.edu.co">
					</div>
				</div>
				<div class="form-group row">
					<label for="lblprotel" class="col-lg-3 col-form-label">Teléfono: </label>
					<div class="col-lg-9">
						<input type="phone" readonly="" class="form-control-plaintext" id="lblprotel"
							value="000-000-0000">
					</div>
				</div>
				<button type="button" class="btn btn-warning btn-md btn-block" data-toggle="modal"
					data-target="#ActualizarEstudiante">Actualizar Datos</button>
				<hr />
				<div class="modal fade" id="ActualizarEstudiante" tabindex="-1" role="dialog"
					aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Actualizar Datos</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="updatenombre">Nombre</label>
										<input type="text" class="form-control" id="updatename">
									</div>
									<div class="form-group">
										<label for="updatetel">Teléfono</label>
										<input type="tel" class="form-control" id="updatetel">
									</div>
									<div class="form-group">
										<label for="updateemail">Correo Electrónico</label>
										<input type="email" class="form-control" id="updateemail">
									</div>
									<div class="form-group">
										<label for="updatepsw">Contraseña</label>
										<input type="password" class="form-control" id="updatepsw">
									</div>
									<button type="submit" class="btn btn-success">Actualizar datos</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--main search-->
			<div class="col-sm-8">
				<form>
					<div class="row">
						<div class="col">
							<h5>Mis Prioridades</h5>
							<select class="custom-select custom-select-sm">
								<option selected>Prioridad1</option>
								<option value="1">Conexión WiFi</option>
								<option value="2">Comidas incluidas</option>
								<option value="3">Baño privado</option>
								<option value="4">Lavado de ropas</option>
								<option value="5">Áreas comúnes</option>
							</select>
							<br /><br />
							<select class="custom-select custom-select-sm">
								<option selected>Prioridad2</option>
								<option value="1">Conexión WiFi</option>
								<option value="2">Comidas incluidas</option>
								<option value="3">Baño privado</option>
								<option value="4">Lavado de ropas</option>
								<option value="5">Áreas comúnes</option>
							</select>
							<br /><br />
							<select class="custom-select custom-select-sm">
								<option selected>Prioridad3</option>
								<option value="1">Conexión WiFi</option>
								<option value="2">Comidas incluidas</option>
								<option value="3">Baño privado</option>
								<option value="4">Lavado de ropas</option>
								<option value="5">Áreas comúnes</option>
							</select>
						</div>
						<div class="col">
							<h5>Presupuesto</h5>
							<div class="form-group">
								<input type="number" class="form-control" id="PriceMin" placeholder="Precio Desde">
								<br />
								<input type="number" class="form-control" id="PriceMax" placeholder="Precio Hasta">
							</div>
						</div>

					</div>
					<br />
					<button type="submit" class="btn btn-info btn-lg btn-block">Buscar</button>
				</form>
				<hr />
				<?php include("Mostrar_habitaciones_sin_filtro.php");
					$pila = new Stack();
					$consulta = "SELECT ID_HABITACION, AMOBLADO ,PRECIO FROM HABITACION WHERE ID_HABITACION NOT IN (SELECT ID_HABITACION FROM OCUPA WHERE FECHA_FIN IS NULL)";
					if ($resultado = mysqli_query($conn, $consulta)) {
						while ($fila = mysqli_fetch_array($resultado)) {
							$pila->push($fila);
						}
						mysqli_free_result($resultado);
					}
					echo "<h1>Habitaciones <br></h1>";
					while (!($pila->isEmpty())){
						$current = $pila->pop();	
						
				?>
				<div class="card mb-3 border-success">
					<div class="card-header border-success h5">
						Habitación <?php echo $current['ID_HABITACION']; ?>
					</div>
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="img/roompics/room2.jpg" style="max-width: 100%; max-height: 100%;"
								class="card-img align-middle" alt="roomimg">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<p class="card-text"><?php echo $current['AMOBLADO']; ?></p>
								<p><i class="fas fa-map-marker-alt"></i> POR DEFINIR</p>
								<p><i class="fas fa-dollar-sign"></i> : <?php echo $current['PRECIO']; ?></p>
							</div>
						</div>
					</div>
					<div class="card-footer bg-secondary">
						<b style="color: white;">Servicios: </b>
						<i class="fas fa-dollar-toilet"></i>
						<i class="fas fa-toilet" style='font-size:24px; color:green'></i>
						<i class="fas fa-wifi" style='font-size:24px; color:green'></i>
						<i class="fas fa-tv" style='font-size:24px; color:grey'></i>
						<i class="fas fa-car" style='font-size:24px; color:grey'></i>
						<i class="fas fa-couch" style='font-size:24px; color:green'></i>
						<i class="fas fa-tshirt" style='font-size:24px; color:grey'></i>
						<i class="fas fa-utensils" style='font-size:24px; color:green'></i>
						<button type="button" class="btn btn-info float-right" data-toggle="modal"
							data-target="#exampleModalCenter">Agendar Cita</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Cita Agendada</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Felicidades su cita fue asignada para <b id="fechaasg">una fecha especifica</b>, el
										propietario se comunicará contigo para confirmar la hora y pueda conocer el
										lugar personalmente.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
					mysqli_close($conn);?>
				<!--nav pagination-->
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>
	</div>
	<!--footer-->
	<hr />
	<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color:#202020; color: #707070;">
		VUNMe - Todos los derechos reservados
	</nav>
	<!-- jQuery, Popper.js, and Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"crossorigin="anonymous"></script>
</body>

</html>
