<?php

require 'common.php';

/////////////////////////////////////////////////////////////////////
//				    	Machine Controls						   //
/////////////////////////////////////////////////////////////////////

//PARAMS
$moveCommand = $_GET["cmd"];
$movementTrigger = $_GET["trigger"];

//LOGIC
$res = new Result();

$res->trigger = $movementTrigger;

//Use execute_process function in common.php to move the robot
switch ($moveCommand ) {
    case "up":
	    // TODO find better way to do this shit -_- 
		switch ($movementTrigger ) {
			case "true":
				$res->cmd = "go up";
				break;
			default:
				$res->cmd = "end up";
		}
        break;
    case "down":
        $res->cmd = "go back";
        break;
    case "right":
        $res->cmd = "go right";
        break;
	case "left":
        $res->cmd = "go left";
        break;
    default:
        $res->cmd = "don't go anywhere";
}

// temp class till we return real results! 
class Result {
	var $cmd;
	var $trigger;
}

echo json_encode($res);


?>

