<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../public/css/main.css">
	<title>TODOList</title>
</head>

<body>
	<div id="top_bar">
		<a href="index.php"><div class="sName">TODO<span>List</span></div></a>
		
		<?php 
		if(Session::has('utilisateur')){
		echo '<form action="deconnexion" method="post">
			<div class="register">
				<input type="submit" id="deconnexion" value="deconnexion"><br>
				'. csrf_field() .'
			</div>
		</form>';
		}
		?>
	</div>

