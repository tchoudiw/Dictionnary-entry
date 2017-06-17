<?php

	
   $json = file_get_contents("dictionnairejson.json");  

    //convert json object to php associative array
    
	//var_dump(json_decode($json, true));
	$parsed_json = json_decode($json,true);
	
	/*	fonctionne
	for($i=0;$i<3;$i++)
	{
		$date = $parsed_json['dictionnaire']['entry'][0]['cita']['block'][$i]['fran'];
	
		echo $date.'<br>';
	}
	*/
	
	/*	fonctionne
	foreach($parsed_json['dictionnaire']['entry'][0]['cita']['block'][$i] as $value)
	{
		echo $value;
	}
	*/
	
	/*	fonctionne
	foreach($parsed_json['dictionnaire']['entry'][0]['cita']['block'] as $i)
	{
		foreach($i as $value)
		{
			echo $value.'<br>';
		}
		echo '<br>';
	}
	*/
	
	foreach($parsed_json['dictionnaire']['entry'][0]['cita'] as $block)
	{
		 foreach($block as $i)
		{
			foreach($i as $value)
			{
				echo $value.'<br>';
			}
			echo '<br>';
		}
	}
?>
