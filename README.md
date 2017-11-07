# micefinder

We are building a remote car to go and find the dead/alive mice in the 4th floor false ceiling.
We have enough hardware to make: **A car controlled by a mounted raspberry pi, along with a fixed angle camera**

The raspberry will have a server (PHP) with a simple web interface to send commands and receive video stream. The commands sent are translated by the server to GPIO signals to controls the motors.
