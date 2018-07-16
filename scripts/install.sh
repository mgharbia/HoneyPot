#! /bin/bash

# Setup startup scripts
head -n -1 /etc/rc.local > /etc/rc.local.temp

# camera pan startup script
echo '# Setup camera pan control' >> /etc/rc.local.temp
echo '/var/www/html/HoneyPot/scripts/starterScripts/./camera_pan_init.sh' >> /etc/rc.local.temp

# apply exit 0
echo 'exit 0' >> /etc/rc.local.temp

mv /etc/rc.local.temp /etc/rc.local
# =======
