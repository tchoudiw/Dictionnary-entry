<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
		<?php

			include("bdco.php");

			include_once("poo/Block.class.php");
			include_once("poo/Cita.class.php");
			include_once("poo/Entry.class.php");

		   	$json = file_get_contents("dico.json");  

		    //convert json object to php associative array
		    
			// var_dump(json_decode($json, true));
			$parsed_json = json_decode($json,true);
			
			foreach ($parsed_json['dictionnaire']['entry'] as $i)
			{
				
				foreach($i as$cita)
				{
					 $ii = new Entry();

					 $ii->set_Entry($i['_idData'],$i['word'],$i['nature']);

					 $ii->insert_Entry();

					foreach($cita as $bloc)
					{
						
						$ci = new Cita();

						$ci->set_Cita($cita['trans'],$cita['_idCita'],$cita['_idDataFo']);

						$ci->insert_Cita();

						foreach($bloc as $j)
						{

							 $blo = new Block();

							 $blo->set_Block($j['lang'],$j['fran'],$j['_genre'],$j['_idBlock'],$j['_idCitaFo']);

							 $blo->insert_Block();
							
						}

					}
				}
			}


		?>
</html>
