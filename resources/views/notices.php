<?php include("header.php"); ?>
	<h1>Bienvenue &USER&</h1>
	<div class="well container">
		<div>
			<label>Liste des notifications</label> 
		</div>

		<div id="notifications" class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;">
			<div id="notif_1" class="alert alert-info alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Vous avez ete invite a rejoindre la liste des contacts de  <strong>&USER&</strong> !
			</div>

			<div id="notif_2" class="alert alert-info alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Vous avez ete invite a rejoindre l'evenement <strong>&EVENT&</strong>!
			</div>

			<div id="notif_3" class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Votre demande d'ajout a l'evenement <strong>&EVENT&</strong> a ete acceptee.
			</div>

			<div id="notif_4" class="alert alert-warning alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Votre demande d'ajout a l'evenement <strong>&EVENT&</strong> a ete refusee.
			</div>

			<div id="notif_4" class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				L'evenement <strong>&EVENT&</strong> a ete supprime.
			</div>
		</div>
	</div>

<?php include("footer.php");?>