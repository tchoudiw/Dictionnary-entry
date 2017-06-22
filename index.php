<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
		<?php
			
			function connectDb(){
		    	$host="localhost"; // ou sql.hebergeur.com
		      	$user="root";      // ou login
		      	$password="";      // ou xxxxxx
		      	$dbname="dictionnaire";
		  		try {
		       			$bdd=new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user,$password);
		       			return $bdd;
		      		} catch (Exception $e)
		      	{
		       	die('Erreur : '.$e->getMessage());
		  		}
		 	}


		   	$json = file_get_contents("dico.json");  

		    //convert json object to php associative array
		    
			// var_dump(json_decode($json, true));
			$parsed_json = json_decode($json,true);


			// les données sont inséré dans l'ordre d'apparition dans la base de donné

			//insere les données dans la table entry de la base dictionnaire
			function insertion_entry($n,$o,$p)
			{
			$bdd = connectDb();
				$query = $bdd->prepare("insert 
										into entry(idData, word, nature)
										value (
											'$n',
											'$o',
											'$p'
												)
										");
				$query->execute();
			}

			//insere les données dans la table cita de la base dictionnaire
			function insertion_cita($f,$g,$h,$i,$j,$k,$l,$m)
			{
			$bdd = connectDb();
				$query = $bdd->prepare("insert 
										into cita(idCita, idData, trans, cf, syn, anto, hom, NB)
										value (
											'$f',
											'$g',
											'$h',
											'$i',
											'$j',
											'$k',
											'$l',
											'$m'
												)
										");
				$query->execute();
			}

			//insere les données dans la table block de la base dictionnaire
			function insertion_block($a,$b,$c,$d,$e)
			{
			$bdd = connectDb();
				$query = $bdd->prepare("insert 
										into block(idBlock, idCita, lang, fran, genre)
										value (
											'$a',
											'$b',
											'$c',
											'$d',
											'$e'
												)
										");
				$query->execute();
			}

			
			foreach ($parsed_json['dictionnaire']['entry'] as $i) //
			{
				
				foreach($i as $cit=>$cita) //
				{
					insertion_entry($i['_idData'],$i['word'],$i['nature']);
					foreach($cita as $blo=>$bloc) //
					{
						insertion_cita($cita['_idCita'],$cita['_idDataFo'],$cita['trans'],$cita['cf'],$cita['syn'],$cita['anto'],$cita['hom'],$cita['NB']);
						foreach($bloc as $j) //
						{
							//envoie des données a inserer a la fonction insertion
							insertion_block($j['_idBlock'],$j['_idCitaFo'],$j['lang'],$j['fran'],$j['_genre']);

							echo '<br><br>';
						}
					}
				}
			}


		?>
</html>
