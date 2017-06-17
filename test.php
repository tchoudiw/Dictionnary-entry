<?php

	
   $json = file_get_contents("dico.json");  

    //convert json object to php associative array
    
	//var_dump(json_decode($json, true));
	$parsed_json = json_decode($json);
	
	  
		$date = $parsed_json->{'dictionnaire'}->{'entry'}[0]->{'cita'}->{'block'}[0]->{'fran'};
	
		echo $date;
	
		
?>
