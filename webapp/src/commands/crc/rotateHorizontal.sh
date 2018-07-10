#!/bin/bash

# the file holding the camera horizontal position
camHorPosFile=commands/crc/camera_horizontal_position
lowerHLim=80
upperHLim=280

usageMsg='usage: ./rotateHorizontal.sh [left|right]'

# default operation is rotate right
#op=-

echo $#
echo $1
if [ $# -lt 1 ]
then
	echo $usageMsg
	exit 1
elif [ $1 == 'left' ]
then
	op=+
elif [ $1 == 'right' ]
then
	op=-
else
	echo $usageMsg
	exit 1
fi

# set new position
currentPos=`cat $camHorPosFile`
newPos=`expr $currentPos $op 1` 
echo $newPos

# move camera to new position
if [ $newPos -le $upperHLim ] && [ $newPos -ge $lowerHLim ]
then
	gpio -g pwm 18 $newPos

	# update new position
	echo $newPos > $camHorPosFile
fi
