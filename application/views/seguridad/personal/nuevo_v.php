<html>
<head>
	<title>Ecstasy Gym</title>
	<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<?php include('includes/css_principal.inc');?>
</head>
<body>
	<?php include('includes/menu.inc');?>

	<div class="main-container inner">
			<!-- start: PAGE -->
		<div class="main-content">

				<div class="container">
					<div class="toolbar row">
						<div class="col-sm-6 hidden-xs">
							<div class="page-header">
								<h1>Personal <small>Se guardarán los datos del personal que trabaja en la empresa</small></h1>
							</div>
						</div>

					</div>
					<br>
					<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">

									<div class="panel-body">
										<form class="form-horizontal" >  <!-- action="<?php echo site_url("Personal_c/nuevo"); ?>" -->
											<div class="row">
												<div class="col-md-2">
													<label class="control-label">DNI</label>
													<input maxlength="8" required name="dni" type="text" placeholder="Digite su DNI" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="control-label">NOMBRES</label>
													<input required name="nombres" type="text" placeholder="Digite sus Nombres" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="control-label">APELLIDO PATERNO</label>
													<input required name="apellido_paterno" type="text" placeholder="Digite su Apellido Paterno" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="control-label">APELLIDO MATERNO</label>
													<input required name="apellido_materno" type="text" placeholder="Digite su Apellido Materno" class="form-control">
												</div>

												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">EMAIL</label>
													<input required name="email" type="text" placeholder="Digite su correo" class="form-control">
												</div>
												<div class="col-md-3">
													<label class="control-label">TELEFONO</label>
													<input required name="telefono" type="text" placeholder="Digite su Teléfono" class="form-control">
												</div>
												<div class="col-md-5">
													<label class="control-label">DIRECCION</label>
													<input  required name="direccion" type="text" placeholder="Digite su Dirección" class="form-control">
												</div>
												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">DEPARTAMENTO</label>
													<?php echo form_dropdown('iddepartamento', $departamentos, '', 'class="form-control" required'); ?>
												</div>

												<div class="col-md-4">
													<label class="control-label">PROVINCIA</label>
													<div id="provincia">
														<?php
														$options = array("" => "Seleccione Provincia");
														echo form_dropdown('idprovincia', $options, '', 'class="form-control" required'); ?>
													</div>
												</div>

												<div class="col-md-4">
													<label class="control-label">DISTRITO</label>
													<div id="distrito">
														<?php echo form_dropdown('iddistrito', array("" => "Seleccione Distrito"), '', 'class="form-control" required'); ?>
													</div>
												</div>

												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">SECTOR</label>
													<div id="sector">
														<?php echo form_dropdown('idsector', array("" => "Seleccione Sector"), '', 'class="form-control" required'); ?>
													</div>

												</div>
												<div class="col-md-1 ">
													<br>
													<a id= "btn_modal_sector" class="btn btn-green add-row"  style="margin-top: 10px; margin-left: -10;">
														<i class="fa fa-plus"></i>
													</a>
												</div>
												<div class="col-md-4">
													<label class="control-label">PERFIL DE USUARIO</label>
													<div id="perfil">
														<?php echo form_dropdown('idperfil_usuario', $perfiles, '', 'class="form-control" required'); ?>
													</div>
												</div>

												<div class="col-md-1 ">
													<br>
													<a id= "btn_modal_perfil" class="btn btn-green add-row"  style="margin-top: 10px; margin-left: -10;">
														<i class="fa fa-plus"></i>
													</a>
												</div>

												<br><br><br><br><br>

												<div class="col-md-12">
													<center>
														<button id="btn_enviar" class="btn btn-green add-row"  style="margin-top: 5px; margin-left:30px;">
															GRABAR DATOS <i class="fa fa-plus"></i>
														</button>
													</center>
												</div>

											</div>

										</form>
									</div>
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>


					</div>
				</div>
			<!-- end: PAGE -->
		</div>
	</div>
	<!-- sector -->
	<div id="dialogo_departamento" style="display:none">
		Por Favor! Seleccione Primero un Departamento
	</div>

	<div id="dialogo_provincia" style="display:none">
			Luego una Provincia!
	</div>

	<div id="dialogo_distrito" style="display:none">
		Y Despues un Distrito!

	</div>

	<!-- individuales -->
	<div id="dialogo_provincia2" style="display:none">
		Por Favor! Seleccione Antes una Provincia
	</div>
	<div id="dialogo_distrito2" style="display:none">
		Por Favor! Seleccione Antes un Distrito
	</div>



			<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Nuevo Sector</h4>
						</div>
						<div class="modal-body">

							<label class="control-label">Sector</label>
							<input type="text" name="nuevo_sector" placeholder="Escriba el nuevo Sector" class="form-control">

						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-dismiss="modal" id="boton_sector" type="button">
								Guardar
							</button>
							<button data-dismiss="modal" class="btn btn-default" type="button">
								Cancelar
							</button>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
			</div>


			<div class="modal fade bs-example-modal-sm" id="myModal_perfil" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Nuevo Perfil de Usuario</h4>
						</div>
						<div class="modal-body">

							<label class="control-label">Perfil de Usuario</label>
							<input type="text" name="nuevo_perfil" placeholder="Escriba el nuevo Perfil" class="form-control">

						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" data-dismiss="modal" id="boton_perfil" type="button">
								Guardar
							</button>
							<button data-dismiss="modal" class="btn btn-default" type="button">
								Cancelar
							</button>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
			</div>
	<?php include('includes/pie.inc');?>

	<?php include('includes/js_principal.inc');?>

	<script>
		$("#btn_modal_perfil").click(function(){
			$('#myModal_perfil').modal('show');
		})

		$("#boton_perfil").click(function(){
			var descripcion = $("input[name=nuevo_perfil]").val();
			$.post("<?php echo site_url('Personal_c/insert_nuevo_perfil'); ?>",{descripcion:descripcion},response_nuevo_perfil);
		});

		function response_nuevo_perfil(data)
		{
			info = data.split("|");
			if(info[1] == "1")
			{
				$("#perfil").empty();
				$("#perfil").html(info[0]);
				$("input[name=nuevo_perfil]").val("");
				alerta_message("Se Guardó Correctamente","Mensaje","success");
			}
			else
			{
				alerta_message("Hubo un error al insertar","Mensaje","error");
			}
		}

		//GUARDAR TODO LOS DATOS DEL EMPLEADO
		$("#btn_enviar").click(function(){
			var dni = $("input[name=dni]").val();
			var nombres = $("input[name=nombres]").val();
			var apellido_paterno = $("input[name=apellido_paterno]").val();
			var apellido_materno = $("input[name=apellido_materno]").val();
			var telefono = $("input[name=telefono]").val();
			var direccion = $("input[name=direccion]").val();
			var idsector = $("select[name=idsector]").val();
			var email = $("input[name=email]").val();
			var idperfil = $("select[name=idperfil_usuario]").val();

			$.post("<?php echo site_url('Personal_c/nuevo'); ?>",
				{dni:dni,nombres:nombres,apellido_materno:apellido_materno,apellido_paterno:apellido_paterno,telefono:telefono,direccion:direccion,
					idsector:idsector,email:email,idperfil:idperfil},rpta_empleado);

		});

		function rpta_empleado(rpta_data)
		{
			if(rpta_data == 0)
			{
				window.location = "<?php echo site_url('Personal_c'); ?>";
			}
			else
			{



			}
		}

		function redireccionar()
		{
			window.location = "<?php echo site_url('Personal_c'); ?>";
		}


		$("select[name=iddepartamento]").change(function(){
			$("select[name=iddepartamento] option:selected").each(function(){
				if($(this).val() == "")
				{
					$("#provincia").empty();
					$("#provincia").html("<select name='idprovincia' class='form-control'><option value='' selected>Seleccione Provincia</option></select>");
				}
				else
				{
					$.post("<?php echo site_url('Personal_c/traer_provincia'); ?>",{iddepartamento:this.value},response_provincia);
				}

			});
			function response_provincia(info)
			{
				$("#provincia").empty();
				$("#provincia").html(info);
			}

		});

		$("#provincia").click(function (){
			var iddepartamento = $("select[name=iddepartamento]").val();
			if(iddepartamento == "")
			{
			   $("#dialogo_departamento").css("display","block");
			   setTimeout('desaparecer(1)', 1000);
			}
		});

		$("#distrito").click(function (){
			var iddepartamento = $("select[name=iddepartamento]").val();
			var idprovincia = $("select[name=idprovincia]").val();

			if(iddepartamento == "" && idprovincia == "")
			{
				$("#dialogo_departamento").css("display","block");
				setTimeout('dialogo_provincia()',500);
				setTimeout('desaparecer(2)', 1000);
			}
			else
			{
				if(iddepartamento != "" && idprovincia == "")
				{
					$("#dialogo_provincia2").css("display","block");
					setTimeout('desaparecer(3)', 1000);
				}
			}

		});

		$("#sector").click(validacion_region);

		function validacion_region()
		{
			var iddepartamento = $("select[name=iddepartamento]").val();
			var idprovincia = $("select[name=idprovincia]").val();
			var iddistrito = $("select[name=iddistrito]").val();

			if(iddepartamento == "" && idprovincia == "" && iddistrito == "")
			{
				$("#dialogo_departamento").css("display","block");
				setTimeout('dialogo_provincia()',500);
				setTimeout('dialogo_distrito()',1000);
				setTimeout('desaparecer(4)', 3000);
				return true;
			}
			else
			{
				if(iddepartamento != "" && idprovincia == "" && iddistrito == "")
				{
					$("#dialogo_provincia2").css("display","block");
					setTimeout('dialogo_distrito()',500);
					setTimeout('desaparecer(5)', 2000);
					return true;
				}
				else
				{
					if(iddepartamento != "" && idprovincia != "" && iddistrito == "")
					{
						$("#dialogo_distrito2").css("display","block");
						setTimeout('desaparecer(6)', 1000);
						return true;
					}
					else
					{
						return false;
					}
				}
			}
		}

		function dialogo_provincia()
		{
			$("#dialogo_provincia").css("display","block");
		}

		function dialogo_distrito()
		{
			$("#dialogo_distrito").css("display","block");
		}

		function desaparecer(caso)
		{
			switch(caso)
			{
				case 1:
					$("#dialogo_departamento").fadeOut("slow");
					break;
				case 2:
					$("#dialogo_departamento").fadeOut("slow");
					$("#dialogo_provincia").fadeOut("slow");
					break;
				case 3:
					$("#dialogo_provincia2").fadeOut("slow");
					break;
				case 4:
					$("#dialogo_departamento").fadeOut("slow");
					$("#dialogo_provincia").fadeOut("slow");
					$("#dialogo_distrito").fadeOut("slow");
					break;
				case 5:
					$("#dialogo_provincia2").fadeOut("slow");
					$("#dialogo_distrito").fadeOut("slow");
					break;
				case 6:
					$("#dialogo_distrito2").fadeOut("slow");
					break;
			}
		}

		function traer_distrito(idprovincia)
		{
			var idprovincia = $("select[name=idprovincia]").val();
			if(idprovincia == "")
			{

				$("#distrito").empty();
				$("#distrito").html("<select name='iddistrito' class='form-control'><option value='' selected >Seleccione Distrito</option></select>");
			}
			else
			{
				$.post("<?php echo site_url('Personal_c/traer_distrito'); ?>",{idprovincia:idprovincia},response_distrito);
			}

		}



		function response_distrito(info)
		{
			$("#distrito").empty();
			$("#distrito").html(info);
		}


		function traer_sector(iddistrito)
		{
			if(iddistrito == "")
			{
				$("#sector").empty();
				$("#sector").html("<select name='idsector' class='form-control'><option value='' selected >Seleccione Sector</option></select>");
			}
			else
			{
				$.post("<?php echo site_url('Personal_c/traer_sector'); ?>",{iddistrito:iddistrito},response_sector);
			}
		}

		function response_sector(info)
		{
			$("#sector").empty();
			$("#sector").html(info);
		}

		$("#btn_modal_sector").click(function(){
			var decision = validacion_region();
			if(decision == false)
			{
				$('#myModal').modal('show');
			}

		})

		$("#boton_sector").click(function(){

			var iddistrito = $("select[name=iddistrito]").val();
			var nuevo_sector = $("input[name=nuevo_sector]").val();
			$.post("<?php echo site_url('Personal_c/insert_nuevo_sector'); ?>",{iddistrito:iddistrito,nuevo_sector:nuevo_sector},response_nuevo_sector);
		});

		function response_nuevo_sector(data)
		{
			info = data.split("|");
			if(info[1] == "1")
			{
				$("#sector").empty();
				$("#sector").html(info[0]);
				$("input[name=nuevo_sector]").val("");
				alerta_message("Se Guardó Correctamente","Mensaje","success");
			}
			else
			{
				alerta_message("Hubo un error al insertar","Mensaje","error");
			}
		}


		function alerta_message(msg,title,method)
		{
			var shortCutFunction = method;
            var msg = msg;
            var title = title || '';
            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;
		}




	</script>
</body>

</html>

