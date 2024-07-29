#!/bin/bash

# NB: this is to be run as sudo

# CREATE USERS
useradd a.arlert --create-home
useradd h.zoe --create-home
useradd m.zacharias --create-home
useradd e.smith --create-home

# POPOLUTE HOME FOLDERS
cp -r a.arlert /home/a.arlert
cp -r h.zoe /home/h.zoe
cp -r m.zacharias /home/m.zacharias
cp -r e.smith /home/e.smith

# SETUP PASSWORDS
chpasswd < passwords.txt

# DISABLE COMMANDS HISTORY
ln -sf /dev/null /home/*/.bash_history

# CONFIGURE PERMISSIONS
chmod 755 /home/h.zoe
chmod +s /home/h.zoe/titans
chmod 700 /home/h.zoe/scouts_share

# ENABLE NFS SHARE
apt install nfs-kernel-server
systemctl enable --now nfs-server
echo "/home/h.zoe/research 0.0.0.0/0(rw,sync,no_subtree_check,no_root_squash)" > /etc/exports
exportfs -arv

# START WEB SERVICES
cd ../web && docker-compose up --build
cd ../machine
