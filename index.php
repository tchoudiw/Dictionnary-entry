<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
		<?php

			
		   $json = file_get_contents("dico.json");  

		    //convert json object to php associative array
		    
			// var_dump(json_decode($json, true));
			$parsed_json = json_decode($json,true);
			
			$serveur = "localhost";
			$base = "dictionnaire";
			$user = "root";
			$pass = "";

			/*
			$mysqli est une nouvelle instance de la classe mysqli
			prédéfinie dans php et hérite donc de ses propriétés et méthodes
			connexion à la base de données
			*/
			$mysqli = new mysqli($serveur, $user, $pass, $base);
			// si la connexion se fait en UTF-8, sinon ne rien indiquer
			$mysqli->set_charset("utf8");
			/*
			utilisation de la méthode connect_error
			qui renvoie un message d'erreur si la connexion échoue
			*/
			if ($mysqli->connect_error) {
			    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
			}
			
			function insertion($valeur)

			foreach ($parsed_json['dictionnaire']['entry'] as $i) //
			{
				foreach($i as $cita) //
				{
					echo $cita;
					foreach($cita as $block) //
					{
						echo $block;
						foreach($block as $j) //
						{
							foreach($j as $value) //inserer $value
							{
								echo $value.'<br>';
							}
							echo '<br><br>';
								
						}
					}
				}
			}
		?>
</html>
