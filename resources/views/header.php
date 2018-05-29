<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="../../../../public/css/main.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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

	

