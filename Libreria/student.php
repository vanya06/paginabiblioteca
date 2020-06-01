<!DOCTYPE html>
<?php
	require_once 'valid.php';
?>	
<html lang = "eng">
	<head>
		<title>Sistema de Biblioteca | </title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/conalep-logo.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Sistema de Biblioteca | </h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-lg-2 well" style = "margin-top:60px;">
				<div class = "container-fluid" style = "word-wrap:break-word;">
					<img src = "images/user.png" width = "50px" height = "50px"/>
					<br />
					<br />
					<label class = "text-muted"><?php require'account.php'; echo $name;?></label>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Cuentas</a>
						<ul style = "list-style-type:none;">
							<li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Administrador</a></li>
							<li><a href = "student.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Estudiante</a></li>
						</ul>
					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Libros</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Transacción</a>
						<ul style = "list-style-type:none;">
							<li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Préstamo</a></li>
							<li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Devolución</a></li>
						</ul>
					</li>
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Configuración</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:60px;">
				<div class = "alert alert-info">Cuentas / Estudiante</div>
					<button id = "add_student" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Agregar nuevo</button>
					<button id = "show_student" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Volver</button>
					<br />
					<br />
					<div id = "student_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>ID Estudiante</th>
									<th>Primer nombre</th>
									<th>Segundo nombre</th>
									<th>Apellidos</th>
									<th>Curso</th>
									<th>Año y Sección</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qstudent = $conn->query("SELECT * FROM `student`") or die(mysqli_error());
									while($fstudent = $qstudent->fetch_array()){
								?>
								<tr>
									<td><?php echo $fstudent['student_no']?></td>
									<td><?php echo $fstudent['firstname']?></td>
									<td><?php echo $fstudent['middlename']?></td>
									<td><?php echo $fstudent['lastname']?></td>
									<td><?php echo $fstudent['course']?></td>
									<td><?php echo $fstudent['section']?></td>
									<td><a  value = "<?php echo $fstudent['student_no']?>" class = "btn btn-danger delstudent_id"><span class = "glyphicon glyphicon-remove"></span> Eliminar</a> <a class = "btn btn-warning estudent_id" value = "<?php echo $fstudent['student_no']?>"><span class = "glyphicon glyphicon-edit"></span> Editar</a></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<div id = "edit_form"></div>
					<div id = "student_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_student_query.php" enctype = "multipart/form-data">	
								<div class = "form-group">	
									<label>ID Estudiante:</label>
									<input type = "text" name = "student_no" required = "required" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Primer nombre:</label>
									<input type = "text" name = "firstname" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">	
									<label>Segundo nombre:</label>
									<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Apellidos:</label>
									<input type = "text" required = "required" name = "lastname" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Curso:</label>
									<input type = "text" required = "required" name = "course" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Año / Sección</label>
									<input type = "text" maxlength = "12" name = "section" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">	
									<button class = "btn btn-primary" name = "save_student"><span class = "glyphicon glyphicon-save"></span> Enviar</button>
								</div>
							</form>		
						</div>	
					</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Sistema de Biblioteca |  &copy; Todos los Derechos Reservados 2019</label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_student').click(function(){
				$(this).hide();
				$('#show_student').show();
				$('#student_table').slideUp();
				$('#student_form').slideDown();
				$('#show_student').click(function(){
					$(this).hide();
					$('#add_student').show();
					$('#student_table').slideDown();
					$('#student_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.delstudent_id').click(function(){
				$student_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delstudent_id').attr('disabled', 'disabled');
				$('.estudent_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_student.php?student_id=' + $student_id;
				}, 1000);
			});
			$('.estudent_id').click(function(){
				$student_id = $(this).attr('value');
				$('#show_student').show();
				$('#show_student').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#student_table').show();
					$('#add_student').show();
				});
				$('#student_table').fadeOut();
				$('#add_student').hide();
				$('#edit_form').load('load_student.php?student_id=' + $student_id);
			});
		});
	</script>
</html>