import subprocess

# Prompt user for DB choice
db_choice = input("Which database are you using (mariadb/mysql)? ")

if db_choice not in ["mariadb", "mysql"]:
    print("Invalid choice. Please choose either 'mariadb' or 'mysql'.")
    exit()

# Prompt user for input
username = input("Username: ")
password = input("Password: ")
ip = input("IP Address: ")

# Connect to the selected DB using shell commands via `-e`
create_user_cmd = f"{db_choice} -e \"CREATE USER '{username}'@'{ip}' IDENTIFIED BY '{password}';\""
grant_privileges_cmd = f"{db_choice} -e \"GRANT ALL PRIVILEGES ON *.* TO '{username}'@'{ip}' WITH GRANT OPTION;\""
flush_cmd = f"{db_choice} -e \"FLUSH PRIVILEGES;\""

# Execute the commands in sequence and print the output
try:
    subprocess.run(create_user_cmd, check=True, shell=True, text=True)
    subprocess.run(grant_privileges_cmd, check=True, shell=True, text=True)
    subprocess.run(flush_cmd, check=True, shell=True, text=True)
    print("Operation completed.")
except subprocess.CalledProcessError as e:
    print(f"An error occurred: {e}")