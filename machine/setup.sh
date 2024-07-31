#!/bin/bash

# NB: this is to be run as sudo

# CREATE USERS
useradd a.arlert --create-home
useradd h.zoe --create-home
useradd m.zacharias --create-home
useradd e.smith --create-home

# POPOLUTE HOME FOLDERS
cp -r a.arlert/* /home/a.arlert
cp -r h.zoe/* /home/h.zoe
cp -r m.zacharias/* /home/m.zacharias
cp -r e.smith/* /home/e.smith

# SETUP PASSWORDS
chpasswd < passwords.txt

# CONFIGURE PERMISSIONS
chown h.zoe:h.zoe /home/h.zoe/* && chmod 755 /home/h.zoe
chmod +s /home/h.zoe/titans
chmod 700 /home/h.zoe/scouts_share
chown a.arlert:a.arlert /home/a.arlert/* && chmod 700 /home/a.arlert
chown e.smith:e.smith /home/e.smith/* && chmod 700 /home/e.smith
chown m.zacharias:m.zacharias /home/m.zacharias/* && chmod 700 /home/m.zacharias

# ENABLE NFS SHARE
apt install nfs-kernel-server -y
systemctl enable --now nfs-server
echo "/home/h.zoe/research 0.0.0.0/0(rw,sync,no_subtree_check,no_root_squash)" > /etc/exports
exportfs -arv

# START WEB SERVICES
apt install docker.io docker-compose -y
cd ../web && docker-compose up --build
