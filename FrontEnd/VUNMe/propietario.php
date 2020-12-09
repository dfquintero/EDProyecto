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
	<title>VUNMe - Propietario</title>
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
						<a class="btn btn-danger" href="index.html">Cerrar Sesión</a>
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
				<div class="form-group row">
					<label for="lblprovip" class="col-lg-3 col-form-label">VIP: </label>
					<div class="col-lg-9">
						<input type="text" readonly="" class="form-control-plaintext" id="lblprotel" value="NO">
					</div>
				</div>
				<button type="button" class="btn btn-warning btn-md btn-block" data-toggle="modal"
					data-target="#ActualizarPropietario">Actualizar Datos</button>
				<hr />
				<div class="modal fade" id="ActualizarPropietario" tabindex="-1" role="dialog"
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
			<!--tabs-->
			<div class="col-sm-8">
				<ul class="nav nav-pills nav-justified ">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#visitas">Agenda de Visitas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu1">Habitaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu2">Nueva Habitación</a>
					</li>
				</ul>
				<div class="tab-content">
					<!--panel de agenda de visitas-->
					<div class="tab-pane container active" id="visitas">
						<hr />

						<form action="/action_page.php">
							<label for="filtrovisitas">Filtrar por fecha:</label>
							<input type="date" id="visitasInicio" name="visitasInicio">
							<input type="date" id="VisitasFin" name="visitasFin">
							<input type="submit" value="Buscar">
						</form>
						<hr />
						<div class="list-group">
                        <?php include("Organizar_visitas_por_fecha.php");
                            foreach ($inOrder as &$valor){
                                $ID = $valor['ID_ESTUDIANTE'];


                        ?>
							<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-1"> Habitación: <?php echo $valor['ID_HABITACION']; ?></h5>
									<small>2020/12/3</small>
								</div>
								<p class="mb-1"><b>Estudiante: </b><?php echo $valor['ID_ESTUDIANTE']; ?></p>
                            </a>
                            <?php }?>
						</div>
						<hr />
					</div>
					<!--Panel de habitaciones-->
					<div class="tab-pane container fade" id="menu1">
						<hr />
						<form>
							<div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
								<label class="btn btn-outline-primary active">
									<input type="radio" name="options" id="option1" checked>Ver Todo
								</label>
								<label class="btn btn-outline-success">
									<input type="radio" name="options" id="option2"> Disponibles
								</label>
								<label class="btn btn-outline-danger">
									<input type="radio" name="options" id="option3"> Ocupadas
								</label>
							</div>
							<div class="form-group">
								<label for="ebuscahash">Búsqueda basada en palabras clave</label>
								<input type="text" class="form-control" id="buscahash">
							</div>
							
							<button type="submit" class="btn btn-info btn-block">Buscar</button>
						</form>
                        <hr />
                        
						<div class="card mb-3 border-dark">
							<div class="card-header navbar-dark border-dark h5 color-red">
								Room 404
								<span class="badge badge-success border- float-right">Disponible</span>
							</div>
							<div class="row no-gutters">
								<div class="col-md-4">
									<img src="img/roompics/room1.jpg" style="max-width: 100%; max-height: 100%;"
										class="card-img align-middle" alt="roomimg">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<p class="card-text">Habitación amoblada con todos los servicios incluidos</p>
										<p><i class="fas fa-map-marker-alt"></i> : Calle 00 # 00 - 00 </p>
										<p><i class="fas fa-dollar-sign"></i> : $700.000</p>
									</div>
									<b>Servicios: </b>

									<i class="fas fa-wifi" style='font-size:30px; color:green'></i>
									<i class="fas fa-utensils" style='font-size:30px; color:green'></i>
									<i class="fas fa-toilet" style='font-size:30px; color:green'></i>
									<i class="fas fa-tshirt" style='font-size:30px; color:grey'></i>
									<i class="fas fa-couch" style='font-size:30px; color:green'></i>
								</div>
							</div>
							<div class="card-footer bg-light">
								<form>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-outline-success">
											<input type="radio" name="options" id="option1" autocomplete="off" checked>
											Disponible
										</label>
										<label class="btn btn-outline-danger">
											<input type="radio" name="options" id="option2" autocomplete="off">
											Ocupado
										</label>
									</div>
									<button type="button" class="btn btn-warning float-right">Modificar</button>
								</form>

							</div>
						</div>
						</br></br>

						</br></br>
					</div>
					<!--Panel nueva habitación-->
					<div class="tab-pane container fade" id="menu2">
						<form>

							<div class="form-group">
								<label for="newroomName">Nombre</label>
								<input type="text" class="form-control" id="newroomName">
							</div>
							<div class="form-group">
								<label for="newroomDir">Dirección</label>
								<input type="text" class="form-control" id="newroomDir">
							</div>

							<div class="form-group">
								<label for="newroomPrice">Precio</label>
								<input type="number" class="form-control" id="newroomPrice"
									aria-describedby="priceHelp">
								<small id="priceHelp" class="form-text text-muted">Sin signos ni puntos.</small>
							</div>

							<div class="form-group">
								<label for="newroomServ">Servicios Disponibles</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="newroomServ1">
									<label class="form-check-label" for="newroomServ1">
										Conexión Wi-Fi
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="newroomServ2">
									<label class="form-check-label" for="newroomServ2">
										Comidas Incluidas
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="newroomServ3">
									<label class="form-check-label" for="newroomServ3">
										Baño Privado
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="newroomServ4">
									<label class="form-check-label" for="newroomServ4">
										Lavado de ropas
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="newroomServ5">
									<label class="form-check-label" for="newroomServ5">
										Áreas comunes
									</label>
								</div>

							</div>
							<div class="form-group">
								<label for="newroomDesc">Descripción</label>
								<textarea class="form-control" id="newroomDesc" rows="4"></textarea>
							</div>
							<button type="reset" class="btn btn-md btn-danger">CANCELAR</button>
							<button type="submit" class="btn bt-md btn-success">CREAR HABITACIÓN</button>

						</form>

					</div>
				</div>
			</div>

		</div>
		<hr />
	</div>
	<!--footer-->

	<br /><br />
	<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color:#202020; color: #707070;">
		VUNMe - Todos los derechos reservados
	</nav>
	<!-- jQuery, Popper.js, and Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
		integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
		crossorigin="anonymous"></script>
</body>

</html>