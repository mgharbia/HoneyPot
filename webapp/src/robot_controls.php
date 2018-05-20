
﻿<?php

require 'common.php';

/////////////////////////////////////////////////////////////////////
//				    	Robot Controls						   //
/////////////////////////////////////////////////////////////////////

//PARAMS
$directionCommand = $_GET["direction"];
$movementTrigger = $_GET["movement"];

//LOGIC
$res = new Response();
$res->movement = $movementTrigger;
$res->direction = $directionCommand;

$output = execute_process("commands/motor.py " . $directionCommand . " " . $movementTrigger);

// temp class till we return real results! 
class Response {
	var $direction;
	var $movement;
}

echo json_encode($output);


?>

