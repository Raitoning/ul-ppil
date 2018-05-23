<?php include("header.php"); ?>
<div class="container">
	<h1>Bienvenue <?php echo Session::get('utilisateur')->pseudo; ?></h1>
	<div>
		<label>Liste des notifications</label>
	</div>


		<?php foreach ($notices as $notice) {
			echo '	<div id="notifications" class="w-75 p-3 d-block row" style="overflow:auto;">
					<div id="notif_1" class="alert alert-info alert-dismissible row">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
					.$notice.'<br>'.
					'</div>	</div>';
		}
		?>



</div>

<?php include("footer.php");?>
