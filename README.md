# Database User Creation Script

This repository contains scripts for creating a super user in MariaDB/MySQL databases. Scripts are provided in 3 languages: PHP, Bash, and Python.

## Table of Contents

- [Requirements](#requirements)
- [Usage](#usage)
    - [PHP](#php)
    - [Bash](#bash)
    - [Python](#python)
- [Support](#support)
- [Contribution](#contribution)

## Requirements

1. **MariaDB/MySQL**: Ensure you have MariaDB or MySQL installed and accessible from the command line.
2. **Bash**: For the Bash script, you should be on a UNIX-like system or have Bash installed on Windows (e.g., through WSL).
3. **Python**: For the Python script, ensure you have Python 3 installed.
4. **PHP**: For the PHP script, you need to have PHP CLI installed.

## Usage

### Bash

1. Save the Bash script as `create_db_user.sh`.
2. Give it execute permissions: `chmod +x create_db_user.sh`
3. Run the script: `./create_db_user.sh`


### Python

1. Save the Python script as `create_db_user.py`.
2. Run the script: `python3 create_db_user.py`

### PHP

1. Save the PHP script as `create_db_user.php`.
2. Run the script: `php create_db_user.php`

## Python Script Usage Example

1. **Script Execution**:
   Start by running the `create_db_user.py` script.

   ```bash
   $ python3 create_db_user.py
   ```

   Output:
   ```bash
   Which database are you using (mariadb/mysql)? 
   ```

2. **Database Choice**:
   Here, provide your choice of database (mariadb or mysql).
   ```bash
   mariadb
   ```

   Output:
   ```bash
   Username: 
   ```


3. **Entering Username**:
   Input the username you wish to create.
   ```bash
    mysuperuser
    ```
    Output:
    ```bash
    Password:
    ```

4. **Entering Password**:
   Provide the desired password.
   ```bash
    supersecretpassword
    ```
    Output:
    ```bash
    IP Address:
    ```

5. **IP Address Input**:
   Specify the IP address from which the user can connect.
   ```bash
    192.168.1.100
    ```
    Output:
    ```bash
    Operation completed.
    ```    



## Support

For support, issues, or feedback, please open an issue on this repository.

## Contribution

Contributions, issues, and feature requests are welcome. Feel free to check [issues page](#) if you want to contribute.




