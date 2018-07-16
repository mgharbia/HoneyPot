#/bin/bash

# set GPIO #18 to pwm
gpio -g mode 18 pwm
gpio -g mode  19 pwm

# configure pwm clock and range params
# this should give 180 horizontal degree movement by setting pwm to 80-280
# where 80 is full right
gpio pwm-ms
gpio pwmc 192
gpio pwmr 2000

# center camera horizontaly
gpio -g pwm 18 180
gpio -g pwm 19 165

# adjust camera new position
echo 180 > /var/www/html/HoneyPot/webapp/src/commands/crc/cam_H_position
echo 165 > /var/www/html/HoneyPot/webapp/src/commands/crc/cam_V_position
