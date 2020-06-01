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
		<link rel = "stylesheet" type = "text/css" href = "css/chosen.min.css" />
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
				<div class = "container-fluid">
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
				<div class = "alert alert-info">Transacción / Préstamo</div>
				<form method = "POST" action = "borrow.php" enctype = "multipart/form-data">
					<div class = "form-group pull-left">	
						<label>Nombre del estudiante:</label>
						<br />
						<select name = "student_no" id = "student">
							<option value = "" selected = "selected" disabled = "disabled">Seleccione una opción</option>
							<?php
								$qborrow = $conn->query("SELECT * FROM `student` ORDER BY `lastname`") or die(mysqli_error());
								while($fborrow = $qborrow->fetch_array()){
							?>
								<option value = "<?php echo $fborrow['student_no']?>"><?php echo $fborrow['firstname']." ".$fborrow['lastname']?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class = "form-group pull-right">	
						<button name = "save_borrow" class = "btn btn-primary"><span class = "glyphicon glyphicon-thumbs-up"></span> Prestar</button>
					</div>
					<table id = "table" class = "table table-bordered">
						<thead class = "alert-success">
							<tr>
								<th>Seleccionar</button>
								<th>Titulo del libro</th>
								<th>Categoria de libro</th>
								<th>Autor</th>
								<th>Fecha de Publicación</th>
								<th>Cantidad</th>
								<th>Disponible</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$q_book = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
								while($f_book = $q_book->fetch_array()){
								$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
								$new_qty = $q_borrow->fetch_array();
								$total = $f_book['qty'] - $new_qty['total'];
							?> 
							<tr>
								<td>
									<?php
										if($total == 0){
											echo "<center><label class = 'text-danger'>No Disponible</label></center>";
										}else{
											echo '<input type = "hidden" name = "book_id[]" value = "'.$f_book['book_id'].'"><center><input type = "checkbox" name = "selector[]" value = "1"></center>';
										}
									?>
								</td>
								<td><?php echo $f_book['book_title']?></td>
								<td><?php echo $f_book['book_category']?></td>
								<td><?php echo $f_book['book_author']?></td>
								<td><?php echo $f_book['date_publish']?></td>
								<td><?php echo $f_book['qty']?></td>
								<td><?php echo $total?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Sistema de Biblioteca |  </label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script src = "js/chosen.jquery.min.js"></script>	
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#student").chosen({ width:"auto" });	
		})
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
</html>