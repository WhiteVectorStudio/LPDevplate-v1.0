<?php
//DB initialize
require_once "initialize.php";
$match = md5('click2014');
?>
<!DOCTYPE html>
<html lang="rus">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Список заявок</title>
	<meta name="description" content="Description">
	<meta name="keywords" content="Keywords">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<img src="img/logo.png" height="81" width="246" alt="">
	</header>
	<div class="container">
		<div class="row">

		<?php if(($_COOKIE['login'] !== 'admin') && ($_COOKIE['password'] !== $match)){ ?>
			<div class="col-md-4 col-md-offset-4">
				<form action="login.php" role="form" method="POST">
					<div class="form-group">
						<label for="exampleInputEmail1">Логин:</label>
						<input type="text" name="login" placeholder="Логин" class="form-control">
					</div>
					<div class="form-group">
   						<label for="exampleInputPassword1">Пароль:</label>
						<input type="password" name="password" placeholder="Пароль" class="form-control">
					</div>
					<input type="submit" value="Войти" class="btn btn-primary col-md-12">
				</form>
			</div>
		<?php 
			} else { ?>
			<div class="col-md-12">
				
				<h1>Список заявок:</h1>

				<?php	if($_GET['showhidden']){
							echo "<a class='show-list' href='?showhidden=0'>&larr; Вернуться</a>";
							echo Database::GetHidden();
						}else{
							echo "<a class='show-list' href='?showhidden=1'>Показать скрытые &rarr;</a>";
							echo Database::Get();
						}
				?>
			</div>
		<?php
			}
		?>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.1.11.1.min.js"><\/script>')</script>
	<script src="script.js"></script>
</body>
</html>