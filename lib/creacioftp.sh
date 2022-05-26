useradd -p `openssl passwd -1 $2` $1

echo "user: $1, pass: $2" >> new_ftp_users_list

echo "$1" >> /etc/vsftpd.chroot_list

mkdir /var/ftpupload/$1

chown $1:$1 /var/ftpupload/$1

chmod 0777 /var/ftpupload/$1