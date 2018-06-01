<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="../../../../public/css/main.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>TODOList</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: flex; justify-content: space-between;margin-bottom: 15px;">
		<a class="navbar-brand" href="/">TODO List</a>
		<div id="top_bar">		
		<?php 
			if(Session::has('utilisateur')){
				echo '<form class="form-inline my-2 my-lg-0" action="/deconnexion" method="post">
					<div class="register">
						<input type="submit" class="btn btn-danger" id="deconnexion" value="Déconnexion"><br>
						'. csrf_field() .'
					</div>
				</form>';
			}
		?>
		</div>
	</nav>

	

