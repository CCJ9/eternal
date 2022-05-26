cd /var/www/eternal
wget https://wordpress.org/latest.tar.gz
tar -zxvf latest.tar.gz
mv wordpress $1
perl -pi -e "s/database_name_here/$1/g" $1/wp-config-sample.php
perl -pi -e "s/username_here/$2/g" $1/wp-config-sample.php
perl -pi -e "s/password_here/$3/g" $1/wp-config-sample.php

mkdir $1/wp-content/uploads
chmod -R 755 $1
chown -R www-data:www-data $1
rm latest.tar.gz