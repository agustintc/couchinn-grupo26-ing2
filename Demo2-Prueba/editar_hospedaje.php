<html>
<head>
<title>Modificar Hospedaje</title>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

  <link href="boots/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<header></header>
	<h1 align="center">Modificacion de Hospedaje</h1>
	<div style="text-align:center;" align="center">
	<div class="container">
		<form action="" method="POST" id="form-alta" name="form-alta" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="hospedaje" class="col-sm-3 form-control-label">Nombre del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Hospedaje" required>
				</div>
				<div class="col-sm-8" id="ErrorName"></div>
			</div>
			<div class="form-group row">
				<label for="direccionHospedaje" class="col-sm-3 form-control-label">Direccion del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="direccionHospedaje" name="direccionHospedaje" placeholder="Direccion del Hospedaje" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="capacidadHospedaje" class="col-sm-3 form-control-label">Capacidad</label>
				<div class="col-sm-6">
					<input class="form-control" type="number" min="1" max="15" id="capacidadHospedaje" name="capacidadHospedaje" required>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="hospedajes">Tipos de Hospedajes</label>
					<div class="col-sm-6">
						<select class="form-control" id="tiposHospedaje" name="tiposHospedaje" >
						<?php
							while ($tipos = mysqli_fetch_assoc($result)){
								$nombre = $tipos['nombre_tipo_hospedaje'];
						?>
							<option required  value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
							<?php
							}
							?>
						</select>
					</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="comienzo">Comienzo</label>
				<div class="col-sm-6">
					<input type="date" name="comienzo" id="comienzo" required>
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="finalizacion">Terminacion</label>
				<div class="col-sm-6">
					<input type="date" name="finalizacion" id="finalizacion" required>
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="descripcionHospedaje">Descripcion del Hospedaje</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="descripcionHospedaje" name="descripcionHospedaje" rows="3" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="imagenesHospedaje">Imagenes del Hospedaje:</label>
				<div class="col-sm-6">
					<input type="file" id="file" name="file[]" multiple="multiple" required><a>Debe de seleccionar todas las imagenes a subir</a>
				</div>
			</div>
			<input type="submit" id="enviar" name="enviar" value="Upload">
		</form>
	</div>
</div>
</body>
</head>