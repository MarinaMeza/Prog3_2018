<?php
	
	$acum = 0;

    for($i = 1; ; $i++){
    	$acum += $i;
    	if($acum >= 1000)
    	{
    		$acum -= $i;
    		break;
    	}
    }

    echo $acum;
?>