<?php 
	include_once __DIR__ . "/layout/header.php"; 
?>

<h1>Not Found</h1>
<div>
	The requested page 
	<!-- 
		Étant donné que la vue est affichée par le fichier index
		qui est le fichier qui gère le "routage", on a accès à la variable
		$page. on l'échappe pour éviter les XSS, étant donné que sa valeur est
		est controllée par l'utilisateur.
	-->
	<b><?= htmlspecialchars($page) ?></b> 
	was not found on this server.
</div>

<?php 
	include_once __DIR__ . "/layout/footer.php"; 
?>
