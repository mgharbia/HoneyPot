<?php

require 'common.php';

/////////////////////////////////////////////////////////////////////
//					moveMachineForward							   //
/////////////////////////////////////////////////////////////////////
if (isset($_POST['moveMachineForward'])) 
{		
   return moveMachineForward($_POST['moveMachineForward']);
}
function moveMachineForward($moveLength) 
{
	$array = array();
	$array['status'] = "ERR";
	
	$dimentionCorrectionOnServer = intval($calibArray["dimentionCorrectionOnServer"]);
	$originalMoveLength = intval($moveLength);
	$absoluteDim = $originalMoveLength + $dimentionCorrectionOnServer;
	
	if ($absoluteDim < 0)
	{
		$array['errorMessages'] = "Internal error";
		$json = json_encode($array);
		echo $json;
		return;
	}
    
	// TODO: revise and consider replacing the controller.sh with the python commands script
	$exec_array = execute_process('workspace/controller.sh workspace/mk1 forward '.$absoluteDim);
	$exec_array['originalMoveLength'] = $originalMoveLength;
	$exec_array['dimentionCorrectionOnServer'] = $dimentionCorrectionOnServer;
	$exec_array['absoluteDim'] = $absoluteDim;
	
    $json = json_encode($exec_array);
	echo $json;
}

/////////////////////////////////////////////////////////////////////
//					moveMachineBackward							   //
/////////////////////////////////////////////////////////////////////
if (isset($_POST['moveMachineBackward'])) 
{		
   return moveMachineBackward($_POST['moveMachineBackward']);
}
function moveMachineBackward($moveLength) 
{	
	// TODO: implement
}

?>

