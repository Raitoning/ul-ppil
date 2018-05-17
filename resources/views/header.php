<html>

<head>
	<meta charset="utf-8">
	<title>TODOList</title>
</head>

<body style='text-align:center'>
	<div id="top_bar"  style="background-color:pink">
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

