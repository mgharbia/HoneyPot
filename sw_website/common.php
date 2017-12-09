<?php


function GetDirName()
{
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		 $CREATE_DIR = "workspace/";
	}   
	else {
		$CREATE_DIR = "workspace/";
	}
	return $CREATE_DIR;
}

function execute_process($command)
{
	// TODO: revise and simplify implementation: This should call the vehicle python script
	
  $array = array();
  $array['status'] = "OK";

  $descriptorspec = array(
     0 => array("pipe", "r"),  // stdin
     1 => array("pipe", "w"),  // stdout
     2 => array("pipe", "w"),  // stderr
  );
  $process = proc_open($command, $descriptorspec, $pipes, dirname(__FILE__), null);
  $array['stdout'] = stream_get_contents($pipes[1]);
  fclose($pipes[1]);
 
  $array['stderr'] = stream_get_contents($pipes[2]);
  fclose($pipes[2]); 
 
  $array['returnValue'] = proc_get_status($process)['exitcode'];

  return $array;
}

?>

