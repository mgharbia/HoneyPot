import RPi.GPIO as GPIO
'''

#Standard Pin Definitions for motor
RIGHT1	=	17
RIGHT2	=	18
LEFT1	=	22
LEFT2	=	23

'''
def initmotorpins(RIGHT1 = 17, RIGHT2 = 18, LEFT1 = 22, LEFT2 = 23):
	#Set pins as outputs
	GPIO.setup(RIGHT1, GPIO.OUT)
	GPIO.setup(RIGHT2, GPIO.OUT)
	GPIO.setup(LEFT1, GPIO.OUT)
	GPIO.setup(LEFT2, GPIO.OUT)
	#Set all pins to LOW
	GPIO.output(RIGHT1, GPIO.LOW)
	GPIO.output(RIGHT2, GPIO.LOW)
	GPIO.output(LEFT1, GPIO.LOW)
	GPIO.output(LEFT2, GPIO.LOW)
	

def moveforward():
	# Note: Output arrangement is important to make sure there is no jitter in the motors when moving Forwards/Backwards
	# TODO: explain the reason for the arrangement in detail in the documentation. 
	GPIO.output(RIGHT1, GPIO.HIGH)
	GPIO.output(LEFT1, GPIO.HIGH)
	GPIO.output(RIGHT2, GPIO.LOW)
	GPIO.output(LEFT2, GPIO.LOW)

def movebackwards():
	# Note: Output arrangement is important to make sure there is no jitter in the motors when moving Forwards/Backwards
	# TODO: explain the reason for the arrangement in detail in the documentation. 
	GPIO.output(RIGHT1,GPIO.LOW)
	GPIO.output(LEFT1, GPIO.LOW)
	GPIO.output(RIGHT2, GPIO.HIGH)
	GPIO.output(LEFT2, GPIO.HIGH)

def turnright():
	# Note: Output arrangement is important to make sure there is no jitter in the motors when turning Right/Left
	# TODO: explain the reason for the arrangement in detail in the documentation. 
	# Rotation is done by reversing the right motor, while other motors are off, and therefore doing a circle turn right.
	GPIO.output(RIGHT1, GPIO.LOW)
	GPIO.output(LEFT1, GPIO.LOW)
	GPIO.output(RIGHT2, GPIO.HIGH)
	GPIO.output(LEFT2, GPIO.LOW)
	
def turnleft():
	# Note: Output arrangement is important to make sure there is no jitter in the motors when turning Right/Left
	# TODO: explain the reason for the arrangement in detail in the documentation. 
	# Rotation is done by reversing the left motor, while other motors are off, and therefore doing a circle turn left.
	GPIO.output(RIGHT1, GPIO.LOW)
	GPIO.output(LEFT1, GPIO.LOW)
	GPIO.output(RIGHT2, GPIO.LOW)
	GPIO.output(LEFT2, GPIO.HIGH)

def stop():
	GPIO.output(RIGHT1, GPIO.LOW)
	GPIO.output(LEFT1, GPIO.LOW)
	GPIO.output(RIGHT2, GPIO.LOW)
	GPIO.output(LEFT2, GPIO.LOW)
