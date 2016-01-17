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
										<form role="form" class="form-horizontal" action="<?php  ?>">
											<div class="row">

												<div class="col-md-4">
													<label class="control-label">DNI</label>
													<input type="text" placeholder="Digite su DNI" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="control-label">NOMBRES</label>
													<input type="text" placeholder="Digite sus Nombres" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="control-label">APELLIDO PATERNO</label>
													<input type="text" placeholder="Digite su Apellido Paterno" class="form-control">
												</div>

												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">APELLIDO MATERNO</label>
													<input type="text" placeholder="Digite su Apellido Materno" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="control-label">EMAIL</label>
													<input type="text" placeholder="Digite su correo" class="form-control">
												</div>
												<div class="col-md-4">
													<label class="control-label">TELEFONO</label>
													<input type="text" placeholder="Digite su Teléfono" class="form-control">
												</div>

												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">DEPARTAMENTO</label>
													<?php echo form_dropdown('iddepartamento', $departamentos, '', 'class="form-control"'); ?>
												</div>

												<div class="col-md-4">
													<label class="control-label">PROVINCIA</label>
													<div id="provincia">
														<?php
														$options = array("" => "Seleccione Provincia");
														echo form_dropdown('idprovincia', $options, '', 'class="form-control"'); ?>
													</div>
												</div>

												<div class="col-md-4">
													<label class="control-label">DISTRITO</label>
													<div id="distrito">
														<?php echo form_dropdown('iddistrito', array("" => "Seleccione Distrito"), '', 'class="form-control"'); ?>
													</div>
												</div>

												<br><br><br><br>

												<div class="col-md-4">
													<label class="control-label">SECTOR</label>
													<div id="sector">
														<?php echo form_dropdown('idsector', array("" => "Seleccione Sector"), '', 'class="form-control"'); ?>
													</div>

												</div>
												<div class="col-md-1 ">
													<br>
													<a class="btn btn-green add-row" data-target=".bs-example-modal-sm" data-toggle="modal" style="margin-top: 10px; margin-left: -10;">
														<i class="fa fa-plus"></i>
													</a>
												</div>

												<div class="col-md-4">
													<label class="control-label">DIRECCION</label>
													<input type="text" placeholder="Digite su Dirección" class="form-control">
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
	 <div id="dialogo_departamento" style="display:none">
	            Por Favor! Seleccione Primero un Departamento
	  </div>

			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
							<button class="btn btn-primary" data-dismiss="modal" id="boton" type="button">
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

		$("select[name=iddepartamento]").change(function(){
			$("select[name=iddepartamento] option:selected").each(function(){

				if($(this).val() == "")
				{
					$("#provincia").empty();
					$("#provincia").html("<select name='idprovincia' class='form-control'><option value=''>Seleccione Provincia</option></select>");
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

		$("select[name=idprovincia]").click(function (){
			var iddepartamento = $("select[name=iddepartamento]").val();
			if(iddepartamento == "")
			{
				   $("#dialogo_departamento").css("display","block");
				      setTimeout ('desaparecer()', 1000);
			}
		});

		$("select[name=iddistrito]").click(function (){
			var iddepartamento = $("select[name=iddepartamento]").val();
			if(iddepartamento == "")
			{
				   $("#dialogo_departamento").css("display","block");

			}
		});

		function desaparecer()
		{
			$("#dialogo_departamento").fadeOut("slow");
		}

		function traer_distrito(idprovincia)
		{
			var idprovincia = $("select[name=idprovincia]").val();

			if(idprovincia == "")
			{

				  $("#dialogo").css("visibility","visible");
			}
			else
			{
				if(idprovincia == "")
				{
					$("#distrito").empty();
					$("#distrito").html("<select name='iddistrito' class='form-control'><option value=''>Seleccione Distrito</option></select>");
				}
				else
				{
					$.post("<?php echo site_url('Personal_c/traer_distrito'); ?>",{idprovincia:idprovincia},response_distrito);
				}
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
				$("#sector").html("<select name='idsector' class='form-control'><option value=''>Seleccione Sector</option></select>");
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

		$("#boton").click(function(){
			var iddistrito = $("select[name=iddistrito]").val();
			var nuevo_sector = $("input[name=nuevo_sector]").val();
			alert(iddistrito+" el nuevo sector es : "+nuevo_sector);
			// var sector = $("").val();
			$.post("<?php echo site_url('Personal_c/insert_nuevo_sector'); ?>",{iddistrito:iddistrito,nuevo_sector:nuevo_sector},response_nuevo_sector);
		});

		function response_nuevo_sector(data)
		{
			$("#sector").empty();
			$("#sector").html(data);
			$("input[name=nuevo_sector]").val("");
		}



		function alerta_message(msg,title,method)
		{
			var shortCutFunction = method;
            var msg = msg;
            var title = title || '';
            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;
		}

		function message_nothing()
		{
          swal({
                title: "No deje vacio el campo!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

        function message_nothing2()
		{
          swal({
                title: "No puede insertar un campo vacio, Por Favor llenelo!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

        function eliminar_perfil(idperfil)
        {
        	$.post("<?php echo site_url('Perfiles_c/delete_perfil'); ?>",{idperfil:idperfil},respuesta_de_la_eliminacion);
        }

        function respuesta_de_la_eliminacion(rpta)
        {
        	var respta = rpta.split("-");
        	if(respta[0] == 1)
			{
				alerta_message("Se Eliminó Correctamente","Mensaje","success");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(respta[1]);
			}
			else
			{
				alerta_message("Error al eliminar","Mensaje","error");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(respta[1]);
			}
        }


        function alerta()
		{
          swal({
                title: "No primero termine de realizar la operacion!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }


	</script>
</body>

</html>

