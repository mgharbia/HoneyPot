#!/bin/bash


exec_forward="forward"
exec_backward="backward"


# Inputs
path_machine=$1
path_operation=$2

# Messages
msg_example="\ne.g. $0 moving fwd"

# Return Values
ret_fail=100
ret_operation_fail=110
ret_busy=102


function quitJob() {
  echo -e $1
  exit $2
}

# Logic starts here
if [[ "$path_machine" == "" ]]
then
  quitJob "$msg_machine_fail" $ret_machine_fail
fi

if [[ ! -d "$path_machine" ]]
then 
  quitJob "$msg_machine_support" $ret_machine_support
fi

if [[ "$path_operation" != "reset" ]] 
then

	# Check if machine is performing another micro operation
	if pstree | grep "bend\|cut\|forward\|backward" > /dev/null
	then
  	  	quitJob "$msg_machine_busy" $ret_machine_busy
	fi
fi


case $path_operation in
  
  $exec_forward|$exec_backward|$exec_reset|$exec_sleep)
    sudo chrt -f 99 nice -n -20 $path_machine/$path_operation $3
  ;;
  
  "")
    quitJob "$msg_operation_fail" $ret_operation_fail;;

  *)
    quitJob "$msg_operation_support" $ret_operation_support;;
esac
   
