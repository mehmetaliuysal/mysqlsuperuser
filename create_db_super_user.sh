#!/bin/bash

# Prompt user for DB choice
read -p "Which database are you using (mariadb/mysql)? " db_choice

# Check the choice
if [ "$db_choice" != "mariadb" ] && [ "$db_choice" != "mysql" ]; then
    echo "Invalid choice. Please choose either 'mariadb' or 'mysql'."
    exit 1
fi

# Prompt the user for input
read -p "Username: " username
read -sp "Password: " password
echo
read -p "IP Address: " ip

# Create the SQL commands
create_user_cmd="CREATE USER '${username}'@'${ip}' IDENTIFIED BY '${password}';"
grant_privileges_cmd="GRANT ALL PRIVILEGES ON *.* TO '${username}'@'${ip}' WITH GRANT OPTION;"
flush_cmd="FLUSH PRIVILEGES;"

# Connect to the selected DB and execute the commands
echo "Executing commands..."
$db_choice -e "${create_user_cmd}"
$db_choice -e "${grant_privileges_cmd}"
$db_choice -e "${flush_cmd}"

# Check the operation's status
if [ $? -eq 0 ]; then
    echo "Operation completed."
else
    echo "An error occurred."
fi